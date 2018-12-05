<!DOCTYPE html>
<html lang="en">
<head>
    <title>Review & Win | My Coupons</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="bg-dark text-white " id="emailVerifiedWarning">
        <div class="container">
            <p class="text-center p-3" style="margin:0"><i class="fa fa-warning mr-2"></i>Your email is not verified. Check your mailbox. You will not be able to write any review or rate any review until your email is verified.</p>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center bg-white loader flex-column">
        <img src="images/loader.gif" width="140px">
        <h2>Fetching your coupons...</h2>
    </div>
    <div id="headerMin" class="container-fluid">
        <?php require("header_top_min.php"); ?>
    </div>
    <div id="productInfo" class="container pb-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 pl-5 right" style="position:relative">
                <div class="container" style="min-height:500px">
                    <h4 class="mt-5">My Coupons</h4>
                    <div class="grid_view shop_view">
                        <div class="review_list">
                            <h2 class="text-center" style="color:#b721ff"><i class="fa fa-spinner spinner"></i> Fetching coupons..</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php require("footer.php"); ?>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto+Condensed:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>
    <script src="js/main.js"></script>
    <script>
    var _shopList=[
        {name:"Shop 1",image:"shop1.jpg"},
        {name:"Shop 2",image:"shop2.jpg"},
        {name:"Shop 3",image:"shop3.jpg"},
    ]
    var _currentShop=-1;
    var _firebase=firebase.database().ref();
    $(document).ready(function() {
        setTimeout(function() {
            _firebase.child("users/"+_email+"/coupons/").on("value",function(_data) {
                var _array=_data.val();
                $(".grid_view").html("")
                for(var _coupon in _array) {
                    $(".grid_view").append('<div class="grid_item" style="width:250px;background-image:url(\'images\/'+_shopList[_array[_coupon].shop].image+'\')"><div class="d-flex flex-column">\
                    <h2>'+_shopList[_array[_coupon].shop].name+"<br><span style='font-size:16px'>(CODE: <b>"+_array[_coupon].token+"</b>)</span><br><span style='font-size:16px'>Amount: <i class='fa fa-rupee mr-2'></i>"+parseFloat(_array[_coupon].points*0.20).toFixed(2)+'</span></h2>\
                    </div></div>');
                }
                if(!_array || _array.length==0) {
                    $(".grid_view").html('<p class="text-center"><i class="fa fa-info-circle mr-2"></i>No coupons found!</p>')
                }
            });
        },3000);
        $(".shop_view .grid_item").click(function() {
            if(_userPoints >= 100) {
                var _id=$(this).attr("rel")
                _currentShop=_id;
                $("#shopImage").attr("src","/images/"+_shopList[_id].image)
                $("#shopName").text(_shopList[_id].name)
                $("#modalShop").modal();
            } else {
                alert("You have less than 100 points.")
            }
        });
    });
</script>
</html>
