<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class ListDetailsResponse extends JsonSerializableType
{
    /**
     * @var ?float $averageRating
     */
    #[JsonProperty('average_rating')]
    public ?float $averageRating;

    /**
     * @var ?string $backdropPath
     */
    #[JsonProperty('backdrop_path')]
    public ?string $backdropPath;

    /**
     * @var ?array<ListDetailsResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([ListDetailsResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?ListDetailsResponseComments $comments
     */
    #[JsonProperty('comments')]
    public ?ListDetailsResponseComments $comments;

    /**
     * @var ?ListDetailsResponseCreatedBy $createdBy
     */
    #[JsonProperty('created_by')]
    public ?ListDetailsResponseCreatedBy $createdBy;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $iso31661
     */
    #[JsonProperty('iso_3166_1')]
    public ?string $iso31661;

    /**
     * @var ?string $iso6391
     */
    #[JsonProperty('iso_639_1')]
    public ?string $iso6391;

    /**
     * @var ?int $itemCount
     */
    #[JsonProperty('item_count')]
    public ?int $itemCount;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?ListDetailsResponseObjectIds $objectIds
     */
    #[JsonProperty('object_ids')]
    public ?ListDetailsResponseObjectIds $objectIds;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?string $posterPath
     */
    #[JsonProperty('poster_path')]
    public ?string $posterPath;

    /**
     * @var ?bool $public
     */
    #[JsonProperty('public')]
    public ?bool $public;

    /**
     * @var ?int $revenue
     */
    #[JsonProperty('revenue')]
    public ?int $revenue;

    /**
     * @var ?int $runtime
     */
    #[JsonProperty('runtime')]
    public ?int $runtime;

    /**
     * @var ?string $sortBy
     */
    #[JsonProperty('sort_by')]
    public ?string $sortBy;

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
     *   averageRating?: ?float,
     *   backdropPath?: ?string,
     *   results?: ?array<ListDetailsResponseResultsItem>,
     *   comments?: ?ListDetailsResponseComments,
     *   createdBy?: ?ListDetailsResponseCreatedBy,
     *   description?: ?string,
     *   id?: ?int,
     *   iso31661?: ?string,
     *   iso6391?: ?string,
     *   itemCount?: ?int,
     *   name?: ?string,
     *   objectIds?: ?ListDetailsResponseObjectIds,
     *   page?: ?int,
     *   posterPath?: ?string,
     *   public?: ?bool,
     *   revenue?: ?int,
     *   runtime?: ?int,
     *   sortBy?: ?string,
     *   totalPages?: ?int,
     *   totalResults?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->averageRating = $values['averageRating'] ?? null;
        $this->backdropPath = $values['backdropPath'] ?? null;
        $this->results = $values['results'] ?? null;
        $this->comments = $values['comments'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->iso31661 = $values['iso31661'] ?? null;
        $this->iso6391 = $values['iso6391'] ?? null;
        $this->itemCount = $values['itemCount'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->objectIds = $values['objectIds'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->posterPath = $values['posterPath'] ?? null;
        $this->public = $values['public'] ?? null;
        $this->revenue = $values['revenue'] ?? null;
        $this->runtime = $values['runtime'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
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
