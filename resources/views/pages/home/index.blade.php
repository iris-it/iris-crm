@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @if(!empty($data['orders']))
                            <h3>{{$orders->count()}}</h3>
                            <p>{{trans_choice('app.general:orders', $orders->count())}}</p>
                        @else
                            <h3>0</h3>
                            <p>{{trans('app.dashboard:no-order')}}</p>

                        @endif
                    </div>
                    <div class="icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <a href="{{ action('OrderController@index') }}" class="small-box-footer">{{trans('app.general:access')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">

                        @if(!empty($data['orders']))
                            <h3>{{$convertedAccounts->count()}}</h3>

                            <p>{{trans_choice('app.dashboard:converted-accounts', $convertedAccounts->count())}}</p>
                        @else
                            <h3>0</h3>
                            <p>{{trans('app.dashboard:no-conversion')}}</p>

                        @endif
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="{{ action('AccountController@index') }}" class="small-box-footer">{{trans('app.general:access')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">

                        @if(!empty($data['$invoices']))
                            <h3>{{$invoices->count()}}</h3>

                            <p>{{trans_choice('app.dashboard:invoices', $invoices->count())}}</p>
                        @else
                            <h3>0</h3>
                            <p>{{trans('app.dashboard:no-invoice')}}</p>

                        @endif
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <a href="{{ action('InvoiceController@index') }}" class="small-box-footer">{{trans('app.general:access')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        @if(!empty($data['$quotes']))
                            <h3>{{$quotes->count()}}</h3>

                            <p>{{trans_choice('app.dashboard:quotes', $quotes->count())}}</p>
                        @else
                            <h3>0</h3>
                            <p>{{trans('app.dashboard:no-quote')}}</p>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <a href="{{ action('QuoteController@index') }}" class="small-box-footer">{{trans('app.general:access')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title text-uppercase">{{trans('app.dashboard:sales-chart-title')}}</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="lineChart" width="600" height="500"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <h4 class="text-center text-uppercase">
                                    <strong>{{ trans('app.dashboard:other-stats') }}</strong>
                                </h4>


                                <div class="progress-group">
                                    <canvas id="doughtnutChart" width="500" height="200"></canvas>

                                </div>
                                <br>
                                <br>
                                <div class="progress-group">
                                    <canvas id="doughtnutChartTwo" width="500" height="200"></canvas>

                                </div>

                                <!-- /.progress-group -->

                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">

        $(document).ready(function () {

            // Chart.js Chart, for more examples you can check out http://www.chartjs.org/docs
            var initDashChartJS = function () {
                // Get Chart Container
                var $dashChartLinesCon = $('#lineChart');
                var $dashChartDoughnutCon = $('#doughtnutChart');
                var $dashChartDoughnutConTwo = $('#doughtnutChartTwo');

                // Lines Chart Data
                var $dashChartLinesData = {
                    labels: JSON.parse('{!! Stats::getDaysInMonth() !!}'),
                    datasets: JSON.parse('{!! Stats::generateRevenuesByMonth($invoices) !!}')
                };

                var $doughnutChartData = {
                    labels: ["Factures indépendantes", "Converties depuis un devis"],
                    datasets: JSON.parse('{!! Stats::generateConvertedInvoices($invoices) !!}')
                };

                var $doughnutChartDataTwo = {
                    labels: ["Produits vendus", "Services vendus"],
                    datasets: JSON.parse('{!! Stats::generateProductsServicesRate($invoices) !!}')
                };

                // Init Lines Chart
                new Chart.Line($dashChartLinesCon, {
                    data: $dashChartLinesData,
                    options: {
                        scaleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
                        scaleFontColor: '#999',
                        scaleFontStyle: '600',
                        tooltipTitleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
                        tooltipCornerRadius: 3,
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            labels: {
                                fontColor: '#494444',
                                fontSize: 14,
                                fontStyle: "bold"
                            }
                        }
                    }
                });

                new Chart($dashChartDoughnutCon, {
                    type: 'doughnut',
                    data: $doughnutChartData,
                    options: {
                        rotation: -1 * Math.PI,
                        legend: {
                            position: "bottom",
                            labels: {
                                fontColor: '#494444',
                                fontSize: 14,
                                fontStyle: "bold"
                            }
                        }

                    }
                });

                new Chart($dashChartDoughnutConTwo, {
                    type: 'doughnut',
                    data: $doughnutChartDataTwo,
                    options: {
                        rotation: -1 * Math.PI,
                        legend: {
                            position: "bottom",
                            labels: {
                                fontColor: '#494444',
                                fontSize: 14,
                                fontStyle: "bold"
                            }
                        }

                    }
                });


            };

            initDashChartJS();

        });

    </script>


@endsection

