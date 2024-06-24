@extends('layouts.master')
@section('title') Admin | Dashboard @endsection
@section('content')
<!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                {{--  <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page" style="padding-left: 500px" >
                            <!-- <h5 class="card-title mb-0">{{ trans('admin.Dashboard'); }}</h5>-->
                        </li>
                    </ol>
                </div>  --}}
            </div>

        </div>
    </div>
    <!-- Start Contentbar -->
    <div class="contentbar">
                <!-- Start row -->
                {{--  <div class="col-14">  --}}
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-6 col-xl-4 mb-32" >
                            <div class="card">
                                <div class="card-body" style="width: 200px; height:120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 60px; height: 80px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-briefcase text-primary hp-text-color-dark-primary-2" style="font-size: 25px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-10">{{$groups}}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-5 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Companies') }}</p>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  ....Box2....   --}}
                        <div class="col-md-6 col-xl-4 mb-32">
                            <div class="card">
                                <div class="card-body" style="width: 200px; height: 120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 48px; height: 48px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-chalkboard-teacher text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-8">{{ $guides }}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Guides') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--  ....Box3....   --}}
                        <div class="col-md-6 col-xl-4 mb-32">
                            <div class="card">
                                <div class="card-body" style="width: 200px; height:120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 48px; height: 48px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-users text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-8">{{ $companyUsers }}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Users') }}</p>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                    </p>
                    <div class="row" >
                        <div class="col-md-6 col-xl-4 mb-32" >
                            <div class="card">
                                <div class="card-body" style="width: 200px; height:120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 48px; height: 48px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-paper-plane  text-primary hp-text-color-dark-primary-2" style="font-size: 25px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-10">{{$request}}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-5 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total New Requests') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  ....Box2....   --}}
                        <div class="col-md-6 col-xl-4 mb-32">
                            <div class="card">
                                <div class="card-body" style="width: 200px; height:120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 48px; height: 48px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-envelope-open  text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-8">{{ $approved }}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-2 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Approved Requests') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--  ....Box3....   --}}
                        <div class="col-md-6 col-xl-4 mb-32">
                            <div class="card">
                                <div class="card-body" style="width: 200px; height:120px;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="bg-primary-4 hp-bg-color-dark-primary badge-secondary rounded-circle" style="width: 48px; height: 48px;">
                                                <!-- Replace the icon with Blade syntax if needed -->
                                                <i class="fas fa-comment-slash text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                                            </span>
                                        </div>
                                        <div class="col pl-0">
                                            <h3 class="mb-4 mt-8">{{ $rejected }}<span class="hp-badge-text ml-8 text-primary"></span></h3>
                                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Rejected Requests') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            {{--  ................   --}}



                    {{--  <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card1">
                            <div class="card-header"  style="text-align: right;
                            padding-left: 50px">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0">{{ trans('admin.groups'); }}</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                <div class="col-md-4"><h3>{{$groups}}</h3></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card2">
                            <div class="card-header"  style="text-align: right;
                            padding-left: 81px ">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">{{ trans('admin.guides'); }}</h5>
                                    </div>
                                    <div class="col-6 d-none">
                                        <ul class="list-inline-group text-right mb-0 pl-0">
                                            <li class="list-inline-item mr-0 font-12">Referrals</li>
                                            <li class="list-inline-item"><input type="checkbox" class="js-switch-performance" checked /></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                    <div class="col-md-4"><h3>{{$guides}}</h3></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card3">
                            <div class="card-header" style="text-align: right;
                            padding-left: 100px ">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <h5 class="card-title mb-0">{{ trans('admin.users'); }}</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                    <div class="col-md-4"><h3>{{$companyUsers}}</h3></div>
                                </div>

                            </div>
                        </div>
                    </div>  --}}
                    <!-- End col -->

                    <!-- Start col -->
                    {{--  <div class="col-md-12 col-lg-12 col-xl-7">
                        <div class="card m-b-30" style=" width: 170%;">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Country Wise Performance</h5>
                            </div>
                            <div class="card-body">
                                <div id="world-map" class="vector-world-map"></div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#6e81dc", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">62%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">USA</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#5fc27e", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>5.5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">83%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">India</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#fcc100", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>4/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">55%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Australia</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#f44455", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>3/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">35%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Argentina</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#72d0fb", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>6.5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">92%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Russia</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#718093", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>2/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">28%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">South Africa</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <p>
                    </p>
                    <div class="row justify-content-center" style="margin-top: 50px;">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card m-b-30" style="height: 250px;">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <div class="main-title">
                                         <h4 class="text-center ">{{trans('admin.Registration Requests') }}</h4>
                                        </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="progress custom-progress mt-2" style="width: 96%;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ $requestPercentage }}%;" aria-valuenow="{{ $requestPercentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($requestPercentage, 2) }}% {{trans('admin.Pending')}}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="progress custom-progress mt-2" style="width: 96%;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: {{ $approvedPercentage }}%;" aria-valuenow="{{ $approvedPercentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($approvedPercentage, 2) }}% {{trans('admin.Approved')}} </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="progress custom-progress mt-2" style="width: 96%;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ $rejectedPercentage }}%;" aria-valuenow="{{ $rejectedPercentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($rejectedPercentage, 2) }}% {{trans('admin.Rejected')}} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 35px;">
                        <div class="col-md-12 col-lg-12 col-xl-17">
                            <div class="card m-b-30" style="height: 400px;">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h4 class="text-center mb-0 mt-auto">{{trans('admin.Company Counts by Country')}}</h4>
                                    <div class="w-100 d-flex justify-content-center">
                                        <canvas id="barChart" style="width: 100%; max-width:700px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
            <!-- End Contentbar -->
    <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var companiesByCountry = @json($companiesByCountry);

                    var labels = companiesByCountry.map(function(company) {
                        return company.country_name;
                    });

                    var data = companiesByCountry.map(function(company) {
                        return company.count;
                    });

                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Companies',
                                data: data,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 0, 0, 0.2)',
                                    'rgba(0, 255, 0, 0.2)',
                                    'rgba(0, 0, 255, 0.2)',
                                    'rgba(255, 255, 0, 0.2)',
                                    'rgba(255, 0, 255, 0.2)',
                                    'rgba(0, 255, 255, 0.2)',
                                    'rgba(128, 128, 128, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 0, 0, 1)',
                                    'rgba(0, 255, 0, 1)',
                                    'rgba(0, 0, 255, 1)',
                                    'rgba(255, 255, 0, 1)',
                                    'rgba(255, 0, 255, 1)',
                                    'rgba(0, 255, 255, 1)',
                                    'rgba(128, 128, 128, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 1
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Company Numbers'
                                    }
                                }],
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Country Name'
                                    }
                                }]
                            }
                        }
                    });
                });
    </script>


@endsection
