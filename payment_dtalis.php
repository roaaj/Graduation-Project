<?php session_start();
include("head.php");
$connt = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($connt, "utf8");
?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css">
    <title>payment</title>
    <style>
        .tablink {
            background-color: #555;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 14px;
            font-size: 17px;
            width: 20%;

        }

        .tablink:hover {
            background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            /* color: white; */
            display: none;
            /* padding: 100px 20px; */
            height: 80%;
        }

        input[type=text],
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
    </style>
</head>

<body>


    <h6 style="font-size:30px;margin-left:260px">Payment options</h6>
    <div class="container">
        <hr style="margin-left:260px;margin-right:260px;">
        </hr>
        <div class="menu">
            <button class="tablink" onclick="openPage('Home', this, 'blue')">Cash On Delivery</button>
            <button class="tablink" onclick="openPage('News', this, 'green')">VISA / Credit card</button>
        </div>
        <div id="Home" class="tabcontent ">
            <p>
                Thank you for your request from Books Hut the maximum order arrival is two days, we will contact you through your number soon......
            </p>
        </div>
        <div id="News" class="tabcontent">
            <div class="container">
                <form>
                    <label for="fname">card number</label>
                    <input type="text" id="fname" name="cardnumber" placeholder="1234 1234 1234 1234" required="">

                    <label for="mobile">valid during(mm/yy)</label>
                    <input id="phone" name="valid" placeholder="year/month" required="" type="text">

                    <label for="postal">Card holder name</label>
                    <input id="pc" name="Card" required="" tabindex="2" type="text">


                    <label for="address">CVV/CVC</label>
                    <input type="text" id="CVV" name="CVV" required="" placeholder="CVV/CVC">

                    <label for="address">Post number</label>
                    <input type="text" id="Postnumber" name="Postnumber" required="" placeholder="Check the zip code for your area">

                    <input type="submit" name="submit" value="place order">
                </form>
            </div>
        </div>
        <!-- <div style="border-radius:5px 5px 5px 5px; background:url(images/paper.jpg);margin-left:160px;margin-right:160px;font-size:20px;"><a href="#">Cash On Delivery</a></div></br>
        <div style="border-radius:5px 5px 5px 5px; background:url(images/paper.jpg);margin-left:160px;margin-right:160px;font-size:20px;"><a href="#">Debit / Credit card</a></div></br>
        <div style="border-radius:5px 5px 5px 5px; background:url(images/paper.jpg);margin-left:160px;margin-right:160px;font-size:20px;"><a href="#">PayUmoney</a></div></br>
        <div style="border-radius:5px 5px 5px 5px; background:url(images/paper.jpg);margin-left:160px;margin-right:160px;font-size:20px;"><a href="#">PAYTM Wallet</a></div></br>
        <div style="border-radius:5px 5px 5px 5px; background:url(images/paper.jpg);margin-left:160px;margin-right:160px;font-size:20px;"><a href="#">Mobikwik</a></div></br> -->

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
                tablinks[i].style.backgroundColor = "";
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

</html>
<?php include("footer.php"); ?>