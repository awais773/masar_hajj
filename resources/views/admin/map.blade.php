@extends('layouts.master')
@section('title') Admin | Map @endsection
@section('content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('admin.map_view')}}</h4>
          
        </div>
        
    </div>          
</div>
    <!-- Start Contentbar -->    
    <div class="contentbar">                
        <!-- Start row -->
        <div class="row">
            <?php
            $addAll = true;
            $addAllGroups = true;
            $NameExt = "_mapfilter";
            $SelectedCompany = -1;
            $SelectedGroup = -1;
            $CSSClass = " col-md-6 col-sm-6"
            ?>
            @include('comman.get-companies-and-groups') 

            </br>
            <div class="col-md-8">
                <input type="text" class="form-control" id="my-address" placeholder="{{ trans('admin.mapview_pleaseenteraddress');}}">
            </div>

            <div class="col-md-4" id="flow2">
                <button id="getCords" class="btn btn-success" onClick="codeAddress();"> {{ trans('admin.mapview_findlocation');}}</button>
            </div>
            </br>

            <div id="map" style="height:600px;width:100%;margin-top:30px;"></div>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

<!-- map page js starts -->
        </div>
    </div>
<!-- map page js starts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('app.googlemap_key'); }}&v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript">

            var popup_pin = "";
            var markersArray = [];
            var newmarkersArray = [];
            var customIcons = {
                restaura3t: {
                    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
                    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                },
                bar: {
                    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
                    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                },
                group: {
                    icon: '{{asset("assets/images/driver_available.png")}}',
                    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                },
                user: {
                    icon: '{{asset("assets/images/driver_not_approved.png")}}',
                    shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                }
            };

            function load(lat, lng) {
                var latitude = '';
                var longitude = '';
                if (lat != '') {
                    latitude = lat;
                    longitude = lng;
                } else {
                    var mapOptions = {
                        zoom: 6
                    };
                    map = new google.maps.Map(document.getElementById('map'),
                            mapOptions);
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {

<?php
if (Session::has('guide_id')) {
    $id = Session::get('guide_id');
    $guide = guide::where('id', $id)->first();
}
?>
<?php
$latitude = 0;
$longitude = 0;
if (isset($guide)) {
    $latitude = $guide->latitude;
    $longitude = $guide->longitude;
}
?>

<?php if ($latitude != 0 && $longitude != 0) { ?>
                                var pos = new google.maps.LatLng("<?php echo $latitude; ?>",
                                        "<?php echo $longitude; ?>");
                                console.log("guide location");
<?php } else { ?>
                                var pos = new google.maps.LatLng(position.coords.latitude,
                                        position.coords.longitude);
                                console.log("geo locating");
<?php } ?>

                            var infowindow = new google.maps.InfoWindow({
                                map: map,
                                position: pos,
                                content: 'You are here'
                            });

                            map.setCenter(pos);
                        });
                    }
                }
                var address = (document.getElementById('my-address'));
                var autocomplete = new google.maps.places.Autocomplete(address);
                autocomplete.setTypes(['geocode']);
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        return;
                    }
                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }
                });
                var map = new google.maps.Map(document.getElementById("map"),
                        {
                            center: new google.maps.LatLng(latitude, longitude),
                            zoom: 10,
                            mapTypeId: 'roadmap',
                            scrollwheel: false, });
                var infoWindow = new
                        google.maps.InfoWindow;
                (function () {
                    var f = function () {
                        var marker = new google.maps.Marker();
                        var companyFilter = $("#company_mapfilter").val();
                        var groupFilter = $("#group_mapfilter").val();
                        if (typeof groupFilter === "undefined") {
                            groupFilter = -1;
                        }

                        downloadUrl("{{ route('CommonGroupUserLocationsXml') }}"
                                + "?company_id=" + companyFilter
                                + "&group_id=" + groupFilter,
                                function (res) {
                                   data=   JSON.parse((res.responseText));
                                    console.log(data);
                                 
                                    popup_pin = "";
                                    for (var i = 0; i < data.length; i++) {
                                        markers = data[i];
                                        
                                        var name = markers['name']; 
                                        var client_name = markers["name"];
                                        var group_name =markers["group_name"];  
                                        
                                        var type =  markers["type"];  
                                        var _id =markers["id"];    
                                        var angl = markers["angl"];   
                                        var point = new google.maps.LatLng(
                                                parseFloat(markers["lat"] ),
                                                parseFloat(markers["lng"]  ));
                                       
                                        map.setCenter(point);
                                        var html = "";
                                        var color = "";
                                        if (type == 'group') {
                                            html = "<p style='font-size:16px;'><b><span class ='fa fa-mobile-phone icon-phone' style=''></span><span style='margin-left:5px;'>" + group_name + "</span></b><br/>Group</p>";
                                        } else {
                                            html = "<b>" + client_name + "</b><p style='font-size:16px;'><b><span class ='fa fa-mobile-phone icon-phone' style=''></span><span style='margin-left:5px;'>" + group_name + "</span></b><br/>Hajj</p>";
                                          
                                        }

                                        var icon = customIcons[type] || {};
                                        marker = new google.maps.Marker({
                                            map: map,
                                            position: point,
                                            //draggable: true,
                                            icon: icon.icon,
                                            shadow: icon.shadow});

                                        newmarkersArray.push(marker);
                                        bindInfoWindow(marker, map,
                                                infoWindow, html, type, name, popup_pin);
                                    }
                                    clearOverlays(markersArray);
                                    markersArray = newmarkersArray;
                                    newmarkersArray = [];
                                });
                    };
                    window.setInterval(f, 15000);
                    f();
                    $("#company_mapfilter").on("change", function () { 
                        f();
                    }); 
                    $(document).ready(function () {
                        $("body").on("change", "#group_mapfilter", function () {
                            f();
                        }); 
                    });
                    var legendDiv = document.createElement('DIV');
                    var legend = new Legend(legendDiv, map);
                    legendDiv.index = 1;
                    map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legendDiv);

                })();
            } 
            
            function clearOverlays(arr) {
                for (var i = 0; i < arr.length; i++) {
                    arr[i].setMap(null);
                }
            }

            function bindInfoWindow(marker, map, infoWindow, html, type, name, popup_pin) {
                if (name == popup_pin) {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                    popup_pin = "";
                }
                google.maps.event.addListener(marker, 'click', function () {

                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);

                });
            }

            
            function doNothing() {
            }
            
            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;
                request.onreadystatechange = function () {
                    if (request.readyState == 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                    }
                };
                request.open('GET', url, true);
                request.send(null);
            }

            function codeAddress() {
                geocoder = new google.maps.Geocoder();
                var address = document.getElementById("my-address").value;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {

                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        load(latitude, longitude);
                        
                    }
                });
            }

            function Legend(controlDiv, map) {
              
                controlDiv.style.padding = '5px';
                var controlUI = document.createElement('DIV');
                controlUI.style.backgroundColor = 'white';
                controlUI.style.borderStyle = 'solid';
                controlUI.style.borderWidth = '1px';
                controlUI.title = 'Legend';
                controlDiv.appendChild(controlUI);

                // Set CSS for the control text
                var controlText = document.createElement('DIV');
                controlText.style.fontFamily = 'Arial,sans-serif';
                controlText.style.fontSize = '12px';
                controlText.style.paddingLeft = '4px';
                controlText.style.paddingRight = '4px';

                controlText.innerHTML = '<b>Legends</b><br />' +
                        '<img src="{{asset("assets/images/driver_available.png")}}" style="height:25px;"/> Group<br />' +
                        '<img src="{{asset("assets/images/driver_not_approved.png")}}" style="height:25px;"/> Hajj<br />'
                controlUI.appendChild(controlText);
            }
            google.maps.event.addDomListener(window, 'load', load('', ''));

</script>

@stop