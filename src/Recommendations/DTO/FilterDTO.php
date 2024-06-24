<?php
declare(strict_types=1);

namespace App\Recommendations\DTO;

use App\Recommendations\Enum\RecommendationTypesEnum;
use Symfony\Component\Validator\Constraints as Assert;
class FilterDTO
{
    public function __construct(

        #[Assert\NotBlank()]
        #[Assert\Choice(choices: ['random', 'even_length_w', 'multi_words'], message: "Invalid recommendation type provided.")]
        public ?string $mode = null,
    ) {}
}
