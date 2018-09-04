<?php

namespace App\Http\Controllers;

use App\Service\StocksService;
use App\Http\Resources\StockResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StocksController extends Controller
{
    protected $stocks_service;

    /**
     * Stocks controller contructor
     *
     * @param StocksService $stocks_service
     */
    public function __construct(StocksService $stocks_service)
    {
        $this->stocks_service = $stocks_service;
    }

    /**
     * Stocks index action
     *
     * @return Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return StockResource::collection($this->stocks_service->getStocks());
    }
}
