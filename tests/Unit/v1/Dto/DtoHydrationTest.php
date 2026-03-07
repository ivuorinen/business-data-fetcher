<?php

use CuyZ\Valinor\MapperBuilder;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisAddress;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyBusinessIdChange;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyBusinessLine;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyContactDetail;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyForm;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyLanguage;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyLiquidation;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyName;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyRegisteredEntry;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyRegisteredOffice;

function valinorMapper(): CuyZ\Valinor\Mapper\TreeMapper
{
    return (new MapperBuilder())
        ->allowSuperfluousKeys()
        ->mapper();
}

it('hydrates all DTOs from arrays', function (string $class, array $data, string $property, mixed $expected) {
    $dto = valinorMapper()->map($class, $data);
    expect($dto)->toBeInstanceOf($class)
        ->and($dto->$property)->toBe($expected);
})->with([
    'BisAddress' => [
        BisAddress::class,
        ['type' => 1, 'street' => 'Katu 1', 'postCode' => '00100', 'city' => 'HELSINKI', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'street',
        'Katu 1',
    ],
    'BisCompanyName' => [
        BisCompanyName::class,
        ['order' => 0, 'name' => 'Test Oy', 'source' => 1, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'name',
        'Test Oy',
    ],
    'BisCompanyForm' => [
        BisCompanyForm::class,
        ['name' => 'Osakeyhtiö', 'type' => 'OY', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'type',
        'OY',
    ],
    'BisCompanyBusinessLine' => [
        BisCompanyBusinessLine::class,
        ['order' => 0, 'name' => 'IT', 'source' => 2, 'version' => 1, 'language' => 'en', 'registrationDate' => '2020-01-01'],
        'name',
        'IT',
    ],
    'BisCompanyLanguage' => [
        BisCompanyLanguage::class,
        ['name' => 'Finnish', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'language',
        'fi',
    ],
    'BisCompanyRegisteredEntry' => [
        BisCompanyRegisteredEntry::class,
        ['authority' => 2, 'register' => 1, 'status' => 2, 'description' => 'Registered', 'language' => 'en', 'registrationDate' => '2020-01-01'],
        'description',
        'Registered',
    ],
    'BisCompanyLiquidation' => [
        BisCompanyLiquidation::class,
        ['name' => 'Bankruptcy', 'type' => 'K', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'name',
        'Bankruptcy',
    ],
    'BisCompanyRegisteredOffice' => [
        BisCompanyRegisteredOffice::class,
        ['order' => 0, 'name' => 'Helsinki', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'name',
        'Helsinki',
    ],
    'BisCompanyContactDetail' => [
        BisCompanyContactDetail::class,
        ['value' => 'www.test.fi', 'type' => 'Website', 'source' => 0, 'version' => 1, 'language' => 'fi', 'registrationDate' => '2020-01-01'],
        'value',
        'www.test.fi',
    ],
    'BisCompanyBusinessIdChange' => [
        BisCompanyBusinessIdChange::class,
        ['description' => 'Changed', 'reason' => '1', 'oldBusinessId' => '1234567-8', 'newBusinessId' => '8765432-1', 'source' => 0, 'language' => 'fi', 'change' => 5],
        'oldBusinessId',
        '1234567-8',
    ],
]);
