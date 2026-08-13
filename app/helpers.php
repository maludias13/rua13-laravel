<?php

if (! function_exists('format_price')) {
    function format_price(float $value): string
    {
        return 'R$ '.number_format($value, 2, ',', '.');
    }
}

if (! function_exists('format_cpf')) {
    function format_cpf(?string $cpf): string
    {
        if (! $cpf) {
            return '';
        }

        $cpf = preg_replace('/\D/', '', $cpf);

        return substr($cpf, 0, 3).'.'.substr($cpf, 3, 3).'.'.substr($cpf, 6, 3).'-'.substr($cpf, 9, 2);
    }
}

if (! function_exists('format_phone')) {
    function format_phone(?string $phone): string
    {
        if (! $phone) {
            return '';
        }

        $phone = preg_replace('/\D/', '', $phone);

        return '('.substr($phone, 0, 2).') '.substr($phone, 2, 5).'-'.substr($phone, 7, 4);
    }
}

if (! function_exists('format_cep')) {
    function format_cep(?string $cep): string
    {
        if (! $cep) {
            return '';
        }

        $cep = preg_replace('/\D/', '', $cep);

        return substr($cep, 0, 5).'-'.substr($cep, 5, 3);
    }
    if (! function_exists('is_current_user_admin')) {
    function is_current_user_admin(): bool
    {
        if (! array_key_exists('admin', config('auth.guards'))) {
            return false;
        }

        return auth('admin')->check();
    }
    }
}