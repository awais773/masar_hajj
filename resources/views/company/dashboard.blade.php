@extends('layouts.master')
@section('title') {{__('admin.companies')}} | {{__('admin.Dashboard')}} @endsection
@section('content')
 <!-- Start Breadcrumbbar -->
 {{--  <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title"  style="text-align: center; padding-left: 300px" >{{__('admin.company_dashboard')}}</h4>
                    </div>
                </div>
 </div>  --}}
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->
            <div class="contentbar">
                {{--  <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card1">
                            <div class="card-header" style="text-align: right;
                            padding-left: 50px ">
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
                            <div class="card-header" style="text-align: right;
                            padding-left: 50px ">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0">{{ trans('admin.guides'); }}</h5>
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
                            padding-left: 50px ">
                                <div class="row align-items-center">
                                    <div class="col-7">
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
                    </div>
                    <!-- End col -->

                </div>  --}}
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
                                        <p class="hp-p1-body mb-5 text-black-80 hp-text-color-dark-30">{{ trans('admin.Total Groups') }}</p>
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
                   {{--  <div>
                    <canvas id="myChart"></canvas>
                </div>  --}}
                <div class="row justify-content-center" style="margin-top: 35px;">
                    <div class="col-md-12 col-lg-12 col-xl-17">
                        <div class="card m-b-30" style="height: 400px;">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h4 class="text-center mb-0 mt-auto">{{trans('admin.User Count by Month')}}</h4>
                                <div class="w-100 d-flex justify-content-center">
                                    <canvas id="barChart" style="width: 100%; max-width:700px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
            </div>

            <script>
                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'User Count',
                            data: @json($values),
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
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
@endsection
