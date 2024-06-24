<?php
declare(strict_types=1);

namespace App\Recommendations\Filters;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Services\StringService;
class MultiWordsService implements RecommendationResponseInterface
{

    public function filterMovies(FilterDTO $filterDTO, array $data): array
    {
        $filteredMovies = [];

        foreach ($data as $movie) {
            if (StringService::isMultiWord($movie)) {
                $filteredMovies[] = $movie;
            }
        }

        return $filteredMovies;
    }

    public function getType(): string
    {
        return RecommendationTypesEnum::MULTI_WORDS;
    }
}
