<?php

use CuyZ\Valinor\MapperBuilder;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyDetails;

it('hydrates from sample JSON fixture', function () {
    $json = json_decode(
        file_get_contents(__DIR__ . '/../../../Fixtures/sample-response.json'),
        true,
        512,
        JSON_THROW_ON_ERROR
    );

    $mapper = (new MapperBuilder())
        ->allowSuperfluousKeys()
        ->mapper();

    $result = $mapper->map(BisCompanyDetails::class, $json['results'][0]);

    expect($result)
        ->toBeInstanceOf(BisCompanyDetails::class)
        ->and($result->businessId)->toBe('1639413-9')
        ->and($result->registrationDate)->toBe('2001-04-03')
        ->and($result->companyForm)->toBe('OY')
        ->and($result->name)->toBe('Oy Example Ab')
        ->and($result->names)->toHaveCount(1)
        ->and($result->names[0]->name)->toBe('Oy Example Ab')
        ->and($result->names[0]->getLanguageString())->toBe('finnish')
        ->and($result->names[0]->getSourceText())->toBe('common')
        ->and($result->addresses)->toHaveCount(1)
        ->and($result->addresses[0]->street)->toBe('Testitie 1')
        ->and($result->addresses[0]->postCode)->toBe('00100')
        ->and($result->addresses[0]->city)->toBe('HELSINKI')
        ->and($result->companyForms)->toHaveCount(1)
        ->and($result->companyForms[0]->name)->toBe('Osakeyhtiö')
        ->and($result->businessLines)->toHaveCount(1)
        ->and($result->businessLines[0]->name)->toBe('Computer programming activities')
        ->and($result->registeredEntries)->toHaveCount(1)
        ->and($result->registeredEntries[0]->getAuthorityString())->toBe('Finnish Patent and Registration Office')
        ->and($result->registeredEntries[0]->getRegisterString())->toBe('Trade Register')
        ->and($result->contactDetails)->toHaveCount(1)
        ->and($result->contactDetails[0]->value)->toBe('www.example.fi');
});
