<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navbar -->
 @include('admin.nav')
  <!-- /.navbar --> 

  <!-- Main Sidebar Container -->
  @include('admin.sidebar')
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
          <div >
            <a href="{{route('addcoupon')}}" style="float:right;" ><button class="btn btn-primary" >Add Coupon</button></a>
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
                <h3 class="card-title">Products  </h3>
              </div>
</div>
<table class="table" id="mytable">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Coupons</th>
      <th scope="col">start_date</th>
      <th scope="col">Valid_date</th>
      <th scope="col">Discount(%)</th>
      <th scope="col">Above_price</th>
      <th scope="col">Status</th>
      <th  scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($coupons as $coupon)
    <tr>
    <th scope="row">{{$loop->iteration}}</th>
    <td>{{$coupon->coupon}}</td>
    <td>{{$coupon->current_date}}</td>
    <td>{{$coupon->valid_date}}</td>
    <td>{{ $coupon->discoount }}%</td>
    <td>{{ $coupon->above_price }}</td>
    @if($coupon->status == 1)
    <td>Running</td>
    @elseif($coupon->status == 0)
    <td>Expire</td>
    @elseif(($coupon->status == 2))
    <td>Inactive</td>
    @endif
    <td>
      <a href="{{ route('couponDeactivate', ['id' => $coupon->id]) }}"><button class="btn btn-danger">Delete</button></a>
    </td>
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


   <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mytable').DataTable()
        });
    </script>
</body>
</html>