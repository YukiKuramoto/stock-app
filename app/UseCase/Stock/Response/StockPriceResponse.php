<?php

namespace App\UseCase\Stock\Response;

class StockPriceResponse
{
    public int $id;

    public int $company_id;

    public string $date;

    public int $open;

    public int $high;

    public int $low;

    public int $close;

    public int $volume;

    public int | null $shortAvarage;

    public int | null $middleAvarage;

    public int | null $longAvarage;

    public function __construct(object $stockPrice)
    {
        $this->id = $stockPrice->id;
        $this->company_id = $stockPrice->company_id;
        $this->date = $stockPrice->date;
        $this->open = $stockPrice->open;
        $this->high = $stockPrice->high;
        $this->low = $stockPrice->low;
        $this->close = $stockPrice->close;
        $this->volume = $stockPrice->volume;
        $this->shortAvarage = $stockPrice->short_moving_avarage;
        $this->middleAvarage = $stockPrice->middle_moving_avarage;
        $this->longAvarage = $stockPrice->long_moving_avarage;
    }
}