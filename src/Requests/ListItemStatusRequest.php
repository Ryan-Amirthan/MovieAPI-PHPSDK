<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Types\ListItemStatusRequestMediaType;

class ListItemStatusRequest extends JsonSerializableType
{
    /**
     * @var int $mediaId
     */
    public int $mediaId;

    /**
     * @var value-of<ListItemStatusRequestMediaType> $mediaType
     */
    public string $mediaType;

    /**
     * @param array{
     *   mediaId: int,
     *   mediaType: value-of<ListItemStatusRequestMediaType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mediaId = $values['mediaId'];
        $this->mediaType = $values['mediaType'];
    }
}
