<?php
session_start();
$connt = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt, "utf8");
if (isset($_POST["btn"])) {
    $fl = "images/arabicbook/" . basename($_FILES["image"]["name"]);
    $x1 = $_POST["nameu"];
    $x2 = $_POST["email"];
    $x8 = $_POST["mobile"];
    $x3 = $_POST["address"];
    $x4 = $_FILES["image"]["name"];
    $x5 = $_POST["nameb"];
    $x6 = $_POST["price"];
    $x7 = $_POST["about"];
    $ins0 = "INSERT INTO inputu (UserName,email,phone,address,BookName,picture,price,quantity,About) 
    VALUES ('$x1','$x2','$x8','$x3','$x5','$x4','$x6','in stock','$x7')";
    $done = mysqli_query($connt, $ins0);
}
if (@move_uploaded_file($_FILES["image"]["tmp_name"], $fl)) {
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css">
    <title>Home / Books Hut</title>
    <style>
        .dis div {
            display: inline-block;
        }
    </style>
</head>

<body>
    <?php
    include("thead.php");
    include("head.php");
    include("carousel.php")
    ?>
    <section class="Best splide">
        <div class=" title">
            <h2 class="product_text"><strong><span class="den">Best</span>seller</strong></h2>
        </div>
        <div class="clear"></div>
        <div class="scrollmenu mySlides">
            <?php
            $ret = mysqli_query($connt, "select * from books WHERE mostpopular='y'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <div class="boxx " id=$x>
                    <a href="content.php?uid=<?php echo htmlentities($row['id']); ?>">
                        <img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" width="180" height="300" alt=""></a>
                    <div class="ff">
                        <a href="content.php?uid=<?php echo htmlentities($row['id']); ?>">
                            <h3 class="name"><?php echo htmlentities($row['BookName']); ?>
                            </h3>
                        </a>
                        <p> <?php echo $row['price'] . " jd"; ?> </p>
                    </div>
                    <div class="dis">
                        <div>
                            <?php if ($row["quantity"] == 'in stock') {
                            ?>
                                <div class="action infoo"> <a href="process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['BookName']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>" class="btn btn-secondary">
                                        add to cart </a>
                                </div>
                            <?php } else {
                            ?> <div class="action infoo">
                                    <a class="btn btn-light" style="color: red;" disabled>Out of stock</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="favorite-button m-t-10">
                            <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['BookName'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light">
                                <i class="fa fa-heart"></i></a>
                            </a>
                            </a>
                        </div>
                    </div>
                    <a href="content.php?uid=<?php echo $row["id"] ?>">read more <i class="fas fa-angle-double-right"></i></a>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="Best splide">
        <div class=" title">
            <h1 class="product_text"><strong><span class="den">New</span>releases</strong></h1>
        </div>
        <div class="clear"></div>
        <div class="scrollmenu mySlides">
            <?php
            $x = date("Y-10");
            $ress = mysqli_query($connt, "select * from books WHERE ReleaseDate=$x");
            while ($row = mysqli_fetch_array($ress)) {
            ?>
                <div class="boxx " id=$x>
                    <a href="content.php?uid=<?php echo htmlentities($row['id']); ?>">
                        <img src="<?php echo "images/arabicbook/" . htmlentities($row['picture']); ?>" width="180" height="300" alt=""></a>
                    <div class="ff">
                        <a href="content.php?uid=<?php echo htmlentities($row['id']); ?>">
                            <h3 class="name"><?php echo htmlentities($row['BookName']); ?></h3>
                        </a>
                        <p> <?php echo $row['price'] . " jd"; ?> </p>
                    </div>
                    <div class="dis">
                        <div>
                            <?php if ($row["quantity"] == 'in stock') {
                            ?>
                                <div class="action infoo"> <a href="process_cart.php?page=product&action=add&id=<?php echo $row['id']; ?>&nm=<?php echo $row['BookName']; ?>&rate=<?php echo $row['price']; ?>&cat=<?php echo $row['picture']; ?>" class="btn btn-secondary">
                                        add to cart </a></div>
                            <?php } else {
                            ?> <div class="action infoo">
                                    <a class="btn btn-light" style="color: red;" disabled>Out of stock</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="favorite-button m-t-10">
                            <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['id']; ?>&name=<?php echo $row['BookName'] ?>&quantity=<?php echo  $row["quantity"]; ?>&picture=<?php echo $row['picture']; ?>&price=<?php echo $row['price']; ?>" class="btn btn-light">
                                    <i class=" fa fa-heart"></i></a>
                            </a>
                        </div>

                    </div>
                    <a href="content.php?uid=<?php echo $row["id"] ?>">read more <i class="fas fa-angle-double-right"></i></a>
                </div>
            <?php }
            ?>
        </div>
    </section>

    <br>
    <section class="Best">
        <div class=" title">
            <h1 class="product_text"><strong><span class="den">Space</span>foryou</strong></h1>
        </div>
        <div class="clear"></div>
        <section>
            <button type="button" class="collapsible">About the topic</button>
            <div class="content">
                <div class="intro">
                    <h3>You can sell your own books</h3>
                    <p>
                        Hey friends, we offer you a space to sell your books that you no longer need.
                        You can attach your own book and fill in the required information. We will see the information and buy the book and the delivery fees on us as well...
                        <a href="#"><i class="fas fa-link"></i></a>
                    </p>
                    <p>Browse our used books <a href="#"><i class="fas fa-link"></i></a></p>
                </div>
            </div>
            <button type="button" class="collapsible">to apply...</button>
            <div class="contentt">
                <div class="form ce">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="inputP ce">
                            <div class="subtitle">
                                <h5>Your personal information</h5>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="text" name="nameu" placeholder="your name"><br>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="email" name="email" placeholder="your email"><br>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="text" name="mobile" placeholder="Your Phone [0-9]{3}[0-9]{4}[0-9]{3}">
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="text" name="address" placeholder="your address">
                            </div>
                        </div>
                        <div class="inputP ce">
                            <div class="subtitle">
                                <h5>book information</h5>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="file" name="image"><br>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="text" name="nameb" placeholder="your book name"><br>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="number" name="price" min=2 max=8 placeholder="Price according to book status"><br>
                            </div>
                            <div class="input-container ic2">
                                <input class="input" type="text" name="about" placeholder="Overview of the book">
                            </div>
                        </div>
                        <input type="submit" name="btn" class="submit">
                    </form>
                </div>
            </div>
        </section>

    </section>
    <script>
        var coll = document.getElementsByClassName("collapsible");
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
<?php include("footer.php") ?>