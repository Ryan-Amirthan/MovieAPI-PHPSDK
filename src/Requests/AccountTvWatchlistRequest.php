<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Types\AccountTvWatchlistRequestSortBy;

class AccountTvWatchlistRequest extends JsonSerializableType
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
     * @var ?value-of<AccountTvWatchlistRequestSortBy> $sortBy
     */
    public ?string $sortBy;

    /**
     * @param array{
     *   page?: ?int,
     *   language?: ?string,
     *   sortBy?: ?value-of<AccountTvWatchlistRequestSortBy>,
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
