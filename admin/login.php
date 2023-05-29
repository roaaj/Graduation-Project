<?php
$conn3 = mysqli_connect("localhost", "root", "", "projectfinal55");
// error_reporting(0);
if (isset($_POST["login"])) {
    $r1 = $_POST["t1"];
    $r2 = $_POST["t2"];
    $compare2 = "SELECT * FROM adminp WHERE userName='$r1' and password='$r2'";
    $result3 = mysqli_query($conn3, $compare2);
    if (@mysqli_num_rows($result3)) {
        header("location:dashboard.php");
    } else {
        echo  "<script>alert('Invalid username or password');</script>";
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
    <title>Admin Login | Registration and Login System</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <style>
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h2 align="center">Registration and Login System</h2>
                                    <hr />
                                    <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="t1" type="text" placeholder="User Name" required />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="t2" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password-recovery.php">Forgot Password?</a>
                                            <a href="dashboard.php"><button class="btn btn-primary" name="login" type="submit">Login</button></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../index.php">Back to Home Page</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
<?php include('../footer.php'); ?>