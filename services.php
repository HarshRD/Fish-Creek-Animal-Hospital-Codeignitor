<?php
$db_name = "127.0.0.1";
$mysql_user = "root";
$mysql_pass = "123";
$db = "vet";

$con = mysqli_connect($db_name,$mysql_user,$mysql_pass,$db);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fish Creek Animal Hospital</title>
		<link rel="stylesheet" href="fishcreek.css">
	</head>
	<body>
		<div id="wrapper">
			<h1 class="heading1">Fish Creek Animal Hospital</h1>
			<table>
				<tr>
					<td valign="top" width="200px">
						<nav>
						<br>
						<ul class="service">
							<li><a href="index.php">Home</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="askvet.php">Ask the Vet</a></li>
							<li><a href="subscribe.php">Subscribe</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
						</nav>
					</td>
					<td>
						<div>
							<ul>
								<?php
								$sql = "SELECT * from service;";
								$result = mysqli_query($con,$sql);
								while($row = $result->fetch_assoc()){
									echo "<b class=\"Para_headings\"><li>".$row["servicename"]."</li></b><p class=\"sd\" style='display:inline'>".$row["description"]."</p>";
								}
								?>
							</ul>
						</div>
						<br>
						<div id="footer">
						<i>Copyright &copy; 2016 Fish Creek Animal Hospital</i><br>
						<i><a href="mailto:harsh@desai.com">harsh@desai.com</a></i>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>