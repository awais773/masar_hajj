@extends('layouts.master')
@section('title') Company | Residence @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.location');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.residence.add')}}" class="btn btn-primary">{{ trans('admin.add_hotel');}}</a>
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
                                <h5 class="card-title">Residence List</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('admin.hotel_id');}}</th>
                                                <th>{{ trans('admin.hotel_type');}}</th>
                                                <th>{{ trans('admin.hotel_name');}}</th>
                                                <th>{{ trans('admin.hotel_mobile');}}</th> 
                                                <!--<th>Company</th>-->
                                                <th>{{ trans('admin.guide_active');}}</th> 
                                                <th>{{ trans('admin.guide_action');}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($locations) && count($locations)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($locations as $location)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$location->type}}</td>
                                                <td>{{ Helper::get_localizedDefault($location->name)}}</td>
                                                
                                                <td>{{ $location->mobile}}</td>
                                                <td>
                                                @if($location->active==1)
                                                <span class="badge bg-green">Yes</span>
                                                @else 
                                                <span class="badge bg-red">No</span>
                                                @endif 
                                                </td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{route('company.residence.edit',$location->id)}}" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.residence.delete',$location->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
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
                                    @if($locations->total() > 0)
                                    {{ $locations->links() }}
                                @endif    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
@endsection