<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (strlen($_SESSION['login']) == 0) {
    header('location:http://localhost/final%20p/log/login.php');
} else {
    if (isset($_GET['action']) && $_GET['action'] == "add") {
        if (strlen($_SESSION['login']) == 0) {
            header('location:log/login.php');
        } else {
            $pid = intval($_GET['id']);
            mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
            header('location:http://localhost/final%20p/my-wishlist.php');
        }
    }
    if (isset($_GET['action']) && $_GET['action'] == "add") {
        //add item
        $_SESSION['wishlist'][$_GET['id']] = array("name" => $_GET['name'], "picture" => $_GET['picture'], "price" => $_GET['price'], "quantity" => $_GET["quantity"], "id" => $_GET['id']);
        header("location:http://localhost/final%20p/my-wishlist.php");
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($con, "DELETE FROM wishlist WHERE productId='$id'");
        unset($_SESSION['wishlist'][$id]);
        header("location:http://localhost/final%20p/my-wishlist.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/style.css">
        <title>My wishlist</title>
    </head>

    <body>
        <header>
            <?php
            include('thead.php');
            include('head.php'); ?>
        </header>

        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="index.php">Home/</a></li>
                        <li class='active'>Wishlish</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="body-content outer-top-bd">
            <div class="container">
                <div class="my-wishlist-page inner-bottom-sm">
                    <div class="row">
                        <div class="col-md-12 my-wishlist">
                            <div class="table-responsive">
                                <form name="wishlist" method="POST">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="4">my wishlist</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totalqunty = 0;
                                            $tot = 0;
                                            $i = 1;
                                            if (isset($_SESSION['wishlist'])) {
                                                foreach ($_SESSION['wishlist'] as $id => $row) {    ?>
                                                    <tr>
                                                        <td class="col-md-2"><img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" alt="<?php echo htmlentities($row['name']); ?>" width="60" height="100"></td>
                                                        <td class="col-md-6">
                                                            <div class="product-name"><a href="content.php?uid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo htmlentities($row['name']); ?></a></div>

                                                            <div class="price">
                                                                <?php echo htmlentities($row['price']); ?>.00
                                                            </div>
                                                        </td>
                                                        <td class="col-md-2">
                                                            <div>
                                                                <?php if ($row["quantity"] == 'in stock') {
                                                                ?>
                                                                    <div class="action infoo"><a href="process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['name']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>" class="btn btn-secondary">
                                                                            add to cart </a></div>
                                                                <?php } else {
                                                                ?> <div class="action infoo">
                                                                        <a class="btn btn-light" style="color: red;" disabled>Out of stock</a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            </a>
                                                        </td>
                                                        <td class="col-md-2 close-btn">
                                                            <a href="my-wishlist.php?id=<?php echo $id ?>"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>

    </html>
<?php } ?>