@php
$activeService = $activeService ?? 'iphone';
$services = [
    'iphone' => [
        'title' => 'Service iPhone',
        'image' => '/assets/img/iphone.webp',
        'route' => 'pricelist',
        'iconClass' => 'is-iphone',
        'alt' => 'Service iPhone',
    ],
    'ipad' => [
        'title' => 'Service iPad',
        'image' => '/assets/img/ipad.webp',
        'route' => 'pricelist.ipad',
        'iconClass' => 'is-ipad',
        'alt' => 'Service iPad',
    ],
    'macbook' => [
        'title' => 'Service Macbook',
        'image' => '/assets/img/macbook.webp',
        'route' => 'pricelist.macbook',
        'iconClass' => 'is-macbook',
        'alt' => 'Service Macbook',
    ],
    'iwatch' => [
        'title' => 'Service iWatch',
        'image' => '/assets/img/iwatch.webp',
        'route' => 'pricelist.iwatch',
        'iconClass' => 'is-iwatch',
        'alt' => 'Service iWatch',
    ],
    'android' => [
        'title' => 'Service Android',
        'image' => '/assets/img/android.webp',
        'route' => 'pricelist.android',
        'iconClass' => 'is-android',
        'alt' => 'Service Android',
    ],
];
@endphp

<div class="service-card-grid">
@foreach ($services as $slug => $service)
  <a
    class="service-card service-card-link {{ $activeService === $slug ? 'is-active' : '' }}"
    href="{{ route($service['route']) }}"
    @if ($activeService === $slug) aria-current="page" @endif
  >
    <div class="service-card-media">
      <div class="service-device-icon {{ $service['iconClass'] }}">
        <img src="{{ $service['image'] }}" alt="{{ $service['alt'] }}" class="service-device-img"/>
      </div>
    </div>
    <div class="service-card-title">{{ $service['title'] }}</div>
  </a>
@endforeach
</div>
