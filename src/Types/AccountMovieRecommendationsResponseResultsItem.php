<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class AccountMovieRecommendationsResponseResultsItem extends JsonSerializableType
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
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $originalLanguage
     */
    #[JsonProperty('original_language')]
    public ?string $originalLanguage;

    /**
     * @var ?string $originalTitle
     */
    #[JsonProperty('original_title')]
    public ?string $originalTitle;

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
     * @var ?string $releaseDate
     */
    #[JsonProperty('release_date')]
    public ?string $releaseDate;

    /**
     * @var ?bool $video
     */
    #[JsonProperty('video')]
    public ?bool $video;

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
     *   id?: ?int,
     *   title?: ?string,
     *   originalLanguage?: ?string,
     *   originalTitle?: ?string,
     *   overview?: ?string,
     *   posterPath?: ?string,
     *   mediaType?: ?string,
     *   genreIds?: ?array<int>,
     *   popularity?: ?float,
     *   releaseDate?: ?string,
     *   video?: ?bool,
     *   voteAverage?: ?float,
     *   voteCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adult = $values['adult'] ?? null;
        $this->backdropPath = $values['backdropPath'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->originalLanguage = $values['originalLanguage'] ?? null;
        $this->originalTitle = $values['originalTitle'] ?? null;
        $this->overview = $values['overview'] ?? null;
        $this->posterPath = $values['posterPath'] ?? null;
        $this->mediaType = $values['mediaType'] ?? null;
        $this->genreIds = $values['genreIds'] ?? null;
        $this->popularity = $values['popularity'] ?? null;
        $this->releaseDate = $values['releaseDate'] ?? null;
        $this->video = $values['video'] ?? null;
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
