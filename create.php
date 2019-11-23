<?php 
	include "inc/header.php"; 
	include "config.php";
	include "database.php";
?>
<?php 
	$db= new Database();
	if (isset($_POST['submit'])) {
		$name=mysqli_real_escape_string($db->link,$_POST['name']);
		$email=mysqli_real_escape_string($db->link,$_POST['email']);
		$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
		if ($name=='' || $email=='' || $skill=='') {
			$error="Field Must Not Be Empty";
		}
		else{
			$query="INSERT INTO tbl_user (name,email,skill) values('$name','$email','$skill')";
			$create=$db->Insert($query);
		}
	}
?>
<?php
		if (isset($error)) {
			echo "<span style='color:red'>".$error."</span";
		}
	?>
 
<form action="create.php" method="POST">
<table>
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" placeholder="Enter Your Name"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" placeholder="Enter Your Email"></td>
	</tr>
	<tr>
		<td>Skill:</td>

		<td><input type="text" name="skill" placeholder="Enter Your Skill"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="submit"></td>
		<td><input type="reset" value="cancel"></td>
	</tr>

</table>	

</form>
<a href="index.php">GO Back</a>





		

<?php include 'inc/footer.php'; ?>