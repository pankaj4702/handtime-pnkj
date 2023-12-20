<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Document</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <h1>Reviews</h1>
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
                <h3 class="card-title">Reviews</h3>
              </div>
            </div>
            <table id="mytable">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Product Name</th>
                  <th>Review</th>
                  <th>Rating</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                @foreach($reviews as $review)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td style="color:#db00ff; font-family:Bell MT;font-weight:bold;font-size: 20px;
   ">{{$review->product_name}}</td>
                  <td>{{$review->review}}</td>
                  <td>{{$review->rating}} <i class="fas fa-star"></i></td>
                  <td><button type="button" class="btn btn-info"
                      onclick="dlt_review({{ $review->user_id }},{{ $review->product_id }})"
                      style="width:108px;">Delete</button></td>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){
            $('#mytable').DataTable()
        });
  </script>
  <script>
    function dlt_review(userId,productId){
         Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
          url: "{{route('delete_reivew')}}",
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    product_id :productId,
                    user_id : userId,
                  },
                  success: function(response) {
                   if(response.status == 1 ){
                    location.reload();
                   }
                  }
                });
        }
    });
}
  </script>
</body>

</html>