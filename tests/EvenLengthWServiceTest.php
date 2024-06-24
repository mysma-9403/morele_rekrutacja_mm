<?php
declare(strict_types=1);

namespace App\Tests;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Filters\EvenLengthWService;
use PHPUnit\Framework\TestCase;
class EvenLengthWServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new EvenLengthWService();
    }

    public function testFilterMovies()
    {
        $movies = [
            "Westworld",
            "Wormhole",
            "Wonderland",
            "Voyage",
            'Władca pierścieni: Powrót króla',
            'Władca pierścieni: Powrót królaa',
            "World",
        ];

        $filterDTO = new FilterDTO();
        $filterDTO->mode = RecommendationTypesEnum::EVEN_LENGTH_W_TITLES;

        $expected = [
            "Wormhole",
            'Wonderland',
            'Władca pierścieni: Powrót królaa'
        ];

        $filteredMovies = $this->service->filterMovies($filterDTO, $movies);

        $this->assertEquals($expected, $filteredMovies);
    }

    public function testGetType()
    {
        $this->assertEquals(RecommendationTypesEnum::EVEN_LENGTH_W_TITLES, $this->service->getType());
    }
}
