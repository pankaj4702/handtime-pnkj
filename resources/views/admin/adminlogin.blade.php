<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-Login or Sign up</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
   
    
    


    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
           
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    color: #1c1e21;
}

main {
    height: 90vh;
    width: 100vw;
    position: relative;
    margin: 0 auto;
}

footer {
    height: 10vh;
    background-color: #ffffff;
}

.row {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    max-width: 1000px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.colm-logo {
    flex: 0 0 50%;
    text-align: left;
}

.colm-form {
    flex: 0 0 40%;
    text-align: center;
}

.colm-logo img {
    max-width: 400px;
}

.colm-logo h2 {
    font: 26px;
    font-weight: 400;
    padding: 0 30px;
    line-height: 32px;
}

.colm-form .form-container {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    max-width: 400px;
}

.colm-form .form-container input, .colm-form .form-container .btn-login {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
}

.colm-form .form-container input {
    border: 1px solid #dddfe2;
    color: #1d2129;
    padding: 0 8px;
    outline: none;
}

.colm-form .form-container input:focus {
    border-color: #1877f2;
    box-shadow: 0 0 0 2px #e7f3ff;
}

.colm-form .form-container .btn-login {
    background-color: #1877f2;
    border: none;
    border-radius: 6px;
    font-size: 20px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
}

.colm-form .form-container a {
    display: block;
    color: #1877f2;
    font-size: 14px;
    text-decoration: none;
    padding: 10px 0 20px;
    border-bottom: 1px solid #dadde1;
}

.colm-form .form-container a:hover {
    text-decoration: underline;
}

.colm-form .form-container .btn-new {
    background-color: #42b72a;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    line-height: 48px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
    margin-top: 20px; 
}

.colm-form p {
    font-size: 14px;
}

.colm-form p a {
    text-decoration: none;
    color: #1c1e21;
    font-weight: 600;
}

.colm-form p a:hover {
    text-decoration: underline;
}

.footer-contents {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
}

footer ol {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    padding: 10px 0;
}

footer ol:first-child {
    border-bottom: 1px solid #dddfe2;
}
           
footer ol:first-child li:last-child button {
    background-color: #f5f6f7;
    border: 1px solid #ccd0d5;
    outline: none;
    color: #4b4f56;
    padding: 0 8px;
    font-weight: 700;
    font-size: 16px;
}

footer ol li {
    padding-right: 15px;
    font-size: 12px;
    color: #385898;
}

footer ol li a {
    text-decoration: none;
    color: #385898;
}

footer ol li a:hover {
    text-decoration: underline;
}

footer small {
    font-size: 11px;
}
    </style>
   
</head>

<body>
    <main>
        <div class="row">
            
            <div class="colm-form">
               
                <div class="form-container">
                    <div> <h1>Login Admin</h1></div>&nbsp;
                    @if (count($errors) > 0)
                    <div  class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                             <li id="mydiv" style="color:red;">{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('error'))
    <div class="alert alert-danger">
            <ul>
                <li style="color:red;"> {{ session('error') }}</li>
            </ul>
       
    </div>
      @endif
      &nbsp;&nbsp;&nbsp;
                    <form action="{{url('/login-admin')}}" method="POST">
                        @csrf
                    <input type="text" name="email" placeholder="Email address ">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" class="btn-login" value="login" >
                    <a href="{{url('/')}}">Back</a>
                    </form>
                    <!-- <button class="btn-new">Create new Account</button> -->
                </div>
               
            </div>
        </div>
    </main>
    
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