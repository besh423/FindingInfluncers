<?php include "header.php";?>

<?php
if (isset ( $_POST ['username'] )) {
	$username =  ( $_POST ['username'] );
	$password =  ( $_POST ['password'] );
	$first_name =  ( $_POST ['first_name'] );
	$last_name =  ( $_POST ['last_name'] );
	$email =  ( $_POST ['email'] );
	
	$res = mysqli_query ( $con, "UPDATE user SET username = '$username', password = '$password', first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = $_SESSION[user_id]" ) or die ("error profile update" . mysqli_error($con));
	
	if (mysqli_affected_rows ( $con ) == 1) {
		echo "<script>alert('Thank you for Update Profile');</script>";
		header ( "REFRESH:0; url=index.php" );
	} else {
		echo "<script>alert('Error in Update ');</script>";
		header ( "REFRESH:0; url=index.php" );
	}
}
?>

<?php 
$user_query = mysqli_query ( $con, "SELECT * FROM user WHERE id = $_SESSION[user_id]") or die ("Error user " . mysqli_error($con));
$user_row = mysqli_fetch_array($user_query);
?>

<div style="margin: 7em 0em 0em 0em;" class="search">
	<div class="s-bar" style="width: 60%;">
		<center>
			<div
				style="background-color: rgba(255, 255, 255, 0.9); border-radius: 7px; width: 35%">
				<img src="images/Instagram_icon.png"
					style="width: 170px; padding: 1.3em 0.5em;" />
			</div>
		</center>
		<br /> <br />
<h2 align="center">Update Profile</h2>
<br/>
		<form method="post">
			<input type="text" name="first_name" value="<?php echo $user_row['first_name'];?>" placeholder="First Name" required><br /><br /> 
			<input type="text" name="last_name" value="<?php echo $user_row['last_name'];?>" placeholder="Last Name" required><br /><br /> 
			<input type="text" name="email" value="<?php echo $user_row['email'];?>" placeholder="Email" required pattern="[A-Z_a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="contain @ and its domain"><br /><br /> 
			<input type="text" name="username" value="<?php echo $user_row['username'];?>" placeholder="Username" required><br /><br /> 
			<input type="password" name="password" value="<?php echo $user_row['password'];?>" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br /><br /> 
			<input type="submit" value="Update" />
		</form>
	</div>
</div>
<?php include 'footer.php';?>