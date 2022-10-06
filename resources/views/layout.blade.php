<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title', 'My Business') </title>

  <!-- Select 2 -->
  <link rel="stylesheet" href="{{asset('adminlte/select2/select2.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="{{asset('adminlte/select2/sweetalert2.min.css')}}">

    <style>
      .store_fields{
        cursor: pointer;
      }
      .store_fields:hover{
        background-color: rgb(196, 196, 196); 
      }
      .wrap {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 100px;
      }
      .wrap > p{
        margin-bottom: 0rem !important; 
      }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('subfiles.nav')
  @include('subfiles.main_sidebar')
 
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> @yield('head') </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')              
            </ol>
          </div>
        </div>
      </div>
    </section>

    @yield('screen')
  </div>

  @include('subfiles.footer')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select 2 --> 
<script src="{{asset('adminlte/select2/select2.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- SweetAlert 2 -->
<script src="{{asset('adminlte/select2/sweetalert2.min.js')}}"></script>

@yield('script')
<script>

  let option = document.getElementsByClassName('nav-link'); 
  let active = localStorage.getItem('active');
        
  for (let j = 0; j < option.length; j++) {
      if(option[j].dataset.val == active){
          document.getElementsByClassName('active')[0].classList.remove('active');
          option[j].classList.add("active");
      }
      option[j].addEventListener("click", function () {
        localStorage.setItem('active', option[j].dataset.val);
      });
  }
</script>
</body>
</html>
