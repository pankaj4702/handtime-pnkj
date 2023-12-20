 <!-- Navbar -->

 @include('navigation')

  <!-- Main Sidebar Container -->

<body class="sub_page" style="margin-top:100px;">
  <div class="container" style="margin-bottom:30px;">
    <label for="">Product Name</label>
    <input type="text" name="name" id="name" placeholder="Search the product"  autocomplete="off">
    <div id="product_list"></div>
  </div>

  <!-- product section -->
  <section class="product_section " >
    <div class="container">

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
                @foreach($cart_products as $c_product)
                @if($c_product->product_id == $product_id)

                <div class="bo-cart-{{ $product_id }} d-none">
                 <a onclick="add_cart({{ $product_id }})" style="cursor: pointer;" >
                       <i class="fa fa-shopping-cart cart_image"   aria-hidden="true"></i>
                     </a>
                </div>
                     @endif
                     @endforeach

                     <div  class="bo-cart-b-{{ $product_id }} " >
                      <a onclick="add_cart({{ $product_id }})" style="cursor: pointer;" >
                       <i class="fa fa-shopping-cart cart_image pnkj"   aria-hidden="true"></i>
                     </a>
                      </div>
                   @elseif($product->status == 0)
                         <h6>Not Available</h6>
                         @endif
                         </div>
                         @foreach($wish_products as $w_product)
                      @if($w_product->product_id == $product_id)
                      <div class="heart-{{$product_id}}">
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
              <button class="wish-btn" onclick="add_wishlist({{ $product_id }})">
                Add To Wishlist
              </button>
              {{-- </a> --}}
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- footer section -->
  @include('footer')

  <script>
    $(document).ready(function(){

      $('#name').on('keyup',function(){
        var value = $(this).val();

        $.ajax({
          url:"{{ route('search') }}",
          type:"GET",
          data:{
            'name':value
          },
          success:function(data){
              console.log(data);
                $('#product_list').html(data);
          }
        });

      })
    });
  </script>

</body>
