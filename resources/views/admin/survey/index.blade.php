@extends('layouts.master')
@section('title') Company | Survey @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
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
                            <a href="{{route('company.survey.add')}}" class="btn btn-primary">{{ trans('admin.new_survey');}}</a>
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
                                <h5 class="card-title">{{__('admin.survey_list')}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">{{__('admin.export_data')}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('admin.company_id');}}</th>
                                            <th>{{ trans('admin.question');}}</th>
                                            <th>{{ trans('admin.choose');}}</th>
                                            <th>{{ trans('admin.name');}}</th>
                                            <th>{{ trans('admin.notification_groups');}}</th>
                                            <th>{{ trans('admin.user_count');}}</th>
                                            <th>{{ trans('admin.company_action');}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($surveys) && count($surveys)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($surveys as $survey)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ Helper::get_localizedDefault($survey->question)}}</td>
                                                <td>{{ Helper::get_localizedDefault($survey->choices)}}</td>
                                                <td>{{ Helper::get_localizedDefault($survey->company->name)}}</td>
                                                @php
                                                    $tempArray=[];
                                                    if($survey->group_id){
                                                            $groupName=$survey->group_id;

                                                            $groups =\App\Models\Group::whereIn('id',json_decode($groupName))->get();
                                                            $groups_by_company_array = Helper::group_array_by(@$groups, "company_name");
                                                            $keys = array_keys($groups_by_company_array);
                                                            for ($i = 0; $i < count($keys); $i++) {
                                                                foreach ($groups_by_company_array[$keys[$i]] as $group) {
                                                                    $tempArray[]=Helper::get_localizedDefault($group["name"])."@";
                                                                }
                                                            }
                                                            $groupName=str_replace("@","",json_encode($tempArray));
                                                    }else{
                                                            $groupName='';
                                                    }

                                                    unset($tempArray);
                                                    $surveyCount= \App\Models\SurveySubmit::where('survey_id',$survey->id)->count();
                                                @endphp
                                                <td>{{ $groupName}}</td>


                                                {{--  <td><a href="{{ url('company/survey/detail/'.$survey->id) }}" class="btn btn-success" target="_blank" style="cursor: pointer;">{{ $surveyCount }}</a></td>  --}}
                                                <td><a href="{{ url('company/survey/detail/'.$survey->id) }}" class="btn amazing-success-btn" target="_blank" style="cursor: pointer;">{{ $surveyCount }}</a></td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                {{--  <a href="{{route('company.survey.edit',$survey->id)}}" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.survey.delete',$survey->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>  --}}
                                                                <a href="{{route('company.survey.edit',$survey->id)}}" class="amazing-edit-btn" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.survey.delete',$survey->id)}}" class="amazing-delete-btn" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
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
