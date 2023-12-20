@include('navigation')
<body class="sub_page">

  <!-- product section -->


  <!-- end product section -->


  <!-- product section -->

  <section class="product_section ">
    <div class="container">
      <div class="product_heading">
        <h2>
          Your Wish Product
        </h2>
      </div>

      <div class="product_container">

      @foreach($product_details as $product)
        @php
        $imageName = $product->image_name;
        $product_id = $product->id;
        @endphp
        <div class="box bo-{{$product_id}} ">
          <div class="box-content">
            <div class="main-cart">
            <div class="cart-l">
             @if($product->status != 0)
              <a href="{{route('addCart',['id'=>$product_id])}}">

                    <i class="fa fa-shopping-cart cart_image"   aria-hidden="true"></i>
                  </a>
                @elseif($product->status == 0)
                      <h6>Not Available</h6>
                      @endif
                      </div>

                    <div class="heart-{{$product_id}} d-none">
                      <a class="" href="{{route('userwishlist')}}">
                    <i class="fa-solid fa-heart cart_image"></i>
                      </a>
                </div>

              </div>
            <div class="img-box">
              <a href="{{ route('productdetail', ['id' => $product_id]) }}">
            <img src="{{ asset('storage/' . $imageName) }}" alt="Image">
              </a>
            </div>
            <span>{{ $product_id }}</span>
            <div class="main-dt">
            <div class="detail-box">
              <div class="text">
                <h6><b>
                {{$product->product_name}}
                </b>
                </h6>
                <h5>
                <span>$</span> {{$product->price}}
                </h5>
              </div>

          </div>
          <div class="">
            {{-- <a href="{{ url('/add-wishlist/' . $product_id) }}"> --}}
              <button class="wish-btn" onclick="remove_wishlist({{ $product_id }})">
                Remove
              </button>
              {{-- </a> --}}
            </div>

          </div>
        </div>

      </div>
      @endforeach


    </div>
  </section>


  <!-- end product section -->
@include('footer')

  <!-- footer section -->

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
