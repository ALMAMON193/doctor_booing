<?php

use App\Models\User;

function getFileName($file): string
{
    return time().'_'.pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
}
function getEmailName($email): string
{
    // Use explode to split the email into two parts: before and after the '@'
    $parts = explode('@', $email);

    // Return the first part, which is the username
    return $parts[0];
}

function formatNumber($number, $precision = 2): array
{
    if ($number >= 1000000000000000) {
        return [
            'number' => number_format($number / 1000000000000000, $precision),
            'format' => 'Q'
        ];
    } elseif ($number >= 1000000000000) {
        return [
            'number' => number_format($number / 1000000000000, $precision),
            'format' => 'T'
        ];
    } elseif ($number >= 1000000000) {
        return [
            'number' => number_format($number / 1000000000, $precision),
            'format' => 'B'
        ];
    } elseif ($number >= 1000000) {
        return [
            'number' => number_format($number / 1000000, $precision),
            'format' => 'M'
        ];
    } elseif ($number >= 1000) {
        return [
            'number' => number_format($number / 1000, $precision),
            'format' => 'K'
        ];
    }

    // For numbers less than 1K, no format suffix is needed
    return [
        'number' => number_format($number),
        'format' => ''
    ];
}

if (!function_exists('is_url')) {
    /**
     * Check if a given string is a valid URL.
     *
     * @param string $url
     * @return bool
     */
    function is_url($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}




