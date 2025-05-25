<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class AccountTvRecommendationsResponseResultsItem extends JsonSerializableType
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
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

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
     * @var ?string $posterPath
     */
    #[JsonProperty('poster_path')]
    public ?string $posterPath;

    /**
     * @var ?string $mediaType
     */
    #[JsonProperty('media_type')]
    public ?string $mediaType;

    /**
     * @var ?array<int> $genreIds
     */
    #[JsonProperty('genre_ids'), ArrayType(['integer'])]
    public ?array $genreIds;

    /**
     * @var ?float $popularity
     */
    #[JsonProperty('popularity')]
    public ?float $popularity;

    /**
     * @var ?string $firstAirDate
     */
    #[JsonProperty('first_air_date')]
    public ?string $firstAirDate;

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
     * @var ?array<string> $originCountry
     */
    #[JsonProperty('origin_country'), ArrayType(['string'])]
    public ?array $originCountry;

    /**
     * @param array{
     *   adult?: ?bool,
     *   backdropPath?: ?string,
     *   id?: ?int,
     *   name?: ?string,
     *   originalLanguage?: ?string,
     *   originalName?: ?string,
     *   overview?: ?string,
     *   posterPath?: ?string,
     *   mediaType?: ?string,
     *   genreIds?: ?array<int>,
     *   popularity?: ?float,
     *   firstAirDate?: ?string,
     *   voteAverage?: ?float,
     *   voteCount?: ?int,
     *   originCountry?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adult = $values['adult'] ?? null;
        $this->backdropPath = $values['backdropPath'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->originalLanguage = $values['originalLanguage'] ?? null;
        $this->originalName = $values['originalName'] ?? null;
        $this->overview = $values['overview'] ?? null;
        $this->posterPath = $values['posterPath'] ?? null;
        $this->mediaType = $values['mediaType'] ?? null;
        $this->genreIds = $values['genreIds'] ?? null;
        $this->popularity = $values['popularity'] ?? null;
        $this->firstAirDate = $values['firstAirDate'] ?? null;
        $this->voteAverage = $values['voteAverage'] ?? null;
        $this->voteCount = $values['voteCount'] ?? null;
        $this->originCountry = $values['originCountry'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
