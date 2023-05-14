<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (strlen($_SESSION['login']) == 0) {
    header('location:http://localhost/final%20p/log/login.php');
} else {
    if (isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $cell = $_POST['cell'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $query = mysqli_query($con, "UPDATE users SET fname='$fname',cell='$cell',email='$email',address='$address' WHERE id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Your info has been updated');</script>";
        }
    }


    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  users where password='" . $_POST['cpass'] . "' && id='" . $_SESSION['id'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update users set password='" . $_POST['newpass'] . "', posting_date='$currentTime' where id='" . $_SESSION['id'] . "'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
        } else {
            echo "<script>alert('Current Password not match !!');</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <title>My Account</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <header>
            <?php include('thead.php'); ?>
            <?php include('head.php'); ?>
        </header>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home/</a></li>
                        <li class='active'>profil</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pricing">
            <div class="container">
                <div class="box">
                    <div class="row">
                        <h4 class="title"> Personal info</h4>
                        <div class="col-md-12 col-sm-12 already-registered-login">
                            <?php
                            $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <form class="register-form" method="post">
                                    <div class="form-group">
                                        <label class="info-title" for="name">Name<span>*</span></label>
                                        <input type="text" name="fname" class="form-control unicase-form-control text-input" id="contactno" value="<?php echo $row['fname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
                                        <input type="text" name="cell" class="form-control unicase-form-control text-input" id="contactno" value="<?php echo $row['cell']; ?>" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="address">Address <span>*</span></label>
                                        <input type="text" name="address" class="form-control unicase-form-control text-input" id="contactno" value="<?php echo $row['address']; ?>">
                                    </div>
                                    <br>
                                    <button type="submit" name="update" class="btn-upper btn btn-primary">Update</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div>
                        <div class="panel-heading">
                            <h4 class="title">
                                Change Password
                            </h4>
                            <form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
                                <div class="form-group">
                                    <label class="info-title" for="Current Password">Current Password<span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="New Password">New Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required">
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Change </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box popular">
                    <div class="title">Purchases</div>
                    <div>
                        <?php

                        $query = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,books.id as id1,books.BookName as productname,books.picture as picture,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,books.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join books on books.id=orders.productId where users.id='" . $_SESSION['id'] . "'");
                        $query1 = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,accessories.id as id2,accessories.name as productname,accessories.picture as picture,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,accessories.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join accessories on accessories.id=orders.productId where users.id='" . $_SESSION['id'] . "'");
                        $query2 = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,inputu.id as id3,inputu.BookName as productname,inputu.picture as picture,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,inputu.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join inputu on inputu.id=orders.productId where users.id='" . $_SESSION['id'] . "'");
                        // $cnt = 1;
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <ul>
                                <li> <a href="content.php?uid=<?php echo htmlentities($row['id1']); ?>">
                                        <img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" width="100" height="100" alt=""></a>
                                </li>
                                <li><?php echo $row['productname']; ?></li>
                            </ul>
                        <?php    }
                        while ($row = mysqli_fetch_array($query1)) { ?>
                            <ul>
                                <li>
                                    <img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" width="100" height="100" alt="">
                                </li>
                                <li><?php echo $row['productname']; ?></li>
                            </ul>
                        <?php    }
                        while ($row = mysqli_fetch_array($query2)) { ?>
                            <ul>
                                <li>
                                    <img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" width="100" height="100" alt="">
                                </li>
                                <li><?php echo $row['productname']; ?></li>
                            </ul>
                        <?php    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php include('footer.php'); ?>
    </body>

    </html>
<?php } ?>