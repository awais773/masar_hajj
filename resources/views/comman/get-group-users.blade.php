<?php

$crtlName = (!empty($crtlName) && $crtlName != null && $crtlName) ? $crtlName : "select_";
$crtlId = (!empty($crtlId) && $crtlId != null && $crtlId) ? $crtlId : "guides";
$placeHolder = (!empty($placeHolder) && $placeHolder != null && $placeHolder) ? $placeHolder : "Select Guide(s)";
$selectedGuidesString = (!empty($selectedGuidesString) && $selectedGuidesString != null && $selectedGuidesString) ? $selectedGuidesString : "";
$isMuliple = (!empty($isMuliple) && $isMuliple != null && $isMuliple) ? $isMuliple : false;
?>   

<?php
$user = auth()->user(); // Retrieve the authenticated user
$user_id = null;

if ($user && $user->type === 0) { // Check if the user exists and has type 0
    $user_id = $user->id; // Get the user ID
}
if ($user_id) {
    $groups = \App\Models\Group::where('company_id', $user_id)->get();
} else {
    $groups = \App\Models\Group::with('users')->get();
}
?>


<select class="select2-multi-select form-control" name="{{$crtlName}}" id="{{$crtlId}}" multiple="multiple" >
    @foreach($groups as $group)
        <optgroup label="{{Helper::get_localizedDefault($group->name)}}">
            @foreach ($group->users as $user)
                <option value="{{$user->id}}">{{Helper::get_localizedDefault($user->firstname).''.Helper::get_localizedDefault($user->lastname)}}</option> 
            @endforeach
        </optgroup>
    @endforeach
    
</select>
<style type="text/css">
    .select2-input
    {
        width:100% !important;

    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $("#{{$crtlId}}").select2({
            placeholder: "{{$placeHolder}}",
        });
        $("#{{$crtlId}}").select2("val", [<?php echo $selectedGuidesString; ?>]);
    });
</script>