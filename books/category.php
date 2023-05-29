<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
// 
$limit = 16;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$_SESSION["x"] = $_GET["id"];
$start_from = ($page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM books WHERE 	category='" . $_SESSION['x'] . "' ORDER BY id ASC LIMIT $start_from, $limit");


?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Catogery</title>
</head>

<body>
    <header>
        <?php
        include("../thead.php");
        include("../head.php");
        ?>
    </header>
    <?php
    $x = mysqli_query($conn, "select * from category where id='" . $_SESSION['x'] . "'");
    mysqli_set_charset($conn, "utf8");
    while ($row = mysqli_fetch_array($x)) { ?>
        <section class="Best">
            <div class=" title">
                <h2 class="product_text"><strong><span class="den"><?php echo $row["categoryName"]; ?></span></strong></h2>
            </div>
            <div class="clear"></div>
        <?php }
    mysqli_set_charset($conn, "utf8");
    while ($row = mysqli_fetch_array($result)) { ?>
            <div class="boxx ">
                <div class="overlay">
                    <a href="http://localhost/final%20p/content.php?uid=<?php echo htmlentities($row["id"]) ?>"> <img src="<?php echo "../images/arabicbook/" . $row["picture"];  ?>" alt="" width="150px" height="250px"></a>
                    <div class="ff">
                        <a href="http://localhost/final%20p/content.php?uid=<?php echo htmlentities($row['id']); ?>">
                            <h3> <?php echo htmlentities($row['BookName']); ?></h3>
                        </a>
                        <p> <?php echo htmlentities($row['price']) . " jd"; ?> </p>
                    </div>
                    <div class="infoo">
                        <div class="accordian">
                            <div class="card">
                                <div class="card-header">
                                    <h3>About The Book</h3>
                                    <span class="fa fa-minus"></span>
                                </div>
                                <div class="card-body" style=" background-color:lightgray;">
                                    <p><?php echo htmlentities($row["AboutTheBook"]); ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3>About <?php echo htmlentities($row["AuthorName"]) ?></h3>
                                    <span class="fa fa-minus"></span>
                                </div>
                                <div class="card-body" style=" background-color:lightgray">
                                    <p><?php echo htmlentities($row["AboutTheAuthor"]); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dis">
                        <div>
                            <?php if ($row["quantity"] == 'in stock') {
                            ?>
                                <div class="action infoo">
                                    <a href="http://localhost/final%20p/process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['BookName']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>" class="btn btn-secondary">
                                        add to cart</a>
                                </div>
                            <?php } else {
                            ?> <div class="action">
                                    <a class="btn btn-light" style="color: red;" disabled>Out of stock</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="favorite-button m-t-10">
                            <a href="http://localhost/final%20p/my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['BookName'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light"">
                                    <i class=" fa fa-heart"></i></a>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="http://localhost/final%20p/content.php?uid=<?php echo $row["id"] ?>">read more <i class="fas fa-angle-double-right"></i></a>
            </div>
        <?php
    }
        ?>
        </section>
        <?php
        $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM books WHERE category='" . $_SESSION['x'] . "'");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        /* echo  $total_pages; */
        $pagLink = "<ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li class='page-item'><a class='page-link' href='http://localhost/final%20p/books/category.php?id=" . $_SESSION['x'] . "&page=" . $i . "'>" . $i . "</a></li>";
        }
        echo $pagLink . "</ul>";
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $(".card-header").click(function() {
                    // self clicking close
                    if ($(this).next(".card-body").hasClass("active")) {
                        $(this).next(".card-body").addClass("active").slideUp()
                        $(this).children("span").removeClass("fa-minus").addClass("fa-plus")
                    } else {

                        $(".card .card-body").removeClass("active").slideUp()
                        $(".card .card-header span").removeClass("fa-minus").addClass("fa-plus");
                        $(this).next(".card-body").addClass("active").slideDown()
                        $(this).children("span").removeClass("fa-plus").addClass("fa-minus")
                    }
                })

            });
        </script>
</body>

</html>
<?php include("../footer.php");
?>