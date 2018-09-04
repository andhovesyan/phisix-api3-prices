<?php

namespace App\Libs\Phisix;

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;

/**
 * Custom class to work with Phisix API
 */
class PhisixAPI
{
    protected $client;

    /**
     * Phisix API constructor
     */
    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'http://phisix-api3.appspot.com',
            'timeout' => 30000,
        ]);
    }

    /**
     * Fetch all stocks data
     *
     * @return array Stocks array
     */
    public function fetchStocks(): array
    {
        $response = $this->client->get('/stocks.json');
        return json_decode($response->getBody(), true)['stock'];
    }
}
