<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\User\StockPrice\ShowViewModel;
use App\UseCase\Stock\ShowAction;

class StockPriceController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(ShowAction $action, string $id)
    {
        $response = $action(secCode: $id);

        $response = new ShowViewModel($response);

        return view('user.stock_price.show', ['company' => $response]);
    }
}
