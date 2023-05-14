<?php
session_start();

$con2 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con2, "utf8");
$limit = 6;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="css/style.css">
    <title>Accessories</title>
</head>

<body>
    <header>
        <?php
        include("thead.php");
        include("head.php");
        ?>
    </header>
    <?php
    $res1 = mysqli_query($con2, "SELECT * FROM accessories ORDER BY id ASC LIMIT $start_from, $limit");
    if (isset($res1)) {
        while ($row = @mysqli_fetch_array($res1)) { ?>
            <div id="about" class="layout_padding about_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo "images/arabicbook/" . $row["picture"];  ?>" alt="" width="150px" height="250px">
                        </div>
                        <div class="col-md-6">
                            <!-- <h1 class="about_text"><strong> <span class="color"></span></strong></h1> -->
                            <h3>Name: <?php echo $row['name']; ?></h3>
                            <p>price: <?php echo $row['price'] . " jd"; ?> </p>
                            <p>About : <?php echo $row['about']; ?> </p>
                            <div class="dis">
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
                                <div class="favorite-button m-t-10">
                                    <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['name'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light"">
                                    <i class=" fa fa-heart"></i></a>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php }
    }
    ?>
    <?php
    $result_db = mysqli_query($con2, "SELECT COUNT(id) FROM accessories");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    /* echo  $total_pages; */
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='Accessories.php?page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
<?php include("footer.php"); ?>