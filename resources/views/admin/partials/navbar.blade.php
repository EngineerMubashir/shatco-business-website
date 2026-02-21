<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">Admin Panel</span>

        <div class="d-flex align-items-center">
            <span class="me-3 text-muted">👤 {{ session('admin')->name }}</span>
            <button class="btn btn-outline-danger btn-sm"
                    onclick="document.getElementById('logoutForm').submit();">
                Logout
            </button>
            <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
<style>
    .modal-header {
        border-bottom: 2px solid #ffc107;
    }
    .modal-footer {
        border-top: 2px solid #ffc107;
    }
    .form-label {
        font-weight: 600;
    }
    textarea.form-control {
        resize: none;
    }
    img.rounded {
        box-shadow: 0 0 6px rgba(0,0,0,0.1);
    }
</style>

