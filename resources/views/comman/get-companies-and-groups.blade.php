<?php
$company_array = Helper::get_companies();
 
$NameExt = (!empty($NameExt) && $NameExt != null && $NameExt) ? $NameExt : "";
$labelCSSClass = (!empty($labelCSSClass) && $labelCSSClass != null && $labelCSSClass) ? $labelCSSClass : "form-group";
$controlCSSClass = (!empty($controlCSSClass) && $controlCSSClass != null && $controlCSSClass) ? $controlCSSClass : "form-group";
 
?>    

<div class="form-group {{$CSSClass}}">
                <label class="{{$labelCSSClass}}">{{ trans('admin.shared_company');}}</label>
                <div class="{{$controlCSSClass}}">  
       
        <select    
       
     class="form-control  chosen"  tabindex="1" id="company{{ $NameExt }}" name="company{{ $NameExt }}">
             
                <?php if (!empty($addAll) && $addAll != null && $addAll)  { ?>
                    <option value="-1"   >All</option>       		
                <?php } ?>
                <?php
                for ($i = 0; $i < count($company_array); $i++) {
                    ?> 
                    <option
                        <?php echo ($company_array[$i]["id"]==$SelectedCompany)?"selected":""; ?>
                        value="<?php echo $company_array[$i]["id"]; ?>"><?php echo Helper::get_localizedDefault($company_array[$i]["name"]); ?></option>       		
                    <?php
                }
                ?>
           
        </select> 
                    
                    
   </div>
</div>
 

<div class="form-group  {{$CSSClass}}">
                <label class="{{$labelCSSClass}}">{{ trans('admin.shared_group');}}</label>
                 <div class="{{$controlCSSClass}}" id="groupDiv{{ $NameExt }}">
                     <select class="form-control chosen" data-placeholder="Choose" tabindex="1" id="group{{ $NameExt }}" name="group{{ $NameExt }}">
                     </select>
            </div>
  </div>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {

    getCompanyGroups{{ $NameExt }}();
    $("#company{{ $NameExt }}").change(function ()
    {
    getCompanyGroups{{ $NameExt }}();
    return false;
    });
    });
    var getCompanyGroups{{ $NameExt }} = function ()
    {
    var dat = new Object();
    dat.company= $('#company{{ $NameExt }}').val();
    dat.nameExt = "{{ $NameExt }}";
    dat.addAll = "{{ $addAllGroups }}";    
    dat.selectedGroup = "{{ $SelectedGroup }}";
    $("#groupDiv{{ $NameExt }}").html("<div class='loading-bar'> </div>");
    $.get('{{ url("/common/groups/partialddl")}}', dat, function (data) {
    $("#groupDiv{{ $NameExt }}").html(data);
   
    });
    }
</script>   