<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('images/logo-wide2.png') }}" alt="Shabakkat KSA" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto">
        @foreach(App\Models\Page::where('status', 'published')->get() as $page)
          <li class="nav-item">
            <a class="nav-link {{ request()->is($page->slug) ? 'active' : '' }}" href="{{ url($page->slug) }}">
              {{ $page->title }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</header>
