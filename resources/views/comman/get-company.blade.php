<?php

$crtlName = (!empty($crtlName) && $crtlName != null && $crtlName) ? $crtlName : "select_";
$crtlId = (!empty($crtlId) && $crtlId != null && $crtlId) ? $crtlId : "company";
$placeHolder = (!empty($placeHolder) && $placeHolder != null && $placeHolder) ? $placeHolder : "Select Company(s)";
$selectedGuidesString = (!empty($selectedGuidesString) && $selectedGuidesString != null && $selectedGuidesString) ? $selectedGuidesString : "";
$isMuliple = (!empty($isMuliple) && $isMuliple != null && $isMuliple) ? $isMuliple : false;
?>   

<?php
$guides = \App\Models\User::select('id', 'name')->get();

?>  

<select class="select2-multi-select form-control" name="{{$crtlName}}" id="{{$crtlId}}" @if($isMuliple) multiple="multiple" @endif  >
    <optgroup label="Company">
    <?php echo (($isMuliple) ? 'multiple=""' : '') ?>  >
            <?php
            for ($i = 0; $i < count($guides); $i++) {
                $g = $guides[$i];
                ?>
        <option  
            value="<?php echo $g["id"]; ?>"><?php echo Helper::get_localizedDefault($g["name"]); ?></option> 


    <?php } ?> 
    </optgroup>
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