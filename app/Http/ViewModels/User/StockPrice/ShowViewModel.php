<?php

namespace App\Http\ViewModels\User\StockPrice;

use App\UseCase\Stock\Response\ShowActionResponse;


class ShowViewModel
{
    public int $id;

    public int $secCode;

    public string $label;

    public object $stockPrices;

    public function __construct(ShowActionResponse $response)
    {
        $this->id = $response->id;
        $this->secCode = $response->secCode;
        $this->label = $response->label;

        $this->stockPrices = $response->stockPrices->map(function($v) {
            return new StockPriceViewModel($v);
        });
    }
}

?>