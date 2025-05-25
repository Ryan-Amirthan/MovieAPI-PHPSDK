<?php

namespace Tmdb\Requests;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListCreateRequest extends JsonSerializableType
{
    /**
     * @var string $rawBody
     */
    #[JsonProperty('RAW_BODY')]
    public string $rawBody;

    /**
     * @param array{
     *   rawBody: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rawBody = $values['rawBody'];
    }
}
