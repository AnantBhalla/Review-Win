<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Review & Win | Login</title>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="description" content="">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/auth.css">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center bg-white loader flex-column">
            <img src="images/loader.gif" width="140px">
            <h2>Loading...</h2>
        </div>
        <div class="auth_container d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <h1 class="text-center text-white" onclick="location.href='/index.php'">Review & Win</h1>
                <form class="d-flex flex-column" autocomplete="off">
                    <p>Member Login</p>
                    <input class="form_input" type="email" placeholder="Enter your Email ID here.." id="authEmail">
                    <input class="form_input" type="password" placeholder="Enter your Password here.." id="authPassword">
                    <button class="form_submit" id="authSubmit"><span>Login</span></button>
                    <a href="/register.php">Not a member yet? <b>Register here.</b></a>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto+Condensed:300,400" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>
        <script src="js/auth.js"></script>
        <script>
        $(document).ready(function() {
            $("form").submit(function(_event) {
                $(".loader h2").text("Logging you in...");
                $(".loader").removeAttr("style");
                _event.preventDefault();
                var _email = $("#authEmail").val();
                var _password =$("#authPassword").val();
                if(_email.trim()!=="" && _password.trim()!="") {
                    firebase.auth().signInWithEmailAndPassword(_email, _password).catch(function(_error) {
                        var _errorCode = _error.code;
                        var _errorMessage = _error.message;
                        if (_error.message != "") {
                            $(".loader").attr("style","display: none !important");
                            alert("Invalid Username/Password combination.")
                        }
                    });
                } else {
                    $(".loader").attr("style","display: none !important");
                    alert("Empty fields");
                }
            });
        });
        </script>
    </body>
</html>
