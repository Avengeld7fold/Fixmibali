@php
    $warrantyIntro = __('site.pricelist.warranty_modal_intro');
    $warrantyIntro = is_string($warrantyIntro) ? trim($warrantyIntro) : '';
    $warrantyPointsRaw = __('site.pricelist.warranty_modal_points');
    $warrantyPoints = is_array($warrantyPointsRaw) ? $warrantyPointsRaw : [];
    $warrantyClaimTitle = __('site.pricelist.warranty_modal_claim_title');
    $warrantyClaimTitle = is_string($warrantyClaimTitle) ? trim($warrantyClaimTitle) : '';
    $warrantyClaimPointsRaw = __('site.pricelist.warranty_modal_claim_points');
    $warrantyClaimPoints = is_array($warrantyClaimPointsRaw) ? $warrantyClaimPointsRaw : [];
    $whatsAppNumber = $whatsAppNumber ?? '0819-9933-6722';
    $whatsAppNumberDigits = preg_replace('/\D+/', '', $whatsAppNumber);
    $whatsAppNumberNormalized = str_starts_with($whatsAppNumberDigits, '0')
        ? '62' . substr($whatsAppNumberDigits, 1)
        : $whatsAppNumberDigits;
    $whatsAppText = $whatsAppText ?? rawurlencode(__('site.whatsapp.default_message'));
    $whatsAppLink = $whatsAppLink ?? "https://wa.me/{$whatsAppNumberNormalized}?text={$whatsAppText}";
@endphp
<div class="service-listing-pill" role="group" aria-label="{{ __('site.pricelist.section_pill_title') }}">
    <span class="service-listing-pill-title">{{ __('site.pricelist.section_pill_title') }}</span>
    <button class="service-listing-pill-cta" type="button" data-bs-toggle="modal" data-bs-target="#warrantyModal">
        {{ __('site.pricelist.section_pill_cta') }}
    </button>
</div>

<div class="modal fade fixmi-warranty-modal" id="warrantyModal" tabindex="-1" aria-labelledby="warrantyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header warranty-modal-header">
                <div class="warranty-modal-title-wrap">
                    <span class="warranty-modal-icon" aria-hidden="true"><i class="bi bi-shield-check"></i></span>
                    <div>
                        <h5 class="modal-title" id="warrantyModalLabel">{{ __('site.pricelist.warranty_modal_title') }}</h5>
                        @if ($warrantyIntro !== '')
                            <p class="warranty-modal-subtitle">{{ $warrantyIntro }}</p>
                        @endif
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('site.popup.close') }}"></button>
            </div>
            <div class="modal-body warranty-modal-body">
                @if (!empty($warrantyPoints))
                    <ul class="warranty-modal-list">
                        @foreach ($warrantyPoints as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                @endif
                @if ($warrantyClaimTitle !== '')
                    <h6 class="modal-title warranty-modal-section-title">{{ $warrantyClaimTitle }}</h6>
                @endif
                @if (!empty($warrantyClaimPoints))
                    <ul class="warranty-modal-list">
                        @foreach ($warrantyClaimPoints as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="warranty-modal-note-row">
                    <p class="warranty-modal-note">{{ __('site.pricelist.warranty_modal_note') }}</p>
                    <a class="btn warranty-modal-cta" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">
                        <i class="bi bi-whatsapp"></i>
                        {{ __('site.pricelist.warranty_modal_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
