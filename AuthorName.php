<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
$limit = 16;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

$_SESSION["x"] = $_GET["AuthorName"];

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Author Name </title>

</head>

<body>
    <header>
        <?php
        include("thead.php");
        include("head.php");
        $x = $_GET["AuthorName"];
        ?>
    </header>
    <section class="Best">
        <div class=" title">
            <h1 class="product_text"><strong><span class="den"><?php echo $x; ?></span></strong></h1>
        </div>
        <div class="clear"></div>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM books WHERE AuthorName='" . $_SESSION['x'] . "' ORDER BY id ");
        if (isset($res)) {
            while ($row = mysqli_fetch_array($res)) { ?>
                <div class="boxx ">
                    <div class="overlay">
                        <a href="http://localhost/final%20p/content.php?uid=<?php echo htmlentities($row["id"]) ?>"> <img src="<?php echo "images/arabicbook/" . htmlentities($row["picture"]);  ?>" alt="" width="150px" height="250px"></a>
                        <div class="ff">
                            <h3> <?php echo htmlentities($row['BookName']); ?></h3>
                            <p> <?php echo htmlentities($row['price']) . " jd"; ?> </p>
                        </div>
                        <div class="dis" style="display:inline-block;">
                            <div>
                                <?php if ($row["quantity"] == 'in stock') {
                                ?>
                                    <div>
                                        <a href="process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['BookName']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>" class="btn btn-secondary" style="color: white;margin: 10px;">
                                            add to cart</a>
                                    </div>
                                <?php } else {
                                ?> <div class="action infoo">
                                        <a class="btn btn-light" style="color: red;" disabled>Out of stock</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="favorite-button m-t-10">
                                <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['BookName'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light"">
                                    <i class=" fa fa-heart"></i></a>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="http://localhost/final%20p/content.php?uid=<?php echo $row["id"] ?>">read more <i class="fas fa-angle-double-right"></i></a>
                </div>
        <?php
            }
        }
        ?>
    </section>
    <?php
    $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM books WHERE AuthorName='" . $_SESSION['x'] . "'");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    /* echo  $total_pages; */
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost/final%20p/AuthorName.php?AuthorName=" . $_SESSION['x'] . "&page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</body>

</html>
<?php include("footer.php") ?>