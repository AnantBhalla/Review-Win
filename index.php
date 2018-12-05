<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Review & Win</title>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="description" content="">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="bg-dark text-white" id="emailVerifiedWarning">
            <div class="container">
                <p class="text-center p-3" style="margin:0"><i class="fa fa-warning mr-2"></i>Your email is not verified. Check your mailbox. You will not be able to write any review or rate any review until your email is verified.</p>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center bg-white loader flex-column">
            <img src="images/loader.gif" width="140px">
            <h2>Loading...</h2>
        </div>
        <div id="header" class="container-fluid">
            <?php require("header_top.php"); ?>
            <div class="d-flex justify-content-center align-items-center" id="headerBottom">
                <div class="d-flex flex-column">
                    <h1>Review & Win</h1>
                    <form action="search.php" method="get">
                        <input name="q" type="text" placeholder="Search for books, electronics, movies..">
                    </form>
                    <div class="d-flex justify-content-center">
                        <a href="categories.php?f=Automotive&s=Bikes"><i class="fa fa-motorcycle"></i>Bikes</a>
                        <a href="categories.php?f=Electronics&s=Air%20Conditioners"><i class="fa fa-plug"></i>Air Conditioners</a>
                        <a href="categories.php?f=Computers&s=Softwares"><i class="fa fa-desktop"></i>Software</a>
                        <a href="categories.php?f=Mobile%20and%20Internet&s=Mobile%20phones"><i class="fa fa-mobile"></i>Mobile Phones</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="working" class="container">
            <div class="d-flex flex-column justify-content-center pt-4 pb-5">
                <h2 class="mt-5 text-center">Our Working Process</h2>
                <p style="color:#555" class="text-center">Submit a review. Get points for review. Exchange points for coupons. Use Coupons. Isn't that interesting? Just write reviews and get rewarded. </p>
                <div class="d-flex items_group mt-5 mb-4">
                    <div class="d-flex flex-column items">
                        <div class="rounded text-center">
                            <i class="fa fa-comments-o"></i>
                        </div>
                        <p>1. Submit a review</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="images/arrow.png" width="70px" height="30px">
                    </div>
                    <div class="d-flex flex-column items">
                        <div class="rounded text-center">
                            <i class="fa fa-gift"></i>
                        </div>
                        <p>2. Get points for reviews</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="images/arrow.png" width="70px" height="30px">
                    </div>
                    <div class="d-flex flex-column items">
                        <div class="rounded text-center">
                            <i class="fa fa-exchange"></i>
                        </div>
                        <p>3. Exchange points for coupons</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="images/arrow.png" width="70px" height="30px">
                    </div>
                    <div class="d-flex flex-column items">
                        <div class="rounded text-center">
                            <i class="fa fa-tags"></i>
                        </div>
                        <p>4. Use coupons</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="recentReviews" class="container-fluid pt-4 pb-5">
            <div class="container pt-5">
                <h2 class="text-center">Recent Reviews</h2>
                <p style="color:#555" class="text-center mb-5">These are some of the recent reviews which are highly rated by other users.</p>
                <div class="slick_container">

                </div>
            </div>
        </div>
        <div id="category" class="container-fluid pt-4 pb-5">
            <div class="container pt-5">
                <h2 class="text-center">Categories</h2>
                <p style="color:#555" class="text-center mb-5">These are some of the highly reviewed categories. Click on any of them to list all products in that category.</p>
                <div class="grid_view">

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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>
    <script src="js/main.js"></script>
    <script>
        var _stars={
            0:'<i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>',
            1:'<i class="fa fa-star selected"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>',
            2:'<i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>',
            3:'<i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star"></i>\
            <i class="fa fa-star"></i>',
            4:'<i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star"></i>',
            5:'<i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>\
            <i class="fa fa-star selected"></i>',
        }
        $(document).ready(function() {
            firebase.database().ref().child("/reviews/").limitToLast(5).on("value",function(_snapshot) {
                var _html="";
                var _array=_snapshot.val();
                for(var _node in _array) {
                    var _title=_array[_node]['category'].split("|")[2].toLowerCase().replace(/ /g,"_").replace(/\//g,"_")+".jpg"
                    _html+="<div onclick='location.href=\"product.php?f="+_array[_node]['category'].split("|")[0]+'&s='+_array[_node]['category'].split("|")[1]+'&p='+_array[_node]['category'].split("|")[2]+"\"' class='slick_item'><img style='background-image:url(\"images1/"+_title+"\")'><div class='d-flex flex-column'><h6>"+_array[_node]['title']+"</h6><p>By "+_array[_node]['name']+"</p><p><i class='fa fa-thumbs-up'></i> "+_array[_node]['count']+"</p></div></div>";
                }
                $(".slick_container").html(_html)
                $('.slick_container').slick({
                    infinite: true,
                    dots:true,
                    slidesToShow: 4,
                    autoplaySpeed:3000,
                    slidesToScroll: 1,
                    autoplay:true,
                });
            });
            firebase.database().ref().child("/reviews/").on("value",function(_snapshot) {
                var _html="";
                var _array=_snapshot.val();
                var _dict={}
                var _dictImage={}
                var _dictCat={}
                for(var _node in _array) {
                    var _title=_array[_node]['category'].split("|")[2].toLowerCase().replace(/ /g,"_").replace(/\//g,"_")+".jpg"
                    var _nodeCat=_array[_node]['category'].split("|")[2]
                    _dict[_nodeCat]=(_dict[_nodeCat] || 0) + 1
                    _dictImage[_nodeCat]=_title
                    _dictCat[_nodeCat]=_array[_node]['category']
                }
                console.log(_dictImage);
                var i=0;
                for(var _node in _dict) {
                    $(".grid_view").append('<div onclick="location.href=\'product.php?f='+_dictCat[_node].split("|")[0]+'&s='+_dictCat[_node].split("|")[1]+'&p='+_dictCat[_node].split("|")[2]+'\'" class="grid_item" style="width:250px;background-image:url(\'images1\/'+_dictImage[_node]+'\')"><div class="d-flex flex-column">\
                        <h2>'+_node+'</h2>\
                    </div></div>');
                    i+=1;
                    if(i==8) {
                        break;
                    }
                }
            });
        });
    </script>
</html>
