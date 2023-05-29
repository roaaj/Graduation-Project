<?php session_start();
$connt8 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt8, "utf8");
error_reporting(0);
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $cell = $_POST['cell'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $posting_date = $_POST['posting_date'];
    $userid = $_GET['uid'];
    $msg = mysqli_query($connt8, "UPDATE users set fname='$fname',lname='$lname',gender='$gender',city='$city',cell='$cell',email='$email',password='$password',posting_date='$posting_date',address='$address' where id='$userid'");
    if ($msg) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
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
    <title>Edit Profile | Registration and Login System</title>
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
                    $query = mysqli_query($connt8, "select * from users where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <h1 class="mt-4"><?php echo $result['fname']; ?>'s Profile</h1>
                        <div class="card mb-4">
                            <form method="post">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>First Name</th>
                                            <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['fname']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><input class="form-control" id="lname" name="lname" type="text" value="<?php echo $result['lname']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>gender</th>
                                            <td><input class="form-control" id="gender" name="gender" type="text" value="<?php echo $result['gender']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>city</th>
                                            <td><input class="form-control" id="city" name="city" type="text" value="<?php echo $result['city']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>phone number</th>
                                            <td colspan="3"><input class="form-control" id="cell" name="cell" type="text" value="<?php echo $result['cell']; ?>" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" required /></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td colspan="3"><input class="form-control" id="email" name="email" type="text" value="<?php echo $result['email']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>password</th>
                                            <td colspan="3"><input class="form-control" id="password" name="password" type="text" value="<?php echo $result['password']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>address</th>
                                            <td colspan="3"><input class="form-control" id="address" name="address" type="text" value="<?php echo $result['address']; ?>" required /></td>
                                        </tr>
                                        <tr>
                                            <th>posting_date</th>
                                            <td colspan="3"><input class="form-control" id="posting_date" name="posting_date" type="text" value="<?php echo $result['posting_date']; ?>" required /></td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</body>

</html>