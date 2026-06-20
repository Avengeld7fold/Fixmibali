<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-admin-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fixmi Service Center</title>
        <link rel="icon" type="image/svg+xml" href="/assets/img/favinco.svg"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script>
            (function () {
                document.documentElement.dataset.adminTheme = 'dark';
            })();
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root,
            html[data-admin-theme='dark'] {
                color-scheme: dark;
                --admin-bg: #0f141b;
                --admin-glow: rgba(242, 106, 33, 0.16);
                --admin-sidebar-bg: #161c24;
                --admin-border: #2f343d;
                --admin-text: #f2f4f7;
                --admin-muted: #9aa2ad;
                --admin-accent: #ff6a2b;
                --admin-accent-soft: rgba(255, 106, 43, 0.22);
                --admin-shadow: 0 24px 40px rgba(0, 0, 0, 0.45);
            }

            body {
                background: var(--admin-bg);
                color: var(--admin-text);
            }

            [x-cloak] {
                display: none !important;
            }

            .admin-shell {
                display: flex;
                min-height: 100vh;
                background: radial-gradient(1200px 640px at -10% -10%, var(--admin-glow) 0%, transparent 60%),
                    var(--admin-bg);
                color: var(--admin-text);
            }

            html[data-admin-theme='dark'] .admin-shell .text-gray-900,
            html[data-admin-theme='dark'] .admin-shell .text-gray-800,
            html[data-admin-theme='dark'] .admin-shell .text-gray-700 {
                color: var(--admin-text);
            }

            html[data-admin-theme='dark'] .admin-shell .text-gray-600,
            html[data-admin-theme='dark'] .admin-shell .text-gray-500 {
                color: var(--admin-muted);
            }

            html[data-admin-theme='dark'] .admin-shell .bg-white {
                background-color: #1f242b;
            }

            html[data-admin-theme='dark'] .admin-shell .bg-white\/90 {
                background-color: rgba(31, 36, 43, 0.9) !important;
            }

            html[data-admin-theme='dark'] .admin-shell .bg-gray-100 {
                background-color: #1b1f25;
            }

            html[data-admin-theme='dark'] .admin-shell .bg-gray-50 {
                background-color: #22262d;
            }

            html[data-admin-theme='dark'] .admin-shell .border-gray-200,
            html[data-admin-theme='dark'] .admin-shell .border-gray-300 {
                border-color: #2f343d;
            }

            html[data-admin-theme='dark'] .admin-shell .ring-gray-900\/5 {
                --tw-ring-color: rgba(47, 52, 61, 0.5);
            }

            html[data-admin-theme='dark'] .admin-shell .ring-black\/5 {
                --tw-ring-color: rgba(47, 52, 61, 0.5);
            }

            html[data-admin-theme='dark'] .admin-shell .shadow,
            html[data-admin-theme='dark'] .admin-shell .shadow-sm {
                box-shadow: none;
            }

            html[data-admin-theme='dark'] .admin-shell .text-gray-400 {
                color: #7c8798;
            }

            html[data-admin-theme='dark'] .admin-shell .text-green-600 {
                color: #4ade80;
            }

            html[data-admin-theme='dark'] .admin-shell .text-red-600 {
                color: #f87171;
            }

            html[data-admin-theme='dark'] .admin-shell .border-gray-900 {
                border-color: var(--admin-text);
            }

            html[data-admin-theme='dark'] .admin-shell .hover\:text-gray-900:hover {
                color: var(--admin-text);
            }

            html[data-admin-theme='dark'] .admin-shell .hover\:bg-white:hover {
                background-color: #1f242b;
            }

            .admin-sidebar-wrap {
                position: relative;
            }

            .admin-sidebar {
                width: 260px;
                height: calc(100vh - 48px);
                margin: 24px 0 24px 24px;
                padding: 22px;
                border-radius: 24px;
                border: 1px solid var(--admin-border);
                background: var(--admin-sidebar-bg);
                box-shadow: var(--admin-shadow);
                display: flex;
                flex-direction: column;
                gap: 12px;
                transition: width 0.2s ease, padding 0.2s ease;
            }

            .admin-sidebar.is-collapsed {
                width: 80px;
                padding: 22px 12px;
            }

            .admin-sidebar.is-collapsed .admin-brand-text,
            .admin-sidebar.is-collapsed .admin-section-title,
            .admin-sidebar.is-collapsed .admin-link-label,
            .admin-sidebar.is-collapsed .admin-user-info {
                display: none;
            }

            .admin-sidebar.is-collapsed .admin-link {
                justify-content: center;
            }

            .admin-sidebar.is-collapsed .admin-brand {
                justify-content: center;
            }

            .admin-brand {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .admin-brand-icon {
                width: 36px;
                height: 36px;
                border-radius: 12px;
                background: var(--admin-accent);
                display: grid;
                place-items: center;
                color: #fff;
                font-weight: 700;
                font-size: 14px;
            }

            .admin-brand-button {
                border: none;
                padding: 0;
                background: transparent;
                cursor: pointer;
            }

            .admin-brand-icon--image {
                background: transparent;
                border: 1px solid var(--admin-border);
                padding: 4px;
            }

            .admin-brand-image {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            .admin-brand-text {
                font-size: 16px;
                font-weight: 600;
            }

            .admin-collapse {
                margin-left: auto;
                width: 28px;
                height: 28px;
                border-radius: 999px;
                border: 1px solid var(--admin-border);
                background: rgba(255, 255, 255, 0.5);
                color: var(--admin-muted);
                display: grid;
                place-items: center;
                transition: color 0.2s ease, background 0.2s ease;
            }

            html[data-admin-theme='dark'] .admin-collapse {
                background: rgba(0, 0, 0, 0.25);
            }

            .admin-section {
                margin-top: 8px;
            }

            .admin-section-title {
                font-size: 10px;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                color: var(--admin-muted);
                margin-bottom: 8px;
            }

            .admin-link {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 8px 12px;
                border-radius: 14px;
                color: var(--admin-muted);
                font-size: 13px;
                font-weight: 500;
                background: transparent;
                border: none;
                text-align: left;
                width: 100%;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease;
            }

            .admin-link:hover {
                color: var(--admin-text);
            }

            .admin-link.is-active {
                background: var(--admin-accent-soft);
                color: var(--admin-text);
                font-weight: 600;
            }

            .admin-link-icon {
                width: 18px;
                height: 18px;
                color: currentColor;
            }

            .admin-link.is-active .admin-link-icon {
                color: var(--admin-accent);
            }

            .admin-divider {
                height: 1px;
                background: var(--admin-border);
                margin: 8px 0;
            }

            .admin-bottom {
                margin-top: auto;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .admin-user {
                margin-top: auto;
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .admin-avatar {
                width: 36px;
                height: 36px;
                border-radius: 999px;
                background: rgba(255, 106, 43, 0.14);
                display: grid;
                place-items: center;
                color: var(--admin-accent);
                font-weight: 600;
                font-size: 13px;
            }

            .admin-user-name {
                font-size: 13px;
                font-weight: 600;
            }

            .admin-user-role {
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-panel-card {
                background: var(--admin-sidebar-bg);
                border: 1px solid var(--admin-border);
            }

            .admin-accordion {
                border: 1px solid var(--admin-border);
                border-radius: 20px;
                background: var(--admin-sidebar-bg);
                overflow: hidden;
            }

            .admin-accordion--nested {
                border-radius: 16px;
            }

            .admin-accordion summary {
                list-style: none;
            }

            .admin-accordion summary::-webkit-details-marker {
                display: none;
            }

            .admin-accordion-summary {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                padding: 16px 18px;
                cursor: pointer;
            }

            .admin-accordion--nested .admin-accordion-summary {
                padding: 12px 14px;
            }

            .admin-accordion-title {
                font-size: 15px;
                font-weight: 600;
                color: var(--admin-text);
            }

            .admin-accordion--nested .admin-accordion-title {
                font-size: 14px;
            }

            .admin-accordion-hint {
                font-size: 11px;
                font-weight: 600;
                color: var(--admin-muted);
                border: 1px solid var(--admin-border);
                padding: 4px 10px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.6);
                transition: transform 0.2s ease, color 0.2s ease, border-color 0.2s ease, background 0.2s ease;
            }

            .admin-accordion--nested .admin-accordion-hint {
                font-size: 10px;
                padding: 3px 8px;
            }

            html[data-admin-theme='dark'] .admin-accordion-hint {
                background: rgba(0, 0, 0, 0.25);
            }

            .admin-accordion-summary:hover .admin-accordion-hint {
                transform: translateY(-2px);
                color: var(--admin-accent);
                border-color: var(--admin-accent);
                background: var(--admin-accent-soft);
            }

            .admin-accordion-content {
                padding: 16px 18px 20px;
                border-top: 1px solid var(--admin-border);
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0));
            }

            .admin-accordion--nested .admin-accordion-content {
                padding: 12px 14px 16px;
            }

            html[data-admin-theme='dark'] .admin-accordion-content {
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.03), rgba(0, 0, 0, 0));
            }

            .admin-description {
                font-size: 12px;
                color: var(--admin-muted);
                margin-bottom: 12px;
            }

            .admin-section-block {
                margin-top: 12px;
                padding: 12px;
                border-radius: 16px;
                border: 1px solid var(--admin-border);
                background: rgba(255, 255, 255, 0.65);
            }

            html[data-admin-theme='dark'] .admin-section-block {
                background: rgba(0, 0, 0, 0.22);
            }

            .admin-section-title {
                font-size: 13px;
                font-weight: 600;
                color: var(--admin-text);
            }

            .admin-section-hint {
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-file {
                margin-top: 10px;
            }

            .admin-file input {
                width: 100%;
                border-radius: 14px;
                border: 1px dashed var(--admin-border);
                background: var(--admin-sidebar-bg);
                padding: 10px 12px;
                font-size: 12px;
                color: var(--admin-text);
            }

            .admin-file input::file-selector-button {
                border: none;
                border-radius: 10px;
                padding: 6px 12px;
                margin-right: 12px;
                background: var(--admin-accent-soft);
                color: var(--admin-accent);
                font-weight: 600;
                cursor: pointer;
            }

            .admin-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 12px;
            }

            button.admin-button {
                min-width: 180px;
                border-radius: 12px;
                padding: 8px 14px;
                font-size: 12px;
                font-weight: 600;
                border: 1px solid transparent;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            button.admin-button:hover {
                transform: translateY(-1px);
            }

            button.admin-button--primary {
                background: var(--admin-accent);
                color: #fff;
                box-shadow: 0 8px 18px rgba(255, 106, 43, 0.2);
            }

            button.admin-button--ghost {
                background: transparent;
                border-color: var(--admin-border);
                color: var(--admin-text);
            }

            button.admin-button--danger {
                background: rgba(220, 38, 38, 0.12);
                border-color: rgba(220, 38, 38, 0.4);
                color: #dc2626;
            }

            .admin-meta {
                margin-top: 10px;
                font-size: 12px;
                color: var(--admin-muted);
            }

            .admin-meta strong {
                color: var(--admin-text);
            }

            .admin-inline-link {
                color: var(--admin-accent);
                text-decoration: underline;
                text-underline-offset: 3px;
                font-weight: 600;
            }

            .admin-gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 12px;
                margin-top: 12px;
            }

            .admin-gallery-item {
                position: relative;
                border-radius: 18px;
                overflow: hidden;
                border: 1px solid var(--admin-border);
                background: var(--admin-sidebar-bg);
                box-shadow: 0 12px 22px rgba(0, 0, 0, 0.06);
            }

            html[data-admin-theme='dark'] .admin-gallery-item {
                box-shadow: none;
            }

            .admin-gallery-link {
                display: block;
            }

            .admin-gallery-thumb {
                display: block;
                width: 100%;
                aspect-ratio: 1 / 1;
                object-fit: cover;
                background: rgba(255, 255, 255, 0.35);
            }

            html[data-admin-theme='dark'] .admin-gallery-thumb {
                background: rgba(0, 0, 0, 0.22);
            }

            .admin-gallery-footer {
                padding: 10px 10px 12px;
                border-top: 1px solid var(--admin-border);
            }

            .admin-gallery-name {
                font-size: 12px;
                font-weight: 600;
                color: var(--admin-text);
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .admin-gallery-time {
                margin-top: 3px;
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-gallery-delete-form {
                position: absolute;
                top: 10px;
                right: 10px;
            }

            .admin-gallery-delete {
                width: 36px;
                height: 36px;
                border-radius: 14px;
                border: 1px solid rgba(220, 38, 38, 0.35);
                background: rgba(255, 255, 255, 0.88);
                color: #dc2626;
                display: grid;
                place-items: center;
                cursor: pointer;
                transition: transform 0.2s ease, background 0.2s ease;
            }

            html[data-admin-theme='dark'] .admin-gallery-delete {
                background: rgba(0, 0, 0, 0.32);
            }

            .admin-gallery-delete:hover {
                transform: translateY(-1px);
                background: rgba(255, 255, 255, 1);
            }

            html[data-admin-theme='dark'] .admin-gallery-delete:hover {
                background: rgba(0, 0, 0, 0.42);
            }

            .admin-gallery-delete-icon {
                width: 18px;
                height: 18px;
            }

            .admin-upload-modal {
                width: 100%;
                background: var(--admin-sidebar-bg);
                color: var(--admin-text);
                border: 1px solid var(--admin-border);
                border-radius: 18px;
                overflow: hidden;
            }

            .admin-upload-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 16px 18px;
                border-bottom: 1px solid var(--admin-border);
            }

            .admin-upload-title {
                font-size: 16px;
                font-weight: 600;
                color: var(--admin-text);
            }

            .admin-upload-close {
                width: 36px;
                height: 36px;
                border-radius: 12px;
                border: 1px solid var(--admin-border);
                background: transparent;
                color: var(--admin-muted);
                display: grid;
                place-items: center;
                cursor: pointer;
            }

            .admin-upload-close-icon {
                width: 18px;
                height: 18px;
            }

            .admin-upload-body {
                padding: 18px;
            }

            .admin-dropzone {
                border: 2px dashed rgba(148, 163, 184, 0.7);
                border-radius: 14px;
                padding: 22px 16px;
                background: rgba(255, 255, 255, 0.55);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
                text-align: center;
                cursor: pointer;
                transition: border-color 0.2s ease, background 0.2s ease;
            }

            html[data-admin-theme='dark'] .admin-dropzone {
                background: rgba(0, 0, 0, 0.22);
                border-color: rgba(148, 163, 184, 0.35);
            }

            .admin-dropzone.is-dragover {
                border-color: var(--admin-accent);
                background: var(--admin-accent-soft);
            }

            .admin-dropzone-icon {
                width: 44px;
                height: 44px;
                border-radius: 14px;
                border: 1px solid var(--admin-border);
                background: rgba(255, 255, 255, 0.85);
                color: var(--admin-accent);
                display: grid;
                place-items: center;
            }

            html[data-admin-theme='dark'] .admin-dropzone-icon {
                background: rgba(0, 0, 0, 0.25);
            }

            .admin-dropzone-icon svg {
                width: 20px;
                height: 20px;
            }

            .admin-dropzone-text {
                font-size: 12px;
                color: var(--admin-text);
            }

            .admin-dropzone-link {
                color: var(--admin-accent);
                font-weight: 600;
                text-decoration: underline;
                text-underline-offset: 3px;
            }

            .admin-upload-hidden-input {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                border: 0;
            }

            .admin-upload-support {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 10px;
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-upload-error {
                margin-top: 10px;
                padding: 10px 12px;
                border-radius: 12px;
                border: 1px solid rgba(220, 38, 38, 0.4);
                background: rgba(220, 38, 38, 0.08);
                color: #dc2626;
                font-size: 12px;
                font-weight: 600;
            }

            .admin-upload-list {
                margin-top: 14px;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .admin-upload-item {
                display: grid;
                grid-template-columns: 44px 1fr auto;
                gap: 12px;
                align-items: center;
                padding: 12px;
                border-radius: 14px;
                border: 1px solid var(--admin-border);
                background: rgba(255, 255, 255, 0.55);
            }

            html[data-admin-theme='dark'] .admin-upload-item {
                background: rgba(0, 0, 0, 0.18);
            }

            .admin-upload-file-icon {
                width: 44px;
                height: 44px;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid var(--admin-border);
                display: grid;
                place-items: center;
                color: rgba(34, 197, 94, 1);
            }

            html[data-admin-theme='dark'] .admin-upload-file-icon {
                background: rgba(0, 0, 0, 0.25);
            }

            .admin-upload-file-icon svg {
                width: 18px;
                height: 18px;
            }

            .admin-upload-file-meta {
                min-width: 0;
            }

            .admin-upload-file-name {
                font-size: 12px;
                font-weight: 600;
                color: var(--admin-text);
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .admin-upload-file-size {
                margin-top: 1px;
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-upload-progress-track {
                margin-top: 8px;
                height: 6px;
                border-radius: 999px;
                background: rgba(148, 163, 184, 0.25);
                overflow: hidden;
            }

            .admin-upload-progress-fill {
                height: 100%;
                background: #2563eb;
                border-radius: 999px;
                transition: width 0.1s linear;
            }

            .admin-upload-file-actions {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .admin-upload-file-remove {
                width: 30px;
                height: 30px;
                border-radius: 12px;
                border: 1px solid var(--admin-border);
                background: transparent;
                color: var(--admin-muted);
                display: grid;
                place-items: center;
                cursor: pointer;
            }

            .admin-upload-file-remove:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .admin-upload-percent {
                min-width: 42px;
                text-align: right;
                font-size: 11px;
                color: var(--admin-muted);
            }

            .admin-upload-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 14px 18px;
                border-top: 1px solid var(--admin-border);
                background: rgba(255, 255, 255, 0.35);
            }

            html[data-admin-theme='dark'] .admin-upload-footer {
                background: rgba(0, 0, 0, 0.14);
            }

            .admin-upload-help {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                font-size: 12px;
                color: var(--admin-muted);
            }

            .admin-upload-help-icon {
                width: 20px;
                height: 20px;
                border-radius: 999px;
                border: 1px solid var(--admin-border);
                display: grid;
                place-items: center;
                font-size: 12px;
            }

            .admin-upload-footer-actions {
                display: inline-flex;
                align-items: center;
                gap: 10px;
            }

            .admin-upload-footer-button {
                min-width: 90px;
                border-radius: 12px;
                padding: 8px 14px;
                font-size: 12px;
                font-weight: 600;
                border: 1px solid transparent;
                cursor: pointer;
            }

            .admin-upload-footer-button--ghost {
                background: transparent;
                border-color: var(--admin-border);
                color: var(--admin-text);
            }

            .admin-upload-footer-button--primary {
                background: rgba(148, 163, 184, 0.18);
                border-color: rgba(148, 163, 184, 0.25);
                color: rgba(30, 41, 59, 0.7);
            }

            .admin-upload-footer-button--primary:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .admin-upload-footer-button--primary:not(:disabled) {
                background: rgba(148, 163, 184, 0.18);
            }

            .admin-upload-footer-button--primary:not(:disabled):hover {
                background: rgba(148, 163, 184, 0.25);
            }

            .admin-upload-footer-button--primary.is-ready {
                background: var(--admin-accent);
                color: #fff;
                box-shadow: 0 10px 20px rgba(255, 106, 43, 0.25);
            }

            .admin-upload-footer-button--primary.is-ready:hover {
                filter: brightness(1.02);
            }

            .admin-upload-footer-button--primary.is-disabled {
                opacity: 0.55;
            }

            .admin-main {
                flex: 1;
                min-width: 0;
                padding: 32px 32px 40px 16px;
                margin-left: 0;
            }

            .admin-header {
                margin-bottom: 16px;
            }

            .admin-content {
                min-width: 0;
            }

            .admin-mobile-bar {
                display: none;
                align-items: center;
                gap: 12px;
                margin-bottom: 18px;
            }

            .admin-mobile-button {
                width: 40px;
                height: 40px;
                border-radius: 12px;
                border: 1px solid var(--admin-border);
                background: var(--admin-sidebar-bg);
                color: var(--admin-muted);
                display: grid;
                place-items: center;
            }

            .admin-mobile-title {
                font-size: 14px;
                font-weight: 600;
            }

            .admin-overlay {
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.35);
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.2s ease;
                z-index: 20;
            }

            .admin-overlay.is-visible {
                opacity: 1;
                pointer-events: auto;
            }

            @media (max-width: 1024px) {
                .admin-shell {
                    flex-direction: column;
                }

                .admin-sidebar-wrap {
                    position: fixed;
                    inset: 0 auto 0 0;
                    transform: translateX(-110%);
                    transition: transform 0.2s ease;
                    z-index: 30;
                }

                .admin-sidebar-wrap.is-open {
                    transform: translateX(0);
                }

                .admin-sidebar {
                    height: 100%;
                    margin: 0;
                    border-radius: 0;
                }

                .admin-main {
                    padding: 24px;
                }

                .admin-mobile-bar {
                    display: flex;
                }
            }

            @media (min-width: 1024px) {
                .admin-shell {
                    height: 100vh;
                    overflow: hidden;
                }

                .admin-sidebar-wrap {
                    position: fixed;
                    inset: 0 auto 0 0;
                }

                .admin-main {
                    height: 100vh;
                    overflow: auto;
                    margin-left: 300px;
                }

                .admin-shell.is-collapsed .admin-main {
                    margin-left: 120px;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false, sidebarCollapsed: false }" x-init="sidebarCollapsed = localStorage.getItem('admin-sidebar-collapsed') === 'true'">
            <div class="admin-shell" :class="sidebarCollapsed ? 'is-collapsed' : ''">
                @include('layouts.navigation')

                <div class="admin-main">
                    <div class="admin-mobile-bar">
                        <button class="admin-mobile-button" type="button" @click="sidebarOpen = true" aria-label="Open menu">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path d="M3 5h14M3 10h14M3 15h14" />
                            </svg>
                        </button>
                        <span class="admin-mobile-title">Fixmi Service Center</span>
                    </div>

                    @isset($header)
                        <header class="admin-header">
                            {{ $header }}
                        </header>
                    @endisset

                    <main class="admin-content">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

    </body>
</html>
