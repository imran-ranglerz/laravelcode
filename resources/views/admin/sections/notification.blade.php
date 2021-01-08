<script src="{{url('assets/js/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{url('assets/css/toastr.min.css')}}">





<script>

  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif


  @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
  @endif


  @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
  @endif

  @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
  @endif

</script>