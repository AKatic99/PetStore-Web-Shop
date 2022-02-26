<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   

   

    <!-- Styles -->
   
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->

    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
   

</head>
<body>

<div class="wrapper">
  @include('layouts.inc.sidebar')

  <div class="main-panel">
    @include('layouts.inc.adminnav')

    <div class="content">
      @yield('content')

    </div>
    @include('layouts.inc.adminfooter')

  </div>
</div>


  <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
  <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
  <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(session ('status'))
     <script>
       swal("{{ session('status') }}");
     </script>
  @endif
  @yield('scripts')

</body>
</html>
