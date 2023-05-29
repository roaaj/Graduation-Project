<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
date_default_timezone_set('Asia/Amman'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $dropd = $_POST['dropd'];
    $id = intval($_GET['id']);
    $sql = mysqli_query($con, "update category set categoryName='$category',dropd='$dropd',updationDate='$currentTime' where id='$id'");
    echo "<script>alert('Category Updated !');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Category</title>
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Category</h3>
                            </div>
                            <div class="module-body">
                                <?php if (isset($_POST['submit'])) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                    </div>
                                <?php } ?>
                                <br />
                                <form class="form-horizontal row-fluid" name="Category" method="post">
                                    <?php
                                    $id = intval($_GET['id']);
                                    $query = mysqli_query($con, "select * from category where id='$id'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Category Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter category Name" name="category" value="<?php echo  htmlentities($row['categoryName']); ?>" class="span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">drop down menu</label>
                                            <select name="dropd" class="form-control selectpicker item">
                                                <option value=1>yes</option>
                                                <option value=0>no</option>
                                            </select>
                                        </div><br>
                                    <?php } ?>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>