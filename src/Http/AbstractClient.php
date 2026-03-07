<?php

namespace Ivuorinen\BusinessDataFetcher\Http;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use GuzzleHttp\Client;

/**
 * Base HTTP client for PRH API communication.
 *
 * Provides shared Guzzle HTTP client and Valinor mapper instances
 * for concrete API client implementations.
 */
abstract class AbstractClient
{
    protected Client $httpClient;

    protected TreeMapper $mapper;

    /** Initialize HTTP client and Valinor mapper. */
    public function __construct(?Client $httpClient = null)
    {
        $this->httpClient = $httpClient ?? HttpClientFactory::create(
            $this->getBaseUri(),
            $this->getTimeout()
        );

        $this->mapper = (new MapperBuilder())
            ->allowSuperfluousKeys()
            ->mapper();
    }

    /** Get the base URI for the API. */
    abstract protected function getBaseUri(): string;

    /** Get the HTTP request timeout in seconds. */
    protected function getTimeout(): int
    {
        return 10;
    }

    /**
     * Perform a GET request and decode the JSON response.
     *
     * @param array<string, mixed> $query
     * @return array<mixed>
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    protected function getJson(string $uri, array $query = []): array
    {
        $options = [];
        if ($query !== []) {
            $options['query'] = $query;
        }

        $response = $this->httpClient->get($uri, $options);

        $data = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        if (!is_array($data)) {
            throw new \JsonException('Response is not a valid JSON object or array');
        }

        return $data;
    }
}
