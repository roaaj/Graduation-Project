<?php
$con = mysqli_connect("localhost", "root", "", "projectfinal55") or die("Could not connect to projectfinal55 database!");
mysqli_set_charset($con, "utf8");
include "includes/arrays.php";
$fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
$lname = isset($_POST["lname"]) ? $_POST["lname"] : "";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
$city = isset($_POST["city"]) ? $_POST["city"] : "";
$cell = isset($_POST["cell"]) ? $_POST["cell"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$address = isset($_POST["address"]) ? $_POST["address"] : "";
$isError = false;
if (isset($_POST["submit"])) {
	if (empty($fname)) {
		$formErrors["fnameError"] = true;
		$isError = true;
	}

	if (empty($lname)) {
		$formErrors["lnameError"] = true;
		$isError = true;
	}
	if (empty($gender)) {
		$formErrors["genderError"] = true;
		$isError = true;
	}
	if (empty($cell)) {
		$formErrors["cellError"] = true;
		$isError = true;
	}

	if (empty($email)) {
		$formErrors["emailError"] = true;
		$isError = true;
	}
	if (empty($city)) {
		$formErrors["cityError"] = true;
		$isError = true;
	}
	if (empty($password)) {
		$formErrors["passwordError"] = true;
		$isError = true;
	}
	if (empty($address)) {
		$formErrors["addressError"] = true;
		$isError = true;
	}
	if (preg_match('/^[[:lower:]]/', $fname)) {
		$formErrors["fnameError"] = true;
		$isError = true;
		$formErrors['fnameError'] = "First name must start with capital letter!";
		$fname = $formErrors["fnameError"];
	}
	if (preg_match('/^[[:lower:]]/', $lname)) {
		$formErrors["lnameError"] = true;
		$isError = true;
		$formErrors['lnameError'] = "Last name must start with capital letter!";
		$lname = $formErrors["lnameError"];
	}
	if (preg_match('/[[:digit:]]/', $fname)) {
		$formErrors["fnameError"] = true;
		$isError = true;
		$formErrors['fnameError'] = "First name must not contains digits!";
		$fname = $formErrors["fnameError"];
	}
	if (preg_match('/[[:digit:]]/', $lname)) {
		$formErrors["lnameError"] = true;
		$isError = true;
		$formErrors['lnameError'] = "Last name must not contains digits!";
		$lname = $formErrors["lnameError"];
	}
	if (preg_match('/^[[:space:]]/', $fname)) {
		$formErrors["fnameError"] = true;
		$isError = true;
		$formErrors['fnameError'] = "First name must not start with spaces!";
		$fname = $formErrors["fnameError"];
	}
	if (preg_match('/^[[:space:]]/', $lname)) {
		$formErrors["lnameError"] = true;
		$isError = true;
		$formErrors['lnameError'] = "Last name must not start with spaces!";
		$lname = $formErrors["lnameError"];
	}
	if (preg_match('/[[:space:]]/', $email)) {
		$formErrors["emailError"] = true;
		$isError = true;
		$formErrors['emailError'] = "Email must not contains spaces!";
		$email = $formErrors["emailError"];
	}
	if (preg_match('/[[:space:]]/', $cell)) {
		$formErrors["cellError"] = true;
		$isError = true;
		$formErrors['cellError'] = "Phone number must not contains spaces!";
		$cell = $formErrors["cellError"];
	}
	if (preg_match('/[[:space:]]/', $password)) {
		$formErrors["passwordError"] = true;
		$isError = true;
		$formErrors['passwordError'] = "password must not contains spaces!";
		$password = $formErrors["passwordError"];
	}
	if (!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $cell)) {
		$formErrors["cellError"] = true;
		$isError = true;
		$formErrors['cellError'] = "Valid Phone number:07******** ";
		$cell = $formErrors["cellError"];
	}
	if (@!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9-]+(\.[a-zA-Z]+)*$/", $email)) {
		$formErrors["emailError"] = true;
		$isError = true;
		$formErrors['emailError'] = "Valid email address: someone@*mail.com";
		$email =  $formErrors['emailError'];
	}

	if (!$isError) {
		$query = "INSERT INTO users" .
			"( fname, lname, gender, city, cell, email, password, address  )" .
			"VALUES ( '$fname', '$lname', '$gender', '$city', '$cell', '$email', '$password', '$address' )";
		$result = mysqli_query($con, $query) or die("Could not execute query!");
		header("location:../index.php");
		mysqli_close($con);
		die();
	}
}
?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
		body {
			padding-top: 50px;
		}

		fieldset {
			border: thin solid #ccc;
			border-radius: 4px;
			padding: 20px;
			padding-left: 40px;
			background: #fbfbfb;
		}

		legend {
			color: #678;
		}

		.form-control {
			width: 95%;
		}

		label small {
			color: #678 !important;
		}

		span.req {
			color: maroon;
			font-size: 112%;
		}

		.error {
			color: red;
			font-weight: bold;
			font-size: 100%;
			/* margin-left: 20px; */

		}
	</style>
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form method='post' action='contact.php'>
					<fieldset>
						<legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>
						<?php if ($isError) { ?>
							<p class='error'>Fields with * need to be filled in properly.</p>
						<?php } ?>
						<?php foreach ($formLabels as $eleName => $eleLabel) { ?>
							<div class="form-group">
								<label for="phonenumber"> <?php echo $eleLabel; ?> </label>
								<input type="text" class="form-control phone" maxlength="28" placeholder="Enter your <?php echo $eleName ?>" name='<?php echo $eleName; ?>' value='<?php echo $$eleName; ?>' />
								<?php
								if ($formErrors[$eleName . "Error"] == true) {
									echo "<span class = 'error'>*</span>";
								}
								?>
							</div>
						<?php } ?>
						<div class="form-group">
							<label for="Gender">Gender</label>
							<input type="radio" name="gender" value="male" <?php echo ($gender == "male" ? "checked" : ""); ?> />
							<span>Male</span>
							<input type="radio" name="gender" value="female" <?php echo ($gender == "female" ? "checked" : ""); ?> />
							<span>Female </span><br>
							<?php
							if ($formErrors["gender" . "Error"] == true) {
								echo "<span class = 'error'>*</span>";
							}
							?>
						</div>

						<div class="form-group">
							<label for="phonenumber"></span>City</label>
							<select name="city" class="form-control selectpicker item">
								<?php
								echo "<h1>city: $city</h1>";
								foreach ($cities as $cityCode => $cityName) {
									echo "<option value='$cityCode'" .
										($city == $cityCode ? " selected>" : ">") .
										$cityName . "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<input class="btn btn-success" type="submit" name='submit' value='Register'><br>
							<p class="log1">do you have an account? <a href="login.php">LogIn</a> </p>
						</div>
						<h5></h5>
						<h5></h5>
					</fieldset>
				</form>

			</div><!-- ends col-6 -->
			<div class="col-md-6">
				<h1 class="page-header"></h1>
				<p><a href="../index.php"><img src="PhotoRoom.png" alt=""></a></p>
			</div>
		</div>
	</div>
</body>

</html>