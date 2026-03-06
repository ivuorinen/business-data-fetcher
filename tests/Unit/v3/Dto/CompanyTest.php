<?php

use CuyZ\Valinor\MapperBuilder;
use Ivuorinen\BusinessDataFetcher\v3\Dto\Company;
use Ivuorinen\BusinessDataFetcher\v3\Dto\CompanySearchResult;

it('hydrates Company from v3 search response fixture', function () {
    $json = json_decode(
        file_get_contents(__DIR__ . '/../../../Fixtures/v3-search-response.json'),
        true,
        512,
        JSON_THROW_ON_ERROR
    );

    $mapper = (new MapperBuilder())
        ->allowSuperfluousKeys()
        ->mapper();

    $result = $mapper->map(CompanySearchResult::class, $json);

    expect($result->totalResults)->toBe(1)
        ->and($result->companies)->toHaveCount(1);

    $company = $result->companies[0];

    expect($company)->toBeInstanceOf(Company::class)
        ->and($company->businessId->value)->toBe('1639413-9')
        ->and($company->businessId->registrationDate)->toBe('2001-04-03')
        ->and($company->euId)->not->toBeNull()
        ->and($company->euId->value)->toBe('FIFOO123456')
        ->and($company->names)->toHaveCount(1)
        ->and($company->names[0]->name)->toBe('Oy Example Ab')
        ->and($company->names[0]->type)->toBe('TOIM')
        ->and($company->mainBusinessLine)->not->toBeNull()
        ->and($company->mainBusinessLine->code)->toBe('62010')
        ->and($company->mainBusinessLine->descriptions)->toHaveCount(1)
        ->and($company->mainBusinessLine->descriptions[0]->description)->toBe('Computer programming activities')
        ->and($company->website)->not->toBeNull()
        ->and($company->website->url)->toBe('www.example.fi')
        ->and($company->companyForms)->toHaveCount(1)
        ->and($company->companyForms[0]->type)->toBe('OY')
        ->and($company->companyForms[0]->descriptions)->toHaveCount(2)
        ->and($company->registeredEntries)->toHaveCount(1)
        ->and($company->registeredEntries[0]->register)->toBe('1')
        ->and($company->registeredEntries[0]->authority)->toBe('2')
        ->and($company->addresses)->toHaveCount(1)
        ->and($company->addresses[0]->street)->toBe('Testitie 1')
        ->and($company->addresses[0]->postOffices)->toHaveCount(1)
        ->and($company->addresses[0]->postOffices[0]->city)->toBe('HELSINKI')
        ->and($company->tradeRegisterStatus)->toBe('2')
        ->and($company->status)->toBe('ACTIVE')
        ->and($company->lastModified)->toBe('2023-06-15T10:30:00Z');
});
