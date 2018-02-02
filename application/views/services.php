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
							<ul>
								<?php
								foreach($records as $rec) {
									echo "<dt class='Para_headings'<strong><b><li>".$rec->servicename."</li></b></strong></dt><dd class='wdm'>".$rec->description."</dd>";
								}
								/*$sql = "SELECT * from service;";
								$result = mysqli_query($con,$sql);
								while($row = $result->fetch_assoc()){
									echo "<b class=\"Para_headings\"><li>".$row["servicename"]."</li></b><p class=\"sd\" style='display:inline'>".$row["description"]."</p>";
								}*/
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