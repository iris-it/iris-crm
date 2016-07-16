@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$orders->count()}}</h3>

                        <p>{{trans_choice('app.general:orders', $orders->count())}}</p>
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
                        <h3>{{$convertedAccounts->count()}}</h3>

                        <p>{{trans_choice('app.dashboard:converted-accounts', $convertedAccounts->count())}}</p>
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
                        <h3>{{$invoices->count()}}</h3>

                        <p>{{trans_choice('app.dashboard:invoices', $invoices->count())}}</p>
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
                        <h3>{{$quotes->count()}}</h3>

                        <p>{{trans_choice('app.dashboard:quotes', $quotes->count())}}</p>
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
                                <p class="text-center">
                                    <strong>{{ trans('app.dashboard:other-stats') }}</strong>
                                </p>

                                <div class="progress-group">
                                    <canvas id="doughtnutChart" width="500" height="200"></canvas>

                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Complete Purchase</span>
                                    <span class="progress-number"><b>310</b>/400</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="progress-number"><b>480</b>/800</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Send Inquiries</span>
                                    <span class="progress-number"><b>250</b>/500</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                    </div>
                                </div>
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

                // Lines Chart Data
                var $dashChartLinesData = {
                    labels: JSON.parse('{!! Stats::getDaysInMonth() !!}'),
                    datasets: JSON.parse('{!! Stats::generateRevenuesByMonth($invoices) !!}')
                };

                var $doughnutChartData = {
                    labels : ["Factures indépendantes", "Factures converties depuis un devis"],
                    datasets: JSON.parse('{!! Stats::generateConvertedInvoices($invoices) !!}')
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
                        responsive: true
                    }
                });

                new Chart($dashChartDoughnutCon, {
                    type: 'doughnut',
                    data: $doughnutChartData,
                    options : {
                        rotation : -1 * Math.PI,

                    }
                });


            };

            initDashChartJS();

        });

    </script>


@endsection

