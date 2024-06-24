<?php
declare(strict_types=1);

namespace App\Recommendations\Common;

use App\Recommendations\DTO\FilterDTO;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\Serializer\Serializer;


class FilterResolver implements ArgumentValueResolverInterface
{
    private ?Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            []
        );
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        try {
            yield $this->serializer->denormalize($request->query->all(), $argument->getType());
            return;
        } catch (ExceptionInterface $exception) {
            throw new BadRequestHttpException($exception->getMessage(), $exception);
        }
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return $argument->getType() === FilterDTO::class;
    }
}

