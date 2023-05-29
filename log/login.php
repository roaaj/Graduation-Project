<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
$errors = array();
if (isset($_POST["login"])) {
    $y1 = $_POST["email"];
    $y2 = $_POST["password"];
    $compare = "SELECT * FROM users WHERE email='$y1' and password='$y2' ";
    $result2 = mysqli_query($con, $compare);
    if (mysqli_num_rows($result2)) {
        header("location:../index.php");
    } else {
        array_push($errors, "<script>alert('Invalid username or password');</script>");;
    }
    $num = mysqli_fetch_array($result2);
    if ($num > 0) {
        $extra = "../index.php";
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fname'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    // else {
    //     $extra = "login.php";
    //     $email = $_POST['email'];
    //     $uip = $_SERVER['REMOTE_ADDR'];
    //     $status = 0;
    //     $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
    //     $host  = $_SERVER['HTTP_HOST'];
    //     $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //     header("location:http://$host$uri/$extra");
    //     array_push($errors, "<script>alert('Invalid username or password');</script>");;
    //     exit();
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>login page</title>
    <style>
        body {
            background-image: url("OIP (1).jfif");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .logform {
            background-color: white;
            width: 350px;
            height: 530px;
            margin-left: 550px;
            margin-top: 120px;
            border-radius: 5px 20px 5px 20px;
        }

        h1 {
            color: darkblue;
            margin-left: 100px;
            letter-spacing: 13px;
            text-transform: uppercase;
            cursor: context-menu;
            margin-top: 40px;
            margin-bottom: 30px;
            animation-name: h1;
            animation-duration: 5s;
            animation-iteration-count: infinite;
        }

        img {
            width: 150px;
            height: 150px;
            margin-left: 100px;
            margin-top: 10px;
            cursor: pointer;
        }

        .formcontent {
            margin-left: 50px;
        }

        .reg {
            margin-left: 60px;
        }

        label {
            letter-spacing: 10px;
            text-transform: uppercase;
            cursor: context-menu;
            color: darkblue;
            font-weight: bolder;
            margin-bottom: 10px;

        }

        input {
            height: 30px;
            width: 250px;
        }

        @keyframes h1 {
            1% {
                opacity: 0.6;
            }

            2% {
                opacity: 0.5;
            }

            3% {
                opacity: 0.3;
            }

        }
    </style>
</head>

<body>
    <div class="logform">
        <a href="../index.php"><img src="PhotoRoom.png" alt=""></a>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="formcontent">
                <label for="">Email: </label><br>
                <input type="email" name="email"><br><br>
                <label for="">Password: </label><br>
                <input type="password" name="password"><br><br>
                <input type="submit" name="login" value="Login">
            </div>
            <p class="reg">Do not have an account? <a href="contact.php">Register</a></p>
            <?php if (count($errors) > 0) : ?>
                <div>
                    <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <a style="text-decoration: none; margin-left:20px;" class="small" href="change-password.php">Forgot Password?</a>
        </form>
    </div>



</body>

</html>