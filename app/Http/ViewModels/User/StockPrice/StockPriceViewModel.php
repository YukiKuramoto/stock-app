<?php

namespace App\Http\ViewModels\User\StockPrice;

use App\UseCase\Stock\Response\StockPriceResponse;

class StockPriceViewModel
{
    public string $date;

    public int $price;

    public int|null $shortAvarage;

    public int|null $middleAvarage;

    public int|null $longAvarage;

    public function __construct(StockPriceResponse $stockPrice)
    {
        $this->date = date('Y-m-d', strtotime($stockPrice->date));
        $this->price = $stockPrice->close;
        $this->shortAvarage = $stockPrice->shortAvarage;
        $this->middleAvarage = $stockPrice->middleAvarage;
        $this->longAvarage = $stockPrice->longAvarage;
    }
}

?>