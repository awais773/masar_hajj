<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">  
<script>  
// Set the options that I want
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "3000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$(document).ready(function onDocumentReady() {  

  @if(Session::has('success'))  
        toastr.success("{{ Session::get('success') }}"); 
        @php Session::forget('success'); @endphp
  @endif  
  @if(Session::has('info'))  
        toastr.info("{{ Session::get('info') }}"); 
        @php Session::forget('info'); @endphp 
  @endif  
  @if(Session::has('warning'))  
        toastr.warning("{{ Session::get('warning') }}");  
        @php Session::forget('warning'); @endphp
  @endif  
  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");  
        @php Session::forget('error'); @endphp
  @endif  
    
});

</script>  
@if ($errors->any())

@foreach ($errors->all() as $error)
      <script>
            toastr.error("{{ $error }}");   
      </script>
@endforeach
@endif