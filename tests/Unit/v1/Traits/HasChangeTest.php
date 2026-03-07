<?php

use Ivuorinen\BusinessDataFetcher\v1\Traits\HasChange;

function makeChangeObject(string|int|null $change): object
{
    return new class ($change) {
        use HasChange;

        public function __construct(public string|int|null $change)
        {
        }
    };
}

it('maps all integer change codes correctly', function (int $code, string $expected) {
    expect(makeChangeObject($code)->getChangeString())->toBe($expected);
})->with([
    [2, 'Business ID removal'],
    [3, 'Combining of double IDs'],
    [5, 'ID changed'],
    [44, 'Fusion'],
    [45, 'Operator continuing VAT activities'],
    [46, 'Relation to predecessor'],
    [47, 'Division'],
    [48, 'Bankruptcy relationship'],
    [49, 'Operations continued by a private trader'],
    [57, 'Partial division'],
]);

it('maps FUU string to Fusion', function () {
    expect(makeChangeObject('FUU')->getChangeString())->toBe('Fusion');
});

it('maps DIF string to Division', function () {
    expect(makeChangeObject('DIF')->getChangeString())->toBe('Division');
});

it('returns unknown for unrecognized change', function () {
    expect(makeChangeObject(999)->getChangeString())->toBe('unknown:999');
});
