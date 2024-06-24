<?php
declare(strict_types=1);

namespace App\Recommendations\Providers;

class ExampleDataProvider
{
    public function __construct(private readonly string $filePath) {}

    public function getMovies(): array
    {
        if (!file_exists($this->filePath)) {
            throw new \Exception("File not found: {$this->filePath}");
        }

        return include $this->filePath;
    }
}
