<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;

class ListDetailsResponseObjectIds extends JsonSerializableType
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
