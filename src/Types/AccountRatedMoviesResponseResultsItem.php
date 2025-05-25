<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class AccountRatedMoviesResponseResultsItem extends JsonSerializableType
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
     * @var ?string $releaseDate
     */
    #[JsonProperty('release_date')]
    public ?string $releaseDate;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

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
     * @var ?AccountRatedMoviesResponseResultsItemAccountRating $accountRating
     */
    #[JsonProperty('account_rating')]
    public ?AccountRatedMoviesResponseResultsItemAccountRating $accountRating;

    /**
     * @param array{
     *   adult?: ?bool,
     *   backdropPath?: ?string,
     *   genreIds?: ?array<int>,
     *   id?: ?int,
     *   originalLanguage?: ?string,
     *   originalTitle?: ?string,
     *   overview?: ?string,
     *   popularity?: ?float,
     *   posterPath?: ?string,
     *   releaseDate?: ?string,
     *   title?: ?string,
     *   video?: ?bool,
     *   voteAverage?: ?float,
     *   voteCount?: ?int,
     *   accountRating?: ?AccountRatedMoviesResponseResultsItemAccountRating,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adult = $values['adult'] ?? null;
        $this->backdropPath = $values['backdropPath'] ?? null;
        $this->genreIds = $values['genreIds'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->originalLanguage = $values['originalLanguage'] ?? null;
        $this->originalTitle = $values['originalTitle'] ?? null;
        $this->overview = $values['overview'] ?? null;
        $this->popularity = $values['popularity'] ?? null;
        $this->posterPath = $values['posterPath'] ?? null;
        $this->releaseDate = $values['releaseDate'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->video = $values['video'] ?? null;
        $this->voteAverage = $values['voteAverage'] ?? null;
        $this->voteCount = $values['voteCount'] ?? null;
        $this->accountRating = $values['accountRating'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
