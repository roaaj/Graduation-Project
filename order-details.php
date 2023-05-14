<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
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
    <link rel="stylesheet" href="css/style.css">
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
                            <form name="cart" method="post">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">#</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>

                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price Per unit</th>
                                            <th class="cart-total item">Grandtotal</th>
                                            <th class="cart-total item">Payment Method</th>
                                            <th class="cart-description item">Order Date</th>
                                            <th class="cart-total last-item">Action</th>
                                        </tr>
                                    </thead><!-- /thead -->

                                    <tbody>
                                        <?php
                                        $orderid = $_POST['orderid'];
                                        $email = $_POST['email'];
                                        $ret = mysqli_query($con, "select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
                                        $num = mysqli_num_rows($ret);
                                        if ($num > 0) {
                                            $query = mysqli_query($con, "select books.picture as pimg1,books.BookName as pname,orders.productId as opid,orders.quantity as qty,orders.productN as n,books.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join books on orders.productId=books.id where orders.id='$orderid' and orders.paymentMethod is not null");
                                            $query1 = mysqli_query($con, "select accessories.picture as pimg1,accessories.name as pname,orders.productId as opid,orders.quantity as qty,orders.productN as n,accessories.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join accessories on orders.productId=accessories.id where orders.id='$orderid' and orders.paymentMethod is not null");
                                            $query2 = mysqli_query($con, "select inputu.picture as pimg1,inputu.BookName as pname,orders.productId as opid,orders.quantity as qty,orders.productN as n,inputu.price as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join inputu on orders.productId=inputu.id where orders.id='$orderid' and orders.paymentMethod is not null");
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
                                                        <td class="cart-product-grand-total"><?php echo $qty * $price; ?></td>
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
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query1)) {
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
                                                        <td class="cart-product-grand-total"><?php echo $qty * $price; ?></td>
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
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query2)) {
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
                                                        <td class="cart-product-grand-total"><?php echo $qty * $price; ?></td>
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
                                        } else { ?>
                                            <tr>
                                                <td colspan="8">Either order id or Registered email id is invalid</td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->

                        </div>
                    </div>

                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            </form>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <?php include('footer.php'); ?>

    <script src="switchstylesheet/switchstylesheet.js"></script>

    <script>
        $(document).ready(function() {
            $(".changecolor").switchstylesheet({
                seperator: "color"
            });
            $('.show-theme-options').click(function() {
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
            $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
    <!-- For demo purposes – can be removed on production : End -->
</body>

</html>