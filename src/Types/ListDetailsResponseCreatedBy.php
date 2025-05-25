<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListDetailsResponseCreatedBy extends JsonSerializableType
{
    /**
     * @var ?string $avatarPath
     */
    #[JsonProperty('avatar_path')]
    public ?string $avatarPath;

    /**
     * @var ?string $gravatarHash
     */
    #[JsonProperty('gravatar_hash')]
    public ?string $gravatarHash;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   avatarPath?: ?string,
     *   gravatarHash?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avatarPath = $values['avatarPath'] ?? null;
        $this->gravatarHash = $values['gravatarHash'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->username = $values['username'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
