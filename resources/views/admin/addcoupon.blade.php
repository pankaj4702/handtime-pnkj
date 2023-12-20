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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h1>Add Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Coupon</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Coupon </h3>
              </div>
              @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul class="title_count1">
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      @if (session('error'))
    <div class="alert alert-danger">
            <ul>
                <li > {{ session('error') }}</li>
            </ul>
       
    </div>
    @elseif(session('success'))
    <div class="alert alert-danger">
            <ul>
                <li > {{ session('success') }}</li>
            </ul>
       
    </div>
      @endif
              <!-- /.card-header -->
              <!-- form start -->

              <form id="quickForm" action="{{route('storecoupon')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group">
              <button style="float:right;" class="btn btn-primary" type="button" onclick="generateRandomString(16);">Create Coupon</button><br><br>

                      <label for="exampleInputEmail1"> Coupon</label>
                    <input type="text" name="coupon" class="form-control" id="coupon" placeholder=""value="{{ old('coupon') }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control"  placeholder="Enter Price">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Valid Date</label>
                    <input type="date" id="valid_date" name="valid_date" class="form-control"  placeholder="Enter Price">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Discount(%)</label>
                    <input type="text" id="discount" name="discount" class="form-control"  placeholder="Enter Discount Price">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputPassword1">discount of Above Price</label>
                    <input type="text" id="above_price" name="above_price" class="form-control" >
                  </div>
                    
                  <div class="form-group mb-0">
                   
                  </div>
                </div>
              
             
                  <input type="submit" class="btn btn-primary" value="Submit">
              
              </form>
            </div>
            
            </div>
          
          <div class="col-md-6">

          </div>
        
        </div>
      
      </div>
    </section>
  
  </div>
  <!-- /.content-wrapper -->
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
$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
<script>
   function generateRandomString(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';

    for (let i = 0; i < length; i++) {
        if (i > 0 && i % 4 === 0) {
            result += '-';
        }
        const randomIndex = Math.floor(Math.random() * characters.length);
        result += characters.charAt(randomIndex);
    }

    console.log(result);
    document.getElementById('coupon').value = result;
    // document.getElementById('coupon').disabled = true;
    }               
    </script>
</body>
</html>
