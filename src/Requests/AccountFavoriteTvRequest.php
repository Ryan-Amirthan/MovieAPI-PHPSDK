<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Types\AccountFavoriteTvRequestSortBy;

class AccountFavoriteTvRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?string $language
     */
    public ?string $language;

    /**
     * @var ?value-of<AccountFavoriteTvRequestSortBy> $sortBy
     */
    public ?string $sortBy;

    /**
     * @param array{
     *   page?: ?int,
     *   language?: ?string,
     *   sortBy?: ?value-of<AccountFavoriteTvRequestSortBy>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
    }
}
