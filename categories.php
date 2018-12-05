<?php
$_option=0;
$_mainCat=$_subCat="";
if(isset($_GET['f']) && $_GET['f']!=="" && isset($_GET['s']) && $_GET['s']!=="") {
    $_option=2;
    $_mainCat=$_GET['f'];
    $_subCat=$_GET['s'];
} else {
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Review & Win | Categories</title>
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
                <span class="mr-2 ml-1"><?php echo $_mainCat; ?></span>/
                <span class="mr-2 ml-1"><?php echo $_subCat; ?></span>
            </div>
            <h3 class="mt-2 mb-3"><?php echo $_subCat; ?></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 p-3 right" style="position:relative">
                    <div class="container mt-2">
                        <div class="grid_view" style="min-height:400px">
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
        $(document).ready(function () {
            $(".grid_view").html('');
            for(var _cat in _categories["<?php echo $_mainCat; ?>"]["<?php echo $_subCat; ?>"]) {
                var _temp=_categories["<?php echo $_mainCat; ?>"]["<?php echo $_subCat; ?>"][_cat]
                _temp1=_temp.toLowerCase().replace(/ /g,"_").replace(/\//g,"_")+".jpg"
                $(".grid_view").append('<div onclick="location.href=\'product.php?f=<?php echo $_mainCat; ?>&s=<?php echo $_subCat; ?>&p='+_temp+'\'" class="grid_item" style="width:250px;background-image:url(\'images1\/'+_temp1.trim()+'\')"><div class="d-flex flex-column">\
                    <h2>'+_temp+'</h2>\
                </div></div>');
            }
        });
    </script>
</html>
