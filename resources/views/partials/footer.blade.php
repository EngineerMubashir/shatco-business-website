<footer class="bg-dark text-white pt-5 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('images/logo-white.png') }}" alt="Shabakkat" height="50">
        <p class="mt-3">Member of <a href="https://iptpowertech.com/" class="text-primary">IPT Power Tech Group</a>.</p>
      </div>
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          @foreach(App\Models\Page::where('status', 'published')->get() as $page)
            <li><a href="{{ url($page->slug) }}" class="text-white">{{ $page->title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contact</h5>
        <p><i class="bi bi-telephone"></i> +966 11 464 5934</p>
        <p><i class="bi bi-envelope"></i> info@shabakkatksa.com</p>
        <p><i class="bi bi-geo-alt"></i> Riyadh, Saudi Arabia</p>
      </div>
    </div>
    <hr class="bg-light">
    <p class="text-center mb-0">&copy; {{ date('Y') }} Shabakkat KSA. All Rights Reserved.</p>
  </div>
</footer>
