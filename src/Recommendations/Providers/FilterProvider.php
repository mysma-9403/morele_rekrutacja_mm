<?php
declare(strict_types=1);

namespace App\Recommendations\Providers;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\ServiceTagEnum;
use App\Recommendations\Exceptions\FilterNotFoundException;
use App\Recommendations\Filters\RecommendationResponseInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class FilterProvider
{
    public function __construct(
        #[TaggedIterator(ServiceTagEnum::RECOMMENDATIONS)]
        private readonly iterable $services
    ) {}

    /**
     * @param FilterDTO $dto
     * @return RecommendationResponseInterface
     * @throws FilterNotFoundException
     */
    public function load(FilterDTO $dto): RecommendationResponseInterface
    {
        foreach ($this->services as $service) {
            if ($service->getType() === $dto->mode) {
                return $service;
            }
        }

        throw new FilterNotFoundException();
    }
}
