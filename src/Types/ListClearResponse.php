<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListClearResponse extends JsonSerializableType
{
    /**
     * @var ?int $itemsDeleted
     */
    #[JsonProperty('items_deleted')]
    public ?int $itemsDeleted;

    /**
     * @var ?string $statusMessage
     */
    #[JsonProperty('status_message')]
    public ?string $statusMessage;

    /**
     * @var ?int $id
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?int $statusCode
     */
    #[JsonProperty('status_code')]
    public ?int $statusCode;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   itemsDeleted?: ?int,
     *   statusMessage?: ?string,
     *   id?: ?int,
     *   statusCode?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemsDeleted = $values['itemsDeleted'] ?? null;
        $this->statusMessage = $values['statusMessage'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
