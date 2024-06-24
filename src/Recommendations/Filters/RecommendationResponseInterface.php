<?php
declare(strict_types =1);

namespace App\Recommendations\Filters;
use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\Enum\ServiceTagEnum;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag(ServiceTagEnum::RECOMMENDATIONS)]
interface RecommendationResponseInterface
{
    public function filterMovies(FilterDTO $filterDTO, array $data): array;

    public function getType(): string;
}

