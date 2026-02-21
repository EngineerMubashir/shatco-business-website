@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Inquiries Management</h2>

    {{-- ✅ Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Add Inquiry Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Add New Inquiry</div>
        <div class="card-body">
            <form action="{{ route('admin.inquiries.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Service</label>
                        <select name="inquiry_service_id" class="form-control" required>
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" required>
                    </div>

                    <div class="col-md-8 mb-2">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success" >Add Inquiry</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ✅ Inquiries Table --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">All Inquiries</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $inquiry->service->title ?? 'N/A' }}</td>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->message }}</td>
                        <td>{{ $inquiry->phone }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>
                            {{-- ✅ Edit --}}
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $inquiry->id }}">Edit</button>

                            {{-- ✅ Delete --}}
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this inquiry?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    {{-- ✅ Edit Modal --}}
                    <div class="modal fade" id="editModal{{ $inquiry->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title">Edit Inquiry</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label>Service</label>
                                            <select name="inquiry_service_id" class="form-control" required>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}" {{ $service->id == $inquiry->inquiry_service_id ? 'selected' : '' }}>
                                                        {{ $service->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ $inquiry->name }}" class="form-control" required>
                                        </div>

                                        <div class="mb-2">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ $inquiry->email }}" class="form-control">
                                        </div>

                                        <div class="mb-2">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ $inquiry->phone }}" class="form-control">
                                        </div>

                                        <div class="mb-2">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" rows="2">{{ $inquiry->message }}</textarea>
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
                        <td colspan="7" class="text-muted">No inquiries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
