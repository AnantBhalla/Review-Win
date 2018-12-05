<?php
    if(!isset($_GET['f']) || !isset($_GET['s']) || !isset($_GET['p']) || trim($_GET['f'])=="" || trim($_GET['s'])=="" ||  trim($_GET['p'])=="") {
        die("Incomplete params.");
    }
    $_f=filter_var(trim($_GET['f']),FILTER_SANITIZE_STRING);
    $_s=filter_var(trim($_GET['s']),FILTER_SANITIZE_STRING);
    $_p=filter_var(trim($_GET['p']),FILTER_SANITIZE_STRING);
?>
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
        <div class="bg-dark text-white " id="emailVerifiedWarning">
            <div class="container">
                <p class="text-center p-3" style="margin:0"><i class="fa fa-warning mr-2"></i>Your email is not verified. Check your mailbox. You will not be able to write any review or rate any review until your email is verified.</p>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center bg-white loader flex-column">
            <img src="images/loader.gif" width="140px">
            <h2>Fetching details...</h2>
        </div>
        <div id="headerMin" class="container-fluid">
            <?php require("header_top_min.php"); ?>
        </div>
        <div id="productInfo" class="container pb-5 mb-5">
            <div class="f-flex mt-5 category_crumbs">
                <span class="mr-2 ml-1"><?php echo $_f; ?></span>/
                <span class="mr-2 ml-1"><?php echo $_s; ?></span>
            </div>
            <h3 class="mt-2 mb-3"><?php echo $_p; ?></h3>
            <div class="row">
                <div class="col-lg-3 col-md-3 left">
                    <img src="" class="img-thumbnail" id="mainImage">
                    <div class="d-flex justify-content-center mt-3">
                        <span style="margin-top:0px;margin-right:10px">Ratings : </span>
                        <div class="topic_overall_rating text-center">
                            <p class="fa fa-spinner spinner"></p>
                        </div>
                    </div>
                    <button onclick="writeReviewFunc()" class="topic_write_review"><i class='fa fa-pencil'></i> Write your review</button>
                </div>
                <div class="col-lg-9 col-md-9 pl-5 right" style="position:relative">
                    <div class="container" style="min-height:500px">
                        <h4>Reviews</h4>
                        <div class="review_list">
                            <h2 class="text-center" style="color:#b721ff"><i class="fa fa-spinner spinner"></i> Fetching reviews..</h2>
                        </div>
                    </div>
                    <div class="container pl-5" id="writeReviewForm" style="display:none">
                        <h2>Write a review</h2>
                        <form class="p-2 form_box" style="width:600px">
                            <!-- <div class="form-group mb-4">
                                <label for="inputLikeStatus">Do you like this product?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inputLikeStatus" value="yes">
                                    <label class="form-check-label mr-5" for="exampleRadios1">Yes</label>
                                    <input class="form-check-input" type="radio" name="inputLikeStatus" value="no" id="noLikeStatus" checked>
                                    <label class="form-check-label" for="exampleRadios1">No</label>
                                </div>
                            </div> -->
                            <div class="form-group mb-4">
                                <label for="inputRating">Rating</label>
                                <div class="d-flex" id="inputRating">
                                    <i rel='1' class="fa fa-star selected"></i>
                                    <i rel='2' class="fa fa-star"></i>
                                    <i rel='3' class="fa fa-star"></i>
                                    <i rel='4' class="fa fa-star"></i>
                                    <i rel='5' class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputReviewTitle">Title</label>
                                <input type="text" class="form-control" id="inputReviewTitle" placeholder="Enter the title for review..">
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputReviewDesc">Description</label>
                                <textarea rows="5" class="form-control" id="inputReviewDesc" placeholder="Enter the description for review.."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </form>
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
        var _selectedValue=1;
        var _f="<?php echo $_f; ?>";
        var _s="<?php echo $_s; ?>";
        var _p="<?php echo $_p; ?>";
        _temp1=_p.toLowerCase().replace(/ /g,"_").replace(/\//g,"_")+".jpg"
        $("#mainImage").attr("src","images1/"+_temp1)
        var _arrayList={};
        function writeReviewFunc() {
            var _userTemp=firebase.auth().currentUser
            if(!_userTemp) {
                alert("Your are not logged in.")
            } else if(_emailIsVerified) {
                $("#writeReviewForm").fadeIn();
            } else {
                alert("Your email id is not verified.");
            }
        }
        var _snapshotTemp=null;
        $(document).ready(function() {
            setTimeout(function() {
                _firebase.child("/reviews/").orderByChild("category").equalTo(_f+"|"+_s+"|"+_p).on("value",function(_snapshot) {
                    var _html="";
                    var _array=_snapshot.val();
                    _snapshotTemp=_array;
                    var _count=0;
                    _arrayList=_array;
                    for(var _node in _array) {
                        var _content=_array[_node].desc;
                        _temp="";
                        _flag='';
                        _thumbs='';
                        if(_content.length > 250) {
                            _flag='<a rel="'+_node+'" class="review_item_view_full">View full review<i class="ml-1 fa fa-angle-down"></i></a>';
                            _temp=_content.substr(0,250)+"...";
                        } else {
                            _temp=_content;
                        }
                        console.log("Index : "+_array[_node].users.indexOf(_userDetails.email+","));
                        if(_array[_node].users.indexOf(_userDetails.email+",")==-1) {
                            _thumbs='\
                            <div class="reviews_thumbs_list">\
                                <i type="up" rel="'+_node+'" style="font-size:20px" class="fa fa-thumbs-up mr-2"></i>Like\
                            </div>';
                        }
                        _count+=parseInt(_array[_node].rating);
                        _html+='<div class="review_item row" rel="'+_node+'">\
                            <div class="review_item_left col-lg-2 col-md-2">\
                                <img src="images/img_avatar.png" class="review_item_userpic">\
                                <p class="review_item_username">'+_array[_node].name+'</p>\
                            </div>\
                            <div class="review_item_right col-lg-10 col-md-10">\
                                <h5>'+_array[_node].title+'</h5>\
                                <div class="d-flex">\
                                    <div class="review_item_ratings mr-5">\
                                        '+_stars[parseInt(_array[_node].rating)]+'\
                                    </div>\
                                    <span class="mr-5 review_item_text"><i class="fa fa-thumbs-up"></i> '+_array[_node].count+'</span>\
                                    <span class="review_item_text">'+(new Date(_array[_node].time).toUTCString())+'</span>\
                                </div>\
                                <p>'+_temp+'</p>\
                                '+_flag+'\
                                '+_thumbs+'\
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
            },3500);
            $("#inputRating i").click(function() {
                var _value=$(this).attr("rel");
                _selectedValue=parseInt(_value);
                $("#inputRating i").removeClass("selected");
                for(var i=1;i<=parseInt(_value);i++) {
                    for(var i=1;i<=parseInt(_value);i++) {
                        $("#inputRating i[rel="+i+"]").addClass("selected");
                    }
                }
            });
            $("form").submit(function(_ev) {
                _ev.preventDefault();
                $(".loader h2").text('Saving this review..');
                showLoader();
                var _title=$("#inputReviewTitle").val();
                var _desc=$("#inputReviewDesc").val();
                // var _liked=$("input[name=inputLikeStatus]:checked").val();
                var _time=new Date().getTime();
                var _temp22=_userDetails.email+","
                console.log(_temp22);
                if(_title.trim().length > 0 && _desc.trim().length > 0) {
                    var _details={
                        "title":_title,
                        "desc":_desc,
                        "rating":_selectedValue,
                        "liked":"liked",
                        "email":_userDetails.email,
                        "time":_time,
                        "count":0,
                        "users":_temp22,
                        "name":_userDetails.full_name,
                        "category":_f+"|"+_s+"|"+_p
                    };
                    console.log((_details));
                    var _key=_firebase.child("/reviews/").push().key;
                    _firebase.child("/reviews/"+_key).set(_details,function(_error) {
                        if(_error) {
                            alert("Server error.");
                            hideLoader();
                        } else {
                            _firebase.child("/users/"+_email+"/reviews/"+_key).set(_details,function(_error) {
                                if(_error) {
                                    alert("Server error.");
                                    hideLoader();
                                } else {
                                    $("#writeReviewForm").fadeOut();
                                    $("input[name=inputLikeStatus]:checked").removeAttr("checked")
                                    $("#noLikeStatus").prop("checked",true)
                                    $("#inputReviewTitle").val('')
                                    $("#inputReviewDesc").val('')
                                    $("#inputRating i").removeClass("selected");
                                    $("#inputRating i:first-child").addClass("selected");
                                    _selectedValue=1
                                }
                            });
                        }
                    });
                } else {
                    alert("Empty fields");
                }
                hideLoader();
            });
            $(document).on("click",".review_item_view_full",function() {
                var _rel=$(this).attr("rel");
                $(this).parent().find("p").text(_arrayList[_rel].desc)
                $(this).remove()
            }).on("click",".reviews_thumbs_list i",function() {
                var _userTemp=firebase.auth().currentUser
                if(!_userTemp) {
                    alert("Your are not logged in.")
                } else if(_emailIsVerified) {
                    var _rel=$(this).attr("rel");
                    var _type=$(this).attr("type");
                    _temp1=_snapshotTemp[_rel];
                    _temp3=_temp1['email'].replace(".","_")
                    if(_type==="up") {
                        _temp1['count']=_temp1['count']+1;
                        console.log("Email "+_temp3);
                        _firebase.child("/users/"+_temp3+"/details/points/").transaction(function(_data) {
                            return (_data || 0 ) +1;
                        });
                    }
                    _temp1['users']=_temp1['users']+_userDetails.email+",";
                    _firebase.child("/reviews/"+_rel).update(_temp1);
                    _firebase.child("/users/"+_temp3+"/reviews/"+_rel).update(_temp1);
                } else {
                    alert("Your email is not verified.")
                }
            });
        });
    </script>
</html>
