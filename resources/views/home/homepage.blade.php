
    @include('navigation')
    <!-- end header section -->
    <!-- slider section -->
    <style>
      section.slider_section {
    height: 500px;
}
.slider_bg_box img {
    width: 100%;
    height: 500px;
}
.image-div{
  background:#e3a7f5;
  width: 400px;
  height: 80px;
  border-radius:8px;
  /* text-align:center; */
  padding:auto 10px;;
}
    </style>
    <div>
    <section class="slider_section " style="margin-top:75px;">
      <div class="slider_bg_box">
        <img src="images/slider-bg.jpg" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                    Stylish Watches
                    </h1>
                    @if($coupon)
                    <div class="image-div">
                      <p style="color:black;padding:16px;">
                      <span><b>{{ $coupon->discoount }}%</b> off a Purchase of <b>${{ $coupon->above_price }}</b> or more.</span><br>
                      <span>  USE &nbsp;&nbsp;<strong>{{$coupon->coupon}}</strong>&nbsp;&nbsp;&nbsp;Code.</span>

                      </p>
                    </div>
                    @endif
                    <br>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Stylish Watches
                    </h1>
                    @if($coupon)
                    <div class="image-div">
                      <p style="color:black;padding:16px;">
                      <span><b>10%</b> off a Purchase of <b>$1500</b> or more.</span><br>
                      <span>  USE &nbsp;&nbsp;<strong>{{$coupon->coupon}}</strong>&nbsp;&nbsp;&nbsp;Code.</span>

                      </p>
                    </div>
                    @endif
                    <br>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      Stylish Watches
                    </h1>
                    @if($coupon)
                    <div class="image-div">
                      <p style="color:black;padding:16px;">
                      <span><b>10%</b> off a Purchase of <b>$1500</b> or more.</span><br>
                      <span>  USE &nbsp;&nbsp;<strong>{{$coupon->coupon}}</strong>&nbsp;&nbsp;&nbsp;Code.</span>

                      </p>
                    </div>
                    @endif
                    <br>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>

        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- service section -->

  <section class="service_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24x7 Customer support
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="images/a-1.jpg" alt="">
            </div>
            <div class="img-box b2">
              <img src="images/a-2.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              About Our Shop
            </h2>
            <p>
              There are many variations of passages of Lorem Ipsum
              There are many variations of
              passages of Lorem Ipsum
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->


  <!-- product section -->
  @if(isset($products))
  <section class="product_section ">
    <div class="container">
      <div class="product_heading">
        <h2>
          New Watch Collection
        </h2>
      </div>

      <div class="product_container">

      @foreach($products as $product)
        @php
        $imageName = $product->image_name;
        $product_id = $product->id;
        @endphp
        <div class="box">
          <div class="box-content">
            <div class="main-cart">
            <div class="cart-l">
             @if($product->status != 0)
             <div class="heart-{{$product_id}} ">
              <a onclick="add_cart({{ $product_id }})" style="cursor: pointer;" >

                    <i class="fa fa-shopping-cart cart_image"   aria-hidden="true"></i>
                  </a>
             </div>
                @elseif($product->status == 0)
                      <h6>Not Available</h6>
                      @endif
                      </div>
                      @foreach($wish_products as $w_product)
                      @if($w_product->product_id == $product_id)
                      <div class="heart-{{$product_id}} ">
                        <a class="" href="{{route('userwishlist')}}">
                        <i class="fa-solid fa-heart cart_image"></i>
                        </a>
                      </div>
                      @endif
                      @endforeach
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
              <button class="wish-btn" onclick="add_wishlist({{ $product_id }})">
                Add To Wishlist
              </button>
              {{-- </a> --}}
            </div>

          </div>
        </div>

      </div>
      @endforeach
      <div ><a href="{{ route('product') }}">
        <button class="more_btn">More</button>
      </a>
      </div>

    </div>
  </section>
  @endif


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div id="customCarousel2" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach($all_testi_review as $review)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <div class="container">
            <div class="row">
              <div class="col-md-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    @if($review->image == null)
                    <img  src="{{asset('storage/uploads/default_image.png') }}" alt="">
                    @else
                    <img  src="{{ asset('storage/' . $review->image) }}" alt="">
                    @endif
                  </div>
                  <div class="detail-box">
                    <div class="client_info">
                      <div class="client_name">
                        <h5>
                         {{ $review->name }}
                        </h5>
                        <h6>
                          Customer
                        </h6>
                      </div>
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <p>
                        {{ $review->review }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       @endforeach

      </div>
      <ol class="carousel-indicators">
        <li data-target="#customCarousel2" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel2" data-slide-to="1"></li>
        <li data-target="#customCarousel2" data-slide-to="2"></li>
      </ol>
    </div>
  </section>
  <!-- end client section -->


  <!-- info section -->
 @include('footer')
  <!-- footer section -->


  <!-- jQery -->
  {{-- <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> --}}
  <!-- popper js -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
  <!-- bootstrap js -->
  {{-- <script type="text/javascript" src="js/bootstrap.js"></script> --}}
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>
