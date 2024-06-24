<?php
declare(strict_types=1);

namespace App\Recommendations\Enum;

enum RecommendationTypesEnum: string
{
    const RANDOM_TITLES = 'random';
    const EVEN_LENGTH_W_TITLES = 'even_length_w';
    const MULTI_WORDS= 'multi_words';

    public static function getAllowedValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
