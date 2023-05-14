<?php
session_start();
$con2 = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con2, "utf8");
$searchkey = $_GET['searchkey'];
$res = mysqli_query($con2, "select * from books where (BookName like '%$searchkey%' ||AuthorName like '%$searchkey%')");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="content">
        <div class="post">
            <div class="entry">
                <h3>Search Results against keyword <?php echo $_GET['searchkey']; ?> for Book Name & Author:</h3>
                <table border="3" width="100%">
                    <?php
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ($count == 0) {
                            echo '<tr>';
                        } ?>

                    <?php echo '<td valign="top" width="20%" align="center">
						<a href="http://localhost/final%20p/content.php?uid=' . $row['id'] . '">
						<img src="images/arabicbook/' . $row['picture'] . '" width="100" height="150">
						<br> Book Name: ' . $row['BookName'] . '<br> Author Name' . $row['AuthorName'] . '</a>
						</td>';
                        $count++;

                        if ($count == 4) {
                            echo '</tr>';
                            $count = 0;
                        }
                    }
                    ?>


                </table>
            </div>

        </div>

    </div>
</body>

</html>