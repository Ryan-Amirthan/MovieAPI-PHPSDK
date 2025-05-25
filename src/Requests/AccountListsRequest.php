<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;

class AccountListsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @param array{
     *   page?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
    }
}
