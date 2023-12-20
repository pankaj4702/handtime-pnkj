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
  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <script src="https://code.jquery.com"> </script>
</head>
<body>
    <div id="paypal-button-container-P-59T81197X85840601MVXRKFY"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=ARNJnXNRt51i4y59_gRQ3KczGD5bP7eGCoVFbeAl8NaI_RAzt3DptaiWTC_NqadwdZ3V6KVdGxpaWvLh&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
    <script>
      paypal.Buttons({
          style: {
              shape: 'rect',
              color: 'blue',
              layout: 'horizontal',
              label: 'paypal'
          },
          createSubscription: function(data, actions) {
            return actions.subscription.create({
              /* Creates the subscription */
              plan_id: 'P-59T81197X85840601MVXRKFY'
            });
          },
          onApprove: function(data, actions) {
            alert(data.subscriptionID); // You can add optional success message for the subscriber here
          }
      }).render('#paypal-button-container-P-59T81197X85840601MVXRKFY'); // Renders the PayPal button
    </script>
</body>
</html>
