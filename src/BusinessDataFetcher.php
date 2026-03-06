<?php

namespace Ivuorinen\BusinessDataFetcher;

use GuzzleHttp\Exception\RequestException;
use Ivuorinen\BusinessDataFetcher\Http\AbstractClient;
use Ivuorinen\BusinessDataFetcher\v1\Dto\BisCompanyDetails;
use Ivuorinen\BusinessDataFetcher\v1\Exceptions\ApiResponseErrorException;
use Psr\Http\Message\ResponseInterface;

class BusinessDataFetcher extends AbstractClient
{
    protected function getBaseUri(): string
    {
        return 'https://avoindata.prh.fi';
    }

    protected function getTimeout(): int
    {
        return 2;
    }

    /**
     * Fetch Business Information.
     *
     * @return BisCompanyDetails[]
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     */
    public function getBusinessInformation(string $businessId): array
    {
        try {
            $uri      = '/bis/v1/' . $businessId;
            $response = $this->httpClient->get($uri);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseErrorException(
                    $response->getReasonPhrase(),
                    $response->getStatusCode()
                );
            }

            return $this->parseResponse($response);
        } catch (RequestException $exception) {
            throw new ApiResponseErrorException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }
    }

    /**
     * Parse the response from the API.
     *
     * @return BisCompanyDetails[]
     * @throws \JsonException
     * @throws ApiResponseErrorException
     */
    public function parseResponse(ResponseInterface $response): array
    {
        $data = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        if (!is_array($data)) {
            throw new ApiResponseErrorException(
                'Invalid response data',
                $response->getStatusCode()
            );
        }

        if (!isset($data['results']) || !is_array($data['results'])) {
            throw new ApiResponseErrorException(
                'Invalid response data',
                $response->getStatusCode()
            );
        }

        $results = [];

        foreach ($data['results'] as $result) {
            $results[] = $this->mapper->map(BisCompanyDetails::class, $result);
        }

        return $results;
    }
}
