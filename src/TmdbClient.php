<?php

namespace Tmdb;

use GuzzleHttp\ClientInterface;
use Tmdb\Core\Client\RawClient;
use Tmdb\Requests\AuthCreateRequestTokenRequest;
use Tmdb\Types\AuthCreateRequestTokenResponse;
use Tmdb\Exceptions\TmdbException;
use Tmdb\Exceptions\TmdbApiException;
use Tmdb\Core\Json\JsonApiRequest;
use Tmdb\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Tmdb\Requests\AuthCreateAccessTokenRequest;
use Tmdb\Types\AuthCreateAccessTokenResponse;
use Tmdb\Requests\AuthLogoutRequest;
use Tmdb\Types\AuthLogoutResponse;
use Tmdb\Requests\ListDetailsRequest;
use Tmdb\Types\ListDetailsResponse;
use Tmdb\Requests\ListUpdateRequest;
use Tmdb\Types\ListUpdateResponse;
use Tmdb\Requests\ListCreateRequest;
use Tmdb\Types\ListCreateResponse;
use Tmdb\Types\ListClearResponse;
use Tmdb\Types\ListDeleteResponse;
use Tmdb\Requests\ListAddItemsRequest;
use Tmdb\Types\ListAddItemsResponse;
use Tmdb\Requests\ListUpdateItemsRequest;
use Tmdb\Types\ListUpdateItemsResponse;
use Tmdb\Requests\ListRemoveItemsRequest;
use Tmdb\Types\ListRemoveItemsResponse;
use Tmdb\Requests\ListItemStatusRequest;
use Tmdb\Types\ListItemStatusResponse;
use Tmdb\Requests\AccountListsRequest;
use Tmdb\Types\AccountListsResponse;
use Tmdb\Requests\AccountFavoriteMoviesRequest;
use Tmdb\Types\AccountFavoriteMoviesResponse;
use Tmdb\Requests\AccountFavoriteTvRequest;
use Tmdb\Types\AccountFavoriteTvResponse;
use Tmdb\Requests\AccountTvRecommendationsRequest;
use Tmdb\Types\AccountTvRecommendationsResponse;
use Tmdb\Requests\AccountMovieRecommendationsRequest;
use Tmdb\Types\AccountMovieRecommendationsResponse;
use Tmdb\Requests\AccountMovieWatchlistRequest;
use Tmdb\Types\AccountMovieWatchlistResponse;
use Tmdb\Requests\AccountTvWatchlistRequest;
use Tmdb\Types\AccountTvWatchlistResponse;
use Tmdb\Requests\AccountRatedMoviesRequest;
use Tmdb\Types\AccountRatedMoviesResponse;
use Tmdb\Requests\AccountRatedTvRequest;
use Tmdb\Types\AccountRatedTvResponse;

class TmdbClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $apiKey,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $apiKey",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Tmdb',
            'X-Fern-SDK-Version' => '1.0.1',
            'User-Agent' => 'tmdb/tmdb/1.0.1',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );
    }

    /**
     *
     *
     * @param AuthCreateRequestTokenRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AuthCreateRequestTokenResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function authCreateRequestToken(AuthCreateRequestTokenRequest $request, ?array $options = null): AuthCreateRequestTokenResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/auth/request_token",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AuthCreateRequestTokenResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     *
     *
     * @param AuthCreateAccessTokenRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AuthCreateAccessTokenResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function authCreateAccessToken(AuthCreateAccessTokenRequest $request, ?array $options = null): AuthCreateAccessTokenResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/auth/access_token",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AuthCreateAccessTokenResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Log out of a session.
     *
     * @param AuthLogoutRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AuthLogoutResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function authLogout(AuthLogoutRequest $request, ?array $options = null): AuthLogoutResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/auth/access_token",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AuthLogoutResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieve a list by id.
     *
     * @param int $listId
     * @param ListDetailsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListDetailsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listDetails(int $listId, ListDetailsRequest $request = new ListDetailsRequest(), ?array $options = null): ListDetailsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListDetailsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update the details of a list.
     *
     * @param int $listId
     * @param ListUpdateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListUpdateResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listUpdate(int $listId, ListUpdateRequest $request, ?array $options = null): ListUpdateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListUpdateResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create a new list.
     *
     * @param ListCreateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListCreateResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listCreate(ListCreateRequest $request, ?array $options = null): ListCreateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListCreateResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Clear all of the items on a list.
     *
     * @param int $listId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListClearResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listClear(int $listId, ?array $options = null): ListClearResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}/clear",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListClearResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete a list.
     *
     * @param int $listId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListDeleteResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listDelete(int $listId, ?array $options = null): ListDeleteResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/{$listId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListDeleteResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Add items to a list.
     *
     * @param int $listId
     * @param ListAddItemsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListAddItemsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listAddItems(int $listId, ListAddItemsRequest $request, ?array $options = null): ListAddItemsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}/items",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListAddItemsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update an individual item on a list
     *
     * @param string $listId
     * @param ListUpdateItemsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListUpdateItemsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listUpdateItems(string $listId, ListUpdateItemsRequest $request, ?array $options = null): ListUpdateItemsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}/items",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListUpdateItemsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove items from a list
     *
     * @param int $listId
     * @param ListRemoveItemsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListRemoveItemsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listRemoveItems(int $listId, ListRemoveItemsRequest $request, ?array $options = null): ListRemoveItemsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}/items",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListRemoveItemsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Check if an item is on a list.
     *
     * @param int $listId
     * @param ListItemStatusRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListItemStatusResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function listItemStatus(int $listId, ListItemStatusRequest $request, ?array $options = null): ListItemStatusResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['media_id'] = $request->mediaId;
        $query['media_type'] = $request->mediaType;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/list/{$listId}/item_status",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListItemStatusResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get the custom lists that a user has created.
     *
     * @param string $accountObjectId
     * @param AccountListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountListsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountLists(string $accountObjectId, AccountListsRequest $request = new AccountListsRequest(), ?array $options = null): AccountListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/lists",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountListsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users list of favourite movies.
     *
     * @param string $accountObjectId
     * @param AccountFavoriteMoviesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountFavoriteMoviesResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountFavoriteMovies(string $accountObjectId, AccountFavoriteMoviesRequest $request = new AccountFavoriteMoviesRequest(), ?array $options = null): AccountFavoriteMoviesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/movie/favorites",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountFavoriteMoviesResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users list of favourite TV shows.
     *
     * @param string $accountObjectId
     * @param AccountFavoriteTvRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountFavoriteTvResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountFavoriteTv(string $accountObjectId, AccountFavoriteTvRequest $request = new AccountFavoriteTvRequest(), ?array $options = null): AccountFavoriteTvResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/tv/favorites",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountFavoriteTvResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users list of recommended TV shows.
     *
     * @param string $accountObjectId
     * @param AccountTvRecommendationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountTvRecommendationsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountTvRecommendations(string $accountObjectId, AccountTvRecommendationsRequest $request = new AccountTvRecommendationsRequest(), ?array $options = null): AccountTvRecommendationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/tv/recommendations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountTvRecommendationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users list of recommended movies.
     *
     * @param string $accountObjectId
     * @param AccountMovieRecommendationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountMovieRecommendationsResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountMovieRecommendations(string $accountObjectId, AccountMovieRecommendationsRequest $request = new AccountMovieRecommendationsRequest(), ?array $options = null): AccountMovieRecommendationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/movie/recommendations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountMovieRecommendationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users movie watchlist.
     *
     * @param string $accountObjectId
     * @param AccountMovieWatchlistRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountMovieWatchlistResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountMovieWatchlist(string $accountObjectId, AccountMovieWatchlistRequest $request = new AccountMovieWatchlistRequest(), ?array $options = null): AccountMovieWatchlistResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/movie/watchlist",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountMovieWatchlistResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users TV watchlist.
     *
     * @param string $accountObjectId
     * @param AccountTvWatchlistRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountTvWatchlistResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountTvWatchlist(string $accountObjectId, AccountTvWatchlistRequest $request = new AccountTvWatchlistRequest(), ?array $options = null): AccountTvWatchlistResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/tv/watchlist",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountTvWatchlistResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users rated movies.
     *
     * @param string $accountObjectId
     * @param AccountRatedMoviesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountRatedMoviesResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountRatedMovies(string $accountObjectId, AccountRatedMoviesRequest $request = new AccountRatedMoviesRequest(), ?array $options = null): AccountRatedMoviesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/movie/rated",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountRatedMoviesResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a users rated TV shows.
     *
     * @param string $accountObjectId
     * @param AccountRatedTvRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AccountRatedTvResponse
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function accountRatedTv(string $accountObjectId, AccountRatedTvRequest $request = new AccountRatedTvRequest(), ?array $options = null): AccountRatedTvResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->language != null) {
            $query['language'] = $request->language;
        }
        if ($request->sortBy != null) {
            $query['sort_by'] = $request->sortBy;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "4/account/{$accountObjectId}/tv/rated",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AccountRatedTvResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new TmdbException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     *
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws TmdbException
     * @throws TmdbApiException
     */
    public function gettingStarted(?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new TmdbException(message: $e->getMessage(), previous: $e);
            }
            throw new TmdbApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new TmdbException(message: $e->getMessage(), previous: $e);
        }
        throw new TmdbApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
