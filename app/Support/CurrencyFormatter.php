<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CurrencyFormatter
{
    public static function formatCell(?string $value): string
    {
        if ($value === null) {
            return '';
        }

        $raw = trim($value);
        if ($raw === '' || $raw === '-') {
            return $raw;
        }

        if (preg_match('/[a-z]/i', $raw) && ! preg_match('/(\$|\busd\b|\bidr\b|\brp\b)/i', $raw)) {
            return $value;
        }

        $locale = app()->getLocale();
        if ($locale === 'en') {
            return self::formatUsd($raw);
        }

        return self::formatIdr($raw);
    }

    public static function usdRate(): float
    {
        $cacheKey = config('fixmi.currency.cache_key', 'fixmi_currency_usd_rate');
        $cacheHours = (int) config('fixmi.currency.cache_hours', 24);

        return Cache::remember($cacheKey, now()->addHours($cacheHours), function () {
            $fallback = (float) config('fixmi.currency.fallback_rate', 0.000065);
            $url = (string) config('fixmi.currency.rate_url');

            // ponytail: security — restrict fetch to http(s) hosts only to prevent
            // file_get_contents from reading local files (file://) or hitting
            // internal metadata endpoints if config is ever manipulated.
            if ($url === '') {
                return $fallback;
            }

            $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));
            $host = (string) parse_url($url, PHP_URL_HOST);
            if (! in_array($scheme, ['http', 'https'], true) || $host === '') {
                return $fallback;
            }

            try {
                $context = stream_context_create([
                    'http' => [
                        'timeout' => 5,
                    ],
                ]);
                $body = @file_get_contents($url, false, $context);
                if ($body === false || $body === '') {
                    return $fallback;
                }
                $data = json_decode($body, true);
                if (! is_array($data)) {
                    return $fallback;
                }
                $rate = (float) ($data['rates']['USD'] ?? 0);
                if ($rate <= 0) {
                    return $fallback;
                }

                return $rate;
            } catch (\Throwable) {
                return $fallback;
            }
        });
    }

    private static function parseIdr(string $value): ?float
    {
        $raw = trim($value);
        if ($raw === '' || $raw === '-') {
            return null;
        }

        $clean = preg_replace('/[^\d,.\-]/', '', $raw);
        if ($clean === '' || $clean === '-' || $clean === '.') {
            return null;
        }

        $hasComma = str_contains($clean, ',');
        $hasDot = str_contains($clean, '.');

        if ($hasComma && $hasDot) {
            $lastComma = strrpos($clean, ',');
            $lastDot = strrpos($clean, '.');
            if ($lastComma > $lastDot) {
                $clean = str_replace('.', '', $clean);
                $clean = str_replace(',', '.', $clean);
            } else {
                $clean = str_replace(',', '', $clean);
            }
        } elseif ($hasComma) {
            $parts = explode(',', $clean);
            $suffix = end($parts);
            if ($suffix !== false && strlen($suffix) === 2) {
                $clean = str_replace('.', '', $clean);
                $clean = str_replace(',', '.', $clean);
            } else {
                $clean = str_replace(',', '', $clean);
            }
        } else {
            $clean = str_replace('.', '', $clean);
        }

        if (! is_numeric($clean)) {
            return null;
        }

        return (float) $clean;
    }

    private static function formatUsd(string $value): string
    {
        if (Str::contains($value, ['$', 'USD'])) {
            return $value;
        }

        $amount = self::parseIdr($value);
        if ($amount === null) {
            return $value;
        }

        $usd = $amount * self::usdRate();
        if (! is_finite($usd) || $usd <= 0) {
            return $value;
        }

        return '$'.number_format($usd, 2, '.', ',');
    }

    private static function formatIdr(string $value): string
    {
        if (Str::contains($value, ['$', 'USD'])) {
            return $value;
        }

        if (Str::contains(Str::lower($value), ['rp', 'idr'])) {
            $amount = self::parseIdr($value);
            if ($amount === null) {
                return $value;
            }

            return 'Rp. '.number_format((float) round($amount), 0, ',', '.');
        }

        $amount = self::parseIdr($value);
        if ($amount === null) {
            return $value;
        }

        return 'Rp. '.number_format((float) round($amount), 0, ',', '.');
    }
}
