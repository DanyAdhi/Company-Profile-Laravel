@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumbs', 'Dashboard')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">

    <style>
        .traffic-chart {
            min-height: 335px;
        }
    </style>
@endsection

@section('content')
        <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <a href="{{route('articles.index', ['status' => 'publish'])}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-file-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$data ["publish"]}}</span></div>
                                            <div class="stat-heading">Article Publish</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-12">
                    <a href="{{route('articles.index', ['status'=>'draft'])}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-clipboard"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$data ["draft"]}}</span></div>
                                            <div class="stat-heading">Article Draf</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">298</span></div>
                                        <div class="stat-heading">Visitor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /Widgets -->
        <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Traffic </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <!-- <canvas id="TrafficChart"></canvas>   -->
                                    <div id="traffic-chart" class="traffic-chart"></div>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div>
        <!--  /Traffic -->
@endsection

@section('script')

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            "use strict";
            
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                series: [
                [0, 18000, 33000,  25000,  22000,  30000] ]
            }, {
                low: 0,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                            {
                                label: "Visit",
                                borderColor: "rgba(4, 73, 203,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(4, 73, 203,.5)",
                                data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                            },
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            
        });
    </script>
@endsection