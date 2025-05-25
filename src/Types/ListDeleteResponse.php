<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListDeleteResponse extends JsonSerializableType
{
    /**
     * @var ?string $statusMessage
     */
    #[JsonProperty('status_message')]
    public ?string $statusMessage;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $statusCode
     */
    #[JsonProperty('status_code')]
    public ?int $statusCode;

    /**
     * @param array{
     *   statusMessage?: ?string,
     *   success?: ?bool,
     *   statusCode?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->statusMessage = $values['statusMessage'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
