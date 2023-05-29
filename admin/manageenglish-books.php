<?php session_start();
// for deleting user
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($con, "delete from books where id='$adminid'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
$limit = 10;
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$ret = mysqli_query($conn, "SELECT * FROM books WHERE distribution='EB' ORDER BY id ASC LIMIT $start_from, $limit");
if (isset($_POST["add"])) {
    $id = $_GET['id'];
    $inss = mysqli_query(
        $connt8,
        "UPDATE englishbooks set mostpopular='y' where id='$id'"
    );
    if ($inss) {
        echo "<script>alert('Added to books mostpopular');</script>";
        echo "<script type='text/javascript'> document.location = 'manageenglish-books.php'; </script>";
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
    <title>Manage english books</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .pagination {
            margin-left: 480px;
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
                    <h1 class="mt-4">Manage English Books</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage users</li>
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
                                        <th>Book Name</th>
                                        <th> Author Name</th>
                                        <th> Release Data</th>
                                        <th>About The Book</th>
                                        <th>About The Authore</th>
                                        <th>price</th>
                                        <th>classification</th>
                                        <th>store</th>
                                        <th>pictur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($ret)) { ?>
                                        <tr>
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row['BookName']; ?></td>
                                            <td><?php echo $row['AuthorName']; ?></td>
                                            <td><?php echo $row['ReleaseDate']; ?></td>
                                            <td><textarea name="AboutA" placeholder="Enter ..." rows="6" cols="90" class="form-control">
                                                    <?php echo htmlentities($row['AboutTheBook']); ?>
                                            </textarea></td>
                                            <td><textarea name="AboutA" placeholder="Enter ..." rows="6" cols="90" class="form-control">
                                                    <?php echo htmlentities($row['AboutTheAuthor']); ?>
                                            </textarea></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['classification']; ?></td>
                                            <td><?php echo $row['store']; ?></td>
                                            <td><img src="<?php echo "../images/EnglishBooks/" . $row["picture"];  ?>" alt="" width="50px" height="50px">
                                            </td>
                                            <td>
                                                <a href=" edit-books.php?id=<?php echo $row['id']; ?>">
                                                    <i class="fas fa-edit"></i></a>
                                                <a href="manageenglish-books.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

    $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM books WHERE distribution='EB' ");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    $pagLink = "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagLink .= "<li class='page-item'><a class='page-link' href='manageenglish-books.php?page=" . $i . "'>" . $i . "</a></li>";
    }
    echo $pagLink . "</ul>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>