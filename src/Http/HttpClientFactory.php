<?php

namespace Ivuorinen\BusinessDataFetcher\Http;

use GuzzleHttp\Client;

class HttpClientFactory
{
    public static function create(string $baseUri, int $timeout = 10): Client
    {
        return new Client([
            'base_uri' => $baseUri,
            'timeout'  => $timeout,
        ]);
    }
}
