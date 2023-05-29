<?php
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            /* padding: 16px; */
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .logo {
            /* display: ; */
            padding-left: 40px;
            font-family: lobster;
            font-size: 32px;
            background: -webkit-linear-gradient(rgb(228, 226, 236), rgb(36, 4, 150));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

        }

        .nav_name {
            font-weight: 700;
            font-size: 15px;
            padding-left: 10px;
        }

        .dropdown {
            left: 890px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light xx">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div id="mySidenav" class="sidenav">
                        <a href="../index.php">
                            <p class="logo">Books Hut</p>
                        </a>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="dashboard.php" class="nav_link active"> <i class="fa-solid fa-gauge"></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="manage-users.php" class="nav_link"> <i class="fa-solid fa-users"></i> <span class="nav_name">Users</span> </a>
                        <?php
                        $sql = mysqli_query($con, "select * from category");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <a href="http://localhost/final%20p/admin/manageen-books.php?pid=<?php echo $row["id"]; ?>" class="nav_link"> <i class="fa-solid fa-bars-progress"></i> <span class="nav_name">manage <?php echo $row["categoryName"]; ?></span> </a>
                        <?php } ?>
                        <a href="manageaccess.php" class="nav_link"> <i class="fa-solid fa-bookmark"></i> <span class="nav_name">accessories</span> </a>
                        <a href="manage-usedbook.php" class="nav_link"> <i class="fa-solid fa-user-clock"></i> <span class="nav_name">used book</span> </a>
                        <a href="contact.php" class="nav_link"> <i class="fa-solid fa-message"></i> <span class="nav_name">content us</span> </a>
                        <hr>
                    </div>
                    <div id="main">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
                    </div>
                    </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-5 my-5 my-md-0" method="post" action="search-result.php">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search User or book" title="Search User or book " aria-describedby="btnNavbarSearch" name="searchkey" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit">search</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>