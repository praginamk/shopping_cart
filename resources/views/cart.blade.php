<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cart</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <script>
    var site_url = "{{url('/')}}";
    </script>
</head>
<style>
    a:active{
        background-color: #fffb00;color: #141212;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              
            <ol class="breadcrumb float-sm-right">
            
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-md-10 offset-md-2">
                 @if(session()->has('message'))

                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('message')  }}.</p>
                    </div>
                @endif
                @if(session()->has('err_message'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('err_message')  }}.</p>
                    </div>
                 @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
            </div>
        </div>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">       
          
           <div class="card">
                
                <div class="card-body">
                     <table id="example" class="table table-striped table table-bordered" style="width:100%" >
                     
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr>
                <td>{{ $cart->product_id}}</td>
             
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    
  </section>
<br><br>
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('app_assets')}}/dash/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('app_assets')}}/dash/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('app_assets')}}/dash/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('app_assets')}}/dash/plugins/moment/moment.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('app_assets')}}/dash/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('app_assets')}}/dash/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('app_assets')}}/dash/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('app_assets')}}/dash/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('app_assets')}}/dash/dist/js/demo.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/dist/js/custom.js?v=<?php echo time(); ?>"></script>
<!-- page script -->
<script>
  
</script>
</body>
</html>
