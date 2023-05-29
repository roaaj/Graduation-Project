<html>

<head>
	<title>Contacts Info</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<?php

	// Report all errors except E_NOTICE and E_WARNING
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

	include "includes/arrays.php";

	$query = "SELECT * from contacts";

	$conn = mysqli_connect("localhost", "root", "", "projectfinal55") or die("Could not connect to database!</p>");

	$result = mysqli_query($conn, $query) or die("Could not execute query!");

	mysqli_close($conn);
	?>
	<table>
		<caption>Result of <?php echo $query; ?></caption>
		<tr>
			<?php
			foreach ($contactsTableColumns as $columnName => $columnDesc) {
				echo "<th>" . $columnDesc . "</th>";
			}
			?>
		</tr>
		<?php
		// Fetch each record in result set.
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";

			foreach ($contactsTableColumns as $columnName => $columnDesc) {
				if ($columnName == 'gender')
					echo "<td>" . ($row[$columnName] ? 'Female' : 'Male') . "</td>";
				elseif ($columnName == 'city')
					echo "<td>" . $cities[$row[$columnName]] . "</td>";
				else
					echo "<td>" . $row[$columnName] . "</td>";
			}

			echo "</tr>";
		} // end while
		?>
	</table>
</body>

</html>