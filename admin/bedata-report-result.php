<?php session_start();
$conn8 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn8, "utf8");
error_reporting(0);
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $msg = mysqli_query($connt6, "delete from users where id='$adminid'");
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
    <title>B/w Dates Report Result </title>
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
                    <h1 class="mt-4">B/w Dates Report Result-register users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">B/w Dates Report Result</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header" align="center" style="font-size:20px;">
                            <i class="fas fa-table me-1"></i>
                            <?php
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            ?>
                            B/w Dates Report Result from <?php echo date("d-m-Y", strtotime($fdate)); ?> to <?php echo date("d-m-Y", strtotime($tdate)); ?>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
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
                                </thead>
                                <tbody>
                                    <?php $ret = mysqli_query($conn8, "select * from users where date(posting_date) between '$fdate' and '$tdate'");
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
                                                <a href="user-profile.php?uid=<?php echo $row['id']; ?>">
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
</body>

</html>