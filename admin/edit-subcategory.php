<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
date_default_timezone_set('Asia/Amman'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $subcat = $_POST['subcategory'];
    $id = intval($_GET['id']);
    $sql = mysqli_query($con, "update subcategory set categoryid='$category',subcategory='$subcat',updationDate='$currentTime' where id='$id'");
    $_SESSION['msg'] = "Sub-Category Updated !!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Edit SubCategory</title>
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
                                <h3>Edit SubCategory</h3>
                            </div>
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" name="Category" method="post">
                                    <?php
                                    $id = intval($_GET['id']);
                                    $query = mysqli_query($con, "select category.id,category.categoryName,subcategory.subcategory from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Category</label>
                                            <div class="controls">
                                                <select name="category" class="span8 tip" required>
                                                    <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($catname = $row['categoryName']); ?></option>
                                                    <?php $ret = mysqli_query($con, "select * from category");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                        echo $cat = $result['categoryName'];
                                                        if ($catname == $cat) {
                                                            continue;
                                                        } else {
                                                    ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['categoryName']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">SubCategory Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Enter category Name" name="subcategory" value="<?php echo  htmlentities($row['subcategory']); ?>" class="span8 tip" required>
                                            </div>
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

</html>