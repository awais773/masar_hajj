<?php

$crtlName = (!empty($crtlName) && $crtlName != null && $crtlName) ? $crtlName : "select_";
$crtlId = (!empty($crtlId) && $crtlId != null && $crtlId) ? $crtlId : "guides";
$placeHolder = (!empty($placeHolder) && $placeHolder != null && $placeHolder) ? $placeHolder : "Select Guide(s)";
$selectedGuidesString = (!empty($selectedGuidesString) && $selectedGuidesString != null && $selectedGuidesString) ? $selectedGuidesString : "";
$isMuliple = (!empty($isMuliple) && $isMuliple != null && $isMuliple) ? $isMuliple : false;
?>   

<?php

$guides = \App\Models\Guide::select('id', 'firstname', 'lastname')->get();
?>  

<select class="select2-multi-select form-control" name="{{$crtlName}}" id="{{$crtlId}}" @if($isMuliple) multiple="multiple" @endif  >
    <optgroup label="Giude">
    <?php echo (($isMuliple) ? 'multiple=""' : '') ?>  >
            <?php
            for ($i = 0; $i < count($guides); $i++) {
                $g = $guides[$i];
                ?>
        <option  
            value="<?php echo $g["id"]; ?>"><?php echo Helper::get_localizedDefault($g["firstname"]) . " " . Helper::get_localizedDefault($g["lastname"]); ?></option> 


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