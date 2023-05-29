<?php session_start();
$conn8 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn8, "utf8");
error_reporting(0);
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($connt6, "delete from orders where id='$adminid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>B/w Dates Report Result </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        table,
        tr,
        td {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">B/w Dates Report Result-order</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">B/w Dates Report Result</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header" align="center" style="font-size:20px;">
                            <i class="fas fa-table me-1"></i>
                            <?php
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            ?>
                            B/w Dates Report Result from <?php echo date("d-m-Y", strtotime($fdate)); ?> to <?php echo date("d-m-Y", strtotime($tdate)); ?>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
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
                                    $ret = mysqli_query($conn8, "SELECT users.fname as username,users.email as useremail,users.cell as usercontact,users.address as shippingaddress,users.city as shippingcity,books.BookName as productname,orders.productN as n,orders.quantity as quantity,orders.orderDate as orderdate,books.price as productprice,orders.id as id  from orders join users on  orders.userId=users.id join books on books.id=orders.productId where date(orderDate) between '$fdate' and '$tdate'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) { ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['username']); ?></td>
                                            <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>
                                            <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity']); ?></td>
                                            <td><?php echo $row['productname']; ?></td>
                                            <td><?php echo htmlentities($row['quantity']); ?></td>
                                            <td><?php echo htmlentities($row['quantity'] * $row['productprice']); ?></td>
                                            <td><?php echo htmlentities($row['orderdate']); ?></td>
                                            <td>
                                            <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>