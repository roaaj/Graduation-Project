<?php session_start();
$connt6 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt6, "utf8");
error_reporting(0);
// for deleting user
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($con, "delete from users where id='$adminid'");
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
    <title>Registered Users in Last 7 Days | Registration and Login System</title>
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
                    <h1 class="mt-4">Registered Users in Last 7 Days </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Registered Users in Last 7 Days </li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Registered Users in Last 7 Days Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th> gender</th>
                                        <th> city</th>
                                        <th> Phone number</th>
                                        <th> Email</th>
                                        <th>password</th>
                                        <th>address</th>
                                        <th>Reg. Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ret = mysqli_query($connt6, "select * from users where date(posting_date)>=now() - INTERVAL 7 day");
                                    while ($row = mysqli_fetch_array($ret)) { ?>
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
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>