<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class AuthCreateAccessTokenResponse extends JsonSerializableType
{
    /**
     * @var ?string $accountId
     */
    #[JsonProperty('account_id')]
    public ?string $accountId;

    /**
     * @var ?string $accessToken
     */
    #[JsonProperty('access_token')]
    public ?string $accessToken;

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
     * @var ?int $statusCode
     */
    #[JsonProperty('status_code')]
    public ?int $statusCode;

    /**
     * @param array{
     *   accountId?: ?string,
     *   accessToken?: ?string,
     *   success?: ?bool,
     *   statusMessage?: ?string,
     *   statusCode?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountId = $values['accountId'] ?? null;
        $this->accessToken = $values['accessToken'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->statusMessage = $values['statusMessage'] ?? null;
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
