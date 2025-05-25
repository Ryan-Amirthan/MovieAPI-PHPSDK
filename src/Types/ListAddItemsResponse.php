<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;
use Tmdb\Core\Types\ArrayType;

class ListAddItemsResponse extends JsonSerializableType
{
    /**
     * @var ?string $statusMessage
     */
    #[JsonProperty('status_message')]
    public ?string $statusMessage;

    /**
     * @var ?array<ListAddItemsResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([ListAddItemsResponseResultsItem::class])]
    public ?array $results;

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
     *   results?: ?array<ListAddItemsResponseResultsItem>,
     *   success?: ?bool,
     *   statusCode?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->statusMessage = $values['statusMessage'] ?? null;
        $this->results = $values['results'] ?? null;
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
