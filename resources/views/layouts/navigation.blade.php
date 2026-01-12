@php
    $dashboardActive = request()->routeIs('dashboard');
    $pricelistActive = request()->routeIs('admin.pricelist.*');
    $galleryActive = request()->routeIs('admin.gallery.*');
    $promoActive = request()->routeIs('admin.promo.*');
@endphp

<div
    class="admin-overlay"
    :class="sidebarOpen ? 'is-visible' : ''"
    @click="sidebarOpen = false"
></div>

<div class="admin-sidebar-wrap" :class="sidebarOpen ? 'is-open' : ''">
    <aside class="admin-sidebar" :class="sidebarCollapsed ? 'is-collapsed' : ''">
        <div class="admin-brand">
            <button
                type="button"
                class="admin-brand-icon admin-brand-icon--image admin-brand-button"
                aria-label="Expand menu"
                @click="if (sidebarCollapsed) { sidebarCollapsed = false; localStorage.setItem('admin-sidebar-collapsed', 'false'); }"
            >
                <img src="{{ asset('assets/img/favinco.png') }}" alt="Fixmi Bali" class="admin-brand-image">
            </button>
            <span class="admin-brand-text">Fixmi Bali</span>
            <button
                type="button"
                class="admin-collapse"
                aria-label="Collapse menu"
                @click="sidebarCollapsed = !sidebarCollapsed; localStorage.setItem('admin-sidebar-collapsed', sidebarCollapsed ? 'true' : 'false')"
                x-show="!sidebarCollapsed"
                x-cloak
            >
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" class="h-4 w-4">
                    <path d="M7 6l4 4-4 4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div class="admin-section">
            <p class="admin-section-title">Menu</p>
            <a href="{{ route('dashboard') }}" class="admin-link {{ $dashboardActive ? 'is-active' : '' }}" @click="sidebarOpen = false">
                <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M4 13h7V4H4v9zM13 20h7v-7h-7v7zM4 20h7v-5H4v5zM13 11h7V4h-7v7z" stroke-linejoin="round" />
                </svg>
                <span class="admin-link-label">Dashboard</span>
            </a>
            <a href="{{ route('admin.pricelist.index') }}" class="admin-link {{ $pricelistActive ? 'is-active' : '' }}" @click="sidebarOpen = false">
                <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M12 3v18M8.5 7.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5-3.5 1.57-3.5 3.5 1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="admin-link-label">Pricelist</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="admin-link {{ $galleryActive ? 'is-active' : '' }}" @click="sidebarOpen = false">
                <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M4 7a2 2 0 0 1 2-2h3l2 2h5a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7Z" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8 15l2-2 2 2 4-4 2 2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="admin-link-label">Gallery Repair</span>
            </a>
            <a href="{{ route('admin.promo.index') }}" class="admin-link {{ $promoActive ? 'is-active' : '' }}" @click="sidebarOpen = false">
                <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M4 6a2 2 0 0 1 2-2h7l5 5v9a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6z" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 4v5h5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8 15h8M8 11h4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="admin-link-label">Promo</span>
            </a>
        </div>

        <div class="admin-theme-row">
            <button type="button" class="admin-theme-compact" onclick="window.toggleAdminTheme()" aria-label="Toggle theme">
                <svg class="admin-theme-icon admin-theme-icon--sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2M6.2 6.2l1.4 1.4M16.4 16.4l1.4 1.4M6.2 17.8l1.4-1.4M16.4 7.6l1.4-1.4" stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="12" cy="12" r="4" />
                </svg>
                <svg class="admin-theme-icon admin-theme-icon--moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M20 14.5A8 8 0 1 1 9.5 4a6.5 6.5 0 0 0 10.5 10.5Z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="admin-theme-full">
                <span class="admin-theme-label">Dark mode</span>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <svg class="admin-theme-icon admin-theme-icon--sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M12 4v2M12 18v2M4 12h2M18 12h2M6.2 6.2l1.4 1.4M16.4 16.4l1.4 1.4M6.2 17.8l1.4-1.4M16.4 7.6l1.4-1.4" stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="12" cy="12" r="4" />
                    </svg>
                    <button type="button" class="admin-switch" role="switch" data-theme-indicator onclick="window.toggleAdminTheme()" aria-checked="false">
                        <span class="admin-switch-thumb"></span>
                    </button>
                    <svg class="admin-theme-icon admin-theme-icon--moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M20 14.5A8 8 0 1 1 9.5 4a6.5 6.5 0 0 0 10.5 10.5Z" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="admin-bottom">
            <div class="admin-divider"></div>

            <div class="admin-section">
                <p class="admin-section-title">Admin</p>
                <a href="{{ route('profile.edit') }}" class="admin-link" @click="sidebarOpen = false">
                    <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0 2c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4z" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="admin-link-label">Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-link" @click="sidebarOpen = false">
                        <svg class="admin-link-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M15 12H6m0 0 3-3m-3 3 3 3M20 5v14a1 1 0 0 1-1 1H9" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="admin-link-label">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>
</div>
