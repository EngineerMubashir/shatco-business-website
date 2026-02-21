@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Website & Admin Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- 🌐 General Website Settings --}}
    <div class="card mb-4">
        <div class="card-header">General Website Settings</div>
        <div class="card-body">
            <form action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Site Name</label>
                        <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Logo</label><br>
                        @if(!empty($settings['logo']))
                            <img src="{{ asset($settings['logo']) }}" width="100" class="mb-2">
                        @endif
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ $settings['whatsapp'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="{{ $settings['facebook'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Instagram</label>
                        <input type="url" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Twitter</label>
                        <input type="url" name="twitter" class="form-control" value="{{ $settings['twitter'] ?? '' }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ $settings['linkedin'] ?? '' }}">
                    </div>

                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-success">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- 🔐 Admin Password Change --}}
    <div class="card mb-4">
        <div class="card-header">Change Admin Password</div>
        <div class="card-body">
            <form action="{{ route('admin.settings.password.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>
                </div>
                <button class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>

    {{-- ⚙️ Existing Settings (manual key-value) --}}
    <div class="card">
        <div class="card-header">Custom Settings</div>
        <div class="card-body">
            <form action="{{ route('admin.settings.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="key" placeholder="Key" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="value" placeholder="Value" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success w-100">Add</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Setting::latest()->get() as $setting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $setting->key }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $setting->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this setting?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal{{ $setting->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Setting</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Key</label>
                                            <input type="text" name="key" class="form-control mb-3" value="{{ $setting->key }}">
                                            <label>Value</label>
                                            <input type="text" name="value" class="form-control" value="{{ $setting->value }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="4" class="text-center">No settings found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
