<?php
session_start();
$conn4 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn4, "utf8");
$x = $_GET["uid"];
mysqli_set_charset($conn4, "utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <title>content</title>
</head>

<body>
    <header>
        <?php
        include("thead.php");
        include("head.php");
        $x = $_GET["uid"];
        ?>
    </header>
    <?php

    $sel10 = "SELECT * FROM books  WHERE id=" . $x;
    $file = mysqli_query($conn4, $sel10);
    if (isset($file)) {
        while ($row = @mysqli_fetch_array($file)) {
    ?>
            <div class="work-steps" id="work-steps">
                <div class="container">
                    <div>
                        <img src="<?php echo "images/arabicbook/" . htmlentities($row["picture"]);  ?>" alt="" width="450px">
                        <div class="colTwo">
                            <div class="tabb">
                                <button class="tablinks">About The Book</button>
                                <div id="Book" class="tabbcontent">
                                    <h6><br><br><br>About The Book :</h6>
                                    <p><?php echo htmlentities($row["AboutTheBook"]) ?></p>
                                </div>
                                <button class="tablinks">About The Author</button>
                                <div id="Author" class="tabbcontent">
                                    <h6><br><br><br>About The Author:</h6>
                                    <p><?php echo htmlentities($row["AboutTheAuthor"]) ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="inf">
                        <div class="boxw">
                            <div class="text">
                                <h3><?php echo htmlentities($row["BookName"]); ?></h3>
                                <p>
                                <ul>
                                    <a href="store.php?store=<?php echo $row["store"] ?>">
                                        <a href="AuthorName.php?AuthorName=<?php echo $row["AuthorName"] ?>">
                                            <li> Aunthor Name: <?php echo htmlentities($row["AuthorName"]); ?></li>
                                        </a>
                                        <li>classification: <?php echo htmlentities($row["classification"]); ?></li>
                                        <li>Release Date: <?php echo htmlentities($row["ReleaseDate"]); ?></li>
                                </ul>
                                </p>
                                <p class="store">
                                    <img src="images/mm.png" alt="" width="50px" height="50px">
                                    <a href="store.php?store=<?php echo $row["store"] ?>"><span> the shop : </span> <?php echo htmlentities($row["store"]); ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="boxw">
                            <div class="text">
                                <h3 class="label">FREE SHIPPING</h3>
                                <p>
                                    <span class="price"><?php echo htmlentities($row["price"]) . " jd"; ?></span>
                                <ul class="d">
                                    <li>Free shipping to any region</li>
                                    <li>100% money back guarantee (in case something goes wrong)</li>
                                    <li>original copies</li>
                                </ul>
                                <div class="dis">
                                    <div>
                                        <?php if ($row["quantity"] == 'in stock') {
                                        ?>
                                            <a class="a" href="process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['BookName']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>">
                                                add to cart</a>
                                        <?php } else {
                                        ?>
                                            <a class="a" class="btn btn-light" style="color: red;" disabled>Out of stock</a>

                                        <?php } ?>
                                    </div>
                                    <div class="favorite-button m-t-10">
                                        <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['BookName'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light"">
                                    <i class=" fa fa-heart"></i></a>
                                        </a>
                                    </div>
                                </div>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php    }
    }
    ?>
    <script>
        var coll = document.getElementsByClassName("tablinks");
        var i;
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
<?php
include("footer.php");

?>