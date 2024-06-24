<?php
declare(strict_types=1);

namespace App\Recommendations\Services;

class MovieDataService
{
    public function getUniqueList(array $data): array
    {
        $uniqueMovies = [];

        foreach ($data as $movie) {
            $uniqueMovies[trim($movie)] = true;
        }

        return array_keys($uniqueMovies);
    }
}
