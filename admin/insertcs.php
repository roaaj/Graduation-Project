<?php $con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");

date_default_timezone_set('Asia/Amman'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $dropd = $_POST['dropd'];
    $sql = mysqli_query($con, "insert into category(categoryName,dropd) values('$category','$dropd')");
    echo "<script>alert('Category Created !!');</script>";
}

if (isset($_GET['del'])) {
    mysqli_query($con, "delete from category where id = '" . $_GET['id'] . "'");
    echo "<script>alert('Category deleted !!');</script>";
}

if (isset($_POST['submitt'])) {
    $category = $_POST['category'];
    $subcat = $_POST['subcategory'];
    $sql = mysqli_query($con, "insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
    echo "<script>alert('SubCategory Created !!');</script>";
}

if (isset($_GET['del'])) {
    mysqli_query($con, "delete from subcategory where id = '" . $_GET['id'] . "'");
    echo "<script>alert('SubCategory deleted !!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category and subcategory</title>
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
            width: 15%;

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
        <button class="tablink" onclick="openPage('category', this, 'black')" id="defaultOpen">Insert category</button>
        <button class="tablink" onclick="openPage('News', this, 'green')">Insert subcategory</button>
    </div>
    <div id="category" class="tabcontent register">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">category</h1>
                        <div class="card" style="border-radius: 15px;">
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" name="Category" method="post">
                                    <div class="card-body">
                                        <div class="row align-items-center py-3">
                                            <div class="col-md-3 ps-5">
                                                <h6 class="mb-0">Category Name</h6>
                                            </div>
                                            <div class="col-md-9 pe-5">
                                                <input type="text" class="form-control form-control-lg" placeholder="Category Name" name="category" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center py-3">
                                            <div class="col-md-3 ps-5">
                                                <h6 class="mb-0">drop down menu </h6>
                                            </div>
                                            <div class="col-md-9 pe-5">
                                                <select name="dropd" class="form-control selectpicker item">
                                                    <option value=1>yes</option>
                                                    <option value=0>no</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="mx-n3">
                                        <div class="px-5 py-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="module">
                            <div class="module-head">
                                <h3>Manage Categories</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>dropd</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $query = mysqli_query($con, "select * from category");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['categoryName']); ?></td>
                                                <td><?php echo htmlentities($row['dropd']); ?></td>
                                                <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                                <td><?php echo htmlentities($row['updationDate']); ?></td>
                                                <td>
                                                    <a href="edit-category.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="insertcs.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div id="News" class="tabcontent register">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">category</h1>
                        <div class="card" style="border-radius: 15px;">
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" name="Category" method="post">
                                    <div class="card-body">
                                        <div class="row align-items-center py-3">
                                            <div class="col-md-3 ps-5">
                                                <h6 class="mb-0">Category </h6>
                                            </div>
                                            <div class="col-md-9 pe-5">
                                                <select name="category" class="form-control selectpicker item" required>
                                                    <option value="">Select Category</option>
                                                    <?php $query = mysqli_query($con, "select * from category");
                                                    while ($row = mysqli_fetch_array($query)) { ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center py-3">
                                            <div class="col-md-3 ps-5">
                                                <h6 class="mb-0">SubCategory Name</h6>
                                            </div>
                                            <div class="col-md-9 pe-5">
                                                <input type="text" class="form-control form-control-lg" placeholder="Enter SubCategory Name" name="subcategory" />
                                            </div>
                                        </div>
                                        <hr class="mx-n3">
                                        <div class="px-5 py-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="submitt">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="module">
                            <div class="module-head">
                                <h3>Manage Categories</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query = mysqli_query($con, "select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['categoryName']); ?></td>
                                                <td><?php echo htmlentities($row['subcategory']); ?></td>
                                                <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                                <td><?php echo htmlentities($row['updationDate']); ?></td>
                                                <td>
                                                    <a href="edit-subcategory.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                                    <a href="insertcs.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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