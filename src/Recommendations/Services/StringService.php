<?php
declare(strict_types=1);


namespace App\Recommendations\Services;

class StringService
{
    public static function wordStartFromLetter(string $sentence, string $startLetter): bool
    {
        return str_starts_with(strtolower($sentence), strtolower($startLetter));
    }

    public static function wordHasEvenLength(string $sentence): bool
    {
        return strlen($sentence) % 2 === 0;
    }

    public static function isMultiWord(string $sentence): bool
    {
        return str_contains($sentence, ' ') || str_contains($sentence, '-');
    }
}
