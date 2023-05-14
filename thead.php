<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li><a style="text-decoration: none;" href="#"><i class="icon fa fa-user"></i>Welcome -<?php echo $_SESSION['fname']; ?></a></li>
                        <?php } ?>
                        <li><a style="text-decoration: none;" href="http://localhost/final%20p/my-account.php"><i class="icon fa fa-user"></i>My Account</a></li>
                        <li><a style="text-decoration: none;" href="http://localhost/final%20p/my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a style="text-decoration: none;" href="http://localhost/final%20p/my-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <?php if (isset($_SESSION['login']) == 0) {   ?>
                            <li><a style="text-decoration: none;" href="http://localhost/final%20p/log/login.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
                        <?php } else { ?>
                            <li><a style="text-decoration: none;" href="http://localhost/final%20p/log/logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a style="text-decoration: none;" href="http://localhost/final%20p/track-orders.php" class="dropdown-toggle"><span class="key">Track Order</b></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</body>

</html>