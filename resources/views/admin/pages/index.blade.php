@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Pages Management</h2>

    {{-- ✅ Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Add Page Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Add New Page</div>
        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">Add Page</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ Pages Table --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">All Pages</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <span class="badge bg-{{ $page->status === 'published' ? 'success' : 'secondary' }}">
                                {{ ucfirst($page->status) }}
                            </span>
                        </td>
                        <td>{{ $page->created_at->format('d M Y') }}</td>
                        <td>
                            {{-- ✅ Edit --}}
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $page->id }}">Edit</button>

                            {{-- ✅ Delete --}}
                            <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this page?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    {{-- ✅ Edit Modal --}}
                    <div class="modal fade" id="editModal{{ $page->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title">Edit Page</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ $page->title }}" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label>Slug</label>
                                                <input type="text" name="slug" value="{{ $page->slug }}" class="form-control" required>
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <label>Content</label>
                                                <textarea name="content" class="form-control" rows="4">{{ $page->content }}</textarea>
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label>Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="draft" {{ $page->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                                    <option value="published" {{ $page->status === 'published' ? 'selected' : '' }}>Published</option>
                                                </select>
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
                        <td colspan="6" class="text-muted">No pages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
