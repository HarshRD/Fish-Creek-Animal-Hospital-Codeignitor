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
							<p class="wdm"><a href="<?php echo base_url() ?>Contact">Contact</a>&nbsp;us if you have a question that you would like answered here.</p>
							<?php
								foreach($records as $rec) {
									echo "<dt class='Para_headings'<strong><b>".$rec->question."</b></strong></dt><dd class='wdm'>".$rec->answer."</dd>";
								}
								/*$sql = "SELECT * from questions;";
								$result = mysqli_query($con,$sql);
								while($row = $result->fetch_assoc()){
									$question = $row["question"];
									$answer = $row["answer"];
									echo "<dt class=\"Para_headings\"><strong>".$question."</strong></dt>";
									echo "<dd class=\"wdm\">".$answer."</dd>";
									echo "<br>";
								}*/
								?>
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