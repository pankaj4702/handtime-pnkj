
    function add_wishlist(product_id){
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
                url: 'add-wishlist',
                type: 'POST',
                data:{
                  _token: csrfToken,
                  productId :product_id,
                },
                success: function(response) {
                  var loginRoute = 'login';
                 if(response.status == 0){
                  location.href = loginRoute;
                 }
                 else{
                  var id = response.id;
                  $('.heart-' + id).removeClass('d-none');
                 }
                }
            });
    }


    function remove_wishlist(product_id){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
                url: 'remove-wishlist',
                type: 'POST',
                data:{
                  _token: csrfToken,
                  productId :product_id,
                },
                success: function(response) {
                  var id = response.id;
                  $('.bo-' + id).addClass('d-none');
                },
            });
    }

    function add_cart(product_id){
   
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                  url: 'add-cart',
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    productId :product_id,
                  },
                  success: function(response) {
                    var id = response.id;
                    var loginRoute = 'login';
                    if(response.status == 0){
                        alert(response.error);
                    }
                   else if(response.status == 2){
                    location.href = loginRoute;
                   }
               
                  },
              });
        
    }
    function remove_cart(product_id){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                  url: 'remove-cart',
                  type: 'POST',
                  data:{
                    _token: csrfToken,
                    productId :product_id,
                  },
                  success: function(response) {
                    var id = response.id;
                    $('.car-' + id).addClass('d-none');
                  },
              });
        
    }

    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    

    



   
    
