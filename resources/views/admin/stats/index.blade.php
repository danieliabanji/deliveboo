@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistiche ordini</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Totali vendite</h5>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-secondary"
                                                id="daily-button">Giornaliero</button>
                                            <button type="button" class="btn btn-secondary"
                                                id="weekly-button">Settimanale</button>
                                            <button type="button" class="btn btn-secondary"
                                                id="monthly-button">Mensile</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Vendite prodotti</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="product-sales-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- prova --}}
    <script>
        var dailyButton = document.getElementById('daily-button');
        var weeklyButton = document.getElementById('weekly-button');
        var monthlyButton = document.getElementById('monthly-button');
        var dailySales = {!! json_encode($totalSalesByDay) !!};
        var weeklySales = {!! json_encode($totalSalesByWeek) !!};
        var monthlySales = {!! json_encode($totalSalesByMonth) !!};
        var productLabels = {!! json_encode($productLabels) !!};
        var productQuantities = {!! json_encode($productQuantities) !!};

        // Initialize chart with daily sales data
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dailySales.map(function(item) {
                    return item.date;
                }),
                datasets: [{
                        label: 'Quantità venduta',
                        data: dailySales.map(function(item) {
                            return item.total_quantity;
                        }),
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        hoverBackgroundColor: 'rgba(255, 99, 132, 0.4)',
                        hoverBorderColor: 'rgba(255, 99, 132, 1)',
                        yAxisID: 'y-axis-sales'
                    },
                    {
                        label: 'Guadagno €',
                        data: dailySales.map(function(item) {
                            return item.total_sales;
                        }),
                        borderWidth: 1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        hoverBackgroundColor: 'rgba(54, 162, 235, 0.4)',
                        hoverBorderColor: 'rgba(54, 162, 235, 1)',
                        yAxisID: 'y-axis-price'
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                            type: 'linear',
                            display: true,
                            position: 'left',
                            id: 'y-axis-sales',
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return value.toLocaleString("it-IT");
                                }
                            }
                        },
                        {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            id: 'y-axis-price',
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return '€ ' + value.toFixed(2);
                                }
                            }
                        }
                    ]
                }
            }
        });

        var ctx = document.getElementById('product-sales-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($productLabels) !!},
                datasets: [{
                    label: 'Sales Quantity',
                    data: {!! json_encode($productQuantities) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // var productSalesChart = document.getElementById('product-sales-chart').getContext('2d');
        // var myPieChart = new Chart(productSalesChart, {
        //     type: 'doughnut',
        //     data: {
        //         labels: productLabels,
        //         datasets: [{
        //             data: productQuantities,
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)',
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)',
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         legend: {
        //             position: 'right',
        //         },
        //         title: {
        //             display: true,
        //             text: 'Quantità venduta per prodotto'
        //         },
        //         animation: {
        //             animateScale: true,
        //             animateRotate: true
        //         }
        //     }
        // });

        dailyButton.addEventListener('click', function() {
            updateChartData(myChart, dailySales.map(function(item) {
                    return item.date;
                }),
                [dailySales.map(function(item) {
                        return item.total_quantity;
                    }),
                    dailySales.map(function(item) {
                        return item.total_sales;
                    })
                ]);
        });

        weeklyButton.addEventListener('click', function() {
            updateChartData(myChart, weeklySales.map(function(item) {
                    return 'Week ' + item.week;
                }),
                [weeklySales.map(function(item) {
                        return item.total_quantity;
                    }),
                    weeklySales.map(function(item) {
                        return item.total_sales;
                    })
                ]);
        });

        monthlyButton.addEventListener('click', function() {
            updateChartData(myChart, monthlySales.map(function(item) {
                    return item.month;
                }),
                [monthlySales.map(function(item) {
                        return item.total_quantity;
                    }),
                    monthlySales.map(function(item) {
                        return item.total_sales;
                    })
                ]);
        });

        function updateChartData(chart, labels, data) {
            chart.data.labels = labels;
            chart.data.datasets[0].data = data[0];
            chart.data.datasets[1].data = data[1];
            chart.update();
        }
    </script>
@endsection
