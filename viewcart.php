<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (isset($_POST['submit'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
        echo "<script>alert('Your Cart hasbeen Updated');</script>";
    }
}
// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['remove_code'] as $key) {
            unset($_SESSION['cart'][$key]);
        }
        echo "<script>alert('Your Cart has been Updated');</script>";
    }
}
// code for insert product in order table


if (isset($_POST['ordersubmit'])) {

    if (strlen($_SESSION['login']) == 0) {
        header('location:log/login.php');
    } else {

        $quantity = $_POST['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);
        foreach ($value as $qty => $val34) {
            mysqli_query($con, "insert into orders(userId,productId,quantity) values('" . $_SESSION['id'] . "','$qty','$val34')");
            header('location:payment-method.php');
        }
    }
}
// code for address updation
if (isset($_POST['update'])) {
    $baddress = $_POST['cell'];
    $bstate = $_POST['address'];
    $bcity = $_POST['city'];
    $query = mysqli_query($con, "UPDATE users set cell='$baddress',address='$bstate',city='$bcity' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Billing Address has been updated');</script>";
    }
}




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

    <title>My Cart</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .dis div {
            display: inline-block;
            display: table-cell;
            margin: 4px;
        }
    </style>
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
                    <li><a href="index.php">Home / </a></li>
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
                                <?php
                                if (!empty($_SESSION['cart'])) {
                                ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="cart-romove item">Remove</th>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Product Name</th>
                                                <th class="cart-qty item">Quantity</th>
                                                <th class="cart-sub-total item">Price </th>
                                                <th class="cart-sub-total item">rate </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="shopping-cart-btn">
                                                        <span class="">
                                                            <a href="index.php" class="btn btn-upper btn-secondary" style="margin-right: 700px;">Continue Shopping</a>
                                                            <input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-secondary pull-right outer-right-xs">
                                                        </span>
                                                    </div><!-- /.shopping-cart-btn -->
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $pdtid = array();
                                            $sql = "SELECT * FROM books WHERE id IN(";
                                            foreach ($_SESSION['cart'] as $id => $value) {
                                                $sql .= $id . ",";
                                            }
                                            $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                            $query = mysqli_query($con, $sql);
                                            $totalprice = 0;
                                            $totalqunty = 0;
                                            if (!empty($query)) {
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                                    $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['price'];
                                                    $totalprice += $subtotal;
                                                    $_SESSION['qnty'] = $totalqunty += $quantity;
                                                    array_push($pdtid, $row['id']);
                                                    //print_r($_SESSION['pid'])=$pdtid;exit;
                                            ?>
                                                    <tr>
                                                        <td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']); ?>" /></td>
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail">
                                                                <img src="<?php echo "images/arabicbook/" . $row['picture']; ?>" alt="" width="114" height="146">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class='cart-product-description'><a href="content.php?uid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo $row['BookName'];
                                                                                                                                                                            $_SESSION['sid'] = $pd;
                                                                                                                                                                            ?></a></h4>
                                                        </td>
                                                        <td class="cart-product-quantity">
                                                            <div class="quant-input">
                                                                <input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
                                                            </div>
                                                        </td>
                                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "JD" . " " . $row['price']; ?>.00</span></td>
                                                        <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['price']); ?>.00</span></td>
                                                    </tr>
                                            <?php }
                                            }
                                            $_SESSION['pid'] = $pdtid;
                                            ?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                    <div class="dis">
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Shipping Address</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <?php
                                                $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <div class="form-group">
                                                        <label class="info-title" for="mobile">mobile <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" id="mobile" name="cell" value="<?php echo $row['cell']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing Address">Address details<span>*</span></label>
                                                        <textarea class="form-control unicase-form-control text-input" name="address" required="required"><?php echo $row['address']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing City">City <span>*</span></label>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                                        <select name="city" class="form-control selectpicker item">
                                                            <option class="hidden" selected disabled>cite</option>
                                                            <option value="Amman">Amman</option>
                                                            <option value="Zarqa">Zarqa</option>
                                                            <option value="Irbid"> Irbid</option>
                                                            <option value="Aqaba">Aqaba</option>
                                                            <option value="as-Salt">as-Salt</option>
                                                            <option value="Madaba">Madaba</option>
                                                            <option value="al-Mafraq">al-Mafraq</option>
                                                            <option value="Ma'an">Ma'an</option>
                                                            <option value="Jerash">Jerash</option>
                                                            <option value="at-Tafila">at-Tafila</option>
                                                            <option value="al-Karak">al-Karak</option>
                                                            <option value="ajlone">ajlone</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="cart-grand-total">
                                                Grand Total<span class="inner-left-md"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <button type="submit" name="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } else {
                                    echo "Your shopping Cart is empty";
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
</body>

</html>