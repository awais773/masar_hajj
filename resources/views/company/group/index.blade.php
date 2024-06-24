@extends('layouts.master')
@section('title') Company | Group @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.groups');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.group.add')}}" class="btn btn-primary">{{ trans('admin.group_addnew');}}</a>
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
                                <h5 class="card-title">Group List</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('admin.group_id');}}</th>
                                            <th>{{ trans('admin.group_name');}}</th>
                                            <th>{{ trans('admin.group_company');}}</th>
                                            <th>{{ trans('admin.group_active');}}</th>
                                            <th>{{ trans('admin.group_action');}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($groups) && count($groups)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach($groups as $group)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ Helper::get_localizedDefault($group->name)}}</td>
                                                <td>{{ Helper::get_localizedDefault($group->company->name)}}</td>
                                                <td>
                                                    @if (($group->active == 1))
                                                    <span class="badge bg-green">Yes</span>
                                                    @else
                                                    <span class="badge bg-red">No</span>
                                                    @endif
                                                </td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                {{--  <a href="{{route('company.group.edit',$group->id)}}" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.group.delete',$group->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>  --}}
                                                                <a href="{{route('company.group.edit',$group->id)}}" class="amazing-edit-btn" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.group.delete',$group->id)}}" class="amazing-delete-btn" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
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
