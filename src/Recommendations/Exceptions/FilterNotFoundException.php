<?php
declare(strict_types=1);

namespace App\Recommendations\Exceptions;

class FilterNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Filter not found");
    }
}

