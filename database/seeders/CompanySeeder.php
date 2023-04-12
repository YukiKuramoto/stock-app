<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'companies';
        $this->filename = base_path().'/database/seeds/csv/Companies.csv';
        $this->timestamps = true;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
