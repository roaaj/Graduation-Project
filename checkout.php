<?php
session_start();
include("head.php");
$connt = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt, "utf8");
extract($_POST);
$x = $_GET['nm'];
$x1 = $_GET['rate'];
$x2 = $_GET['qty'];
$x3 = $x1 * $x2;
$y = $_POST["email"];
$y1 = $_POST["phone"];
$y2 = $_POST["address"];
$y3 = $_POST["check"];
$v = $_POST["cardnumber"];
$v1 = $_POST["valid"];
$v2 = $_POST["Cardh"];
$v3 = $_POST["CVV"];
$v4 = $_POST["Postnumber"];
//echo $uid;
if (isset($submit)) {
    $query = "INSERT into shipping_details(email,phone,address,Payment_m,Product,price_p,cardnumber,valid,card_holder,CVV,Postnumber) 
    VALUSE('$y','$y1','$y2','$y3','$x','$x3','$v','$v','$v1','$v2','$x3','$v4')";

    $res = mysqli_query($connt, $query) or die("Can't Execute Query...");
    echo "<script>alert('Thanks for trusting us..');</script>";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}


?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="css/style.css">
    <style>
        input[type=text],
        input[type=email],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h5 style="font-size:30px;margin-left:420px">Shipping Details</h5>
        <form method="post">
            <label for="fname">Email</label>
            <input type="email" id="fname" name="email" placeholder="The same email you logged in with" required="">

            <label for="mobile">Mobile phone</label>
            <input id="phone" name="phone" placeholder="phone number" required="" type="text">

            <!-- <label for="postal">Postal Code</label>
            <input id="pc" name="pc" placeholder="201001" required="" tabindex="2" type="text"> -->

            <!-- <label for="country">City</label>
            <select id="City" name="City" required="">
                <option class="hidden" selected disabled>cite</option>
                <option value="Amman">Amman</option>
                <option value="Zarqa">Zarqa</option>
                <option value="Irbid"> Irbid</option>
                <option value="Aqaba">Aqaba</option>
                <option value="as-Salt">as-Salt</option>
                <option value="Madaba">Madaba</option>
                <option value="al-Mafraq">al-Mafraq</option>
                <option value="Ma'an">Ma'an</option>
                <option value="Jerash">Jerash</option>
                <option value="at-Tafila">at-Tafila</option>
                <option value="al-Karak">al-Karak</option>
                <option value="ajlone">ajlone</option>
            </select> -->

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required="" placeholder="Address details..">

            <label>
                <input type="radio" name="check" value="cash" class="tablink" onclick="openPage('Home', this, 'blue')" />
                <span>Cash On Delivery</span>
                <div id="Home" class="tabcontent ">
                    <p>
                        Thank you for your request from Books Hut the maximum order arrival is two days, we will contact you through your number soon......
                    </p>
                </div>
            </label>
            <label>
                <input type="radio" name="check" value="visa" class="tablink" onclick="openPage('News', this, 'green')" />
                <span>VISA / Credit card </span>
                <div id="News" class="tabcontent">
                    <div class="container">
                        <label for="fname">card number</label>
                        <input type="text" id="fname" name="cardnumber" placeholder="1234 1234 1234 1234" required="">

                        <label for="mobile">valid during(mm/yy)</label>
                        <input id="phone" name="valid" placeholder="year/month" required="" type="text">

                        <label for="postal">Card holder name</label>
                        <input id="pc" name="Cardh" required="" tabindex="2" type="text">


                        <label for="address">CVV/CVC</label>
                        <input type="text" id="CVV" name="CVV" required="" placeholder="CVV/CVC">

                        <label for="address">Post number</label>
                        <input type="text" id="Postnumber" name="Postnumber" required="" placeholder="Check the zip code for your area">

                        <!-- <input type="submit" name="submit" value="place order"> -->
                    </div>
                </div>
            </label>
            <input type="submit" name="submit" value="Confirm & Proceed">
        </form>
    </div>

    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "inline";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // $(document).ready(function() {
        //     $('#birth-date').mask('00/00/0000');
        //     $('#phone-number').mask('0000-0000');
        // })
        document.getElementById("defaultOpen").click();
        $(document).ready(function() {
            $('#contact_form').bootstrapValidator({})

        });
    </script>
</body>