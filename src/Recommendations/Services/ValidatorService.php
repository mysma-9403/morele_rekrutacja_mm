<?php
declare(strict_types=1);

namespace App\Recommendations\Services;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorService
{
    public function __construct(private readonly ValidatorInterface $validator) {}
    public function validate(object $obj, ?array $groups = null): ?array
    {
        $errors = $this->validator->validate($obj, null, $groups);

        if (count($errors) === 0) {
            return null;
        }

        $messages= [];
        foreach ($errors as $violation) {
            $messages[$violation->getPropertyPath()] = $violation->getMessage();
        }

        return $messages;
    }
}
