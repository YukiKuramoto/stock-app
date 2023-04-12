<?php

namespace App\UseCase\Stock;

use App\Repository\CompanyRepository;
use App\UseCase\Stock\Response\ShowActionResponse;

class ShowAction
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function __invoke($secCode)
    {
        $company = $this->companyRepository->getCompanyWithStockPrice($secCode);
        
        return new ShowActionResponse($company);
    }
}