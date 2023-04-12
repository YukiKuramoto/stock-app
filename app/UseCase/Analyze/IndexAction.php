<?php

namespace App\UseCase\Analyze;

use App\Repository\CompanyRepository;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    private CompanyRepository $companyRepository;

    private $companies;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function __invoke()
    {
        $this->companies = $this->companyRepository->getCompaniesWithStockPrice();
        
        $list = $this->companies->map(function($v){
            for($i = 0; $i < 30; $i++){
                dd($v->stockPrices[$i]);
            }
        });
    }
}