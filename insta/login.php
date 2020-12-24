<?php include "main_header.php";?>

<?php
if (isset ( $_POST ['username'] )) {
	$username =  ( $_POST ['username'] );
	$upass =  ( $_POST ['password'] );
	$res = mysqli_query ( $con, "SELECT * FROM user WHERE username='$username' AND password = '$upass'" );
	$row = mysqli_fetch_array ( $res );
	
	if (mysqli_num_rows ( $res ) == 1) {
		$_SESSION ['user_id'] = $row ['id'];
		echo "<script>alert('Login Sucessfully');</script>";
		header ( "REFRESH:0; url=index.php" );
	} else {
		echo "<script>alert('Wrong Login Details');</script>";
		header ( "REFRESH:0; url=index.php" );
	}
}
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
<h2 align="center">Login</h2>
<br/>
		<form method="post">
			<input type="text" name="username"  placeholder="Username"><br /><br /> <input
				type="password" name="password"  placeholder="Password"><br /><br /> <input
				type="submit" value="Login" />
		</form>
	</div>
</div>
<?php include 'footer.php';?>