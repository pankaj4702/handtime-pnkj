 <!-- Navbar -->

 @include('navigation')

  <!-- Main Sidebar Container -->

<body class="sub_page">

  <!-- product section -->
  <section class="product_section">
    <div class="container">
        <div class="product_heading">
            <h2>
              Your Orders
            </h2>
          </div>
      <div class="product_container">
      @foreach($user_products as $product)
        <div class="box">
          <div class="box-content">
            <div class="img-box">
            <img src="{{ asset('storage/' . $product->image_name)}}" alt="Image">
            </div>
            <div class="detail-box">
              <div class="text">
                <h6>
                {{$product->product_name}}
                </h6>
                <h5>
                  <span>₹</span> {{$product->price}}
                </h5>
              </div>
              <div class="btn-box">
              <a href="#">
            Cancel Order
            </a>
          </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- footer section -->
 @include('footer')
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
