<!DOCTYPE html>

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ __('site.pricelist.page_title_android') }}</title>
<link rel="icon" type="image/png" href="/assets/img/favinco.png"/>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Google Fonts + Icons for hero -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
<!-- Black Ops One font -->
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body class="fixmi-home-page fixmi-pricelist-page fixmi-whatsapp-mobile">
@include('partials.nav')

<section class="service-listing-section">
<div class="container">
<div class="service-listing-header text-center">
<h2 class="service-listing-title">{{ __('site.pricelist.section_title') }}</h2>
<p class="service-listing-subtitle">
{{ __('site.pricelist.section_subtitle') }}
</p>
@include('partials.pricelist-warranty-pill')
</div>

@include('partials.pricelist-cards', ['activeService' => 'android'])

<div class="service-pricelist-accordion service-pricelist-brandlist" id="servicePricelistAccordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandXiaomi" aria-expanded="false" aria-controls="brandXiaomi">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/xiaomi.svg" alt="Xiaomi" class="service-brand-logo"/>
</span>
<span class="service-price-title">Xiaomi</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandXiaomi">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#xiaomiMiSeries" aria-expanded="false" aria-controls="xiaomiMiSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Xiaomi Mi Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="xiaomiMiSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-mi-lcd" aria-expanded="false" aria-controls="android-xiaomi-mi-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-mi-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-mi-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-mi-battery" aria-expanded="false" aria-controls="android-xiaomi-mi-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-mi-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-mi-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#xiaomiRedmiSeries" aria-expanded="false" aria-controls="xiaomiRedmiSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Xiaomi Redmi Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="xiaomiRedmiSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-redmi-lcd" aria-expanded="false" aria-controls="android-xiaomi-redmi-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-redmi-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-redmi-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-redmi-battery" aria-expanded="false" aria-controls="android-xiaomi-redmi-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-redmi-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-redmi-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#xiaomiPocoSeries" aria-expanded="false" aria-controls="xiaomiPocoSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Xiaomi Poco Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="xiaomiPocoSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-poco-lcd" aria-expanded="false" aria-controls="android-xiaomi-poco-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-poco-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-poco-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-xiaomi-poco-battery" aria-expanded="false" aria-controls="android-xiaomi-poco-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-xiaomi-poco-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-xiaomi-poco-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandSamsung" aria-expanded="false" aria-controls="brandSamsung">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/samsung.svg" alt="Samsung" class="service-brand-logo"/>
</span>
<span class="service-price-title">Samsung</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandSamsung">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxyASeries" aria-expanded="false" aria-controls="samsungGalaxyASeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy A Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxyASeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-a-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-a-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-a-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-a-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-a-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-a-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-a-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-a-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxyMSeries" aria-expanded="false" aria-controls="samsungGalaxyMSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy M Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxyMSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-m-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-m-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-m-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-m-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-m-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-m-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-m-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-m-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxyNoteSeries" aria-expanded="false" aria-controls="samsungGalaxyNoteSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy Note Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxyNoteSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-note-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-note-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-note-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-note-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-note-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-note-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-note-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-note-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxySSeries" aria-expanded="false" aria-controls="samsungGalaxySSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy S Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxySSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-s-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-s-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-s-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-s-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-s-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-s-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-s-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-s-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxyTabSeries" aria-expanded="false" aria-controls="samsungGalaxyTabSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy Tab Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxyTabSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-tab-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-tab-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-tab-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-tab-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-tab-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-tab-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-tab-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-tab-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-sublist-group">
<button class="service-sublist-item service-sublist-item--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#samsungGalaxyZSeries" aria-expanded="false" aria-controls="samsungGalaxyZSeries">
<span class="service-sublist-icon"><i class="bi bi-arrow-right"></i></span>
<span class="service-sublist-text">Galaxy Z Fold &amp; Z Flip Series</span>
<span class="service-sublist-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="samsungGalaxyZSeries">
<div class="service-sublist-panel-inner">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-z-lcd" aria-expanded="false" aria-controls="android-samsung-galaxy-z-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-z-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-z-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-samsung-galaxy-z-battery" aria-expanded="false" aria-controls="android-samsung-galaxy-z-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-samsung-galaxy-z-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-samsung-galaxy-z-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandRealme" aria-expanded="false" aria-controls="brandRealme">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/realme.svg" alt="Realme" class="service-brand-logo"/>
</span>
<span class="service-price-title">Realme</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandRealme">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-realme-lcd" aria-expanded="false" aria-controls="android-realme-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-realme-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-realme-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-realme-battery" aria-expanded="false" aria-controls="android-realme-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-realme-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-realme-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandInfinix" aria-expanded="false" aria-controls="brandInfinix">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/infinix.svg" alt="Infinix" class="service-brand-logo"/>
</span>
<span class="service-price-title">Infinix</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandInfinix">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-infinix-lcd" aria-expanded="false" aria-controls="android-infinix-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-infinix-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-infinix-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-infinix-battery" aria-expanded="false" aria-controls="android-infinix-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-infinix-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-infinix-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandOppo" aria-expanded="false" aria-controls="brandOppo">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/oppo.svg" alt="Oppo" class="service-brand-logo"/>
</span>
<span class="service-price-title">Oppo</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandOppo">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-oppo-lcd" aria-expanded="false" aria-controls="android-oppo-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-oppo-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-oppo-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-oppo-battery" aria-expanded="false" aria-controls="android-oppo-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-oppo-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-oppo-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandVivo" aria-expanded="false" aria-controls="brandVivo">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/vivo.svg" alt="Vivo" class="service-brand-logo"/>
</span>
<span class="service-price-title">Vivo</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandVivo">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-vivo-lcd" aria-expanded="false" aria-controls="android-vivo-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-vivo-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-vivo-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-vivo-battery" aria-expanded="false" aria-controls="android-vivo-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-vivo-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-vivo-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandAsus" aria-expanded="false" aria-controls="brandAsus">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/zenfone.svg" alt="Asus" class="service-brand-logo"/>
</span>
<span class="service-price-title">Asus</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandAsus">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-asus-lcd" aria-expanded="false" aria-controls="android-asus-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-asus-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-asus-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-asus-battery" aria-expanded="false" aria-controls="android-asus-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-asus-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-asus-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandGooglePixel" aria-expanded="false" aria-controls="brandGooglePixel">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/google-pixel.svg" alt="Google Pixel" class="service-brand-logo"/>
</span>
<span class="service-price-title">Google Pixel</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandGooglePixel">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-google-pixel-lcd" aria-expanded="false" aria-controls="android-google-pixel-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-google-pixel-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-google-pixel-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-google-pixel-battery" aria-expanded="false" aria-controls="android-google-pixel-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-google-pixel-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-google-pixel-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#brandHuawei" aria-expanded="false" aria-controls="brandHuawei">
<span class="service-price-icon is-brand">
<img src="/assets/img/brands/huawei.svg" alt="Huawei" class="service-brand-logo"/>
</span>
<span class="service-price-title">Huawei</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="brandHuawei">
<div class="service-price-content">
<div class="service-sublist">
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-huawei-lcd" aria-expanded="false" aria-controls="android-huawei-lcd">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.lcd_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-huawei-lcd">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-huawei-lcd'] ?? null])
</div>
</div>
</div>
<div class="service-sublist-block">
<button class="service-sublist-entry service-sublist-entry--toggle" type="button" data-bs-toggle="collapse" data-bs-target="#android-huawei-battery" aria-expanded="false" aria-controls="android-huawei-battery">
<span class="service-sublist-entry-icon"><i class="bi bi-arrow-return-right"></i></span>
<span class="service-sublist-entry-text">{{ __('site.pricelist.android.battery_replacement') }}</span>
<span class="service-sublist-entry-toggle">+</span>
</button>
<div class="collapse service-sublist-panel" id="android-huawei-battery">
<div class="service-sublist-table">
@include('partials.pricelist-table', ['table' => $priceTables['android-huawei-battery'] ?? null])
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@include('partials.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
