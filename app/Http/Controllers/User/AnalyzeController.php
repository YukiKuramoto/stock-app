<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UseCase\Analyze\IndexAction;
use Illuminate\Http\Request;

class AnalyzeController extends Controller
{
    public function index(indexAction $action)
    {
        $action = $action();
    }
}
