<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

  <title>Day Works Book - @yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->
  
  <!-- CSRF Token -->
  <meta name="_token" content="tra2w16eSwSRrkiS94MSdpM8IDigU102n0SkqYJN">
  
  <link rel="shortcut icon" href="favicon.ico">

  <!-- plugin css -->
  <link href="css/iconfont.css" rel="stylesheet">
  <link href="css/flag-icon.min.css" rel="stylesheet">
  <link href="css/perfect-scrollbar.css" rel="stylesheet">
  <!-- end plugin css -->

    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- common css -->
  <link href="css/app.css" rel="stylesheet">
  <!-- end common css -->

  </head>
<body>

  <script src="js/spinner.js"></script>

  <div class="main-wrapper" id="app">
        @yield('content')
  </div>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- base js -->
    <script src="js/app.js"></script>
    <script src="js/feather.min.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
      <script src="js/chart.min.js"></script>
  <script src="js/jquery.flot.js"></script>
  <script src="js/jquery.flot.resize.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/apexcharts.min.js"></script>
  <script src="js/progressbar.min.js"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="js/template.js"></script>
    <!-- end common js -->

      <script src="js/dashboard.js"></script>
  <script src="js/datepicker.js"></script>
  <style>
    .buy-now-wrapper {
        display: none;
    }
  </style>
</body>
</html>