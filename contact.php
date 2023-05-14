<?php
include("head.php");
$conn = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn, "utf8");
if (isset($_POST["btn"])) {
    $x1 = $_POST["name"];
    $x2 = $_POST["email"];
    $x3 = $_POST["message"];
    $ins0 = "INSERT INTO contact (name,email,connect) 
    VALUES ('$x1','$x2','$x3')";
    $done = mysqli_query($conn, $ins0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>connect with us</title>
</head>

<body>
    <div class="layout_padding gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="gallery_main">
                        <h1 class="gallery_taital"><strong><span class="our_text">Get in</span>Touch</strong></h1>
                    </div>
                </div>
            </div>
            <div class="touch_main">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_main">
                            <div class="container">
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="YOUR NAME" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="EMAIL" name="email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="MASSAGE" name="message" rows="5" id="comment" name="text"></textarea>
                                    </div>
                                    <div class="send_btn">
                                        <button name="btn" class=" main_bt">SEND</a></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="images">
                            <img src="https://i.imgur.com/VRFiMzM.png" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map_section">
        <div class="row">
            <div class="col-sm-12">

                <div id="map">
                </div>
            </div>

        </div>
    </div>
    <!-- <div class="bg-contact100">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <div class="contact100-pic js-tilt" data-tilt>
                    <img src="https://i.imgur.com/VRFiMzM.png" alt="IMG">
                </div>
                <form class="contact100-form validate-form" method="post">
                    <span class="contact100-form-title">
                        Connect with us ...
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <input class="input100" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Message is required">
                        <textarea class="input100" name="message" placeholder="Message"></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn" name="btn">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
<?php include("footer.php"); ?>