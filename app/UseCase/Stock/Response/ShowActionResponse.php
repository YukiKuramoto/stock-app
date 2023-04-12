<?php

namespace App\UseCase\Stock\Response;

class ShowActionResponse
{
    public object $company;

    public int $id;

    public string $secCode;

    public string $label;

    public object $stockPrices;

    public function __construct(object $company)
    {
        $this->id = $company->id;
        $this->secCode = (string) $company->sec_code;
        $this->label = $company->label;

        $this->stockPrices = $company->stockPrices->map(function($v) {
            return new StockPriceResponse($v);
        });
    }
}