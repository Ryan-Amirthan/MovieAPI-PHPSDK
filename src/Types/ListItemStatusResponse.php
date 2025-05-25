<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListItemStatusResponse extends JsonSerializableType
{
    /**
     * @var ?string $mediaType
     */
    #[JsonProperty('media_type')]
    public ?string $mediaType;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

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
     * @var ?int $mediaId
     */
    #[JsonProperty('media_id')]
    public ?int $mediaId;

    /**
     * @var ?int $statusCode
     */
    #[JsonProperty('status_code')]
    public ?int $statusCode;

    /**
     * @param array{
     *   mediaType?: ?string,
     *   success?: ?bool,
     *   statusMessage?: ?string,
     *   id?: ?int,
     *   mediaId?: ?int,
     *   statusCode?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mediaType = $values['mediaType'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->statusMessage = $values['statusMessage'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->mediaId = $values['mediaId'] ?? null;
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
