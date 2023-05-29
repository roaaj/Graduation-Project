<?php
session_start();
$connt = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt, "utf8");
if (isset($_POST["update"])) {
    $idw = intval($_GET['id']);
    $x12 = $_POST["category"];
    $x13 = $_POST["subcategory"];
    $x1 = $_POST["bname"];
    $x2 = $_POST["aname"];
    $x3 = $_POST["release"];
    $x4 = $_POST["aboutb"];
    $x7 = $_POST["abouta"];
    $x6 = $_POST["price"];
    $x8 = $_POST["c"];
    $x9 = $_POST["s"];
    $x11 = $_POST["q"];
    $x = $_POST["p"];
    $ins = mysqli_query($connt, "UPDATE books set category='$x12',subcategory='$x13', BookName='$x1',AuthorName='$x2',ReleaseDate='$x3',AboutTheBook='$x4',AboutTheAuthor='$x7',price='$x6',quantity='$x11',classification='$x8',store='$x9',posting_date='$x' where id='$idw'");

    if ($ins) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-books.php?id=$idw'; </script>";
    } else {
        echo "no";
    }
}
if (isset($_POST["add"])) {
    $idw = $_GET['id'];
    $inss = mysqli_query(
        $connt,
        "UPDATE books set mostpopular='y' where id='$idw'"
    );
    if ($inss) {
        echo "<script>alert('Added to books mostpopular');</script>";
    }
}
if (isset($_POST["remove"])) {
    $idw = $_GET['id'];
    $inss = mysqli_query(
        $connt,
        "UPDATE books set mostpopular=null where id='$idw'"
    );
    if ($inss) {
        echo "<script>alert('remove to books mostpopular');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit books </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $idw = $_GET['id'];
                    $query = mysqli_query($connt, "select * from books where id='$idw'");
                    $cnt = 1;
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <h1 class="mt-4"><?php echo $result['BookName']; ?>'s Profile</h1>
                        <div class="card mb-4">
                            <form method="post" enctype="multipart/form-data">
                                <div class=" card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>category</th>
                                            <td><input class="form-control" name="category" type="text" value="<?php echo $result['category']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>sub category</th>
                                            <td><input class="form-control" name="subcategory" type="text" value="<?php echo $result['subcategory']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>Book Name</th>
                                            <td><input class="form-control" name="bname" type="text" value="<?php echo $result['BookName']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th> Author Name</th>
                                            <td><input class="form-control" name="aname" type="text" value="<?php echo $result['AuthorName']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>ReleaseDate</th>
                                            <td><input class="form-control" name="release" type="text" value="<?php echo $result['ReleaseDate']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>AboutTheBook</th>
                                            <td>
                                                <textarea name="aboutb" placeholder="Enter ..." rows="6" cols="40" class="form-control" required>
                                                    <?php echo $result['AboutTheBook']; ?>
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>AboutTheAuthor</th>
                                            <td>
                                                <textarea name="abouta" placeholder="Enter ..." rows="6" cols="40" class="form-control" required>
                                                    <?php echo $result['AboutTheAuthor']; ?>
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>price</th>
                                            <td colspan="3"><input class="form-control" name="price" type="text" value="<?php echo $result['price']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>quantity</th>
                                            <td colspan="3"><input class="form-control" name="q" type="text" value="<?php echo $result['quantity']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>classification</th>
                                            <td colspan="3"><input class="form-control" name="c" type="text" value="<?php echo $result['classification']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>store</th>
                                            <td colspan="3"><input class="form-control" name="s" type="text" value="<?php echo $result['store']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>picture</th>
                                            <td colspan="3">
                                                <img src="<?php echo "../images/arabicbook/" . $result['picture']; ?>" width="100" height="100"><a href="update-image.php?id=<?php echo $result['id']; ?>">Change Image</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>posting_date</th>
                                            <td colspan=" 3"><input class="form-control" name="p" type="text" value="<?php echo $result['posting_date']; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align:center;">
                                                <input type="submit" name="update" value="update" class="btn btn-primary">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Book remove || additions to the bestsellers:</th>
                                            <td style="text-align:center ;">
                                                <input type="submit" class="btn btn-primary btn-block" name="add" value="add">
                                                <input type="submit" class="btn btn-primary btn-block" name="remove" value="remove">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>