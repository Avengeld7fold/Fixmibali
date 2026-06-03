@php
    $whatsAppNumber = $whatsAppNumber ?? '0819-9933-6722';
    $whatsAppNumberDigits = preg_replace('/\D+/', '', $whatsAppNumber);
    $whatsAppNumberNormalized = str_starts_with($whatsAppNumberDigits, '0')
        ? '62' . substr($whatsAppNumberDigits, 1)
        : $whatsAppNumberDigits;
    $whatsAppText = $whatsAppText ?? rawurlencode(__('site.whatsapp.default_message'));
    $whatsAppLink = $whatsAppLink ?? "https://wa.me/{$whatsAppNumberNormalized}?text={$whatsAppText}";
@endphp

<section class="py-5 contact-section" id="contact">
<div class="container">
<div class="row g-4">
<div class="col-lg-5">
<div class="footer-logo-block footer-block">
<img alt="FIXMI" class="footer-logo mb-2" src="/assets/img/logo-fixmi.png" loading="lazy" decoding="async"/>

</div>

<div class="store-finder footer-block">
<div class="store-finder-heading d-flex align-items-center mb-3">
<img src="/assets/img/store-map-icon.png" alt="{{ __('site.footer.map_icon_alt') }}" class="store-finder-icon me-2" loading="lazy" decoding="async"/>
<h5 class="mb-0 store-finder-title">{{ __('site.footer.find_store') }}</h5>
</div>
<div class="d-flex flex-wrap gap-2 mb-3">
<button class="btn btn-sm btn-danger" id="headStoreBtn" data-store="head">{{ __('site.footer.store_head') }}</button>
<button class="btn btn-sm btn-outline-danger" id="branchStoreBtn" data-store="branch">{{ __('site.footer.store_branch') }}</button>
<button class="btn btn-sm btn-outline-danger" id="otherStoreBtn" data-store="other">{{ __('site.footer.store_other') }}</button>
</div>
<div class="store-contact">
<div class="store-contact-item store-contact-item--address">
<i class="bi bi-geo-alt"></i>
<span id="storeAddress">Link.kubu alit kedonganan, Jl. Raya Uluwatu, Kedonganan, Kec. Kuta, Kabupaten Badung, Bali 80361</span>
</div>
<div class="store-contact-item">
<i class="bi bi-whatsapp"></i>
<a id="storeWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">
<span id="storeWhatsapp">{{ $whatsAppNumber }}</span>
</a>
</div>
</div>
<p class="store-hours mb-0">{!! nl2br(e(__('site.footer.hours'))) !!}</p>
<p class="store-note mb-0">{{ __('site.footer.note') }}</p>
<div class="map-card map-card-mobile">
<div class="ratio ratio-16x9">
<iframe allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.2849272692183!2d115.1737111759487!3d-8.759240191291688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2446e57c0f08f%3A0x409a770bb27592cf!2sFIXMI%20BALI%20PHONE%20SERVICE!5e0!3m2!1sen!2sid!4v1765683626204!5m2!1sen!2sid" id="storeMapIframeMobile"></iframe>
</div>
</div>
</div>
<div class="footer-social-block footer-block">
<h6 class="mb-2 footer-social-title">{{ __('site.footer.social_title') }}</h6>
<div class="footer-social">
<a href="https://www.facebook.com/dedik.alesha?mibextid=ZbWKwL" class="footer-social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
<img src="/assets/img/social-facebook.png" alt="Facebook" class="footer-social-icon" loading="lazy" decoding="async"/>
</a>
<a href="https://www.instagram.com/fixmibali/?igsh=YTZnenhiZzN6OGVu#" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
<img src="/assets/img/social-instagram.png" alt="Instagram" class="footer-social-icon" loading="lazy" decoding="async"/>
</a>
<a href="https://www.tiktok.com/@fixmibali?_t=ZS-8xnjRqDgoT4&_r=1" class="footer-social-link" aria-label="TikTok" target="_blank" rel="noopener noreferrer">
<img src="/assets/img/social-tiktok.png" alt="TikTok" class="footer-social-icon" loading="lazy" decoding="async"/>
</a>
</div>
</div>
<p class="footer-copy mt-4 mb-0">{{ __('site.footer.copyright') }}</p>
</div>
<div class="col-lg-7 map-col">
<div class="map-card">
<div class="ratio ratio-16x9">
<!-- Ganti src dengan embed map asli dari Google Maps -->
<iframe allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.2849272692183!2d115.1737111759487!3d-8.759240191291688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2446e57c0f08f%3A0x409a770bb27592cf!2sFIXMI%20BALI%20PHONE%20SERVICE!5e0!3m2!1sen!2sid!4v1765683626204!5m2!1sen!2sid"  id="storeMapIframe"></iframe>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- WhatsApp floating button (optional) -->
<a class="whatsapp-float" id="floatingWhatsappLink" href="{{ $whatsAppLink }}" rel="noopener" target="_blank">
  <img src="/assets/img/whatsapp.svg" alt="WhatsApp" class="whatsapp-float-icon" />
</a>
