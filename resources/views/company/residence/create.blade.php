@extends('layouts.master')
@section('title') Company | Residence @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.add_hotel');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.residence')}}" class="btn btn-primary">{{ __('admin.location') }}</a>
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
                          
                            <div class="card-body">
                                <form action="{{route('company.residence.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <div class="form-group">
                                        <label>{{ trans('admin.location');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="type" name="type">
                                            <option value="">{{trans('admin.choose')}}</option>  
                                            <option value="Mecca">{{trans('admin.mecca')}}</option>
                                            <option value="City">{{trans('admin.city')}}</option>
                                            <option value="Mina">{{trans('admin.mina')}}</option>
                                            <option value="Arafat">{{trans('admin.arafat')}}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ trans('admin.hotel_name');}}</label>
                                        <?php
                                            $NameExt = "name_";
                                            $stringValues = '';
                                        ?>
                                        @include('comman.tab')
                                      
                                    </div>

                                    <div class="form-group">
                                        <label>{{ trans('admin.hotel_address');}}</label>
                                        <?php
                                            $NameExt = "address_";
                                            $stringValues = '';
                                        ?>
                                        @include('comman.tab')
                                    </div>
                                    <input type="hidden" name="company_id" value="{{Auth::id()}}">
                                  
                                    <div class="form-group">
                                    <label for="mobile">{{ trans('admin.hotel_mobile');}}</label> 
                                        <input type="text" class="form-control" name="mobile" value="" id="mobile" >  

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>{{ trans('admin.location');}}</label><br>
                                        <input type="text" class="form-control" name="my_address" id="my-address" placeholder="{{ trans('admin.Please_enter_address') }}" style="width:40%;float:left;margin-right:20px;">
                                        <input type="button" id="getCords" class="btn btn-success" style="float:center;" value="{{ trans('admin.Find_Location') }} " onClick="codeAddress(1);">
                                        <br>
                                        <br>

                                        <input type="text" class="form-control" placeholder="Google Map Link" name="googlemapurl" style="width:40%;float:left;margin-right:20px;">
                                        <input type="button" id="Extractbtn" class="btn btn-success" style="float:center;" value="{{ trans('admin.Find_Location') }} ">
                                        <br>
                                        <!-- <label>Latitude</label>  -->
                                        <input type="hidden" class="form-control1" name="latitude" id="latitude"  value="" > <br>  
                                        <!-- <label>Longitude</label>  -->
                                        <input type="hidden" class="form-control1" name="longitude"  id="longitude"  value="">  

                                    <br>
                                    
                                    <div id="map-canvas" style="width:100%;"></div> 
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1">
                                        <label class="form-check-label" for="active">{{ trans('admin.user_active');}}</label>
                                    </div>
                                

                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{ trans('admin.user_save');}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->

            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('app.googlemap_key'); }}&v=3.exp&sensor=false&libraries=places"></script>
<style>
  #map-canvas {
    height: 300px;
    width: 500px;
    margin: 0px;
    padding: 0px
  }
</style>

<script type="text/javascript">
        function initialize() {
          var address = (document.getElementById('my-address'));
          var autocomplete = new google.maps.places.Autocomplete(address);
          autocomplete.setTypes(['geocode']);
          google.maps.event.addListener(autocomplete, 'place_changed', function() {
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
    }
    function codeAddress(id) {
        geocoder = new google.maps.Geocoder();
            if(id==1){
            var address = document.getElementById("my-address").value;
            geocoder.geocode( { 'address': address}, function(results, status) {
                console.log(results);
            if (status == google.maps.GeocoderStatus.OK) {

            document.getElementById('latitude').value = results[0].geometry.location.lat();
            document.getElementById('longitude').value = results[0].geometry.location.lng();
            initialize_map(results[0].geometry.location.lat(),results[0].geometry.location.lng());
            } 
            else {
                initialize_map(29.44747825425,31.241468254547);
            }
            });
          }
      }

function codeAddressBy_latlng() {
        geocoder = new google.maps.Geocoder();
            debugger;
             
             var latlng = {lat: parseFloat(document.getElementById('latitude').value), lng: parseFloat(document.getElementById('longitude').value)};
            geocoder.geocode( { 'location': latlng    }, function(results, status) {
                debugger;
            if (status == google.maps.GeocoderStatus.OK) {

            document.getElementById('latitude').value = results[0].geometry.location.lat();
            document.getElementById('longitude').value = results[0].geometry.location.lng();
            initialize_map(results[0].geometry.location.lat(),results[0].geometry.location.lng());
            } 

            else {
                initialize_map(29.44747825425,31.241468254547);
            }
            });
         
      }
    google.maps.event.addDomListener(window, 'load', initialize);

          $( document ).ready(function() {
   
        $( "#form-group #latitude,#form-group  #longitude" ).on('change',function(e){
            codeAddressBy_latlng();
        });
   
         var latitude= document.getElementById('latitude').value;
         var longitude= document.getElementById('longitude').value;
          if (longitude=="" || latitude=="" || longitude=="0" || latitude=="0"){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction);
        } else {
            initialize_map(29.44747825425,31.241468254547);
        }
        }else
        {
            initialize_map(latitude,longitude);
            
        }
        });

        function successFunction(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            initialize_map(lat,lng);
        }

    $(function() {
        $('#Extractbtn').on('click', function() {
            var url = $('input[name=googlemapurl]').val();
            var regex = new RegExp('@(.*),(.*),(.{2})');
            var lon_lat_match = url.match(regex);
            var lon = lon_lat_match[1];
            var lat = lon_lat_match[2];
            var z = lon_lat_match[3];
            var z = parseInt(z)
            initialize_map(lon,lat,z);
        });
    });
</script>
<script>
 // source map script
     var gmarkers = [];
      
      function initialize_map(lat,lng,z=16) {
        latitude = parseFloat(lat);
        longitude = parseFloat(lng);
          var marker_icon = "{{asset('/web/images/map_uberx.png')}}";

        var myLatlng = new google.maps.LatLng(latitude,longitude);
        var mapOptions = {
          zoom: z,
          center: myLatlng
        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


        var marker_you = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'You!',
            draggable: true,
        });

        google.maps.event.addListener(marker_you, 'dragend', function() {
            // updating the marker position
            var latLng = marker_you.getPosition();
            var geocoder= new google.maps.Geocoder();
            document.getElementById("latitude").value =latLng.lat();
            document.getElementById("longitude").value =latLng.lng();
            

            var latlngplace = new google.maps.LatLng(latLng.lat(), latLng.lng());
              geocoder.geocode({'latLng': latlngplace}, function(results, status){
              if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        $("input[name=latitude]").val(latLng.lat());
                        $("input[name=longitude]").val(latLng.lng());
            document.getElementById("my-address").value =results[1].formatted_address;                          
                        } else {
                          alert('No Address Found');
                        }
                  } else {
                alert('Geocoder failed due to: ' + status);
              }
            });

          });
       
      }

    </script>
@endsection