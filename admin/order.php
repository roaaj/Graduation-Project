<?php
session_start();
include("navbar.php");
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>orders</title>
    <style>
        .cen {
            text-align: center;
        }
    </style>
</head>

<body>
    <ul class="list-group cen">
        <li class="list-group-item"> Order Management</li>
        <li class="list-group-item"> <a href="todays-orders.php">
                <i class="icon-tasks"></i>
                Today's Orders
                <?php
                $f1 = "00:00:00";
                $from = date('Y-m-d') . " " . $f1;
                $t1 = "23:59:59";
                $to = date('Y-m-d') . " " . $t1;
                $result = mysqli_query($con, "SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                $num_rows1 = mysqli_num_rows($result); {
                ?>
                    <b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
                <?php } ?>
            </a>
        </li>
        <li class="list-group-item"><a href="pending-orders.php">
                <i class="icon-tasks"></i>
                Pending Orders
                <?php
                $status = 'Delivered';
                $ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                $num = mysqli_num_rows($ret); { ?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
                <?php } ?>
            </a></li>
        <li class="list-group-item"><a href="delivered-orders.php">
                <i class="icon-inbox"></i>
                Delivered Orders
                <?php
                $status = 'Delivered';
                $rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
                $num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                <?php } ?>
            </a></li>
    </ul>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>