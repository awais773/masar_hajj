@extends('layouts.master')
@section('title') Company | Dua @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.dua');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.dua.add')}}" class="btn btn-primary">{{ trans('admin.new_dua');}}</a>
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
                                <h5 class="card-title">{{__('admin.dua_list')}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">{{__('admin.export_data')}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin.sr_no')}}</th>
                                            <th>{{__('admin.title')}}</th>
                                            <th>{{__('admin.name')}}</th>
                                            <th>{{__('admin.icon')}}</th>
                                            <th>{{__('admin.Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($duas) && count($duas)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($duas as $dua)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ Helper::get_localizedDefault($dua->title)}}</td>
                                                <td>{{ Helper::get_localizedDefault($dua->company->name)}}</td>
                                                <td><a href="{{$dua->image}}" target="__blank"><img src="{{$dua->image}}" width="100" height="50"></a></td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{route('company.dua.edit',$dua->id)}}" class="rounded tabledit-edit-button btn btn-sm btn-info mr-2 px-3" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.dua.delete',$dua->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
                                                                <!-- <button type="button" class="tabledit-delete-button btn btn-sm btn-danger deleteDataBtn" data-href="{{route('admin.dua.delete',$dua->id)}}" data-toggle="modal" data-target="#deleteData"> <span class="ti-trash align-middle"></span></button> -->
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
@endsection