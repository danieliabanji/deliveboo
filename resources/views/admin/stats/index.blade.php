@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistiche Ordini</h4>
                    </div>
                    <div class="card-body">
                        <!-- qui puoi inserire la tua tabella o il tuo grafico -->
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- prova --}}
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($totalSalesByDay->pluck('date')->toArray()) !!},
                datasets: [{
                        label: 'Quantità venduta',
                        data: {!! json_encode($totalSalesByDay->pluck('total_quantity')->toArray()) !!},
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        hoverBackgroundColor: 'rgba(255, 99, 132, 0.4)',
                        hoverBorderColor: 'rgba(255, 99, 132, 1)',
                        yAxisID: 'y-axis-sales'
                    },
                    {
                        label: 'Vendite giornaliere in €',
                        data: {!! json_encode($totalSalesByDay->pluck('total_sales')->toArray()) !!},
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
                                beginAtZero: true
                            }
                        },
                        {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            id: 'y-axis-price',
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                }
            }
        });
    </script>
@endsection
