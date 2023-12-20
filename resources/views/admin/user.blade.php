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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
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
</div>
<table id="mytable" >
  <thead >
    <tr>
      <th >Sno.</th>
      <th >User Name</th>
      <th >User Email</th>
      <th >Phone</th>
      <th >City</th>
      <th>Operations</th>
      <th>Actions</th>
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
   
    <td>
   @if($user->status == 1)
    <a href="{{url('/user-deactivation/' . $user->id)}}"><button type="button" class="btn btn-danger">De-activate</button></a>
  @elseif($user->status == 0)
  <a href="{{url('/user-deactivation/' . $user->id)}}"><button type="button" class="btn btn-primary" style="width:108px;">Activate</button></a>
    @endif
    <a href="{{url('/user-delete/' . $user->id)}}"><button type="button" class="btn btn-info" style="width:108px;">Delete</button></a>

</td>
<td>

  <a href="{{ route('order', ['id' => $user->id]) }}" style="text-decoration:none;color:black;"><i class="fa-solid fa-cart-shopping"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="{{ route('wishlist', ['id' => $user->id]) }}" style="text-decoration:none;color:black;"><i class="fa-solid fa-heart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="{{ route('reivews', ['id' => $user->id]) }}" style="text-decoration:none;color:black;"><i class="fab fa-telegram-plane"></i></a>
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