<?php

namespace Ivuorinen\BusinessDataFetcher\v3\Dto;

/** Represents a postal or visiting address from the YTJ v3 API. */
final readonly class Address
{
    /**
     * @param list<PostOffice> $postOffices
     */
    public function __construct(
        public int $type = 0,
        public string $source = '',
        public ?string $street = null,
        public ?string $postCode = null,
        public array $postOffices = [],
        public ?string $postOfficeBox = null,
        public ?string $buildingNumber = null,
        public ?string $entrance = null,
        public ?string $apartmentNumber = null,
        public ?string $apartmentIdSuffix = null,
        public ?string $co = null,
        public ?string $country = null,
        public ?string $freeAddressLine = null,
        public ?string $registrationDate = null,
    ) {
    }
}
