<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Ivuorinen\BusinessDataFetcher\v3\Client as V3Client;
use Ivuorinen\BusinessDataFetcher\v3\Dto\CompanySearchResult;
use Ivuorinen\BusinessDataFetcher\v3\Dto\PostCodeEntry;
use Ivuorinen\BusinessDataFetcher\v3\Exceptions\V3ApiException;

function createV3ClientWithMock(Response ...$responses): V3Client
{
    $mock = new MockHandler($responses);
    $client = new Client(['handler' => HandlerStack::create($mock)]);
    return new V3Client($client);
}

it('searches companies successfully', function () {
    $json = file_get_contents(__DIR__ . '/../../Fixtures/v3-search-response.json');
    $client = createV3ClientWithMock(new Response(200, [], $json));

    $result = $client->searchCompanies(name: 'Example');

    expect($result)
        ->toBeInstanceOf(CompanySearchResult::class)
        ->and($result->totalResults)->toBe(1)
        ->and($result->companies)->toHaveCount(1)
        ->and($result->companies[0]->businessId->value)->toBe('1639413-9')
        ->and($result->companies[0]->names[0]->name)->toBe('Oy Example Ab')
        ->and($result->companies[0]->tradeRegisterStatus)->toBe('2')
        ->and($result->companies[0]->addresses[0]->street)->toBe('Testitie 1');
});

it('throws V3ApiException on request failure for search', function () {
    $client = createV3ClientWithMock(new Response(500, [], '{"message":"error"}'));
    $client->searchCompanies(name: 'Test');
})->throws(V3ApiException::class);

it('retrieves description as plain text', function () {
    $client = createV3ClientWithMock(new Response(200, [], 'Trade Register'));
    $result = $client->getDescription('REK', 'en');

    expect($result)->toBe('Trade Register');
});

it('throws V3ApiException on description failure', function () {
    $client = createV3ClientWithMock(new Response(400, [], '{"message":"bad request"}'));
    $client->getDescription('INVALID');
})->throws(V3ApiException::class);

it('retrieves post codes', function () {
    $json = json_encode([
        ['postCode' => '00100', 'city' => 'HELSINKI', 'active' => true, 'languageCode' => '1', 'municipalityCode' => '091'],
        ['postCode' => '00200', 'city' => 'HELSINKI', 'active' => true, 'languageCode' => '1', 'municipalityCode' => '091'],
    ]);
    $client = createV3ClientWithMock(new Response(200, [], $json));

    $results = $client->getPostCodes('fi');

    expect($results)->toHaveCount(2)
        ->and($results[0])->toBeInstanceOf(PostCodeEntry::class)
        ->and($results[0]->postCode)->toBe('00100')
        ->and($results[0]->city)->toBe('HELSINKI')
        ->and($results[1]->postCode)->toBe('00200');
});

it('returns stream for all companies download', function () {
    $client = createV3ClientWithMock(new Response(200, [], 'zip-content'));
    $stream = $client->getAllCompanies();

    expect($stream->getContents())->toBe('zip-content');
});
