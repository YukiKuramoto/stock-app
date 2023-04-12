@extends('layouts.app')
@section('body')
<div>
    <div class="chart-wrapper">
        <div class="chart-area">
            <h1>{{ $company->label }}</h1>
            <canvas id="chart" height="200"></canvas>
        </div>
    </div>
</div>
<script id="contents" data-contents="{{ json_encode($company->stockPrices) }}"></script>
<style>
    .chart-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .chart-area {
        width: 70%;
    }
</style>
@vite('resources/js/user/stock_price/show.js')
@endsection