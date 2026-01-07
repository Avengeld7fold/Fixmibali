@php
$activeService = $activeService ?? 'iphone';
$services = [
    'iphone' => [
        'title' => __('site.pricelist.cards.iphone'),
        'image' => '/assets/img/iphone.webp',
        'route' => 'pricelist',
        'iconClass' => 'is-iphone',
        'alt' => __('site.pricelist.cards.iphone_alt'),
    ],
    'ipad' => [
        'title' => __('site.pricelist.cards.ipad'),
        'image' => '/assets/img/ipad.webp',
        'route' => 'pricelist.ipad',
        'iconClass' => 'is-ipad',
        'alt' => __('site.pricelist.cards.ipad_alt'),
    ],
    'macbook' => [
        'title' => __('site.pricelist.cards.macbook'),
        'image' => '/assets/img/macbook.webp',
        'route' => 'pricelist.macbook',
        'iconClass' => 'is-macbook',
        'alt' => __('site.pricelist.cards.macbook_alt'),
    ],
    'iwatch' => [
        'title' => __('site.pricelist.cards.iwatch'),
        'image' => '/assets/img/iwatch.webp',
        'route' => 'pricelist.iwatch',
        'iconClass' => 'is-iwatch',
        'alt' => __('site.pricelist.cards.iwatch_alt'),
    ],
    'android' => [
        'title' => __('site.pricelist.cards.android'),
        'image' => '/assets/img/android.webp',
        'route' => 'pricelist.android',
        'iconClass' => 'is-android',
        'alt' => __('site.pricelist.cards.android_alt'),
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
