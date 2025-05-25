<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class AccountFavoriteTvResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?bool $adult
     */
    #[JsonProperty('adult')]
    public ?bool $adult;

    /**
     * @var ?string $backdropPath
     */
    #[JsonProperty('backdrop_path')]
    public ?string $backdropPath;

    /**
     * @var ?array<int> $genreIds
     */
    #[JsonProperty('genre_ids'), ArrayType(['integer'])]
    public ?array $genreIds;

    /**
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?array<string> $originCountry
     */
    #[JsonProperty('origin_country'), ArrayType(['string'])]
    public ?array $originCountry;

    /**
     * @var ?string $originalLanguage
     */
    #[JsonProperty('original_language')]
    public ?string $originalLanguage;

    /**
     * @var ?string $originalName
     */
    #[JsonProperty('original_name')]
    public ?string $originalName;

    /**
     * @var ?string $overview
     */
    #[JsonProperty('overview')]
    public ?string $overview;

    /**
     * @var ?float $popularity
     */
    #[JsonProperty('popularity')]
    public ?float $popularity;

    /**
     * @var ?string $posterPath
     */
    #[JsonProperty('poster_path')]
    public ?string $posterPath;

    /**
     * @var ?string $firstAirDate
     */
    #[JsonProperty('first_air_date')]
    public ?string $firstAirDate;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?float $voteAverage
     */
    #[JsonProperty('vote_average')]
    public ?float $voteAverage;

    /**
     * @var ?int $voteCount
     */
    #[JsonProperty('vote_count')]
    public ?int $voteCount;

    /**
     * @param array{
     *   adult?: ?bool,
     *   backdropPath?: ?string,
     *   genreIds?: ?array<int>,
     *   id?: ?int,
     *   originCountry?: ?array<string>,
     *   originalLanguage?: ?string,
     *   originalName?: ?string,
     *   overview?: ?string,
     *   popularity?: ?float,
     *   posterPath?: ?string,
     *   firstAirDate?: ?string,
     *   name?: ?string,
     *   voteAverage?: ?float,
     *   voteCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adult = $values['adult'] ?? null;
        $this->backdropPath = $values['backdropPath'] ?? null;
        $this->genreIds = $values['genreIds'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->originCountry = $values['originCountry'] ?? null;
        $this->originalLanguage = $values['originalLanguage'] ?? null;
        $this->originalName = $values['originalName'] ?? null;
        $this->overview = $values['overview'] ?? null;
        $this->popularity = $values['popularity'] ?? null;
        $this->posterPath = $values['posterPath'] ?? null;
        $this->firstAirDate = $values['firstAirDate'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->voteAverage = $values['voteAverage'] ?? null;
        $this->voteCount = $values['voteCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
