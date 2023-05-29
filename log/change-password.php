<?php session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
// for  password change   
if (isset($_POST['update'])) {
    $oldpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $email = $_POST["email"];
    $sql = mysqli_query($con, "SELECT password FROM users where email='$email'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $ret = mysqli_query($con, "update users set password='$newpassword' where email='$email'");
        echo "<script>alert('Password Changed Successfully !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    } else {
        echo "<script>alert('Old Password not match !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
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
    <title>Change password </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include("../thead.php");
    include("../head.php"); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Change Password</h1>
                    <div class="card mb-4">
                        <form method="post" name="changepassword" onSubmit="return valid();">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Email</th>
                                        <td><input class="form-control" name="email" type="email" value="" required /></td>
                                    </tr>
                                    <tr>
                                        <th>New Password</th>
                                        <td><input class="form-control" id="newpassword" name="newpassword" type="password" value="" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Confirm Password</th>
                                        <td colspan="3"><input class="form-control" id="confirmpassword" name="confirmpassword" type="password" required /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Change</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include("../footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>