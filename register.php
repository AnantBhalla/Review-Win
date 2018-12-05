<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Review & Win | Register</title>
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
                    <p>Member Registration</p>
                    <input class="form_input" type="text" placeholder="Enter your Full Name here.." id="authName">
                    <input class="form_input" type="email" placeholder="Enter your Email ID here.." id="authEmail">
                    <input class="form_input" type="password" placeholder="Enter your Password here.." id="authPassword">
                    <input class="form_input" type="password" placeholder="Re-enter your Password here.." id="authRPassword">
                    <button class="form_submit" id="authSubmit"><span>Register</span></button>
                    <a href="/login.php">Already a member? <b>Login here.</b></a>
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
                var _email=_password=_rpassword=_fName="";
                $("form").submit(function(_event) {
                    _event.preventDefault();
                    console.log("removing style");
                    $(".loader h2").text("Registering you on Review Sys..");
                    $(".loader").removeAttr("style");
                    var _email = $("#authEmail").val();
                    var _fName = $("#authName").val();
                    var _password =$("#authPassword").val();
                    var _rpassword =$("#authRPassword").val();
                    if(_password.trim()!==_rpassword.trim()) {
                        alert("Password don't match!");
                        $(".loader").attr("style","display: none !important");
                    } else if(_email.trim()!=="" && _password.trim()!="" && _fName.trim()!=="") {
                        firebase.auth().createUserWithEmailAndPassword(_email,_password).then(function(_user) {
                            var _user=firebase.auth().currentUser;
                            var database = firebase.database();
                            var _tempEmail=_email;
                            _email=_email.trim().replace(/\./g,"_");
                            var _user={
                                    "full_name":_fName,
                                    "email":_tempEmail,
                            };
                            database.ref().child("users").child(_email).child("details").set(_user);
                            $(".loader").attr("style","display: none !important");
                        }).catch(function(_error1) {
                            var _code=_error1.code;
                            if(_code=="auth/invalid-email") {
                                alert("Invalid email id.")
                            } else if(_code=="auth/email-already-in-use") {
                                alert("User already exists.")
                            } else if(_code=="auth/weak-password") {
                                alert("Your password is weak.")
                            } else {
                                alert("Server error. Try again later.")
                            }
                            $(".loader").attr("style","display: none !important");
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
