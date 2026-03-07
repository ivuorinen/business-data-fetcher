<?php

use Ivuorinen\BusinessDataFetcher\v1\Traits\HasAuthority;

function makeAuthorityObject(int $authority): object
{
    return new class ($authority) {
        use HasAuthority;

        public function __construct(public int $authority)
        {
        }
    };
}

it('returns Tax Administration for authority 1', function () {
    expect(makeAuthorityObject(1)->getAuthorityString())->toBe('Tax Administration');
});

it('returns Finnish Patent and Registration Office for authority 2', function () {
    expect(makeAuthorityObject(2)->getAuthorityString())->toBe('Finnish Patent and Registration Office');
});

it('returns Population Register for authority 3', function () {
    expect(makeAuthorityObject(3)->getAuthorityString())->toBe('Population Register');
});

it('returns unknown for unknown authority', function () {
    expect(makeAuthorityObject(99)->getAuthorityString())->toBe('unknown:99');
});
