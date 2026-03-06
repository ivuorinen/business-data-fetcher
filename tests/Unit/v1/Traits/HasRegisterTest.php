<?php

use Ivuorinen\BusinessDataFetcher\v1\Traits\HasRegister;

function makeRegisterObject(?int $register): object
{
    return new class ($register) {
        use HasRegister;

        public function __construct(public ?int $register)
        {
        }
    };
}

it('maps all register codes correctly', function (int $code, string $expected) {
    expect(makeRegisterObject($code)->getRegisterString())->toBe($expected);
})->with([
    [1, 'Trade Register'],
    [2, 'Register of Foundations'],
    [3, 'Register of Associations'],
    [4, 'Tax Administration'],
    [5, 'Prepayment Register'],
    [6, 'VAT Register'],
    [7, 'Employer Register'],
    [8, 'Register of bodies liable for tax on insurance premiums'],
]);

it('returns unknown for unrecognized register', function () {
    expect(makeRegisterObject(99)->getRegisterString())->toBe('unknown:99');
});

it('returns unknown for null register', function () {
    expect(makeRegisterObject(null)->getRegisterString())->toBe('unknown:');
});
