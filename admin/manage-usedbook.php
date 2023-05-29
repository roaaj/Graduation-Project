<?php
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
error_reporting(0);
// for deleting book
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($conn, "delete from inputu where id='$adminid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}
// for insert book
if (isset($_GET['pid'])) {
    $adminid = $_GET['pid'];
    $msg = mysqli_query($conn, "update inputu set status=1");
    if ($msg) {
        echo "<script>alert('the book has been shown');</script>";
    }
}

$limit = 10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM inputu  ORDER BY id ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage used books</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://github.com/superRaytin/paginationjs">
    <style>
        .pagination {
            margin-left: 150px;
            padding: 10px;
        }

        tr {
            word-wrap: break-word;
            width: 200px;
        }

        .green i {
            color: #199319;
        }

        .red i {
            color: red;
        }

        table,
        th {
            border-style: solid;
            border-width: 1;
            text-align: center;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Manage used book</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage used book</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Books Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>user Name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>book name</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>about</th>
                                        <th>pictur</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "SELECT * FROM inputu  ORDER BY id ASC LIMIT $start_from, $limit");
                                    while ($row = mysqli_fetch_array($ret)) { ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row['UserName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['BookName']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['About']; ?></td>
                                            <td><img src="<?php echo "../images/arabicbook/" . $row["picture"];  ?>" alt="" width="50px" height="50px">
                                            </td>
                                            <td>
                                                <?php echo $row["status"] ?>
                                            </td>
                                            <td>
                                                <a href="manage-usedbook.php?pid=<?php echo $row['id']; ?>" onClick="return confirm('are you sure this is for sale');"><button class='btn green'><i class="fa-solid fa-check"></i></button></a>
                                                <a href="manage-usedbook.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><button class='btn red'><i class="fa-solid fa-xmark"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <?php

    $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM inputu ");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='manage-usedbook.php?page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>