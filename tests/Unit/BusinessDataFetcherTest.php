<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Ivuorinen\BusinessDataFetcher\BusinessDataFetcher;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyDetails;
use Ivuorinen\BusinessDataFetcher\v1\Exceptions\ApiResponseErrorException;

function createFetcherWithMock(Response ...$responses): BusinessDataFetcher
{
    $mock = new MockHandler($responses);
    $client = new Client(['handler' => HandlerStack::create($mock)]);
    return new BusinessDataFetcher($client);
}

it('returns BisCompanyDetails array on success', function () {
    $json = file_get_contents(__DIR__ . '/../Fixtures/sample-response.json');
    $fetcher = createFetcherWithMock(new Response(200, [], $json));

    $results = $fetcher->getBusinessInformation('1639413-9');

    expect($results)->toBeArray()
        ->and($results)->toHaveCount(1)
        ->and($results[0])->toBeInstanceOf(BisCompanyDetails::class)
        ->and($results[0]->businessId)->toBe('1639413-9');
});

it('throws on non-200 status code', function () {
    $fetcher = createFetcherWithMock(
        new Response(500, [], '{"error": "Internal Server Error"}')
    );

    $fetcher->getBusinessInformation('1639413-9');
})->throws(ApiResponseErrorException::class);

it('throws on malformed JSON', function () {
    $fetcher = createFetcherWithMock(
        new Response(200, [], 'not-json')
    );

    $fetcher->getBusinessInformation('1639413-9');
})->throws(JsonException::class);

it('throws when results key is missing', function () {
    $fetcher = createFetcherWithMock(
        new Response(200, [], '{"type": "test"}')
    );

    $fetcher->getBusinessInformation('1639413-9');
})->throws(ApiResponseErrorException::class);
