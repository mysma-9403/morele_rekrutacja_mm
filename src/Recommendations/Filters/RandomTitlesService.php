<?php
declare(strict_types=1);

namespace App\Recommendations\Filters;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;

class RandomTitlesService implements RecommendationResponseInterface
{
    /**
     * Method return three random movies
     *
     * @param FilterDTO $filterDTO
     * @param array $data
     * @return array
     */
    public function filterMovies(FilterDTO $filterDTO, array $data): array
    {
        shuffle($data);
        return array_slice($data, 0, 3);
    }

    public function getType(): string
    {
        return RecommendationTypesEnum::RANDOM_TITLES;
    }
}
