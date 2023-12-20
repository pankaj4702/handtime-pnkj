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



  <!-- footer section -->
 @include('footer')
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

















