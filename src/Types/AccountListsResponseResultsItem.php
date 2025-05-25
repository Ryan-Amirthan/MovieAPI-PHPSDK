<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class AccountListsResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?string $accountObjectId
     */
    #[JsonProperty('account_object_id')]
    public ?string $accountObjectId;

    /**
     * @var ?int $adult
     */
    #[JsonProperty('adult')]
    public ?int $adult;

    /**
     * @var ?float $averageRating
     */
    #[JsonProperty('average_rating')]
    public ?float $averageRating;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $featured
     */
    #[JsonProperty('featured')]
    public ?int $featured;

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
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $numberOfItems
     */
    #[JsonProperty('number_of_items')]
    public ?int $numberOfItems;

    /**
     * @var ?int $public
     */
    #[JsonProperty('public')]
    public ?int $public;

    /**
     * @var ?string $revenue
     */
    #[JsonProperty('revenue')]
    public ?string $revenue;

    /**
     * @var ?int $runtime
     */
    #[JsonProperty('runtime')]
    public ?int $runtime;

    /**
     * @var ?int $sortBy
     */
    #[JsonProperty('sort_by')]
    public ?int $sortBy;

    /**
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public ?string $updatedAt;

    /**
     * @param array{
     *   accountObjectId?: ?string,
     *   adult?: ?int,
     *   averageRating?: ?float,
     *   createdAt?: ?string,
     *   description?: ?string,
     *   featured?: ?int,
     *   id?: ?int,
     *   iso31661?: ?string,
     *   iso6391?: ?string,
     *   name?: ?string,
     *   numberOfItems?: ?int,
     *   public?: ?int,
     *   revenue?: ?string,
     *   runtime?: ?int,
     *   sortBy?: ?int,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountObjectId = $values['accountObjectId'] ?? null;
        $this->adult = $values['adult'] ?? null;
        $this->averageRating = $values['averageRating'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->featured = $values['featured'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->iso31661 = $values['iso31661'] ?? null;
        $this->iso6391 = $values['iso6391'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->numberOfItems = $values['numberOfItems'] ?? null;
        $this->public = $values['public'] ?? null;
        $this->revenue = $values['revenue'] ?? null;
        $this->runtime = $values['runtime'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
