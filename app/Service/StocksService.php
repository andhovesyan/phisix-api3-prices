<?php

namespace App\Service;

use App\Libs\Phisix\PhisixAPI;
use App\Models\Stock;

use Illuminate\Support\Collection;

class StocksService
{
    protected $phisix_api;

    /**
     * Stocks service constructor
     *
     * @param App\Libs\Phisix\PhisixAPI $phisix_api
     */
    public function __construct(PhisixAPI $phisix_api)
    {
        $this->phisix_api = $phisix_api;
    }

    /**
     * Get stocks collection
     *
     * @return Illuminate\Support\Collection
     */
    public function getStocks(): Collection
    {
        $data = $this->phisix_api->fetchStocks();

        return collect(array_map(function ($stock) {
            return new Stock($stock);
        }, $data));
    }
}
