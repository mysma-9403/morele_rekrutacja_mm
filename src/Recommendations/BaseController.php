<?php
declare(strict_types=1);

namespace App\Recommendations;

use App\Recommendations\Services\ValidatorService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends AbstractController
{
    public function __construct(
        private readonly ValidatorService $service,
        private readonly LoggerInterface $logger
    ) {}
    protected function validate(object $obj, ?array $groups = null): ?JsonResponse
    {
        $result = $this->service->validate($obj, $groups);

        if (empty($result)) {
            return null;
        }
        return new JsonResponse([
            'errors' => $result,
        ], 400);
    }

    protected function catchResponse(\Throwable $e): JsonResponse
    {
        $this->logger->error('Response error',[
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return new JsonResponse(['message' => 'Something went wrong!']);
    }
}
