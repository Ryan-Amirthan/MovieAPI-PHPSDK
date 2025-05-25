<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;

class ListDetailsRequest extends JsonSerializableType
{
    /**
     * @var ?string $language
     */
    public ?string $language;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @param array{
     *   language?: ?string,
     *   page?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->language = $values['language'] ?? null;
        $this->page = $values['page'] ?? null;
    }
}
