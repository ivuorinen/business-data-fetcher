<?php

namespace Ivuorinen\BusinessDataFetcher\Http;

use GuzzleHttp\Client;

/** Factory for creating pre-configured Guzzle HTTP clients. */
class HttpClientFactory
{
    /** Create a Guzzle client with the given base URI and timeout. */
    public static function create(string $baseUri, int $timeout = 10): Client
    {
        return new Client([
            'base_uri' => $baseUri,
            'timeout'  => $timeout,
        ]);
    }
}
