<?php
session_start();
// error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
if (isset($_POST['ordersubmit'])) {
    if (strlen($_SESSION['login']) == 0) {
        header('location:log/login.php');
    } else {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $qty => $val34) {
                $x1 = $val34["id"];
                $x2 = $val34["nm"];
                $x3 = $_SESSION['cart'][$qty]['quantity'];
                mysqli_query($con, "insert into orders(userId,productId,productN,quantity) values('" . $_SESSION['id'] . "','$x1','$x2','$x3')");
                header('location:payment-method.php');
            }
        }
    }
}
//
if (isset($_POST['click'])) {
    if (!empty($_SESSION['cart'])) {
        if (!empty($_POST)) {
            foreach ($_POST as $id => $val) {
                if ($val == 0) {
                    unset($_SESSION['cart'][$id]['rate']);
                } else {
                    $_SESSION['cart'][$id]['quantity'] = $val;
                }
            }
            echo "<script>alert('Your Cart hasbeen Updated');</script>";
        }
    }
}
if (isset($_POST['update'])) {
    $baddress = $_POST['cell'];
    $bstate = $_POST['address'];
    $bcity = $_POST['city'];
    $query = mysqli_query($con, "UPDATE users set cell='$baddress',address='$bstate',city='$bcity' where id='" . $_SESSION['id'] . "'");
    if ($query) {
        echo "<script>alert('Address has been updated');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>My cart</title>
    <style>
        .our-skills .testimonials .cta {
            border: none;
            background: none;
        }

        .our-skills .testimonials .cta span {
            padding-bottom: 7px;
            letter-spacing: 4px;
            font-size: 13px;
            padding-right: 15px;
            text-transform: uppercase;
        }

        .our-skills .testimonials .cta svg {
            transform: translateX(-8px);
            transition: all 0.3s ease;
        }

        .our-skills .testimonials .cta:hover svg {
            transform: translateX(0);
        }

        .our-skills .testimonials .cta:active svg {
            transform: scale(0.9);
        }

        .our-skills .testimonials .hover-underline-animation {
            position: relative;
            color: black;
            padding-bottom: 20px;
        }

        .our-skills .testimonials .hover-underline-animation:after {
            content: "";
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 1.5px;
            bottom: 0;
            left: 0;
            background-color: #000000;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .our-skills .testimonials .cta:hover .hover-underline-animation:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include("thead.php");
        include("head.php");
        ?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.php">Home/</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="our-skills">
        <div class="containerr">
            <div class="testimonials">
                <h3>Shopping cart</h3>
                <form name="cart" method="POST">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                    ?>
                        <div class="container">
                            <ul class="responsive-table">
                                <li class="table-header">
                                    <div class="col col-1">#</div>
                                    <div class="col col-2">Image</div>
                                    <div class="col col-3">Product Name</div>
                                    <div class="col col-4">Quantity</div>
                                    <div class="col col-5">Price</div>
                                    <div class="col col-6">Grand total</div>
                                    <div class="col col-7">Delete</div>
                                </li>
                                <?php
                                $totalqunty = 0;
                                $tot = 0;
                                $i = 1;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $id => $x) {
                                ?>
                                        <li class="table-row">
                                            <div class="col col-1" data-label="Job Id"><?php echo $i ?></div>
                                            <div class="col col-2" data-label="Customer Name"><a href="content.php?uid=<?php echo $x['id']; ?>">
                                                    <img src="<?php echo "images/arabicbook/" . ($x['cat']); ?>" width="60" height="60" alt=""></a></div>
                                            <div class="col col-3" data-label="Amount"><?php echo $x['nm'] . '</div>
                                            <div class="col col-4" ><input type="number" size="2" value="' . $x['quantity'] . '" name="' . $id . '"min=1 style="width:50%;"><button type="submit" name="click" ><i class="fa-solid fa-calculator"></i></button></div>
                                            <div class="col col-5" >' . $x['rate'] . '</div>
                                            <div class="col col-6">' . ($x['quantity'] * $x['rate']); ?></div>
                                            <div class="col col-7"><a href="process_cart.php?id=<?php echo $id; ?>"><i class="fa-solid fa-trash"></i></a></div>
                                        </li>
                                <?php
                                        $tot = $tot + ($x['quantity'] * $x['rate']);
                                        $i++;
                                    }
                                }
                                ?>
                            </ul>
                            <p id="demo">Before order confirmation!!!!</p>
                            <table class="table table-bordered diss">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <button class="cta" type="submit" name="ordersubmit">
                                                    <span class="hover-underline-animation"> shop now </span>
                                                    <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                                                        <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path> <span class="inner-left-md"> Grand Total:<?php echo  $tot . ".00"; ?></span>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </form>
            <?php } else {
                        echo "<p>Your shopping Cart is empty</p>";
                    } ?>
            </div>
            <div class="skills">
                <h3>Address</h3>
                <form method="post">
                    <div class="form-group">
                        <?php
                        $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="form-group">
                                <label class="info-title" for="mobile">mobile <span>*</span></label>
                                <input type="phone" class="form-control unicase-form-control text-input" name="cell" value="<?php echo $row['cell']; ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing Address">Address details<span>*</span></label>
                                <textarea class="form-control unicase-form-control text-input" name="address" required="required"><?php echo $row['address']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing City">City <span>*</span></label>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="city" class="form-control selectpicker item">
                                    <option selected><?php echo $row["city"]; ?></option>
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
                            <br>
                            <center><button name="update" class="btn btn-outline-dark">Update</button></center>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("demo").addEventListener("click", myFunction);

        function myFunction() {

            document.getElementById("demo").innerHTML = "If you click on 'shop now', your order has already been confirmed";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>