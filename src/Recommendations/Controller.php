<?php
declare(strict_types=1);

namespace App\Recommendations;

use App\Recommendations\DTO\FilterDTO;
use App\Recommendations\DTO\MovieDTO;
use App\Recommendations\Providers\MoviesListProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recommendations', name: 'api_recommendations_')]
class Controller extends BaseController
{
    #[Route(name: 'list', methods: ['GET'])]
    public function list(
        FilterDTO $dto,
        MoviesListProvider $moviesListProvider
    ): JsonResponse {
        if ($errors = $this->validate($dto)) {
            return $errors;
        }

        try {
            return new JsonResponse([
                'data' => MovieDTO::fromArray($moviesListProvider->loadList($dto))
            ]);
        } catch (\Throwable $e) {
            return $this->catchResponse($e);
        }
    }
}
