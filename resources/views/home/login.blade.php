<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-Login or Sign up</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
   

    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
#exampleModalCenter{
    margin: 210px 380px;
}
</style>
   
</head>

<body>
    
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
     
      </div>
      <div class="modal-body">
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      @if (session('error'))
    <div class="alert alert-danger">
            <ul>
                <li> {{ session('error') }}</li>
            </ul>
       
    </div>
      @endif
<!-- login form -->
<div class="wrapper">
    <h1>Login </h1>
    <form action="/login-user" method="POST" id="" >
        @csrf
      <div class="input-box">
        <input type="text" name="login_email" placeholder="Enter your email" value="{{ old('login_email') }}" required>
      </div>
      <div class="input-box">
        <input type="password" name="login_password" placeholder="Create password" required>
      </div>
      <div class="input-box button">
        <input type="submit" value="Login Now">
      </div>
      <div class="text">
      </div>
      <div>
      <a href="{{url('/')}}">Back</a>
      </div>
    </form>
  </div>
  <!-- end login form -->
      </div>
    </div>
  </div>
</div>
    
</body>
<script>
    // Get a reference to the div element you want to remove
const divToRemove = document.getElementById('myDiv');
console.log(divToRemove);
// Define the time period in milliseconds (e.g., 5000ms = 5 seconds)
const timePeriod = 2000;

// Set a timeout to remove the div after the specified time period
setTimeout(function() {
    if (divToRemove) {
        divToRemove.remove();
    }
}, timePeriod);
</script>
</html>