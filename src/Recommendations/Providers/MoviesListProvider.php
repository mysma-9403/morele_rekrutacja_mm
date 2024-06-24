<?php
declare(strict_types=1);

namespace App\Recommendations\Providers;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\DTO\MovieDTO;
use App\Recommendations\Exceptions\FilterNotFoundException;
use App\Recommendations\Services\MovieDataService;

class MoviesListProvider
{
    public function __construct(
        private readonly FilterProvider $filterProvider,
        private readonly ExampleDataProvider $exampleDataProvider,
        private readonly MovieDataService $dataService
    ) {}

    /**
     * Method returns recommended videos according to the specified filter
     *
     * @throws FilterNotFoundException
     * @throws \Exception
     * @return MovieDTO[]
     */
    public function loadList(FilterDTO $dto): array
    {
        $service = $this->filterProvider->load($dto);

        return $service->filterMovies(
            $dto,
            $this->dataService->getUniqueList($this->exampleDataProvider->getMovies())
        );
    }
}
