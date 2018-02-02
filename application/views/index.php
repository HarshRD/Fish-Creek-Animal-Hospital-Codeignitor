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
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fishcreek.css">
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
							<li><a href="<?php echo base_url() ?>Home">Home</a></li>
							<li><a href="<?php echo base_url() ?>Services">Services</a></li>
							<li><a href="<?php echo base_url() ?>Askvet">Ask the Vet</a></li>
							<li><a href="<?php echo base_url() ?>Subscribe">Subscribe</a></li>
							<li><a href="<?php echo base_url() ?>Contact">Contact</a></li>
						</ul>
						</nav>
					</td>
					<td>
						<div>
							<p style="display:inline"><b class="Para_headings">Full Service Facility</b></p>
							<dd class="sd">Veterinarians and staff are on duty 24 hours a day, 7 days a week.</dd>
							<p style="display:inline"><b class="Para_headings">Years of Experience</b></p>
							<dd class="sd">Fish Creek Veterinarians have provided quality, dependable care for your beloved animals since 1984.</dd>
							<p style="display:inline"><b class="Para_headings">Open Door Policy</b></p>
							<dd class="sd">Our professionals welcome owners to stay with their pets during any medical procedure.</dd>
						</div>
						<p class="wdm">800-555-5555<br>
						1242 Grassy Lane<br>
						Fish Creek, WI 55534<br>
						</p>
						<br> 
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