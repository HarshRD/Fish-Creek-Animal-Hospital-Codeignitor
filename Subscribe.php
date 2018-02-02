<?php
$db_name = "127.0.0.1";
$mysql_user = "root";
$mysql_pass = "123";
$db = "vet";

$con = mysqli_connect($db_name,$mysql_user,$mysql_pass,$db);
$Name_error='';
$Address_error='';
$E_mail_error='';
$Phone_error='';
$Password_error='';
$Service_Name_error='';
$Pet_Name_error='';

if(isset($_POST["Submit"]))
{
	if(empty($_POST["Name"]))
	{
		$Name_error="Please Enter Name";
	}
	if(empty($_POST["Address"]))
	{
		$Address_error="Please Enter Address";
	}
	if(empty($_POST["E_mail"]))
	{
		$E_mail_error="Please Enter E-mail";
	}
	else{
		if(!preg_match("/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/", $_POST["E_mail"]))
		{
			$E_mail_error="Not a valid Email ID";
		}
	}
	if(empty($_POST["Phone"]))
	{
		$Phone_error="Please Enter Phone number";
	}
	else if(!preg_match("/^([0-9]{10})*$/", $_POST["Phone"]))
		{
			$Phone_error="Please Enter correct Phone number";
			if(strlen($_POST["Phone"]) < 10 || strlen($_POST["Phone"]) > 10) {
				$Phone_error="Enter only 10 digit number";
			}
		}
	if(empty($_POST["Password"]))
	{
		$Password_error="Please Enter Password";
	}
	else{
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $_POST["Password"]))
		{
			$Password_error="Only alphanumeric characters allowed";
		}
	}
	if(empty($_POST["Service_Name"]))
	{
		$Service_Name_error="Please Select a Service Name";
	}
	if(empty($_POST["Pet_Name"]))
	{
		$Pet_Name_error="Please Select a Pet Name";
	}

	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$E_mail = $_POST['E_mail'];
	$Phone = $_POST['Phone'];
	$Password = $_POST['Password'];
	if(isset($_POST["Service_Name"])){
		$Service_Name = $_POST['Service_Name'];
	}
	if(isset($_POST["Pet_Name"])){
		$Pet_Name = $_POST['Pet_Name'];
	}
	$Date = date('Y-m-d');

	if(!empty($_POST["Name"]) && !empty($_POST["Address"]) && !empty($_POST["E_mail"]) && preg_match("/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/", $_POST["E_mail"]) && !empty($_POST["Phone"]) && preg_match("/^([0-9]{10})*$/", $_POST["Phone"]) && !empty($_POST["Password"]) && preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $_POST["Password"]) && !empty($_POST["Service_Name"]) && !empty($_POST["Pet_Name"])) {

		$checkE_mail = "SELECT * from client where email = '$E_mail'";
		$result = mysqli_query($con,$checkE_mail);
	if(mysqli_num_rows($result) > 0){

		$checkE_mail_row = $result->fetch_assoc();
		$clientName=$checkE_mail_row['clientid'];
		$insert = "INSERT INTO subscription values ('$clientName','$Service_Name','$Pet_Name','$Date')";
		$result1 = mysqli_query($con, $insert); 
	}else{

		$sql = "INSERT INTO client(name, address, phone, email, password) VALUES ('$Name', '$Address' , '$Phone' ,'$E_mail' , md5('$Password'));";
    	$result = mysqli_query($con,$sql);

    	$checkE_mail = "SELECT * from client where email = '$E_mail'";
		$result = mysqli_query($con,$checkE_mail);

    	$checkE_mail_row = $result->fetch_assoc();
		$clientName=$checkE_mail_row['clientid'];
		$insert = "INSERT INTO subscription values ('$clientName','$Service_Name','$Pet_Name','$Date')";
		$result1 = mysqli_query($con, $insert); 

	}
	
	}
	
}

$query1 = "SELECT * FROM service";
$result1 = mysqli_query($con, $query1);
$options1 = "";

$query2 = "SELECT * FROM pet";
$result2 = mysqli_query($con, $query2);
$options2 = "";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fish Creek Animal Hospital</title>
		<link rel="stylesheet" href="fishcreek.css">
	</head>
	<body>
		<div id="wrapper">
			<h1 class="heading2">Fish Creek Animal Hospital</h1>
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
							<h2>Subscribe Fish Creek</h2>
							<p class="wdm">Required fields are marked with an asterick (*).</p>
						</div>
						<form class="wdm" action="Subscribe.php" method="POST">
							<table class="form">
								<tr>
									<td style="text-align:right">* Client Full Name: &nbsp;</td><td><input type="text" name="Name"><span class="Invalid Text"><?php echo $Name_error; ?></span></td>
								</tr>
								<tr>
									<td style="text-align:right">* Address: &nbsp;</td><td><input type="text" name="Address"><span class="Invalid Text"><?php echo $Address_error; ?></span></td>
								</tr>
								<tr>
									<td style="text-align:right">* E-mail: &nbsp;</td><td><input type="text" name="E_mail"><span class="Invalid Text"><?php echo $E_mail_error; ?></span></td>
								</tr>
								<tr>
									<td style="text-align:right">* Phone: &nbsp;</td><td><input type="text" name="Phone"><span class="Invalid Text"><?php echo $Phone_error; ?></span></td>
								</tr>
								<tr>
									<td style="text-align:right">* Password: &nbsp;</td><td><input type="password" name="Password"><span class="Invalid Text"><?php echo $Password_error; ?></span></td>
								</tr>
								<tr>
									<td style="text-align:right">* Type of Service: &nbsp;</td><td><select name="Service_Name" style="width: 150px;">
										<option value="" selected disabled>Service Name</option>
										<?php
										while($row1 = mysqli_fetch_array($result1))
										{
											echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
										}
										?>
									</select>
									<span class="Invalid Text"><?php echo $Service_Name_error; ?></span>
									</td>
								</tr>
								<tr>
									<td style="text-align:right">* Pet: &nbsp;</td><td><select name="Pet_Name" style="width: 150px;">
										<option value="" selected disabled>Pet Name</option>
										<?php
										while($row2 = mysqli_fetch_array($result2))
										{
											echo "<option value='".$row2[0]."'>".$row2[1]."</option>";
										}
										?>
										</select>
										<span class="Invalid Text"><?php echo $Pet_Name_error; ?></span>
									</td>
								</tr>
								<tr>
									<td style="text-align:right"></td><td><input type="submit" name="Submit" value="Send Now"/></td>
								</tr>
							</table>
						</form>
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