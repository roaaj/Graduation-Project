<?php
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
error_reporting(0);
// for deleting user
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($conn, "delete from accessories where id='$adminid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}

mysqli_set_charset($conn, "utf8");
$limit = 10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM accessories  ORDER BY id ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage accessories</title>
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

        .scrollbar-width-auto {
            scrollbar-width: auto;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Manage Accessories</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Accessories</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Accessories Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th> about</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        <th>pictur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "SELECT * FROM accessories  ORDER BY id ASC LIMIT $start_from, $limit");
                                    while ($row = mysqli_fetch_array($ret)) { ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['about']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><img src="<?php echo "../images/Accessories/" . $row["picture"];  ?>" alt="" width="50px" height="50px">
                                            </td>
                                            <td>
                                                <a href=" edit-access.php?uid=<?php echo $row['id']; ?>">
                                                    <i class="fas fa-edit"></i></a>
                                                <a href="manageaccess.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

    $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM accessories ");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='manageaccess.php?page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>