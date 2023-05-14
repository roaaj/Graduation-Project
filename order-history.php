<?php
session_start();
// error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">

        <title>Order History</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
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

    <body class="cnt-home">
        <header class="header-style-1">
            <?php include('thead.php'); ?>
            <?php include('head.php'); ?>

        </header>
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="http://localhost/final%20p/index.php">Home/</a></li>
                        <li class='active'>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-content outer-top-xs">
            <div class="container">
                <div class="row inner-bottom-sm">
                    <div class="shopping-cart">
                        <div class="col-md-12 col-sm-12 shopping-cart-table ">
                            <div class="table-responsive">
                                <p id="demo" style="color: red;">to track your order!!!!</p>

                                <form name="cart" method="post">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">#</th>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Product Name</th>
                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-sub-total item">Price</th>
                                                <th class="cart-sub-total item">rate.</th>
                                                <th class="cart-total item">Payment Method</th>
                                                <th class="cart-description item">Order Date</th>
                                                <th class="cart-total last-item">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $status = 'Delivered';
                                            $query = mysqli_query($con, "SELECT books.picture as pimg1,books.BookName as pname,books.id as proid,orders.productId as opid,orders.quantity as qty,orders.productN as n,books.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join books on orders.productId=books.id where orders.userId='" . $_SESSION['id'] . "' and (orders.orderStatus!='$status' or orders.orderStatus is null) ");
                                            $query1 = mysqli_query($con, "SELECT accessories.picture as pimg1,accessories.name as pname,accessories.id as proid,orders.productId as opid,orders.productN as n, orders.quantity as qty,accessories.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join accessories on orders.productId=accessories.id where orders.userId='" . $_SESSION['id'] . "' and( orders.orderStatus!='$status' or orders.orderStatus is null ) ");
                                            $query2 = mysqli_query($con, "SELECT inputu.picture as pimg1,inputu.BookName as pname,inputu.id as proid,orders.productId as opid,orders.quantity as qty,orders.productN as n,inputu.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join inputu on orders.productId=inputu.id where orders.userId='" . $_SESSION['id'] . "' and (orders.orderStatus!='$status' or orders.orderStatus is null )");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                if ($row['n'] == $row['pname']) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail">
                                                                <img src="<?php echo "images/arabicbook/" . $row['pimg1']; ?>" alt="" width="84" height="146">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class='cart-product-description'><a href="content.php?uid=<?php echo $row['opid']; ?>">
                                                                    <?php echo $row['pname']; ?></a></h4>
                                                        </td>
                                                        <td class="cart-product-quantity">
                                                            <?php echo $qty = $row['qty']; ?>
                                                        </td>
                                                        <td class="cart-product-sub-total"><?php echo $price = $row['pprice']; ?> </td>
                                                        <td class="cart-product-grand-total"><?php echo (($qty * $price)); ?></td>
                                                        <td class="cart-product-sub-total"><?php echo $row['paym']; ?> </td>
                                                        <td class="cart-product-sub-total"><?php echo $row['odate']; ?> </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']); ?>');" title="Track order">
                                                                Track
                                                        </td>
                                                    </tr>
                                                <?php $cnt = $cnt + 1;
                                                }
                                            }
                                            while ($roww = mysqli_fetch_array($query1)) {
                                                if ($roww['n'] == $roww['pname']) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail">
                                                                <img src="<?php echo "images/arabicbook/" . $roww['pimg1']; ?>" alt="" width="84" height="146">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class='cart-product-description'><a href="content.php?uid=<?php echo $roww['opid']; ?>">
                                                                    <?php echo $roww['pname']; ?></a></h4>
                                                        </td>
                                                        <td class="cart-product-quantity">
                                                            <?php echo $qty = $roww['qty']; ?>
                                                        </td>
                                                        <td class="cart-product-sub-total"><?php echo $price = $roww['pprice']; ?> </td>
                                                        <td class="cart-product-grand-total"><?php echo (($qty * $price)); ?></td>
                                                        <td class="cart-product-sub-total"><?php echo $roww['paym']; ?> </td>
                                                        <td class="cart-product-sub-total"><?php echo $roww['odate']; ?> </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($roww['orderid']); ?>');" title="Track order">
                                                                Track
                                                        </td>
                                                    </tr>
                                                <?php $cnt = $cnt + 1;
                                                }
                                            }
                                            while ($rowu = mysqli_fetch_array($query2)) {
                                                if ($rowu['n'] == $rowu['pname']) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail">
                                                                <img src="<?php echo "images/arabicbook/" . $rowu['pimg1']; ?>" alt="" width="84" height="146">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class='cart-product-description'><a href="content.php?uid=<?php echo $rowu['opid']; ?>">
                                                                    <?php echo $rowu['pname']; ?></a></h4>
                                                        </td>
                                                        <td class="cart-product-quantity">
                                                            <?php echo $qty = $rowu['qty']; ?>
                                                        </td>
                                                        <td class="cart-product-sub-total"><?php echo $price = $rowu['pprice']; ?> </td>
                                                        <td class="cart-product-grand-total"><?php echo (($qty * $price)); ?></td>
                                                        <td class="cart-product-sub-total"><?php echo $rowu['paym']; ?> </td>
                                                        <td class="cart-product-sub-total"><?php echo $rowu['odate']; ?> </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($rowu['orderid']); ?>');" title="Track order">
                                                                Track
                                                        </td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <script>
            document.getElementById("demo").addEventListener("click", myFunction);

            function myFunction() {

                document.getElementById("demo").innerHTML = "<p>Please click 'Track' and take your order ID to track it, so that you can track your order with the <b><mark> track order </mark></b> at the top of the page </p>";
            }
        </script>
        <?php include('footer.php'); ?>
    </body>

    </html>
<?php } ?>