<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class AccountFavoriteMoviesResponse extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?array<AccountFavoriteMoviesResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([AccountFavoriteMoviesResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?int $totalPages
     */
    #[JsonProperty('total_pages')]
    public ?int $totalPages;

    /**
     * @var ?int $totalResults
     */
    #[JsonProperty('total_results')]
    public ?int $totalResults;

    /**
     * @param array{
     *   page?: ?int,
     *   results?: ?array<AccountFavoriteMoviesResponseResultsItem>,
     *   totalPages?: ?int,
     *   totalResults?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->results = $values['results'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
        $this->totalResults = $values['totalResults'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
