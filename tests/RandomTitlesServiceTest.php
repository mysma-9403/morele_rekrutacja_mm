<?php
declare(strict_types=1);


namespace App\Tests;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Filters\RandomTitlesService;
use PHPUnit\Framework\TestCase;

class RandomTitlesServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new RandomTitlesService();
    }

    public function testFilterMovies()
    {
        $movies = [
            "Titanic",
            "The Matrix",
            "Avatar",
            "The Godfather",
            "Inception",
            "Interstellar",
            "Gravity"
        ];

        $filterDTO = new FilterDTO();
        $filterDTO->mode = RecommendationTypesEnum::RANDOM_TITLES;

        $filteredMovies = $this->service->filterMovies($filterDTO, $movies);

        $this->assertCount(3, $filteredMovies);

        foreach ($filteredMovies as $movie) {
            $this->assertContains($movie, $movies);
        }
    }

    public function testGetType()
    {
        $this->assertEquals(RecommendationTypesEnum::RANDOM_TITLES, $this->service->getType(), "The getType method should return the correct type.");
    }
}
