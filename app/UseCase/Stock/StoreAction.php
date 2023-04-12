<?php

namespace App\UseCase\Stock;

use App\Repository\CompanyRepository;
use App\Repository\StockPriceRepository;
use Illuminate\Support\Facades\Log;

class StoreAction
{
    private StockPriceRepository $stockPriceRepository;
    private CompanyRepository $companyRepository;

    private const SHORT_AVARAGE_TERM = 5;

    private const MIDDLE_AVARAGE_TERM = 20;

    private const LONG_AVARAGE_TERM = 55;

    public function __construct(StockPriceRepository $stockPriceRepository, CompanyRepository $companyRepository)
    {
        $this->stockPriceRepository = $stockPriceRepository;
        $this->companyRepository = $companyRepository;
    }

    public function __invoke()
    {
        $companies = $this->companyRepository->getCompanies();
        $this->stockPriceRepository->truncateStockPrice();
        
        $companies->map(function ($company){
            Log::info('start get price: '.$company->label);
            echo('start get price: '.$company->label.PHP_EOL);

            $price = $this->stockPriceRepository->getStockPrice($company->sec_code);
            $price = $this->formatData($company->id, $price);
            $this->stockPriceRepository->storeStockPrice($price);
            
            Log::info('end get price: '.$company->label);
            echo('end get price: '.$company->label.PHP_EOL);
        });
    }

    private function formatData($id, $price)
    {
        foreach($price as $i => $p){
            $price[$i] += ['company_id' => $id];
            $price[$i] += ['short_moving_average' => $this->calcMovingAvarage($i, self::SHORT_AVARAGE_TERM, $price)];
            $price[$i] += ['middle_moving_average' => $this->calcMovingAvarage($i, self::MIDDLE_AVARAGE_TERM, $price)];
            $price[$i] += ['long_moving_average' => $this->calcMovingAvarage($i, self::LONG_AVARAGE_TERM, $price)];
            $price[$i] += ['updated_at' => date('Y-m-d H:i:s')];
        }
        
        return $price;
    }

    private function calcMovingAvarage(int $index, int $term, array $stockPrices)
    {
        $prices = 0;
        $firstIndex = $index - $term + 1;

        if($firstIndex < 0) {
            return null;
        }
        
        for($i = $firstIndex; $i <= $index; $i++){
            $prices += $stockPrices[$i]['close'];
        }

        return round($prices / $term, 2);
    }
}

?>