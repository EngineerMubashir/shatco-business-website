<div class="sidebar p-3">
    <h4 class="text-white mb-4">Shatco Admin</h4>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active bg-secondary rounded' : '' }}">
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.service-categories.index') }}"
               class="nav-link text-white {{ request()->is('admin/service-categories*') ? 'active bg-secondary rounded' : '' }}">
                Service Categories
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.services.index') }}"
               class="nav-link text-white {{ request()->is('admin/services*') ? 'active bg-secondary rounded' : '' }}">
                Services
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="{{ route('admin.service_media.index') }}"
               class="nav-link text-white {{ request()->is('admin/service_media*') ? 'active bg-secondary rounded' : '' }}">
                Service Media
            </a>
        </li> -->

        <li class="nav-item">
            <a href="{{ route('admin.testimonials.index') }}"
               class="nav-link text-white {{ request()->is('admin/testimonials*') ? 'active bg-secondary rounded' : '' }}">
                Testimonials
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.inquiries.index') }}"
               class="nav-link text-white {{ request()->is('admin/inquiries*') ? 'active bg-secondary rounded' : '' }}">
                Inquiries
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="{{ route('admin.pages.index') }}"
               class="nav-link text-white {{ request()->is('admin/pages*') ? 'active bg-secondary rounded' : '' }}">
                Pages
            </a>
        </li> -->

        <li class="nav-item">
            <a href="{{ route('admin.faqs.index') }}"
               class="nav-link text-white {{ request()->is('admin/faqs*') ? 'active bg-secondary rounded' : '' }}">
                FAQs
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.settings.index') }}"
               class="nav-link text-white {{ request()->is('admin/settings*') ? 'active bg-secondary rounded' : '' }}">
                Settings
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="{{ route('admin.activity-logs.index') }}"
               class="nav-link text-white {{ request()->is('admin/activity-logs*') ? 'active bg-secondary rounded' : '' }}">
                Activity Logs
            </a>
        </li> -->
    </ul>

    <form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
</div>
