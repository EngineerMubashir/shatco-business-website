@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Services Management</h2>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Service Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Add New Service</div>
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Category</label>
                        <select name="service_category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Icon (optional)</label>
                        <input type="text" name="icon" class="form-control">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Full Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <div class="col-md-2 d-flex align-items-center">
                        <input type="checkbox" name="is_featured" value="1" class="me-2">
                        <label>Featured</label>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">Add Service</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Services Table --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">All Services</div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->category->name ?? 'N/A' }}</td>
                        <td>{{ $service->title }}</td>
                        <td>
                            @if($service->thumbnail)
                            <img src="{{ asset($service->thumbnail) }}" width="80" class="rounded">
                            @else
                            <span class="text-muted">No Image</span>
                            @endif

                        </td>
                        <td>{{ $service->is_featured ? 'Yes' : 'No' }}</td>
                        <td>
                            {{-- Edit --}}
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $service->id }}">Edit</button>

                            {{-- Delete --}}
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Edit Modal --}}
                    <div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title">Edit Service</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Category</label>
                                                <select name="service_category_id" class="form-control" required>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $service->service_category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ $service->title }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Icon</label>
                                                <input type="text" name="icon" value="{{ $service->icon }}" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label>Short Description</label>
                                                <textarea name="short_description" class="form-control">{{ $service->short_description }}</textarea>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control">{{ $service->description }}</textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Thumbnail</label>
                                                <input type="file" name="thumbnail" class="form-control">
                                                @if($service->thumbnail)
                                                <img src="{{ asset($service->thumbnail) }}" width="80" class="rounded">
                                                @else
                                                <span class="text-muted">No Image</span>
                                                @endif

                                            </div>
                                            <div class="col-md-2 d-flex align-items-center">
                                                <input type="checkbox" name="is_featured" value="1" {{ $service->is_featured ? 'checked' : '' }}>
                                                <label class="ms-2">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection