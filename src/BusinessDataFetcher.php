<?php

namespace Ivuorinen\BusinessDataFetcher;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Ivuorinen\BusinessDataFetcher\Dto\BisCompanyDetails;
use Ivuorinen\BusinessDataFetcher\Exceptions\ApiResponseErrorException;
use Psr\Http\Message\ResponseInterface;

/**
 * Fetches and returns business data from avoindata
 */
class BusinessDataFetcher
{
    /**
     * @var \GuzzleHttp\Client
     */
    private Client $httpClient;

    /**
     * BusinessDataFetcher constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://avoindata.prh.fi',
            'timeout'  => 2,
        ]);
    }

    /**
     * Fetch Business Information.
     *
     * @return BisCompanyDetails[] $response_data
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     */
    public function getBusinessInformation(string $businessId): array
    {
        // Set request variables
        $requestUrl    = '/bis/v1';

        // Get the business data
        try {
            $uri      = $requestUrl . '/' . $businessId;
            $response = $this->httpClient->get($uri);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseErrorException(
                    $response->getReasonPhrase(),
                    $response->getStatusCode()
                );
            }

            $response_data = $this->parseResponse($response);
        } catch (RequestException $exception) {
            throw new ApiResponseErrorException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }

        return $response_data;
    }

    /**
     * Parse the response from the API.
     *
     * @return BisCompanyDetails[]
     * @throws \JsonException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @throws \Ivuorinen\BusinessDataFetcher\Exceptions\ApiResponseErrorException
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

        if (!isset($data['results'])) {
            throw new ApiResponseErrorException(
                'Invalid response data',
                $response->getStatusCode()
            );
        }

        $results = [];

        foreach ($data['results'] as $result) {
            $results[] = new BisCompanyDetails($result);
        }

        return $results;
    }
}
