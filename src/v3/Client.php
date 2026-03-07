<?php

namespace Ivuorinen\BusinessDataFetcher\v3;

use GuzzleHttp\Exception\RequestException;
use Ivuorinen\BusinessDataFetcher\Http\AbstractClient;
use Ivuorinen\BusinessDataFetcher\v3\Dto\CompanySearchResult;
use Ivuorinen\BusinessDataFetcher\v3\Dto\PostCodeEntry;
use Ivuorinen\BusinessDataFetcher\v3\Exceptions\V3ApiException;
use Psr\Http\Message\StreamInterface;

/** Client for the PRH YTJ v3 API (Finnish business data). */
class Client extends AbstractClient
{
    private const API_PREFIX = '/opendata-ytj-api/v3';

    /** @inheritDoc */
    protected function getBaseUri(): string
    {
        return 'https://avoindata.prh.fi';
    }

    /**
     * Search for companies.
     *
     * @throws V3ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchCompanies(
        ?string $name = null,
        ?string $businessId = null,
        ?string $location = null,
        ?string $companyForm = null,
        ?string $mainBusinessLine = null,
        ?string $registrationDateStart = null,
        ?string $registrationDateEnd = null,
        ?string $postCode = null,
        ?string $businessIdRegistrationStart = null,
        ?string $businessIdRegistrationEnd = null,
        ?int $page = null,
    ): CompanySearchResult {
        $query = array_filter([
            'name' => $name,
            'businessId' => $businessId,
            'location' => $location,
            'companyForm' => $companyForm,
            'mainBusinessLine' => $mainBusinessLine,
            'registrationDateStart' => $registrationDateStart,
            'registrationDateEnd' => $registrationDateEnd,
            'postCode' => $postCode,
            'businessIdRegistrationStart' => $businessIdRegistrationStart,
            'businessIdRegistrationEnd' => $businessIdRegistrationEnd,
            'page' => $page,
        ], fn (string|int|null $v): bool => $v !== null);

        try {
            $data = $this->getJson(self::API_PREFIX . '/companies', $query);
            return $this->mapper->map(CompanySearchResult::class, $data);
        } catch (RequestException $e) {
            throw new V3ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Retrieve code list description.
     *
     * @throws V3ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDescription(string $code, string $lang = 'en'): string
    {
        try {
            $response = $this->httpClient->get(self::API_PREFIX . '/description', [
                'query' => ['code' => $code, 'lang' => $lang],
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            throw new V3ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Retrieve postal code details.
     *
     * @return PostCodeEntry[]
     * @throws V3ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPostCodes(string $lang = 'en'): array
    {
        try {
            $data = $this->getJson(self::API_PREFIX . '/post_codes', ['lang' => $lang]);

            $results = [];
            foreach ($data as $entry) {
                $results[] = $this->mapper->map(PostCodeEntry::class, $entry);
            }

            return $results;
        } catch (RequestException $e) {
            throw new V3ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Get all companies as a ZIP download stream.
     *
     * @throws V3ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllCompanies(): StreamInterface
    {
        try {
            $response = $this->httpClient->get(self::API_PREFIX . '/all_companies', [
                'stream' => true,
            ]);

            return $response->getBody();
        } catch (RequestException $e) {
            throw new V3ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
