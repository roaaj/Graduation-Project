<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <Link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <title>Home / Books Hut</title>
  <style>
    /* head */
    .nav .nav-item {
      margin-top: 17px;
      color: rgb(9, 75, 133);
    }

    .d-flex {
      margin: 13px 110px;
    }

    .nav-item .nav-link {
      color: black;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
    }

    .nav-item:hover {
      border-top: 2px solid rgb(9, 75, 133);
      width: auto;
    }

    .bigicon {
      color: white;
      margin: auto;
    }

    ul.dropdown-cart {
      min-width: 250px;
      border: 2px solid #343434;
      padding: 2px;
      margin: 7px;
      margin-top: 11px;
    }

    ul.dropdown-cart li .item {
      display: block;
      padding: 3px 10px;
      margin: 3px 0;

    }

    ul.dropdown-cart li .item:hover {
      background-color: #c3c5c5;

    }

    ul.dropdown-cart li .item:after {
      visibility: hidden;
      display: block;
      font-size: 0;
      content: " ";
      clear: both;
      height: 0;
    }

    .item .item-left .name {
      font-size: 16px;
      font-family: 'Lobster', cursive;
      margin-top: 0px;
      text-decoration: none;
    }

    .price {
      color: #abd07e;
      font-weight: 700;
    }

    ul.dropdown-cart li .item-left {
      float: left;
    }

    ul.dropdown-cart li .item-left img,
    ul.dropdown-cart li .item-left span.item-info {
      float: left;
    }

    ul.dropdown-cart li .item-left span.item-info {
      margin-left: 10px;
    }

    ul.dropdown-cart li .item-left span.item-info span {
      display: block;
    }

    ul.dropdown-cart li .item-right {
      float: right;
    }

    ul.dropdown-cart li .item-right button {
      margin-top: 14px;
    }

    .basket-item-count {
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
      height: 21px;
      position: absolute;
      right: 33px;
      top: -4px;
      width: 21px;
      background: #f1c40f;
      color: #fff;
      font-size: 13px;
      text-align: center;
    }

    .text-center {
      background: #6394F8;
      color: white;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      display: block;
      border-radius: 3px;
      font-size: 16px;
      margin: 25px 0 15px 0;
    }

    .text-center:hover {
      background: lighten(#6394F8, 3%);
    }

    .hr {
      margin-top: 20px;
      margin-bottom: 20px;
      border: 0;
      border-top: 2px solid #6394F8;
    }

    .text {
      font-size: 15px;
      font-family: 'FjallaOneRegular';
      color: #666666;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <ul class="nav nav-tabs ">
    <!-- <p class="logo">Books Hut</p> -->
    <img src="http://localhost/final%20p/img/PhotoRoom.png" alt="" width="70px">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="http://localhost/final%20p/index.php">Home</a>
    </li>
    <?php
    $sql = mysqli_query($con, "select * from category");
    while ($row = mysqli_fetch_array($sql)) {
      if ($row["dropd"] == 1) {
        $i = $row["id"];
    ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $row["categoryName"] ?></a>
          <ul class="dropdown-menu">
            <?php
            $s = "SELECT subcategory ,id ,categoryid from subcategory   where categoryid=$i ";
            $done = mysqli_query($con, $s);
            while ($roww = mysqli_fetch_array($done)) { ?>
              <li><a class="dropdown-item" href="http://localhost/final%20p/books/sub-category.php?id=<?php echo $roww["id"]; ?>"><?php echo $roww["subcategory"]; ?></a></li>
            <?php  }
            ?>
          </ul>
        </li>
      <?php } elseif ($row["dropd"] == 0) { ?>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/final%20p/books/category.php?id=<?php echo $row["id"]; ?>"><?php echo $row["categoryName"] ?></a>
        </li>
    <?php  }
    } ?>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/final%20p/Accessories.php">Accessories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/final%20p/UsedBook.php">Used Book</a>
    </li>
    <li class=" nav-item dropdown">
      <a href="http://localhost/final%20p/my-cart.php" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"><span class="basket-item-count"> <?php echo $_SESSION['qnty'] ?> </span><i class="fa-solid fa-cart-shopping"></i><span class="caret"></span></a>
      <ul class="dropdown-menu dropdown-cart">
        <?php
        if (!empty($_SESSION['cart'])) {
        ?>

          <li>
            <?php
            $tot = 0;
            $i = 1;
            $totalqunty = 0;
            if (isset($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $id => $x) {
                $quantity = $_SESSION['cart'][$id]['quantity'];
                $_SESSION['qnty'] = $totalqunty += $quantity;
            ?>
                <span class="item">
                  <span class="item-left">
                    <img src="<?php echo "http://localhost/final%20p/images/arabicbook/" . ($x['cat']); ?>" width="35" height="50" alt="">
                    <span class="item-info">
                      <a href="content.php?uid=<?php echo $x['id']; ?>"><span class="name"><?php echo $x['nm'] ?></span></a>
                      <span class="price"><?php echo $x['rate'] ?></span>
                    </span>
                  </span>
                </span>
            <?php
                $tot = $tot + ($x['quantity'] * $x['rate']);
                $i++;
              }
            }
            ?>
            <hr class="hr">
            <div class="pull-right">
              <span class="text">Total :</span><span class='price'><?php echo $_SESSION['tp'] = "$tot" . ".00"; ?></span>
            </div>
          </li>
          <li class="divider"></li>
          <li><a class="text-center" href="my-cart.php">View Cart</a></li>
        <?php } else {
          echo "Your shopping Cart is empty";
        } ?>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="http://localhost/final%20p/log/login.php"><i class="fa-solid fa-right-to-bracket"></i> login</a></li>
        <li><a class="dropdown-item" href="http://localhost/final%20p/log/contact.php"><i class="fa-solid fa-id-card"></i> Register</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" target="_black" href="http://localhost/final%20p/admin/login.php"><i class="fa-solid fa-user"></i> Admin</a></li>
      </ul>
    </li>
    <ul>
      <form class="d-flex" action="http://localhost/final%20p/search_result.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchkey" />
        <button class="btn btn-outline-primary" type="submit" name="sub">
          Search
        </button>
      </form>
    </ul>
  </ul>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>