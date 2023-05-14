<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (strlen($_SESSION['login']) == 0) {
    header('location:http://localhost/final%20p/log/login.php');
} else {
    if (isset($_POST['submit'])) {

        mysqli_query($con, "UPDATE orders set 	paymentMethod='" . $_POST['paymethod'] . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
        unset($_SESSION['cart']);
        header('location:http://localhost/final%20p/order-history.php');
    } else {
        if (isset($_POST['done'])) {
            $t = $_POST["a1"];
            $t1 = $_POST["a2"];
            $t2 = $_POST["a3"];
            $t3 = $_POST["a4"];
            $t4 = $_POST["a5"];
            $all = 'card number:' . $t . '<br>Valid thru:' . $t1 . '<br>Cardholder name:' . $t2 . '<br>CVV/CVC:' . $t3 . '<br>Zip/postal code:' . $t4;
            mysqli_query($con, "UPDATE orders set 	paymentMethod='" . $all . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
            unset($_SESSION['cart']);
            header('location:http://localhost/final%20p/order-history.php');
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
        <meta name="robots" content="all">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
        <header class="header-style-1">
            <?php
            include('thead.php');
            include('head.php');
            ?>
        </header>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="http://localhost/final%20p/index.php">Home </a></li>
                        <li class="breadcrumb-item ">Payment Method </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="body-content outer-top-bd">
            <div class="container">
                <div class="checkout-box faq-page inner-bottom-sm">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Choose Payment Method</h2>
                            <div class="panel-group checkout-steps" id="accordion">
                                <div class="panel panel-default checkout-step-01">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            <a data-toggle="collapse" class="" data-parent="#accordion">
                                                Select your Payment Method
                                            </a>
                                        </h4>
                                    </div>
                                    <button type="button" class="collapsible">Cash</button>
                                    <div>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5">
                                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                        <div class="card-body">
                                                            <form method="post" name="payment">
                                                                <div class="form-floating mb-3">
                                                                    <input type="radio" name="paymethod" value="cash" checked="checked"> cash<br>
                                                                    <input type="submit" value="submit" name="submit" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="collapsible">VISA Card</button>
                                    <div class="padding">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form method="post">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>Credit Card</strong>
                                                            <small>enter your card details</small>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="name">cardholder Name</label>
                                                                        <input class="form-control" name="a3" type="text" placeholder="Enter your name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ccnumber">Credit Card Number</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email" name="a1">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">
                                                                                    <i class="mdi mdi-credit-card"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-sm-4">
                                                                    <label for="ccmonth">02/22</label>
                                                                    <input class="form-control" type="month" placeholder="02" autocomplete="email" name="a2">
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label for="ccmonth">Zip/postal</label>
                                                                    <input class="form-control" type="text" placeholder="02" autocomplete="email" name="a5">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="cvv">CVV/CVC</label>
                                                                        <input class="form-control" name="a4" id="cvv" type="text" placeholder="123">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-sm btn-success float-right" type="submit" name="done">
                                                                <i class="mdi mdi-gamepad-circle"></i> Continue</button>
                                                            <!-- <button class="btn btn-sm btn-danger" type="reset">
                                <i class="mdi mdi-lock-reset"></i> Reset</button> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;
            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>
    </body>

    </html>
<?php } ?>
<?php include('footer.php'); ?>