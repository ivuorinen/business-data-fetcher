<?php

use Ivuorinen\BusinessDataFetcher\v1\Traits\HasSource;

function makeSourceObject(?int $source): object
{
    return new class ($source) {
        use HasSource;

        public function __construct(public ?int $source)
        {
        }
    };
}

it('returns common for source 0', function () {
    expect(makeSourceObject(0)->getSourceText())->toBe('common');
});

it('returns Finnish Patent and Registration Office for source 1', function () {
    expect(makeSourceObject(1)->getSourceText())->toBe('Finnish Patent and Registration Office');
});

it('returns Tax Administration for source 2', function () {
    expect(makeSourceObject(2)->getSourceText())->toBe('Tax Administration');
});

it('returns Business Information System for source 3', function () {
    expect(makeSourceObject(3)->getSourceText())->toBe('Business Information System');
});

it('returns empty string for unknown source', function () {
    expect(makeSourceObject(99)->getSourceText())->toBe('');
});
