<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Review & Win | My Reviews</title>
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
            <h2>Fetching your reviews...</h2>
        </div>
        <div id="headerMin" class="container-fluid">
            <?php require("header_top_min.php"); ?>
        </div>
        <div id="productInfo" class="container pb-5 mb-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 pl-5 right" style="position:relative">
                    <div class="container" style="min-height:500px">
                        <h4 class="mt-5">My Reviews</h4>
                        <div class="review_list">
                            <h2 class="text-center" style="color:#b721ff"><i class="fa fa-spinner spinner"></i> Fetching reviews..</h2>
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
        var _firebase=firebase.database().ref();
        $(document).ready(function() {
            setTimeout(function() {
                _firebase.child("users/"+_email+"/reviews/").on("value",function(_snapshot) {
                    var _html="";
                    var _array=_snapshot.val();
                    var _count=0;
                    _arrayList=_array;
                    for(var _node in _array) {
                        var _content=_array[_node].desc;
                        _temp="";
                        _flag='';
                        if(_content.length > 250) {
                            _flag='<a rel="'+_node+'" class="review_item_view_full">View full review<i class="ml-1 fa fa-angle-down"></i></a>';
                            _temp=_content.substr(0,250)+"...";
                        } else {
                            _temp=_content;
                        }
                        _count+=parseInt(_array[_node].rating);
                        _html+='<div class="review_item row">\
                            <div class="review_item_left col-lg-2 col-md-2">\
                                <img src="images/img_avatar.png" class="review_item_userpic">\
                                <p class="review_item_username">'+_array[_node].name+'</p>\
                            </div>\
                            <div class="review_item_right col-lg-10 col-md-10">\
                                <h5>'+_array[_node].title+' <b class="ml-5" style="color:#b721ff">('+_array[_node].category.split("|").join(" / ")+')</b></h5>\
                                <div class="d-flex">\
                                    <div class="review_item_ratings mr-5">\
                                        '+_stars[parseInt(_array[_node].rating)]+'\
                                    </div>\
                                    <span class="mr-5 review_item_text"><i class="fa fa-eye"></i> '+_array[_node].count+'</span>\
                                    <span class="review_item_text">'+(new Date(_array[_node].time).toUTCString())+'</span>\
                                </div>\
                                <p>'+_temp+'</p>\
                                '+_flag+'\
                            </div>\
                        </div>';
                    }
                    if(_array) {
                        var _avg=parseInt(_count/Object.keys(_array).length)
                        $(".topic_overall_rating").html(_stars[_avg]);
                        $(".review_list").html(_html);
                    } else {
                        $(".topic_overall_rating").html(_stars[0]);
                        $(".review_list").html('<h5 class="text-center" style="color:#0009"><i class="fa fa-info-circle mr-2"></i>No reviews found.</h5>');
                    }
                });
            },3000);
            $(document).on("click",".review_item_view_full",function() {
                var _rel=$(this).attr("rel");
                $(this).parent().find("p").text(_arrayList[_rel].desc)
                $(this).remove()
            });
        });
    </script>
</html>
