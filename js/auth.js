var config = {
    apiKey: "AIzaSyCix5eWY_ck4vVMWQEl7a9FWeeR4VPRilI",
    authDomain: "review-3a64d.firebaseapp.com",
    databaseURL: "https://review-3a64d.firebaseio.com",
    projectId: "review-3a64d",
    storageBucket: "review-3a64d.appspot.com",
    messagingSenderId: "871542780363"
  };
var _email="";
var _userDetails={};
firebase.initializeApp(config);
var database = firebase.database();
firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("User changed");
        console.log(user);
        console.log(user.emailVerified);
        if(user.emailVerified) {
            $(".loader h2").text("Redirecting to home...")
            location.href="/index.php";
        } else {
            user.sendEmailVerification().then(function() {
                console.log("Email sent.");
                $(".loader h2").text("Redirecting to home...")
                location.href="/index.php";
            }).catch(function(_error) {
                alert("Server error : "+_error);
                $(".loader").attr("style","display: none !important");
            });
        }
    } else {
        $("body .loader").attr("style", "display: none !important")
    }
});
