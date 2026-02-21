@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Testimonials Management</h2>

    {{-- ✅ Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Add Testimonial Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Add New Testimonial</div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" placeholder="Project Manager">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Message</label>
                        <textarea name="message" rows="3" class="form-control" placeholder="Enter testimonial message..." required></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">Add Testimonial</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ Testimonials Table --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">All Testimonials</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Message</th>
                        <th>Image</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->designation }}</td>
                        <td>{{ Str::limit($testimonial->message, 80) }}</td>
                        <td>
                            @if($testimonial->image)
                                <img src="{{ asset($testimonial->image) }}" width="80" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            {{-- ✏ Edit --}}
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $testimonial->id }}">
                                Edit
                            </button>

                            {{-- 🗑 Delete --}}
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- ✅ Edit Modal --}}
                    <div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title">Edit Testimonial</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Designation</label>
                                                <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label>Message</label>
                                                <textarea name="message" rows="3" class="form-control" required>{{ $testimonial->message }}</textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Replace Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="col-md-6 d-flex align-items-center">
                                                @if($testimonial->image)
                                                    <img src="{{ asset($testimonial->image) }}" width="100" class="rounded shadow-sm">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
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
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No testimonials found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
