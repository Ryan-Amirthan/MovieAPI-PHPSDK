<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class AccountRatedTvResponseResultsItemAccountRating extends JsonSerializableType
{
    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @var ?int $value
     */
    #[JsonProperty('value')]
    public ?int $value;

    /**
     * @param array{
     *   createdAt?: ?string,
     *   value?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
