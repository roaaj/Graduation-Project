<?php session_start();
$con2 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con2, "utf8");
error_reporting(0);
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($conn, "delete from books where id='$adminid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
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
    <title>Manage Users | Registration and Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        table,
        tr,
        td {
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
                    <h1 class="mt-4">
                        Search Results</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Search Results</li>
                    </ol>
                    <h3>Search Results against keyword '<?php echo $_POST['searchkey']; ?>'</h3>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Search Result
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">

                                <?php
                                $searchkey = $_POST['searchkey'];
                                $ret = mysqli_query($con2, "select * from books where (BookName like '%$searchkey%' ||AuthorName like '%$searchkey%')");
                                while ($row = mysqli_fetch_array($ret)) { {
                                        if ($searchkey == $row["BookName"]) {
                                ?>
                                            <tr>
                                                <th>id</th>
                                                <th>category</th>
                                                <th>sub category</th>
                                                <th>Book Name</th>
                                                <th> Author Name</th>
                                                <th> Release Data</th>
                                                <th>About The Book</th>
                                                <th>About The Authore</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                                <th>classification</th>
                                                <th>store</th>
                                                <th>pictur</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $row["id"] ?></td>
                                                <td><?php echo $row["category"] ?></td>
                                                <td><?php echo $row["subcategory"] ?></td>
                                                <td><?php echo $row['BookName']; ?></td>
                                                <td><?php echo $row['AuthorName']; ?></td>
                                                <td><?php echo $row['ReleaseDate']; ?></td>
                                                <td><textarea name="AboutA" rows="6" cols="90" class="form-control">
                                                    <?php echo htmlentities($row['AboutTheBook']); ?>
                                            </textarea></td>
                                                <td><textarea name="AboutA" rows="6" cols="90" class="form-control">
                                                    <?php echo htmlentities($row['AboutTheAuthor']); ?>
                                            </textarea></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['classification']; ?></td>
                                                <td><?php echo $row['store']; ?></td>
                                                <td><img src=" <?php echo "../images/arabicbook/" . $row["picture"];  ?>" alt="" width="50px" height="50px">
                                                </td>
                                                <td>
                                                    <a href="edit-books.php?id=<?php echo $row['id']; ?>">
                                                        <i class="fas fa-edit"></i></a>
                                                    <a href="manage-users.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <?php
                                $searchkey = $_POST['searchkey'];
                                $ret2 = mysqli_query($con2, "select * from users where (fname like '%$searchkey%' ||lname like '%$searchkey%')");
                                while ($row = mysqli_fetch_array($ret2)) { {
                                        if ($searchkey == $row["fname"]) {

                                ?>
                                            <tr>
                                                <th>id</th>
                                                <th>first Name</th>
                                                <th> last Name</th>
                                                <th> gender</th>
                                                <th>city</th>
                                                <th>phone number</th>
                                                <th>email</th>
                                                <th>password</th>
                                                <th>address</th>
                                                <th>posting_date</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['lname']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['cell']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['posting_date']; ?></td>
                                                <td>
                                                    <a href="edit-profile.php?uid=<?php echo $row['id']; ?>">
                                                        <i class="fas fa-edit"></i></a>
                                                    <a href="manage-users.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>