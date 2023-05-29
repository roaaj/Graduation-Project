<?php session_start();
error_reporting(0);
$conn8 = mysqli_connect("localhost", "root", "", "projectfinal55");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Between Dates report date selection | Registration and Login System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">
    <?php include_once('navbar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">B/w Dates Report Date Selection-order</h1>
                    <div class="card mb-4">
                        <form method="post" name="bwdatesreport" action="orderbedate-report-result.php">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>From Date</th>
                                        <td><input class="form-control" id="fromdate" name="fromdate" type="date" value="" required /></td>
                                    </tr>
                                    <tr>
                                        <th>To Date</th>
                                        <td><input class="form-control" id="todate" name="todate" type="date" value="" required /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>