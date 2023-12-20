@include('navigation')
<meta name="csrf-token" content="{{ csrf_token() }}">
<body class="sub_page">

  <!-- product section -->


  <section class="product_section " style="display:flex;">
    <div class="container" style="width:48em;margin:0 0 0 0; border-radius:5px;">
      <div class="product_heading">
        <h2>
          Cart Product
        </h2>
      </div>
      <div class="product_container">
        
       @foreach($products as $product)
       @php
       $imageName = $product->image_name;
       @endphp
        <div class="box car-{{ $product->id }}">
          <div class="box-content">
            <div class="img-box">
              <a href="{{ route('productdetail', ['id' => $product->id]) }}">
            <img src="{{ asset('storage/' . $imageName) }}" alt="Image">
              </a>
            </div>
            <div class="detail-box">
              <div class="text">
                <h6>
                {{$product->product_name}}
                </h6>
                <h5>
                  <span>$</span> {{$product->price}}
                </h5>
              </div>
              <div class="btn-box">
                <a onclick="remove_cart({{ $product->id }})" style="cursor: pointer;" >
            Remove
            </a>
          </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="container" style="width: 29em;height: 40em; margin-left: 26px;background:white;">
      <h1 style="text-align: center;">Payment</h1><br><br>
  <div class="form-group">
    <label for="exampleInputEmail1">Total Price : </label>
  <label for="">$ {{$total}}</label>
  </div>
  <div class="form-check">
  </div>
  <a href="{{url('/autopay/'.'P-59T81197X85840601MVXRKFY'.'/'.$total)}}"><button style="width:450px;" class="btn btn-success  ">AutoPay/mo.</button></a>
  <br><br>
   <a href="{{url('/plan')}}"><button style="width:450px;" class="btn btn-danger">Premium Subscription&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$500/mo.</button></a>
   <br><br>
   <a href="{{url('/yearlyplan')}}"><button style="width:450px;" class="btn btn-info">Premium Subscription&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$1000/yr.</button></a>
   {{-- <div id="paypal-button-container-P-6JN174000L2381109MVWWFAA"></div>
   <br>
<div id="paypal-button-container-P-44E04854V9565890RMVWW6WA"></div> --}}

    </div>
  </section>

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          HandTime
        </h2>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div class="row m-0">
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w1.png" alt="">
                    </div>
                  </a>
                </div>
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w2.png" alt="">
                    </div>
                  </a>
                </div>
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w3.png" alt="">
                    </div>
                  </a>
                </div>
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w4.png" alt="">
                    </div>
                  </a>
                </div>
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w5.png" alt="">
                    </div>
                  </a>
                </div>
                <div class="col-4 px-0">
                  <a href="">
                    <div class="insta-box b-1">
                      <img src="images/w6.png" alt="">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section>
  <!-- monthly subscription -->


  <!-- yearly subscription -->


  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

















