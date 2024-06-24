{{-- @extends('layouts.master')
@section('title') Company | Survey @endsection
@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ trans('admin.new_survey'); }}</li>
</ol>
</div>
</div>
<div class="col-md-4 col-lg-4">
    <div class="widgetbar">
        <a href="{{route('company.survey')}}" class="btn btn-primary">{{ __('admin.survey') }}</a>
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
                    <h5 class="card-title">{{ trans('admin.new_survey');}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('company.survey.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <?php
                        $NameExt = 'question_';
                        $stringValues = '';
                        ?>
                        <div class="form-group">
                            <label>{{ trans('admin.question');}}</label>
                            @include('comman.tab')
                        </div>

                        <?php
                        $NameExt = 'choose_';
                        $stringValues = '';
                        ?>
                        <div class="form-group">
                            <label>{{ trans('admin.choose');}}</label>
                            @include('comman.tab')
                        </div>
                        <div class="form-group">
                            <label>{{ trans('admin.notification_groups');}} <span style="color: red;">*</span> </label>
                            <?php $selectedGroupsString = '';
                            $crtlName = 'selectedgroups[]';
                            $crtlId = 'selectedgroups';
                            $placeHolder = trans('admin.notification_selectgroups');
                            $isMuliple = true;
                            ?>
                            @include('comman.get-comapny-groups')
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block font-18">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection --}}
@extends('layouts.master')
@section('title')
    Company | Survey
@endsection
@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.new_survey') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('company.survey') }}" class="btn btn-primary">{{ __('admin.survey') }}</a>
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
                        <h5 class="card-title">{{ trans('admin.new_survey') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.survey.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <?php
                                $NameExt = 'question_';
                                $stringValues = '';
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('admin.question') }}</label>
                                        @include('comman.tab')
                                    </div>
                                </div>
                                <?php
                                $NameExt = 'choose_';
                                $stringValues = '';
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('admin.choose') }}</label>
                                        <div id="choices-container">
                                            @php
                                                $languages = Helper::getLanguages();

                                                $NameExt =
                                                    !empty($NameExt) && $NameExt != null && $NameExt
                                                        ? $NameExt
                                                        : 'local_';

                                                $isTextarea =
                                                    !empty($isTextarea) && $isTextarea != null && $isTextarea
                                                        ? $isTextarea
                                                        : false;
                                                $i = 1;
                                            @endphp
                                            <div class="choice-item card m-b-3">
                                                <div class="card-body panel with-nav-tabs panel-default">
                                                    <ul class="nav nav-tabs panel-heading" id="defaultTab" role="tablist">
                                                        @foreach ($languages as $language)
                                                            @php
                                                                $code = $language->code;
                                                            @endphp
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $i == 1 ? 'active' : '' }}"
                                                                    id="#tab_{{ $NameExt }}_{{ $i }}-tab"
                                                                    data-toggle="tab"
                                                                    href="#tab_{{ $NameExt }}_{{ $i }}"
                                                                    role="tab" aria-controls="{{ $language->name }}"
                                                                    aria-selected="{{ $i == 0 ? 'true' : 'false' }}">{{ $language->name }}
                                                                </a>
                                                            </li>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content" id="defaultTabContent">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($languages as $language)
                                                            <div class="tab-pane fade show {{ $i == 1 ? 'active' : '' }}"
                                                                id="tab_{{ $NameExt }}_{{ $i }}"
                                                                role="tabpanel"
                                                                aria-labelledby="{{ $language->name }}-tab">
                                                                <?php if ($isTextarea != null && $isTextarea) { ?>
                                                                <textarea id="tinymce-{{ $code }}" name="{{ $NameExt }}{{ $code }}"
                                                                    class="form-control tinymce-editor">
                                                        {{ Helper::get_localizedDefault($stringValues, $code) }}
                                                        </textarea>
                                                                <?php } else { ?>
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        name="choose[0][{{ $language->code }}]"
                                                                        class="form-control"
                                                                        value="{{ Helper::get_localizedDefault($stringValues, $code) }}">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" id="add-choice" class="btn btn-primary btn-sm rounded-circle">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('admin.notification_groups') }} <span style="color: red;">*</span>
                                        </label>
                                        <?php $selectedGroupsString = '';
                                        $crtlName = 'selectedgroups[]';
                                        $crtlId = 'selectedgroups';
                                        $placeHolder = trans('admin.notification_selectgroups');
                                        $isMuliple = true;
                                        ?>
                                        @include('comman.get-comapny-groups')
                                    </div>
                                </div>
                            </div>
                            <div class="form-container" style="text-align: right;">
                                <button type="submit" class="beautiful-button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let choiceCount = 1;

        $('#add-choice').click(function() {
            const languages = @json($languages);
            let newChoiceHtml = `<div class="choice-item card m-b-3 mt-3 p-3 " data-index="${choiceCount}">
                                    <ul class="nav nav-tabs panel-heading" id="defaultTab" role="tablist">`;
            languages.forEach(function(language, index) {
                newChoiceHtml += `
                                                        <li class="nav-item">
                                                            <a class="nav-link ${index === 0 ? 'active' : ''}"
                                                            id="tab_choose_${choiceCount}_${index + 1}-tab"
                                                            data-toggle="tab"
                                                            href="#tab_choose_${choiceCount}_${index + 1}"
                                                            role="tab"
                                                            aria-controls="${language.name}"
                                                            aria-selected="${index === 0 ? 'true' : 'false'}">
                                                                ${language.name}
                                                            </a>
                                                        </li>`;
            });
            newChoiceHtml += `</ul>
                                    <div class="tab-content" id="defaultTabContent">`;
            languages.forEach(function(language, index) {
                newChoiceHtml += `
                                                                    <div class="tab-pane fade show ${index === 0 ? 'active' : ''}"
                                                                        id="tab_choose_${choiceCount}_${index + 1}"
                                                                        role="tabpanel"
                                                                        aria-labelledby="${language.name}-tab">
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name="choose[${choiceCount}][${language.code}]"
                                                                                class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>`;
            });
            newChoiceHtml += `</div>
                                                                                        <button type="button" class="remove-choice btn btn-danger btn-sm rounded-circle mr-2">
                                                                                            <i class="fa fa-minus"></i>
                                                                                        </button>
                                                                                    </div>`;
            $('#choices-container').append(newChoiceHtml);
            choiceCount++;
        });

        $('#choices-container').on('click', '.remove-choice', function() {
            $(this).parent('.choice-item').remove();
        });
    });
</script>
