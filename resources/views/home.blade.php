
<!DOCTYPE html>

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ __('site.home.page_title') }}</title>
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
<style>
.service h5 { 
  text-align: right; 
}

.service p { 
  text-align: right; 
  display: block; 
  margin: 4px 0; 
}

</style></head>
<body class="fixmi-home-page has-sticky-cta">
@php
    $whatsAppNumber = '628873183122';
    $whatsAppText = rawurlencode(__('site.whatsapp.default_message'));
    $whatsAppLink = "https://wa.me/{$whatsAppNumber}?text={$whatsAppText}";
@endphp
@include('partials.nav')
<!-- Hero Section -->
<!-- HERO SECTION (IMAGE BACKGROUND + ICON CARDS + SLIDER) -->
<section class="hero-section" id="home">
<div class="hero-overlay">
<div class="container">
<div class="row align-items-center gy-4">
<!-- Left copy -->
<div class="col-lg-6 hero-left">
<h1 class="hero-title-main mb-1 hero-reveal delay-1"><span class="hero-title-word">FIXMI</span><span class="hero-title-word">BALI</span></h1>
<h2 class="hero-title-sub mb-3 hero-reveal delay-2">{{ __('site.hero.subtitle') }}</h2>
<p class="hero-text mb-3 hero-reveal delay-3">
            {{ __('site.hero.description') }}
          </p>
