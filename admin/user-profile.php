<?php session_start();
$connt7 = mysqli_connect("localhost", "root", "", "projectfinal");
mysqli_set_charset($connt7, "utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Profile | Registration and Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                    $userid = $_GET['uid'];
                    $query = mysqli_query($connt7, "select * from users where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <h1 class="mt-4"><?php echo $result['fname']; ?>'s Profile</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="edit-profile.php?id=<?php echo $result['id']; ?>">Edit</a>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <td><?php echo $result['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td><?php echo $result['fname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Last Name</th>
                                        <td><?php echo $result['lname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> gender</th>
                                        <td><?php echo $result['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> city</th>
                                        <td><?php echo $result['city']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Phone number</th>
                                        <td><?php echo $result['cell']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Email</th>
                                        <td><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>password</th>
                                        <td><?php echo $result['password']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>address</th>
                                        <td><?php echo $result['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Reg. Date</th>
                                        <td><?php echo $result['posting_date']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>