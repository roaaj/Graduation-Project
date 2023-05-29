<?php
session_start();
include("../thead.php");
include("../head.php");
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
$limit = 8;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$res = mysqli_query($conn, "SELECT * FROM books WHERE distribution='A' ORDER BY id ASC LIMIT $start_from, $limit");
// 
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM books WHERE id={$id}";
        $query_p = mysqli_query($connt, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['price']);
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='../viewcart.php'; </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Novels </title>
    <style>
        .boxx a {
            text-decoration: none;
            color: black;
            margin: 2px;
        }

        /* Small */
        @media (min-width: 788px) {
            .boxx {
                width: 750px;
            }
        }

        /* Medium */
        @media (min-width: 992px) {
            .boxx {
                width: 970px;
            }
        }

        /* Large */
        @media (min-width: 1200px) {
            .boxx {
                width: 1170px;
            }
        }

        .Best {
            margin: 2%;
            border: wheat solid 1px;
            /* overflow: hidden; */
            /* resize: both;  */

        }

        div.boxx {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 0px;
            text-decoration: none;
            height: auto;
            margin: 2.6%;
        }

        .boxx {
            box-shadow: 0 2px 15px rgb(0 0 0 / 10%);
            background-color: white;
            border-radius: 6px;
            overflow: hidden;
            width: 250px;
            display: table-cell;
            margin: 7px;
            /* position: relative; */
        }

        .boxx:hover {
            transform: translateY(-10px);
            box-shadow: 0 2px 15px rgb(0 0 0 / 20%);
        }

        .boxx img {
            min-width: auto;
            height: 180px;
            width: 200px;
            margin-top: 10px;
        }

        .boxx .fff h3 {
            margin: auto;
            color: #2196f3;
            font-size: 17px;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            /* src: url('../fonts/fontawesome-webfont.eot?v=4.7.0') */
        }

        .boxx .fff {
            padding: 30px;
        }

        .boxx .fff p {
            margin: 10px 0 0;
            line-height: 1.5;
            color: #777;
        }

        .boxx .infoo {
            padding: 20px;
            border-top: 1px solid #e6e6e7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .boxx .infoo a {
            margin: auto;
            width: 80%;
            color: white;
            font-weight: bold;
        }

        .product_text {
            width: 20%;
            float: left;
            color: #383737;
            font-size: 50pt;
            border-bottom: 3px solid #111111;
            margin: 10px;
            margin-left: 40px;
            margin-bottom: 50px;

        }

        .den {
            color: #2196f3;
        }

        .clear {
            clear: both;
        }

        .fff .ce {
            display: inline-block;
            display: table-cell;
            margin: 5px;

        }

        body {
            margin: 0;
            font-family: sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .accordian {
            /* max-width: 600px; */
            display: block;
            /* margin: 100px auto; */
            margin-bottom: 0px;
        }

        .accordian .card {
            box-shadow: 0px 0px 20px #d4d4d4;
            margin-bottom: 5px;
            float: left;
            width: 100%;

        }

        .accordian .card .card-header h3 {
            cursor: pointer;
            color: black;
            position: relative;
            /* background-color: #3343a2; */
            margin: 0;
            padding: 10px 15px;
            font-size: small;

        }

        .accordian .card .card-header {
            position: relative;
        }

        .accordian .card .card-header span {
            position: absolute;
            right: 20px;
            top: 12px;
            height: 25px;
            width: 25px;
            color: #3343a2;
            background-color: #ffffff;
            border-radius: 50%;
            text-align: center;
            line-height: 25px;
            font-size: 13px;
        }

        /* .accordian .card .card-body {
            /* padding: 20px; */

        .accordian .card .card-body p {
            font-size: 15px;
            line-height: 24px;
            color: #444444;
            margin: 0px;
        }

        .accordian .card .card-body {
            display: none;
        }

        /* open one card by default*/
        .accordian .card:nth-child(0) .card-body {
            display: block;
        }

        .pagination {
            margin-left: 150px;
            padding: 10px;
        }

        .pagination li {
            padding: 10px;
            font-size: 24px;
        }

        .pagination li:hover {
            background-color: #3343a2;
        }
    </style>
</head>

<body>
    <section class="Best">
        <div class=" title">
            <h1 class="product_text"><strong><span class="den">Novels</span>Books</strong></h1>
        </div>
        <div class="clear"></div>
        <?php
        mysqli_set_charset($conn, "utf8");
        if (isset($res)) {
            while ($row = mysqli_fetch_array($res)) { ?>
                <div class="boxx ">
                    <div class="overlay">
                        <a href="../content.php?uid=<?php echo htmlentities($row["id"]) ?>"> <img src="<?php echo "../images/arabicbook/" .  htmlentities($row["picture"]);  ?>" alt="" width="150px" height="250px"></a>
                        <div class="fff">
                            <h3> <?php echo htmlentities($row['BookName']); ?></h3>
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
                        <div class="action infoo"><a href="../index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-secondary">Add to Cart</a></div>
                    </div>
                    <a href="../content.php?uid=<?php echo $row["id"] ?>">read more <i class="fas fa-angle-double-right"></i></a>
                </div>
        <?php
            }
        }
        ?>
    </section>
    <?php
    $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM books  WHERE distribution='A'");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    /* echo  $total_pages; */
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='novels.php?page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
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
<?php include("../footer.php") ?>