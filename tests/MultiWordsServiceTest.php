<?php
declare(strict_types=1);

namespace App\Tests;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Filters\MultiWordsService;
use PHPUnit\Framework\TestCase;

class MultiWordsServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new MultiWordsService();
    }

    public function testFilterMovies()
    {
        $movies = [
            "Titanic",
            "The Matrix",
            "Avatar",
            "The Godfather",
            "Inception",
            "Mistrz-i-uczeń",
        ];

        $filterDTO = new FilterDTO();
        $filterDTO->mode = RecommendationTypesEnum::MULTI_WORDS;

        $expected = [
            "The Matrix",
            "The Godfather",
            "Mistrz-i-uczeń"
        ];

        $filteredMovies = $this->service->filterMovies($filterDTO, $movies);

        $this->assertEquals($expected, $filteredMovies, "The filter should return only movies with multiple words in the title.");
    }

    public function testGetType()
    {
        $this->assertEquals(RecommendationTypesEnum::MULTI_WORDS, $this->service->getType(), "The getType method should return the correct type.");
    }
}
