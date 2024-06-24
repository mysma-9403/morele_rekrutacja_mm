<?php
declare(strict_types=1);

namespace App\Recommendations\DTO;
class MovieDTO
{
    public function __construct(
        public string $title
    ) {}

    /**
     * @param array $data
     * @return MovieDTO[]
     */
    public static function fromArray(array $data): array
    {
        $result = [];
        foreach ($data as $movie) {
            $result[] = new MovieDTO(title: $movie);
        }

        return $result;
    }
}
