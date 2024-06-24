<?php
declare(strict_types=1);

namespace App\Recommendations\Filters;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Services\StringService;

class EvenLengthWService implements RecommendationResponseInterface
{

    /**
     * Method returns all titles with the letter W having an even number of characters
     *
     * @param FilterDTO $filterDTO
     * @param array $data
     * @return array
     */
    public function filterMovies(FilterDTO $filterDTO, array $data): array
    {
        $filteredMovies = [];

        foreach ($data as $movie) {
            if (
                StringService::wordStartFromLetter($movie, 'W') &&
                StringService::wordHasEvenLength($movie)
            ) {
                $filteredMovies[] = $movie;
            }
        }

        return $filteredMovies;
    }

    public function getType(): string
    {
        return RecommendationTypesEnum::EVEN_LENGTH_W_TITLES;
    }
}
