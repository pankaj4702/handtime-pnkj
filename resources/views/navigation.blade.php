<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
  {{-- <link href="{{asset('js/myjs.js')}}"> --}}
  <script src="{{asset('js/myjs.js')}}"></script>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>HandTime</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />



  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">


  <!-- font awesome style -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/main-style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <script src="https://code.jquery.com"> </script>

</head>
<body>
  <!-- <div class="hero_area"> -->
    <!-- header section strats -->
    <header class="header_section" >
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <div class="container">
          <a class="navbar-brand" href="{{url('/')}}">
            <span>
              HandTime
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item {{ request()->is('/*') ? 'active' : '' }}">
                <a class="nav-link " href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=""> About</a>
              </li>
              <li class="nav-item {{ request()->is('product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('product')}}">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Testimonial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Contact Us</a>
              </li>
            </ul>
            <div class="user_optio_box">
          
              
              @php
              $value = Session::get('username');
              @endphp
               @if(isset($value))
             
               
               <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" style="color:white;" aria-haspopup="true" aria-expanded="false">
   Hii {{$value}}
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" s>
    <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
    <a class="dropdown-item" href="{{ route('orders') }}">Your Orders</a>
    <a class="dropdown-item" href="{{route('userwishlist')}}">Your Wishlist</a>
    @if(isset($check_review))
    <a class="dropdown-item" href="{{ route('logout') }}">logout</a>
    @else
    <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#exampleModal">logout</a>
    @endif
  </div>
  <a href="{{route('cartproduct')}}">
    <button type="button" class="cart_btn" style="outline:none;"  >
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </button>
              </a>
  </div>
               @else
              <a href="{{route('registration')}}">
              <button type="button" class="register_btn" style="outline:none;"  >
              <i class="fa fa-user" >  </i>
              </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{route('login')}}" >
               <button type="button" class="login_btn" style="outline:none;">
              Login
              </button> 
              </a>
               @endif
            </div>
          </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- model body -->
    @if(isset($user))
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">How's experience of my services</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1main" rows="3"></textarea>
          </div>
         
          </div>
          <div class="modal-footer">
            <a href="{{ route('logout') }}"><button type="button" class="btn btn-secondary">Ask me later</button></a>

            <button type="button" class="btn btn-primary" onclick="user_review({{ $user->id }})">OK</button>
          </div>
        </div>
      </div>
    </div>
@endif
<!-- </div>   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function user_review(id){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var textValue= $('#exampleFormControlTextarea1main').val();
 $.ajax({
                  url: "{{ route('tesmtionial_review') }}",
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    user_id : id,
                    value : textValue,
                  },
                  success: function(response) {
                      if(response.status == 1){
                       location.href="{{ route('logout') }}";
                      }
                      
                  }
                });
  }
</script>
</body>





    

