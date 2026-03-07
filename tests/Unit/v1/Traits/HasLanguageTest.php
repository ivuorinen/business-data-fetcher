<?php

use Ivuorinen\BusinessDataFetcher\v1\Traits\HasLanguage;

function makeLanguageObject(?string $language): object
{
    return new class ($language) {
        use HasLanguage;

        public function __construct(public ?string $language)
        {
        }
    };
}

it('returns finnish for fi', function () {
    expect(makeLanguageObject('fi')->getLanguageString())->toBe('finnish');
});

it('returns english for en', function () {
    expect(makeLanguageObject('en')->getLanguageString())->toBe('english');
});

it('returns swedish for sv', function () {
    expect(makeLanguageObject('sv')->getLanguageString())->toBe('swedish');
});

it('returns unknown for unrecognized language', function () {
    expect(makeLanguageObject('de')->getLanguageString())->toBe('unknown:de');
});
