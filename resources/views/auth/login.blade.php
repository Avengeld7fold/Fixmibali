<x-admin-auth-layout>
    <div class="w-full max-w-[420px]">
        <div class="auth-card auth-card-anim relative rounded-[32px] px-7 py-9 sm:px-9 sm:py-10">
            <div class="pointer-events-none absolute inset-x-6 top-6 h-16 rounded-3xl bg-slate-900/60 blur-2xl"></div>

            <div class="relative">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-700 bg-slate-900 shadow-[0_12px_25px_rgba(15,23,42,0.28)] auth-float">
                    <img src="{{ asset('assets/img/favinco.svg') }}" alt="Fixmi" class="h-7 w-7 object-contain" />
                </div>

                <div class="mt-6 text-center">
                    <h1 class="auth-title text-lg font-semibold text-slate-100 auth-fade-up auth-delay-1">Masuk dengan email</h1>
                    <p class="auth-subtitle mt-2 max-w-xs text-sm text-slate-400 auth-fade-up auth-delay-2 mx-auto">Masuk untuk mengelola website Fixmi</p>
                </div>

                <x-auth-session-status class="mt-5 text-sm text-slate-300 auth-fade-up auth-delay-3" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4 auth-fade-up auth-delay-4">
                    @csrf

                    <div>
                        <label for="login" class="sr-only">{{ __('Email or Username') }}</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15A2.25 2.25 0 0 1 2.25 17.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0v.243a2.25 2.25 0 0 1-.994 1.872l-7.5 5.126a2.25 2.25 0 0 1-2.512 0l-7.5-5.126A2.25 2.25 0 0 1 2.25 6.993V6.75" />
                                </svg>
                            </span>
                            <input id="login" class="auth-input w-full rounded-2xl px-11 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400/40" type="text" name="login" value="{{ old('login') }}" required autofocus autocomplete="username" placeholder="Email or Username" />
                        </div>
                        <x-input-error :messages="$errors->get('login')" class="mt-2 text-xs text-rose-500" />
                    </div>

                    <div>
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 10.5h10.5A2.25 2.25 0 0 1 19.5 12.75v4.5A2.25 2.25 0 0 1 17.25 19.5H6.75A2.25 2.25 0 0 1 4.5 17.25v-4.5A2.25 2.25 0 0 1 6.75 10.5" />
                                </svg>
                            </span>
                            <input id="password" class="auth-input w-full rounded-2xl px-11 py-3 pr-12 text-sm text-slate-100 placeholder:text-slate-500 focus:border-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400/40" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                            <button type="button" class="auth-eye-toggle absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 transition hover:text-slate-200" data-password-toggle="password" aria-label="Tampilkan password" aria-pressed="false">
                                <span class="relative block h-4 w-4">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" class="eye-open absolute inset-0 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" class="eye-closed absolute inset-0 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.477 10.479a3 3 0 0 0 4.043 4.042" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.379A9.956 9.956 0 0 1 12 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 0 1-2.216 3.592" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.228 6.227A9.953 9.953 0 0 0 2.458 12c1.274 4.057 5.064 7 9.542 7 1.536 0 2.999-.346 4.29-.97" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-rose-500" />
                    </div>

                    @if (Route::has('password.request'))
                        <div class="flex justify-end">
                            <a class="text-xs font-semibold text-slate-400 transition hover:text-slate-100" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        </div>
                    @endif

                    <button type="submit" class="auth-submit w-full rounded-2xl py-3 text-sm font-semibold transition duration-200">
                        <span>{{ __('Masuk') }}</span>
                    </button>

                    <div class="flex items-center gap-3 text-xs font-medium text-slate-400 auth-fade-up auth-delay-5">
                        <span class="auth-divider h-px flex-1"></span>
                        <a class="auth-home-link" href="{{ url('/') }}">Kembali ke halaman awal</a>
                        <span class="auth-divider h-px flex-1"></span>
                    </div>
                    <div class="auth-credit mt-4 text-center text-[0.7rem] font-semibold">
                        Powered By <a href="{{ url('/') }}">Fixmi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.querySelector('[data-password-toggle]');
            if (!toggle) {
                return;
            }
            const inputId = toggle.getAttribute('data-password-toggle');
            const input = inputId ? document.getElementById(inputId) : null;
            if (!input) {
                return;
            }

            toggle.addEventListener('click', () => {
                const isVisible = input.type === 'text';
                input.type = isVisible ? 'password' : 'text';
                toggle.classList.toggle('is-visible', !isVisible);
                toggle.setAttribute('aria-pressed', String(!isVisible));
                toggle.setAttribute('aria-label', !isVisible ? 'Sembunyikan password' : 'Tampilkan password');
            });
        });
    </script>
</x-admin-auth-layout>
