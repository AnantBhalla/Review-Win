<div id="headerTop">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#">Categories <i class="fa fa-angle-down"></i></a>
                        <?php require("category_partial.php"); ?>
                    </li>
                    <li class="nav-item auth_item"><a href="myreview.php">My Reviews</a></li>
                    <li class="nav-item auth_item"><a href="mycoupons.php">My Coupons</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul class="nav float-right non_auth_item" id="authList">
                    <li class="nav-item"><button class="" onclick="location.href='/login.php'">Login</button></li>
                    <li class="nav-item"><button class="" onclick="location.href='/register.php'">Register</button></li>
                </ul>
                <ul class="nav float-right auth_item" id="authDetails">
                    <p id="welcomeUser" onclick="location.href='myprofile.php'"><i class="fa fa-spinner spinner"></i></p>
                    <button onclick="logout()">Logout<i class="fa fa-sign-out ml-2"></i></button>
                </ul>
            </div>
        </div>
    </div>
</div>
