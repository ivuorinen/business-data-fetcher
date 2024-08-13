<?php

namespace Ivuorinen\BusinessDataFetcher;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Ivuorinen\BusinessDataFetcher\Dto\BisCompanyDetails;
use Ivuorinen\BusinessDataFetcher\Exceptions\ApiResponseErrorException;

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
     * @param string $businessId
     *
     * @return array $response_data
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     */
    public function getBusinessInformation(string $businessId): array
    {
        // Set request variables
        $requestUrl    = '/bis/v1';
        $response_data = [];

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

            $response_data = $this->parse_response($response);
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
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array
     * @throws \JsonException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function parse_response(\Psr\Http\Message\ResponseInterface $response): array
    {
        $data = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $results = [];

        foreach ($data['results'] as $result) {
            $results[] = new BisCompanyDetails($result);
        }

        return $results;
    }
}
