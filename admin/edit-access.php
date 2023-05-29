<?php session_start();
$connt8 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt8, "utf8");
error_reporting(0);
if (isset($_POST["update"])) {
    // $fl = "../images/Accessories/" . basename($_FILES["picture"]["name"]);
    $id = $_GET['uid'];
    // $x0 = $_POST["id"];
    $x1 = $_POST["name"];
    $x2 = $_POST["about"];
    $x3 = $_POST["price"];
    $x4 = $_POST["q"];
    // $x5 = $_FILES["picture"]["name"];
    $ins = mysqli_query(
        $connt8,
        "UPDATE accessories set  name='$x1',about='$x2',price='$x3',quantity='$x4' where id='$id'"
    );
    if ($ins) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'manageaccess.php'; </script>";
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
    <title>Edit accessories </title>
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

<body class="sb-nav-fixed">
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $id = $_GET['uid'];
                    $query = mysqli_query($connt8, "select * from accessories where id='$id'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <h1 class="mt-4"><?php echo $result['name']; ?>'s Profile</h1>
                        <div class="card mb-4">
                            <form method="post" enctype="multipart/form-data">
                                <div class=" card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <td><input class="form-control" id="BookName" name="name" type="text" value="<?php echo $result['name']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th> about</th>
                                            <td><input class="form-control" id="about" name="about" type="text" value="<?php echo $result['about']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>price</th>
                                            <td><input class="form-control" id="price" name="price" type="text" value="<?php echo $result['price']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>quantity</th>
                                            <td><input class="form-control" id="price" name="q" type="text" value="<?php echo $result['quantity']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>picture</th>
                                            <td colspan="3">
                                                <img src="<?php echo "../images/arabicbook/" . $result['picture']; ?>" width="100" height="100"><a href="update-image2.php?idq=<?php echo $result['id']; ?>">Change Image</a>
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>
                                        </tr>
                                        </tbody>
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