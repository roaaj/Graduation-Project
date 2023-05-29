<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
error_reporting(0);
$pid = intval($_GET['idq']); // product id
if (isset($_POST['submit'])) {
    $productname = $_POST['name'];
    $picture = $_FILES["picture"]["name"];
    $fl = "../images/arabicbook/" . basename($_FILES["picture"]["name"]);

    if (@move_uploaded_file($_FILES["picture"]["tmp_name"], $fl)) {
    }
    $sql = mysqli_query($con, "update  accessories set picture='$picture' where id='$pid' ");
    $_SESSION['msg'] = "Product Image Updated Successfully !!";
    echo "<script type='text/javascript'> document.location = 'edit-access.php?uid= $pid'; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Update Product Image</title>
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

    <script>
        function getSubcat(val) {
            $.ajax({
                type: "POST",
                url: "get_subcat.php",
                data: 'cat_id=' + val,
                success: function(data) {
                    $("#subcategory").html(data);
                }
            });
        }

        function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
        }
    </script>


</head>

<body>
    <?php include('navbar.php'); ?>
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive">
        <tbody>
            <?php
            $query = mysqli_query($con, "select name,picture from accessories where id='$pid'");
            mysqli_set_charset($con, "utf8");
            ?>
        </tbody>
    </table>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Update Product Image </h3>
                            </div>
                            <div class="module-body">
                                <?php if (isset($_POST['submit'])) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                    </div>
                                <?php } ?>
                                <br />
                                <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
                                    <?php
                                    $query = mysqli_query($con, "select name,picture from accessories where id='$pid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Product Name</label>
                                            <div class="controls">
                                                <input type="text" name="name" readonly value="<?php echo htmlentities($row['name']); ?>" class="span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Current Product Image1</label>
                                            <div class="controls">
                                                <img src="<?php echo "../images/arabicbook/" . htmlentities($row['picture']); ?>" width="150" height="100">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">New Product Image</label>
                                            <div class="controls">
                                                <input type="file" name="picture" id="productimage1" value="" class="span8 tip" required>
                                            </div>
                                        </div>
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