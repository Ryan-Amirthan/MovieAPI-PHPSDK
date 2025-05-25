<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListRemoveItemsResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?string $mediaType
     */
    #[JsonProperty('media_type')]
    public ?string $mediaType;

    /**
     * @var ?int $mediaId
     */
    #[JsonProperty('media_id')]
    public ?int $mediaId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   mediaType?: ?string,
     *   mediaId?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mediaType = $values['mediaType'] ?? null;
        $this->mediaId = $values['mediaId'] ?? null;
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