<ul class="list-unstyled d-grid gap-2 mb-4 hero-benefits hero-reveal delay-4">
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>{{ __('site.hero.benefits.checkup') }}</span></li>
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>{{ __('site.hero.benefits.experience') }}</span></li>
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>{{ __('site.hero.benefits.sparepart') }}</span></li>
</ul>
<h6 class="hero-hardware-title mb-3 hero-reveal delay-5">{{ __('site.hero.hardware_title') }}</h6>
<div class="row g-3 hero-services mb-4 hero-reveal delay-6">
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-green">
<i class="bi bi-cpu"></i>
</div>
<div class="hero-service-label">{{ __('site.hero.services.emmc') }}</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-blue">
<i class="bi bi-droplet-half"></i>
</div>
<div class="hero-service-label">{{ __('site.hero.services.water') }}</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-orange">
<i class="bi bi-lightning-charge-fill"></i>
</div>
<div class="hero-service-label">{{ __('site.hero.services.charging') }}</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-cyan">
<i class="bi bi-phone"></i>
</div>
<div class="hero-service-label">{{ __('site.hero.services.lcd') }}</div>
</div>
</div>
</div>
<div class="d-flex flex-wrap gap-2 hero-cta hero-reveal delay-7">
<a class="btn btn-dark hero-btn" href="{{ route('pricelist') }}">{{ __('site.hero.cta.pricelist') }}</a>
<a class="btn btn-success hero-btn" id="heroWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">{{ __('site.hero.cta.whatsapp') }}</a>
<button class="btn btn-outline-dark hero-btn" id="konsultasiGratisBtn" type="button">{{ __('site.hero.cta.consultation') }}</button>
</div>
</div>
<!-- Right slider -->
<div class="col-lg-6 hero-right">
<div class="carousel slide hero-photo-frame hero-reveal delay-4" data-bs-interval="4500" data-bs-ride="carousel" id="heroCarousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img alt="{{ __('site.hero.slider.alt_one') }}" class="d-block w-100 hero-photo-img" src="/assets/img/hero-1.jpeg" decoding="async" fetchpriority="high"/>
</div>
<div class="carousel-item">
<img alt="{{ __('site.hero.slider.alt_two') }}" class="d-block w-100 hero-photo-img" src="/assets/img/hero-2.jpeg" loading="lazy" decoding="async"/>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-5 quick-services-section" id="estimasi">
<div class="container">
<div class="row align-items-end g-3 mb-4">
<div class="col-lg-8">
<h2 class="section-title mb-2">{{ __('site.quick_services.title') }}</h2>
<p class="mb-0 text-muted">{{ __('site.quick_services.subtitle') }}</p>
</div>
<div class="col-lg-4 text-lg-end">
<a class="btn btn-dark" href="{{ route('pricelist') }}">{{ __('site.quick_services.cta') }}</a>
</div>
</div>
<div class="row g-3">
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-phone"></i></div>
<div class="quick-service-title">{{ __('site.quick_services.cards.lcd_title') }}</div>
<div class="quick-service-subtitle">{{ __('site.quick_services.cards.lcd_subtitle') }}</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-battery-charging"></i></div>
<div class="quick-service-title">{{ __('site.quick_services.cards.battery_title') }}</div>
<div class="quick-service-subtitle">{{ __('site.quick_services.cards.battery_subtitle') }}</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-lightning-charge"></i></div>
<div class="quick-service-title">{{ __('site.quick_services.cards.charging_title') }}</div>
<div class="quick-service-subtitle">{{ __('site.quick_services.cards.charging_subtitle') }}</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-droplet"></i></div>
<div class="quick-service-title">{{ __('site.quick_services.cards.water_title') }}</div>
<div class="quick-service-subtitle">{{ __('site.quick_services.cards.water_subtitle') }}</div>
</a>
</div>
</div>
</div>
</section>
<!-- Before & After Section -->
<section class="py-5 before-after-section">
<div class="container">
<div class="row align-items-center g-4">
<div class="col-lg-4">
<div class="ba-list">
<div class="ba-item ba-link" data-extra-target="backglass"><div class="service service-body"><h5>{{ __('site.before_after.body_title') }}</h5><p>{{ __('site.before_after.body_desc') }}</p></div>
</div>
<div class="ba-item ba-link" data-target-index="6">
<div class="service"><h5>{{ __('site.before_after.water_title') }}</h5><p>{{ __('site.before_after.water_desc') }}</p></div></div>
<div class="ba-item ba-link" data-target-index="3">
<div class="service"><h5>{{ __('site.before_after.battery_title') }}</h5><p>{{ __('site.before_after.battery_desc') }}</p></div></div>
</div>
</div>
<div class="col-lg-4 text-center">
<div class="ba-hint">{{ __('site.before_after.hint') }}</div>
<div class="phone-frame">
<div class="phone-screen">
<img alt="Fixmi iPhone 13" class="phone-sequence-image is-active" data-index="13" src="/assets/img/Iphone/13.webp"/>
<img alt="Fixmi iPhone 12" class="phone-sequence-image" data-index="12" src="/assets/img/Iphone/12.webp"/>
<img alt="Fixmi iPhone 11" class="phone-sequence-image" data-index="11" src="/assets/img/Iphone/11.webp"/>
<img alt="Fixmi iPhone 10" class="phone-sequence-image" data-index="10" src="/assets/img/Iphone/10.webp"/>
<img alt="Fixmi iPhone 9" class="phone-sequence-image" data-index="9" src="/assets/img/Iphone/9.webp"/>
<img alt="Fixmi iPhone 8" class="phone-sequence-image" data-index="8" src="/assets/img/Iphone/8.webp"/>
<img alt="Fixmi iPhone 7" class="phone-sequence-image" data-index="7" src="/assets/img/Iphone/7.webp"/>
<img alt="Fixmi iPhone 6" class="phone-sequence-image" data-index="6" src="/assets/img/Iphone/6.webp"/>
<img alt="Fixmi iPhone 5" class="phone-sequence-image" data-index="5" src="/assets/img/Iphone/5.webp"/>
<img alt="Fixmi iPhone 4" class="phone-sequence-image" data-index="4" src="/assets/img/Iphone/4.webp"/>
<img alt="Fixmi iPhone 3" class="phone-sequence-image" data-index="3" src="/assets/img/Iphone/3.webp"/>
<img alt="Fixmi iPhone 2" class="phone-sequence-image" data-index="2" src="/assets/img/Iphone/2.webp"/>
<img alt="Fixmi iPhone 1" class="phone-sequence-image" data-index="1" src="/assets/img/Iphone/1.webp"/>
<img alt="Fixmi Backglass Broken" class="phone-extra-image" data-extra-id="backglass" src="/assets/img/Iphone/backglass-broken.webp"/>
<img alt="Fixmi Recovery Mode" class="phone-extra-image" data-extra-id="recovery" src="/assets/img/Iphone/recovery-mode.webp"/>
</div>
</div>
<div class="scroll-hint">
<span class="scroll-hint-text">{{ __('site.before_after.scroll_hint') }}</span>
<span class="scroll-hint-icon">
<i class="bi bi-mouse"></i>
<i class="bi bi-chevron-down"></i>
</span>
</div>
</div>
<div class="col-lg-4">
<div class="ba-list ba-list-right">
<div class="ba-item ba-link" data-target-pair="7,9">
<h5>{{ __('site.before_after.speaker_title') }}</h5>
<p>{{ __('site.before_after.speaker_desc') }}</p>
</div>
<div class="ba-item ba-link" data-extra-target="recovery">
<h5>{{ __('site.before_after.software_title') }}</h5>
<p>{{ __('site.before_after.software_desc') }}</p>
</div>
<div class="ba-item ba-link" data-target-index="2">
<h5>{{ __('site.before_after.lcd_title') }}</h5>
<p>{{ __('site.before_after.lcd_desc') }}</p>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-5 process-section" id="proses">
<div class="container">
<div class="text-center mb-4 faq-header">
<h2 class="section-title mb-2">{{ __('site.process.title') }}</h2>
<p class="mb-0 text-muted">{{ __('site.process.subtitle') }}</p>
</div>
<div class="row g-3">
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-search"></i></div>
<h5 class="process-title mb-1">{{ __('site.process.steps.diagnose_title') }}</h5>
<p class="process-desc mb-0">{{ __('site.process.steps.diagnose_desc') }}</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-receipt"></i></div>
<h5 class="process-title mb-1">{{ __('site.process.steps.estimate_title') }}</h5>
<p class="process-desc mb-0">{{ __('site.process.steps.estimate_desc') }}</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-check2-circle"></i></div>
<h5 class="process-title mb-1">{{ __('site.process.steps.approval_title') }}</h5>
<p class="process-desc mb-0">{{ __('site.process.steps.approval_desc') }}</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-tools"></i></div>
<h5 class="process-title mb-1">{{ __('site.process.steps.repair_title') }}</h5>
<p class="process-desc mb-0">{{ __('site.process.steps.repair_desc') }}</p>
</div>
</div>
</div>
<div class="mt-4 text-center">
<a class="btn btn-success" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">{{ __('site.process.cta') }}</a>
</div>
</div>
</section>
<!-- Service Banner -->
<section class="py-5 service-banner-section" id="promo">
<div class="container">
<div class="service-banner-card">
  <img src="/assets/img/banner.png" alt="{{ __('site.service_banner.alt') }}" class="service-banner-image" loading="lazy" decoding="async" />
