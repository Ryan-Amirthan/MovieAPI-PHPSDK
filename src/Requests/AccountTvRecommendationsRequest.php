<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;

class AccountTvRecommendationsRequest extends JsonSerializableType
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
     * @param array{
     *   page?: ?int,
     *   language?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->language = $values['language'] ?? null;
    }
}
