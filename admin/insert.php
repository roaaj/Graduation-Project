<?php
$conn88 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($conn88, "utf8");
// error_reporting(0);
if (isset($_POST["insert"])) {
    $fname =  $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $city =  $_POST["city"];
    $cell =  $_POST["cell"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];
    $address = $_POST["address"];
    $modif =
        "INSERT INTO users 
        ( fname, lname, gender, city, cell, email, password, address  )
        VALUES ( '$fname', '$lname', '$gender', '$city', '$cell', '$email', '$password', '$address' )";
    @$result = mysqli_query($conn88, $modif);
}
if (isset($_POST["insertaa"])) {
    $fl = "../images/arabicbook/" . basename($_FILES["image"]["name"]);
    $category = $_POST['category'];
    $subcat = $_POST['subCategory'];
    $x1 = $_POST["bname"];
    $x2 = $_POST["aname"];
    $x3 = $_POST["rd"];
    $x4 = $_POST["aboutb"];
    $x5 = $_FILES["image"]["name"];
    $x6 = $_POST["price"];
    $x11 = $_POST["q"];
    $x7 = $_POST["abouta"];
    $x8 = $_POST["c"];
    $x9 = $_POST["s"];
    $ins0 = "INSERT INTO books (category,subcategory,BookName,AuthorName,ReleaseDate,AboutTheBook,price,quantity,AboutTheAuthor,classification,store,picture) 
    VALUES ('$category','$subcat','$x1','$x2','$x3','$x4','$x6','$x11','$x7','$x8','$x9','$x5')";
    @$done = mysqli_query($conn88, $ins0);
}
if (@move_uploaded_file($_FILES["image"]["tmp_name"], $fl)) {
}
if (isset($_POST["inserta"])) {
    $fl = "../images/Accessories/" . basename($_FILES["image"]["name"]);
    $x1 = $_POST["bbname"];
    $x2 = $_POST["aaname"];
    $x3 = $_POST["pricee"];
    $x4 = $_POST["q"];
    $x5 = $_FILES["image"]["name"];
    $ins0 = "INSERT INTO accessories (name,about,price,quantity,picture) 
    VALUES ('$x1','$x2','$x3','$x4','$x5')";
    @$done = mysqli_query($conn88, $ins0);
}
if (@move_uploaded_file($_FILES["image"]["tmp_name"], $fl)) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert user or books</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">

    <style>
        #success_message {
            display: none;
        }

        .menu {
            margin-left: 170px;
            /* left: 300px; */
            margin-top: 60px;
        }

        .tablink {
            background-color: #555;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 14px;
            font-size: 17px;
            width: 25%;

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

        h5 {
            color: #5891ff;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 70px;
            line-height: 100px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .social-media {
            max-width: 600px;
            background-color: #fff;
            margin: auto;
            padding: 35px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            border-top: 1px solid #dee9ff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .social-icons {
            margin-top: 30px;
            margin-bottom: 16px;
        }

        .registration-form .social-icons a {
            font-size: 23px;
            margin: 0 3px;
            color: #5691ff;
            border: 1px solid;
            border-radius: 50%;
            width: 45px;
            display: inline-block;
            height: 45px;
            text-align: center;
            background-color: #fff;
            line-height: 45px;
        }

        .registration-form .social-icons a:hover {
            text-decoration: none;
            opacity: 0.6;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <div class="menu">
        <button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">Insert User</button>
        <button class="tablink" onclick="openPage('News', this, 'green')">Insert Books</button>
        <button class="tablink" onclick="openPage('access', this, 'blue')">Insert accessories</button>
    </div>

    <div id="Home" class="tabcontent register">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">insert user</h1>
                        <div class="card" style="border-radius: 15px;">
                            <form method="post">
                                <div class="card-body">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">first name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="fname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">last name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="lname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <label class="col-md-3 ps-5 radio ">
                                            <input type="radio" name="gender" value="male" checked />
                                            <span>Male</span>
                                        </label>
                                        <label class="col-md-3 ps-5 radio">
                                            <input type="radio" name="gender" value="female" />
                                            <span>Female </span>
                                        </label>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">password</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="password" class="form-control form-control-lg" name="password" />
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Email address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="email" class="form-control form-control-lg" placeholder="example@example.com" name="email" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">mobile phone</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" placeholder="(+962)" name="cell" />
                                        </div>
                                    </div>

                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">city</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="city" class="form-control selectpicker item">
                                                <option value="">select cite</option>
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">ditales address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" placeholder="address" name="address" />
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="insert">insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="News" class="tabcontent register">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">insert Arabic Book</h1>
                        <div class="card" style="border-radius: 15px;">
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Category</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="category" class="form-control item" onChange="getSubcat(this.value);">
                                                <option value="">Select Category</option>
                                                <?php $query = mysqli_query($conn88, "select * from category");
                                                while ($row = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["categoryName"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">sub Category</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="subCategory" class="form-control item" onChange="getSubcat(this.value);">
                                                <option value="">Select subCategory</option>
                                                <?php $query1 = mysqli_query($conn88, "select * from subcategory");
                                                while ($row1 = mysqli_fetch_array($query1)) { ?>
                                                    <option value="<?php echo $row1["id"]; ?>"><?php echo $row1["subcategory"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Book Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="bname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Author Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="aname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Realase data</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="rd" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">About the book</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <textarea class="form-control" rows="3" placeholder="About the book" name="aboutb"></textarea>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">About the Author</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <textarea class="form-control" rows="3" placeholder="About the Author" name="abouta"></textarea>
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">price</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="price" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">quantity</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="q" class="form-control selectpicker item">
                                                <option value="">select quantity</option>
                                                <option value="in stock">in stock</option>
                                                <option value="Out of stock">Out of stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">store</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="s" />
                                        </div>
                                    </div>

                                    <hr class="mx-n3">
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">classification</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="c" class="form-control item">
                                                <option value="">Select classification</option>
                                                <?php $query = mysqli_query($conn88, "select * from subcategory");
                                                while ($row = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $row["subcategory"]; ?>"><?php echo $row["subcategory"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">distribution</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="d" class="form-control item">
                                                <option value="">Select distribution</option>
                                                <?php $query = mysqli_query($conn88, "SELECT book.distribution as distribution,books.subcategory as subcategory1, subcategory.subcategory as subcategory  FROM books join subcategory on books.subcategory==subcategory.subcategory");
                                                while ($row = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $row["distribution"]; ?>"><?php echo $row["subcategory"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">picture</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input class="form-control form-control-lg" type="file" name="image" />
                                            <div class="small text-muted mt-2">Upload picture</div>
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="insertaa">insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="access" class="tabcontent register">
        <section class=" vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">insert Accessorise</h1>
                        <div class="card" style="border-radius: 15px;">
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="bbname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">About</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="aaname" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">price</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" name="pricee" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">quantity</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select name="q" class="form-control selectpicker item">
                                                <option value="">select quantity</option>
                                                <option value="in stock">in stock</option>
                                                <option value="Out of stock">Out of stock</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">picture</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input class="form-control form-control-lg" type="file" name="image" />
                                            <div class="small text-muted mt-2">Upload picture</div>
                                        </div>
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="inserta">insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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