</div>
</div>
</section>
<!-- Keunggulan Section -->
<section class="py-5 advantages-section" id="about">
<div class="container">
<div class="advantages-header text-center mb-5">
<span class="advantages-eyebrow advantages-reveal">{{ __('site.advantages.eyebrow') }}</span>
<h2 class="section-title mb-3 advantages-reveal">{{ __('site.advantages.title') }}</h2>
<p class="advantages-subtitle mb-0 advantages-reveal">{{ __('site.advantages.subtitle') }}</p>
</div>
<div class="row g-4 advantages-grid">
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-blue" aria-hidden="true"><i class="bi bi-shield-check"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.transparent.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.transparent.desc') }}</p>
</article>
</div>
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-green" aria-hidden="true"><i class="bi bi-award"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.quality.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.quality.desc') }}</p>
</article>
</div>
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-purple" aria-hidden="true"><i class="bi bi-mortarboard"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.education.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.education.desc') }}</p>
</article>
</div>
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-amber" aria-hidden="true"><i class="bi bi-box-seam"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.stock.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.stock.desc') }}</p>
</article>
</div>
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-red" aria-hidden="true"><i class="bi bi-lightning-charge"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.speed.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.speed.desc') }}</p>
</article>
</div>
<div class="col-12 col-md-6 col-lg-4">
<article class="adv-card advantages-reveal">
<span class="adv-icon adv-icon-indigo" aria-hidden="true"><i class="bi bi-chat-square-text"></i></span>
<h3 class="adv-title">{{ __('site.advantages.cards.consultation.title') }}</h3>
<p class="adv-desc mb-0">{{ __('site.advantages.cards.consultation.desc') }}</p>
</article>
</div>
</div>
</div>
</section>
<section class="py-5 testimonials-section" id="testimoni">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title mb-2">{{ __('site.testimonials.title') }}</h2>
<p class="mb-0 text-muted">{{ __('site.testimonials.subtitle') }}</p>
</div>
<div class="row g-3 testimonial-track">
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar">
<img src="/assets/img/testimonials/chaerun-muhaimin.png" alt="Chaerun Muhaimin" loading="lazy" decoding="async"/>
</div>
<div>
<div class="testimonial-name">Chaerun Muhaimin</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.local_guide', ['level' => 6]) }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.chaerun.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.chaerun.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar">
<img src="/assets/img/testimonials/lydia-pramono.png" alt="Lydia Pramono" loading="lazy" decoding="async"/>
</div>
<div>
<div class="testimonial-name">Lydia Pramono</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.local_guide', ['level' => 4]) }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.lydia.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.lydia.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar testimonial-avatar--purple">T</div>
<div>
<div class="testimonial-name">Travis Ahern</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.local_guide', ['level' => 2]) }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.travis.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.travis.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar">MT</div>
<div>
<div class="testimonial-name">Made</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.macbook_software') }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.made.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.made.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar">LK</div>
<div>
<div class="testimonial-name">Lukman</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.iphone_battery') }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.lukman.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.lukman.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-rating" aria-label="{{ __('site.testimonials.rating_aria') }}">
<div class="testimonial-stars" aria-hidden="true">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="testimonial-score">5.0</span>
<span class="testimonial-source">{{ __('site.testimonials.source') }}</span>
</div>
<div class="testimonial-head">
<div class="testimonial-avatar">SA</div>
<div>
<div class="testimonial-name">Sari</div>
<div class="testimonial-meta">{{ __('site.testimonials.meta.android_speaker') }}</div>
</div>
</div>
<p class="testimonial-text mb-0">
  <span class="testimonial-text-short">{{ __('site.testimonials.reviews.sari.short') }}</span>
  <span class="testimonial-text-full">{{ __('site.testimonials.reviews.sari.full') }}</span>
