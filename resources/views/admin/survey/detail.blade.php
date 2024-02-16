@extends('layouts.master')
@section('title') Company | Survey @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.survey');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.survey')}}" class="btn btn-primary">{{ trans('admin.survey');}}</a>
                        </div>                        
                    </div>
                    
                </div>          
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">                
                <!-- Start row -->
                <h3 class="text-center">{{__('admin.question')}}: <?= Helper::get_localizedDefault($surveys->question)  ?></h3>
                <div class="row">
              
                    <!-- Start col -->
                    <!-- Start col -->
                    <div class="col-lg-6">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <!-- <h5 class="card-title">Distributed Series</h5> -->
                            </div>
                            <div class="card-body">
                                
                            <div id="chartist-distributed-series" class="ct-chart ct-golden-section chartist-distributed-series"></div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-6">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <!-- <h5 class="card-title">Simple Pie Chart</h5> -->
                            </div>
                            <div class="card-body">
                            <div id="chartist-simple-pie-chart" class="ct-chart ct-golden-section chartist-simple-pie-chart"></div>
                            </div>
                        </div>
                    </div>

                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
             <!-- Chartist Chart JS -->
     <script src="{{asset('assets/plugins/chartist-js/chartist.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chartist-js/chartist-plugin-tooltip.min.js')}}"></script>
            <script>
                /* -- Chartistjs - Simple Pie Chart -- */
      var data = {
        series: {{$countdata}}
      };
      var sum = function(a, b) { return a + b };
      new Chartist.Pie('#chartist-simple-pie-chart', data, {
        labelInterpolationFnc: function(value) {
          return Math.round(value / data.series.reduce(sum) * 100) + '%';
        }
      });
        /* -- Chartistjs - Distributed Series Chart -- */
        new Chartist.Bar('#chartist-distributed-series', {
        labels: {!! $labeldata !!},
        series: {{$countdata}}
      }, {
        axisY: {
        onlyInteger: true
    },
        distributeSeries: true,
        plugins: [
          Chartist.plugins.tooltip()
        ]
      });
    </script>

@endsection