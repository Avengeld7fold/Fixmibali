<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixmi-navbar shadow-sm">
<div class="container">
<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
<img alt="FIXMI" class="fixmi-logo me-2" src="/assets/img/logo-fixmi.png" data-logo-light="/assets/img/logo-fixmi.png" data-logo-dark="/assets/img/logo-fixmi-darkmode.png"/>
</a>
<button
  class="navbar-toggler"
  type="button"
  data-bs-toggle="offcanvas"
  data-bs-target="#fixmiMobileNav"
  aria-controls="fixmiMobileNav"
  aria-label="Toggle navigation"
>

  <span class="fixmi-hamburger-icon" aria-hidden="true">
    <span></span>
    <span></span>
    <span></span>
  </span>
  <span class="nav-hint-arrow" aria-hidden="true"></span>
</button>
<div class="collapse navbar-collapse" id="mainNavbar">
<ul class="navbar-nav ms-auto align-items-lg-center">
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif href="{{ route('home') }}">{{ __('site.nav.home') }}</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('pricelist*') ? 'active' : '' }}" @if(request()->routeIs('pricelist*')) aria-current="page" @endif href="{{ route('pricelist') }}">{{ __('site.nav.pricelist') }}</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('promo') ? 'active' : '' }}" @if(request()->routeIs('promo')) aria-current="page" @endif href="{{ route('promo') }}">{{ __('site.nav.promo') }}</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" @if(request()->routeIs('gallery')) aria-current="page" @endif href="{{ route('gallery') }}">{{ __('site.nav.gallery') }}</a>
</li>
<li class="nav-item">
<a class="nav-link" href="https://app.fixmibali.com/welcome/status?code=123456">{{ __('site.nav.tracking') }}</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" @if(request()->routeIs('contact')) aria-current="page" @endif href="{{ route('contact') }}">{{ __('site.nav.contact') }}</a>
</li>
<li class="nav-item">
<a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif href="{{ route('about') }}">{{ __('site.nav.about') }}</a>
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
      <span>{{ __('site.nav.menu') }}</span>
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
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif href="{{ route('home') }}">{{ __('site.nav.home') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('pricelist*') ? 'active' : '' }}" @if(request()->routeIs('pricelist*')) aria-current="page" @endif href="{{ route('pricelist') }}">{{ __('site.nav.pricelist') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('promo') ? 'active' : '' }}" @if(request()->routeIs('promo')) aria-current="page" @endif href="{{ route('promo') }}">{{ __('site.nav.promo') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" @if(request()->routeIs('gallery')) aria-current="page" @endif href="{{ route('gallery') }}">{{ __('site.nav.gallery') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://app.fixmibali.com/welcome/status?code=123456">{{ __('site.nav.tracking') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" @if(request()->routeIs('contact')) aria-current="page" @endif href="{{ route('contact') }}">{{ __('site.nav.contact') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif href="{{ route('about') }}">{{ __('site.nav.about') }}</a>
      </li>
    </ul>

    <div class="fixmi-offcanvas-cta mt-auto">
      <p class="fixmi-offcanvas-label mb-2">{{ __('site.nav.lets_talk') }}</p>
      <a
        href="{{ route('contact') }}"
        class="btn fixmi-offcanvas-contact-btn mb-2"
      >
        {{ __('site.nav.contact') }}
      </a>
      <p class="fixmi-offcanvas-email mb-0">{{ __('site.nav.email') }}</p>
</div>
  </div>
</div>