</p>
<button class="testimonial-toggle" type="button" aria-expanded="false" data-label-more="{{ __('site.testimonials.see_more') }}" data-label-less="{{ __('site.testimonials.see_less') }}">{{ __('site.testimonials.see_more') }}</button>
</div>
</div>
</div>
<div class="testimonial-mobile-nav d-md-none">
<button class="testimonial-arrow testimonial-arrow-prev" type="button" aria-label="{{ __('site.testimonials.prev') }}">
<i class="bi bi-chevron-left"></i>
</button>
<div class="testimonial-dots" role="tablist" aria-label="{{ __('site.testimonials.slider_label') }}"></div>
<button class="testimonial-arrow testimonial-arrow-next" type="button" aria-label="{{ __('site.testimonials.next') }}">
<i class="bi bi-chevron-right"></i>
</button>
</div>
</div>
</section>
<section class="py-5 faq-section" id="faq">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title mb-2">{{ __('site.faq.title') }}</h2>
<p class="mb-0 text-muted">{{ __('site.faq.subtitle') }}</p>
</div>
<div class="accordion fixmi-accordion" id="fixmiFaq">
<div class="accordion-item">
<h2 class="accordion-header" id="faqOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">{{ __('site.faq.items.q1') }}</button>
</h2>
<div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#fixmiFaq">
<div class="accordion-body">{{ __('site.faq.items.a1') }}</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqTwo">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">{{ __('site.faq.items.q2') }}</button>
</h2>
<div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#fixmiFaq">
<div class="accordion-body">{{ __('site.faq.items.a2') }}</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqThree">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">{{ __('site.faq.items.q3') }}</button>
</h2>
<div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#fixmiFaq">
<div class="accordion-body">{{ __('site.faq.items.a3') }}</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqFour">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">{{ __('site.faq.items.q4') }}</button>
</h2>
<div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#fixmiFaq">
<div class="accordion-body">{{ __('site.faq.items.a4') }}</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqFive">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">{{ __('site.faq.items.q5') }}</button>
</h2>
<div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive" data-bs-parent="#fixmiFaq">
<div class="accordion-body">{{ __('site.faq.items.a5') }}</div>
</div>
</div>
</div>
<div class="mt-4 text-center">
<a class="btn btn-success" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">{{ __('site.faq.cta') }}</a>
</div>
</div>
</section>
@include('partials.footer')

