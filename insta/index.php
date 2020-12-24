<?php include "main_header.php";?>

<?php
if ($_SESSION ['user_id'] != "") { 
	header ("Location: search.php");
}
?>

<!--search start here-->
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

			<input type="submit" value="Login" onclick="window.location='login.php'"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" value="Register" onclick="window.location='register.php'"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form>
	</div>
</div>

<?php include 'footer.php';?>