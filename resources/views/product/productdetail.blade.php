 
 
@include('navigation')
<section class="product_section ">
    <div class="container-det container">
      <div class="detail-container row">
            <div class="img-box">
              <a href="#">
            <img style="width:18em;padding:4em 0px;" src="{{ asset('storage/' . $product->image_name) }}" alt="Image">
              </a>
            </div>
            <div class="detail-box col-sm-6">
              <h5 style="text-align:left;">
                <b>{{$product->product_name}}</b> 
                 </h5>
                 <h5>
                   <span>$</span> {{$product->price}}
                 </h5>
                 <div>
                   <p class="txt-line" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga quo dolores ipsa vitae non illo, quod ex laboriosam natus, explicabo ducimus eius, cupiditate eum? Porro dolorum quae dolor cumque deserunt.</p>
                 </div>
               <!-- star rating -->
                 <div class="rating-box">
                   <header class="txt-line">How was your experience?</header>
                   @php
                     $selectedRating = isset($rating) ? $rating : 0;
                   @endphp
                   <div class="stars" data-value="{{ $product->id }}">
                     @for ($i = 1; $i <= 5; $i++)
                         <i class="fa-solid fa-star{{ $i <= $selectedRating ? ' active' : '' }}" data-rating="{{ $i }}"></i>
                     @endfor
                 </div>
                 </div>
                 <!-- end star rating -->
                 <br>
                 <div class="rating-box review">
                  <form >
                    @csrf
                 
                  <div class="form-group">
                    <textarea style="outline:none;border-radius:10px;" class="form-control" id="exampleFormControlTextarea1" name='value' rows="3"></textarea><br>
                    <button type="button" class="wish-btn" style="outline:none;" onclick="add_review({{ $product->id }})">Share</button>
                  </div>
                </form>
                  <div>
                </div>
                </div>
            </div>
            <div class=" box payment-box col-sm-3">
                <div>
                  <span style="font-family: Bell MT;">Amount :</span>  <span>$</span> {{$product->price}}
                </div>
                <div>
                  <span style="font-family: Bell MT;">Shipping Fee :</span>  <span>$</span> 0
                </div>
                <br>
                @if(isset($current_coupon))
                <form action="">
                  Coupon Code 
                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" >
                    
                    <input type="hidden" id="product_price" value="{{$product->price}}">
                    <div id="coupon-div" data-value="{{ $current_coupon->discoount }}"></div>
           
                    <div id="above_price" data-value="{{ $current_coupon->above_price }}"></div>
                </form>
                @endif
                <div class="detail-box">
                  <div class="btn-box">
                    <form action="{{url('/pay/'. $product->id)}}" method="POST">
                      @csrf
                      <input type="hidden" id='pay_value' name="amount" value="{{$product->price}}" >
                      <br>
                      <button class="wish-btn"  type="submit">Buy Now</button>
                    </form>
                  </div>
                </div>
            </div>
      </div>
    </div>
</section>
<section class="container review-section">
  <div class=" product_heading-detail pk d-none ">
    User's Reviews
  </div><br>
  @if($all_reviews->isNotEmpty())
  <div class=" product_heading-detail ">
    User's Reviews
  </div><br>
  @endif
  <div class="main-review-container">
  @foreach($all_reviews as $review)
    <div class="review-b-box">
      <div><h3 class="txt-line" style="font-weight: bold;">{{$review->name}}</h3></div>
      <div><p class="txt-line" >{{ $review->review }}</p></div>
    </div><br><br>
    @endforeach
  </div>
@if($all_reviews->isNotEmpty())
    <div ><a href="#">
      <button class="more_btn">More</button>
    </a>
  </div>
  @endif
</section>
  
  <!-- footer section -->
  @include('footer')
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            var numericInput = document.getElementById('pay_value');

            numericInput.addEventListener('input', function() {
                numericInput.value = numericInput.value.replace(/[^0-9]/g, '');       
            });
        });
    </script>
   

<script>
   $(document).ready(function () {
    $('#error').hide();
    $('#error2').hide();
    $('#success').hide();
        $('#coupon_code').on('input', function () {
            var inputValue = $(this).val();
            var productPrice = $('#product_price').val();
            var myDiv = document.getElementById('coupon-div');
            var dataValue = myDiv.getAttribute('data-value');
             var above_price = document.getElementById('above_price');
            var d_above_price = above_price.getAttribute('data-value');
            
            $.ajax({
                type: 'POST',
                url: '/check-coupon',
                data: { value: inputValue,
                price: productPrice,
                discount:dataValue,
                above_price: d_above_price,
                },
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                success: function(response) {
                  if (response.price) {
                    $('#error').remove();
                          if ($('#mydiv').find('.discount-price').length === 0) {
                        $('#mydiv').append(`<span class='discount-price' style="font-family: Bell MT;">Discount Price :`+`$`+response.price+`</span>`);
                          }
                          $('#pay_value').val(response.price);
                  }
                  else if(response.actualPrice){
                    $('.discount-price').remove();
                    if ($('#mydiv').find('#error').length === 0) {
               $('#mydiv').append(`<span id="error"> Incorrect Code</span>`);
                    }
               $('#pay_value').val(response.actualPrice);
                  } 
                }
            });
        });
    });
</script>
<script>
  const stars = document.querySelectorAll(".stars i");
  stars.forEach((star, index1) => {
  star.addEventListener("click", () => {
    stars.forEach((star, index2) => {
      index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
      });
    });
  });
    $('.stars i').on('click', function() {
            var selectedRating = $(this).data('rating');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var myElement = $('.stars')
            var dataValue = myElement.data('value');
            var loginRoute = "{{ route('login') }}";
            $.ajax({
                  url: "{{ route('addrating') }}",
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    Rating :selectedRating,
                    productId:dataValue,
                  },
                  success: function(response) {
                   if(response.status == 0){
                    location.href = loginRoute;
                   }
                  },
              });

        });
</script>
<script>
  function add_review(product_id){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var textareaValue = document.getElementById('exampleFormControlTextarea1').value;

        $.ajax({
          url: "{{route('addreview')}}",
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    productId :product_id,
                    value : textareaValue,
                  },
                  success: function(response) {

                    if(response.status == 0){
                    location.href = '/login';
                   }
                   else{
                    $('#exampleFormControlTextarea1').val('');
                    if(response.userName != undefined){
                      $('.pk').removeClass('d-none');
                    $('.main-review-container').append(`<div class="main-review-container">
                <div class="review-b-box">
                  <div><h3 class="txt-line" style="font-weight: bold;">`+response.userName+`</h3></div>
                  <div><p class="txt-line">`+response.review+`</p></div>
                </div><br><br>
              </div>`);
                      }
                   }
                  },
                  error: function(error) {
                    // console.error('Error Updating data:', error.responseText);
                    if (error.responseJSON && error.responseJSON.message) {
                        alert('Error: ' + error.responseJSON.message);
                    } else {
                        alert('An error occurred.');
                    }
                 }
              });
             }
</script>

  

 



  


