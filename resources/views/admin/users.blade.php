<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HandTime |Add Products </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>
<script>
     jQuery(document).ready(function () {
    jQuery("#price").keypress(function (e) {
        var length = jQuery(this).val().length;

        // Allow backspace
        if (e.which == 8) {
            return true;
        }

        // Allow digits 0-9 and limit the length to 5 characters
        if (length >= 5 || (e.which < 48 || e.which > 57)) {
            return false;
        }

        // Disallow leading zero
        if (length === 0 && e.which === 48) {
            return false;
        }
    });
});

</script>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 @include('admin.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Users  </h3>
              </div>
             
            

<table class="table" id="mytable">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">User Name</th>  
      <th scope="col">User Email</th>
      <th scope="col">Phone</th>
      <th scope="col">City</th>
      <th  colspan="2" scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
    <th scope="row">{{$loop->iteration}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->city}}</td>
    <td><a href=""><button type="button" class="btn btn-danger">De-activate</button></a></td>

    </tr>
  @endforeach
  </tbody>
</table>
            </div>
            </div>
          <div class="col-md-6">

          </div>
        </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
        $(document).ready(function(){
            $('#mytable').DataTable()
        });
</script>
</body>
</html>
