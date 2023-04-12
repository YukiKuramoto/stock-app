<?php

namespace App\Console\Commands;

use App\UseCase\Stock\StoreAction;
use Illuminate\Console\Command;

class GetStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-stock-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(StoreAction $storeAction): void
    {
        $storeAction();
    }
}
