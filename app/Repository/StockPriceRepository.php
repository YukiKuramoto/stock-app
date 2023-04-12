<?php

namespace App\Repository;

use App\Models\StockPrice;
use Carbon\Carbon;

class StockPriceRepository
{
    private StockPrice $stockPrice;

    public function __construct(StockPrice $stockPrice)
    {
        $this->stockPrice = $stockPrice;
    }

    public function getStockPrice($code)
    {
	    $path = dirname(__FILE__) . "/StockPriceRepository.py";
        $star_date = $this->getStartDate();
        $end_date = $this->getEndDate();
        $command =  "python3 " . $path . " $code" .  " $star_date" . " $end_date";
	    exec($command, $output);

        $output = json_decode($output[0]);
        
        foreach($output as $v){
            $tmp = array(
                'date' => date('Y-m-d', strtotime($v->date)),
                'open' => $v->open,
                'high' => $v->high,
                'low' => $v->low,
                'close' => $v->close,
                'volume' => $v->volume,
            );
            $res[] = $tmp;
        }

        return $res;
    }

    public function storeStockPrice($price)
    {
        $this->stockPrice->insert($price);
    }

    public function truncateStockPrice()
    {
        $this->stockPrice->truncate();
    }

    private function getStartDate()
    {
        return date('Y-m-d',strtotime('-3 year'));
    }

    private function getEndDate()
    {
        return date('Y-m-d');
    }
}

?>