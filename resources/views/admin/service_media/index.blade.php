@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Service Media Management</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Media Form --}}
    <div class="card mb-4">
        <div class="card-header">Upload New Media</div>
        <div class="card-body">
            <form action="{{ route('admin.service_media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select name="service_id" id="service_id" class="form-select" required>
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-select" required>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>

                    <div class="col-md-2 d-flex align-items-end mb-3">
                        <button type="submit" class="btn btn-primary w-100">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Media Table --}}
    <div class="card">
        <div class="card-header">All Uploaded Media</div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Preview</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($media as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->service->title ?? 'N/A' }}</td>
                            <td>
                                @if($item->type == 'image')
                                    <img src="{{ asset($item->file_path) }}" alt="media" width="80" height="80" class="rounded">
                                @elseif($item->type == 'video')
                                    <video width="120" height="80" controls>
                                        <source src="{{ asset($item->file_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </td>
                            <td>{{ ucfirst($item->type) }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                <form action="{{ route('admin.service_media.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.service_media.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Media</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Service</label>
                                                <select name="service_id" class="form-select" required>
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}" {{ $item->service_id == $service->id ? 'selected' : '' }}>
                                                            {{ $service->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="image" {{ $item->type == 'image' ? 'selected' : '' }}>Image</option>
                                                    <option value="video" {{ $item->type == 'video' ? 'selected' : '' }}>Video</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">File (Optional)</label>
                                                <input type="file" name="file" class="form-control">
                                                @if($item->type == 'image')
                                                    <img src="{{ asset($item->file_path) }}" width="100" class="mt-2">
                                                @elseif($item->type == 'video')
                                                    <video width="120" height="80" controls class="mt-2">
                                                        <source src="{{ asset($item->file_path) }}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5" class="text-center">No media found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
