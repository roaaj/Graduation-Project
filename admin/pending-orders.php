<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Pending Orders</title>
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>
</head>

<body>
    <?php include('navbar.php'); ?>
    <table>
        <tbody>
            <?php

            mysqli_set_charset($con, "utf8");
            ?>
        </tbody>
    </table>
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th width="50">Email /Contact no</th>
                                        <th>Shipping Address</th>
                                        <th>Product </th>
                                        <th>Qty </th>
                                        <th>rate.</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $status = 'Delivered';
                                    $query = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,books.BookName as productname,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,books.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join books on books.id=orders.productId where orders.orderStatus!='$status' or orders.orderStatus is null");
                                    $query1 = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,accessories.name as productname,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,accessories.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join accessories on accessories.id=orders.productId where orders.orderStatus!='$status' or orders.orderStatus is null");
                                    $query2 = mysqli_query($con, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,inputu.BookName as productname,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,inputu.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join inputu on inputu.id=orders.productId where orders.orderStatus!='$status' or orders.orderStatus is null");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        if ($row['n'] == $row['productname']) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['username']); ?></td>
                                                <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>
                                                <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity']); ?></td>
                                                <td><?php echo $row['productname']; ?></td>
                                                <td><?php echo htmlentities($row['quantity']); ?></td>
                                                <td><?php echo htmlentities($row['quantity'] * $row['productprice']); ?></td>
                                                <td><?php echo htmlentities($row['orderdate']); ?></td>
                                                <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                            </tr>

                                        <?php $cnt = $cnt + 1;
                                        }
                                    }
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query1)) {
                                        if ($row['n'] == $row['productname']) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['username']); ?></td>
                                                <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>
                                                <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity']); ?></td>
                                                <td><?php echo $row['productname']; ?></td>
                                                <td><?php echo htmlentities($row['quantity']); ?></td>
                                                <td><?php echo htmlentities($row['quantity'] * $row['productprice']); ?></td>
                                                <td><?php echo htmlentities($row['orderdate']); ?></td>
                                                <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                            </tr>

                                        <?php $cnt = $cnt + 1;
                                        }
                                    }
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query2)) {
                                        if ($row['n'] == $row['productname']) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['username']); ?></td>
                                                <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>
                                                <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity']); ?></td>
                                                <td><?php echo $row['productname']; ?></td>
                                                <td><?php echo htmlentities($row['quantity']); ?></td>
                                                <td><?php echo htmlentities($row['quantity'] * $row['productprice']); ?></td>
                                                <td><?php echo htmlentities($row['orderdate']); ?></td>
                                                <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                            </tr>

                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>