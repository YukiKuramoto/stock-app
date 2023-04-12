import Chart from 'chart.js/auto';

$(() => {
    let stockPrices = $('#contents').data().contents;
    let labels = [];
    let prices = [];
    let shortAvgs = [];
    let midAvgs = [];
    let longAvgs = [];

    stockPrices.map(v => {
        console.log(v);
        labels.push(v.date);
        prices.push(v.price);
        shortAvgs.push(v.shortAvarage);
        midAvgs.push(v.middleAvarage);
        longAvgs.push(v.longAvarage);
    });

    const options = {};

    let borderWidth = 1.5;

    const data = {
        labels: labels,
        datasets: [
            {
                label: '株価',
                data: prices,
                pointRadius: 0,
                borderWidth: borderWidth,
            },
            {
                label: '短期移動平均線',
                data: shortAvgs,
                pointRadius: 0,
                borderWidth: borderWidth,
            },
            {
                label: '中期移動平均線',
                data: midAvgs,
                pointRadius: 0,
                borderWidth: borderWidth,
            },
            {
                label: '長期移動平均線',
                data: longAvgs,
                pointRadius: 0,
                borderWidth: borderWidth,
            }
        ]
    }

    const config = { type: 'line', data: data, options: options};
    const ctx = $('#chart');
    new Chart(ctx, config);
});