<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('/')}}vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    


    <link rel="stylesheet" href="{{asset('/')}}assets/css/tagsinput.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/dev_style.css">


    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> --}}



</head>


<body>

    @include('admin.sections.sidebar')
    <div id="right-panel" class="right-panel">

    @include('admin.sections.header')


        <main class="py-4">
            @yield('content')
        </main>
    </div>


        <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/main.js')}}"></script>
        <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{url('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{url('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>


    
    @include('admin.sections.notification')


</body>

</html>