<div class="fixmi-lang-modal" id="fixmiLangModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="fixmiLangTitle" data-action="{{ url('/set-locale') }}" data-cookie="{{ config('fixmi.locale.cookie', 'fixmi_locale') }}">
  <div class="fixmi-lang-card">
    <h3 class="fixmi-lang-title" id="fixmiLangTitle">{{ __('site.language.title') }}</h3>
    <p class="fixmi-lang-subtitle">{{ __('site.language.subtitle') }}</p>
    <div class="fixmi-lang-options">
      <button class="fixmi-lang-option" type="button" data-locale="id">
        <span class="fixmi-lang-flag">
          <img src="/assets/img/language/indonesia.svg" alt="{{ __('site.language.indonesian') }}" loading="lazy" decoding="async"/>
        </span>
        <span class="fixmi-lang-label">{{ __('site.language.indonesian') }}</span>
        <span class="fixmi-lang-check"><i class="bi bi-check2"></i></span>
      </button>
      <button class="fixmi-lang-option" type="button" data-locale="en">
        <span class="fixmi-lang-flag">
          <img src="/assets/img/language/english.svg" alt="{{ __('site.language.english') }}" loading="lazy" decoding="async"/>
        </span>
        <span class="fixmi-lang-label">{{ __('site.language.english') }}</span>
        <span class="fixmi-lang-check"><i class="bi bi-check2"></i></span>
      </button>
    </div>
  </div>
</div>

<!-- Popup Layanan FIXMI -->
<div class="fixmi-popup-overlay" id="servicePopup" aria-hidden="true">
  <div class="fixmi-popup-dialog">
    <div class="fixmi-popup-brand">
      <img src="/assets/img/logo-fixmi.png" alt="FIXMI Bali logo" class="fixmi-popup-brand-logo" />
    </div>
    <button
      type="button"
      class="fixmi-popup-close"
      aria-label="{{ __('site.popup.close') }}"
    >
      ×
    </button>

    <div class="fixmi-popup-inner">
      <!-- Kiri: gambar dan teks besar -->
      <div class="fixmi-popup-left">
        <div class="fixmi-popup-image-wrapper">
          <img
            src="/assets/img/cpu-repair.jpg"
            alt="{{ __('site.popup.image_alt') }}"
            class="fixmi-popup-image"
          />

          <div class="fixmi-popup-left-text">
            <p class="fixmi-popup-tagline">
              {{ __('site.popup.tagline') }}
            </p>
            <p class="fixmi-popup-desc">
              {{ __('site.popup.desc') }}
            </p>
          </div>
        </div>
      </div>

      <!-- Kanan: judul dan list layanan -->
      <div class="fixmi-popup-right">
        <h3 class="fixmi-popup-title fixmi-popup-title-blackops">
          {!! __('site.popup.title') !!}
        </h3>

        <ul class="fixmi-popup-service-list">
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.cpu') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.dead') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.charging') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.water') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.lcd') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.software') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.swapboard') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.emmc') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.battery') }}
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            {{ __('site.popup.list.warranty') }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="fixmi-sticky-cta d-lg-none">
<a class="btn btn-dark flex-fill" href="{{ route('pricelist') }}">{{ __('site.sticky.pricelist') }}</a>
<a class="btn btn-outline-dark flex-fill" href="#contact">{{ __('site.sticky.location') }}</a>
<a class="btn btn-success flex-fill" id="stickyWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">{{ __('site.sticky.whatsapp') }}</a>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
