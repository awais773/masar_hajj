@php

$languages = Helper::getLanguages();

$NameExt = (!empty($NameExt) && $NameExt != null && $NameExt) ? $NameExt : "local_";

$isTextarea = (!empty($isTextarea) && $isTextarea != null && $isTextarea) ? $isTextarea : false;
@endphp

<div class="card m-b-3" >

        <div class="card-body panel with-nav-tabs panel-default">

            <ul class="nav nav-tabs panel-heading" id="defaultTab" role="tablist">

                @php
                    $i=1;
                @endphp
                @if(isset($languages) && count($languages)>0)
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ ($i==1)?'active':''}}" id="#tab_{{$NameExt}}_{{$i}}-tab" data-toggle="tab" href="#tab_{{$NameExt}}_{{$i}}" role="tab" aria-controls="{{ $language->name }}" aria-selected="{{ ($i==0)?'true':'false'}}">{{ $language->name }}</a>
                        </li>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endif
        </ul>

        <div class="tab-content" id="defaultTabContent">

            @php
                $i=1;
            @endphp
            @if(isset($languages) && count($languages)>0)
                @foreach ($languages as $language)
                    @php
                        $code=$language->code;
                    @endphp
                    <div class="tab-pane fade show {{ ($i==1)?'active':''}}" id="tab_{{$NameExt}}_{{$i}}" role="tabpanel" aria-labelledby="{{ $language->name }}-tab">
                            <?php if ($isTextarea != null && $isTextarea) { ?>

                            <textarea id="tinymce-{{$code}}" name="{{$NameExt}}{{$code}}" class="form-control tinymce-editor">
                                {{ Helper::get_localizedDefault($stringValues,$code) }}
                            </textarea>
                        <?php } else { ?>
                            <input type="text" size="50" placeholder="Name" class="form-control" name="{{$NameExt}}{{$code}}"
                                value="{{ Helper::get_localizedDefault($stringValues,$code) }}">
                        <?php } ?>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            @endif


        </div>
    </div>
</div>
