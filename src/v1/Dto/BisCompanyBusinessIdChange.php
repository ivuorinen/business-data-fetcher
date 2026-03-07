<?php

namespace Ivuorinen\BusinessDataFetcher\v1\Dto;

use Ivuorinen\BusinessDataFetcher\v1\Traits;

/** Represents a business ID change event (e.g. fusion, division). */
final readonly class BisCompanyBusinessIdChange
{
    use Traits\HasSource;
    use Traits\HasLanguage;
    use Traits\HasChange;

    public function __construct(
        public string $description = '',
        public string $reason = '',
        public ?string $changeDate = null,
        public string $oldBusinessId = '',
        public string $newBusinessId = '',
        public ?int $source = null,
        public ?string $language = null,
        public string|int|null $change = null,
    ) {
    }
}
