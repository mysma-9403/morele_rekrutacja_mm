<?php
declare(strict_types=1);


namespace App\Tests;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\RecommendationTypesEnum;
use App\Recommendations\Exceptions\FilterNotFoundException;
use App\Recommendations\Filters\RecommendationResponseInterface;
use App\Recommendations\Providers\FilterProvider;
use PHPUnit\Framework\TestCase;

class FilterProviderTest extends TestCase
{
    private $filterProvider;
    private $service1;
    private $service2;
    private $services;

    protected function setUp(): void
    {
        $this->service1 = $this->createMock(RecommendationResponseInterface::class);
        $this->service1->method('getType')->willReturn(RecommendationTypesEnum::RANDOM_TITLES);

        $this->service2 = $this->createMock(RecommendationResponseInterface::class);
        $this->service2->method('getType')->willReturn(RecommendationTypesEnum::MULTI_WORDS);

        $this->services = new \ArrayIterator([$this->service1, $this->service2]);

        $this->filterProvider = new FilterProvider($this->services);
    }

    /**
     * @throws FilterNotFoundException
     */
    public function testLoadValidService()
    {
        $dto = new FilterDTO();
        $dto->mode = RecommendationTypesEnum::RANDOM_TITLES;

        $service = $this->filterProvider->load($dto);
        $this->assertSame($this->service1, $service);
    }

    public function testLoadServiceThrowsException(): void
    {
        $dto = new FilterDTO();
        $dto->mode = 'non_existent_mode';

        $this->expectException(FilterNotFoundException::class);
        $this->filterProvider->load($dto);
    }
}
