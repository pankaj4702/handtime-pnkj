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
                    <div class="footer-con">
                        <div class="footer-con-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p>
                            Address
                        </p>
                    </div>
                    <div>
                        <div class="footer-con">
                            <div class="footer-con-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <p>
                            +01 1234567890
                        </p>
                    </div>
                    <div>
                        <div class="footer-con">
                            <div class="footer-con-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
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
                                        <img src="{{asset('images/w1.png')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 px-0">
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="{{asset('images/w2.png')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 px-0">
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="{{asset('images/w3.png')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 px-0">
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="{{asset('images/w4.png')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 px-0">
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="{{asset('images/w5.png')}}" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 px-0">
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="{{asset('images/w6.png')}}" alt="">
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
                    {{-- <form> --}}
                        {{-- <input type="email" id="emailforsubscribe" class="form-control"
                            placeholder="Enter your email" autocomplete="off"><br> --}}
                        <button class="subscribe-btn" style="outline: none;" onclick="subscribe()">
                            Subscribe
                        </button>
                       
                    <div class="social_box">
                        <a href="">
                            <img src="{{ asset('images/fb.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('images/twitter.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('images/linkedin.png') }}" alt="">
                        </a>
                        <a href="">
                            <img src="{{ asset('images/youtube.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer Line -->
<section class="footer_section">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
        </p>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function subscribe(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                  url: "{{ route('sendMail') }}",
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                  },
                  success: function(response) {
                    if(response.status == 0){
                        location.href = "{{ route('login') }}";
                    }
                    else if(response.status == 1){
                        Swal.fire({
                            title: 'Subscribe',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#emailforsubscribe').val('');
                                 }
                                });
                            }
                    else if(response.status == 3){
                        Swal.fire({
                            title: 'This User Already Subscriber',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonColor: '#e76363',
                        }).then((result) => {
                            if (result.dismiss) {
                                $('#emailforsubscribe').val('');
                                 }
                                });
                            }
                        },
                  });
       
               
    
    }   
</script>