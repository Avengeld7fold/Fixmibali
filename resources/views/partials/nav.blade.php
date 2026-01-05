<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixmi-navbar shadow-sm">
<div class="container">
<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
<img alt="FIXMI" class="fixmi-logo me-2" src="/assets/img/logo-fixmi.png"/>
</a>
<button
  class="navbar-toggler"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#fixmiMobileNav"
  aria-controls="fixmiMobileNav"
  aria-label="Toggle navigation"
>

  <img
    src="/assets/img/hamburger.svg"
    alt="Menu"
    class="fixmi-hamburger-icon"
  />
</button>
<div class="collapse navbar-collapse" id="mainNavbar">
<ul class="navbar-nav ms-auto align-items-lg-center">
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('pricelist*') ? 'active' : '' }}" @if(request()->routeIs('pricelist*')) aria-current="page" @endif href="{{ route('pricelist') }}">Pricelist</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('promo') ? 'active' : '' }}" @if(request()->routeIs('promo')) aria-current="page" @endif href="{{ route('promo') }}">Promo</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" @if(request()->routeIs('gallery')) aria-current="page" @endif href="{{ route('gallery') }}">Gallery Repair</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" @if(request()->routeIs('contact')) aria-current="page" @endif href="{{ route('contact') }}">Contact Us</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif href="{{ route('about') }}">About US</a>
</li>
</ul>
</div>
</div>
</nav>
<div
  class="offcanvas offcanvas-end fixmi-offcanvas-nav d-lg-none"
  tabindex="-1"
  id="fixmiMobileNav"
  aria-labelledby="fixmiMobileNavLabel"
>
  <div class="offcanvas-header justify-content-between align-items-center">
    <div class="fixmi-offcanvas-menu-pill">
      <span>Menu</span>
    </div>
    <button
      type="button"
      class="btn-close text-reset"
      data-bs-dismiss="offcanvas"
      aria-label="Close"
    ></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
    <ul class="navbar-nav flex-grow-1 mb-4">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif href="{{ route('home') }}" data-bs-dismiss="offcanvas">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('pricelist*') ? 'active' : '' }}" @if(request()->routeIs('pricelist*')) aria-current="page" @endif href="{{ route('pricelist') }}" data-bs-dismiss="offcanvas">Pricelist</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('promo') ? 'active' : '' }}" @if(request()->routeIs('promo')) aria-current="page" @endif href="{{ route('promo') }}" data-bs-dismiss="offcanvas">Promo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" @if(request()->routeIs('gallery')) aria-current="page" @endif href="{{ route('gallery') }}" data-bs-dismiss="offcanvas">Gallery Repair</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" @if(request()->routeIs('contact')) aria-current="page" @endif href="{{ route('contact') }}" data-bs-dismiss="offcanvas">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif href="{{ route('about') }}" data-bs-dismiss="offcanvas">About US</a>
      </li>
    </ul>

    <div class="fixmi-offcanvas-cta mt-auto">
      <p class="fixmi-offcanvas-label mb-2">LET'S TALK</p>
      <a
        href="{{ route('contact') }}"
        class="btn fixmi-offcanvas-contact-btn mb-2"
        data-bs-dismiss="offcanvas"
      >
        Contact Us
      </a>
      <p class="fixmi-offcanvas-email mb-0">admin@fixmibali.com</p>
</div>
  </div>
</div>
