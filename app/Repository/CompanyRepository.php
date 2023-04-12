<?php

namespace App\Repository;

use App\Models\Company;

class CompanyRepository
{
    private Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
    public function getCompanies()
    {
        return $this->company->get();
    }

    public function getCompanyWithStockPrice($secCode)
    {
        return $this->company->with(['stockPrices' => function($query) {
            $query->where('date','>','2022-03-29 00:00:00')->orderBy('date', 'asc');
        }])->where('sec_code', $secCode)->first();
    }

    public function getCompaniesWithStockPrice()
    {
        return $this->company->with(['stockPrices' => function($query) {
            $query->where('date','>','2022-03-29 00:00:00')->orderBy('date', 'desc');
        }])->get();
    }
}