@php
$crtlName = (!empty($crtlName) && $crtlName != null && $crtlName) ? $crtlName : "select_";
$crtlId = (!empty($crtlId) && $crtlId != null && $crtlId) ? $crtlId : "groups";
$placeHolder = (!empty($placeHolder) && $placeHolder != null && $placeHolder) ? $placeHolder : "Select Group(s)";
$selectedGroupsString = (!empty($selectedGroupsString) && $selectedGroupsString != null && $selectedGroupsString) ? $selectedGroupsString : "";
$isMuliple=(!empty($isMuliple) && $isMuliple != null && $isMuliple) ? $isMuliple : false;
//filter by $guideId
$guideId=(!empty($guideId) && $guideId != null && $guideId) ? $guideId : 0;

$groups =\App\Models\Group::get();

$groups_by_company_array = Helper::group_array_by($groups, "company_name");
$keys = array_keys($groups_by_company_array); 
@endphp

<select class="select2-multi-select form-control" name="{{$crtlName}}" id="{{$crtlId}}" @if($isMuliple) multiple="multiple" @endif  >
    <optgroup label="Group">
    <?php
    for ($i = 0; $i < count($keys); $i++) {
        ?>
       
            <?php
            foreach ($groups_by_company_array[$keys[$i]] as $group) {
                ?>  
                <option  
                    value="<?php echo $group["id"]; ?>" <?php if(!empty($selectedGroupsString)){ if(in_array($group["id"], json_decode($selectedGroupsString))){ echo 'selected="selected"' ;}}?>>{{ Helper::get_localizedDefault($group["name"]);}}</option> 

            <?php } ?> 
       

    <?php } ?> 
    </optgroup>
</select>