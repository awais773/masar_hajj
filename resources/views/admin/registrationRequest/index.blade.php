@extends('layouts.master')
@section('title') Admin | Requests @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.registration_requests');}}</li>
                            </ol>
                        </div>
                    </div>
                 
                </div>          
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">                
                <!-- Start row -->
                <div class="row">
                   
                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">{{__('admin.requests_list')}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">{{__('admin.export_data')}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin.sr_no')}}</th>
                                            <th>{{__('admin.comp_name')}}</th>
                                            <th>{{__('admin.comp_email')}}</th>
                                            <th>{{__('admin.comp_phone')}}</th>
                                            <th>{{__('admin.registration_date')}}</th>
                                            <th>{{__('Description')}}</th>
                                           <th>{{__('pricing plan')}}</th>
                                            <th>{{__('admin.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($registrationRequests) && count($registrationRequests)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($registrationRequests as $registrationRequest)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ $registrationRequest->comp_name }}</td>
                                                <td>{{$registrationRequest->comp_email}}</td>
                                                <td>{{$registrationRequest->comp_phone}}</td>
                                                <td>{{$registrationRequest->registration_date}}</td>
                                                <td>{{$registrationRequest->comp_description}}</td>
                                                <td>{{$registrationRequest->pricing_plan}}</td>
                                                <td>
                                                 <button class="btn btn-success btnDeleteApproved" data-url="{{route('admin.registrationRequest.update',[$registrationRequest->id,1])}}" >Approved</button>
                                                 <button class="btn btn-danger btnDelete" data-url="{{route('admin.registrationRequest.update',[$registrationRequest->id,3])}}" >Reject</button>
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                        <a href="{{route('admin.registrationRequest.delete',$registrationRequest->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
                                                    </div>
                                            
                                                </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

             
<script type="text/javascript">

$('table').on('click', '.btnDeleteApproved', function(e) {
    e.preventDefault();
    var url = $(this).data("url");
    if (confirm("Are you sure you want to approve this company?")) {
        $.ajax({
            url: url,
            type: "GET", // or "POST" depending on your route definition
            data: { status: "approved" }, // data to be sent to the server
            success: function(response) {
                // handle success response
                console.log(response);
                // reload the page or update UI as needed
                location.reload();
            },
            error: function(xhr, status, error) {
                // handle error response
                console.error(error);
            }
        });
    }
});

// Listen for click events on the parent element (replace 'table' with the appropriate selector)
$('table').on('click', '.btnDelete', function(e) {
    e.preventDefault();
    var url = $(this).data("url");
    if (confirm("Are you sure you want to reject this company?")) {
        $.ajax({
            url: url,
            type: "GET", // or "POST" depending on your route definition
            data: { status: "rejected" }, // data to be sent to the server
            success: function(response) {
                // handle success response
                console.log(response);
                // reload the page or update UI as needed
                location.reload();
            },
            error: function(xhr, status, error) {
                // handle error response
                console.error(error);
            }
        });
    }
});

</script>
@endsection