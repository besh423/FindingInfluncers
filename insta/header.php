<?php include 'config.php';?>

<!DOCTYPE HTML>
<html>
<head>
<title>Instagram Analysis</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--Google Fonts-->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<!--Google Fonts-->
<style>
table {
	background-color: #eee;
}

th {
	padding: 10px;
}

td {
	padding: 10px;
}

.headerBlue {
	background-color: #439bd7;
	padding: 10px;
	color: #fff;
}

.row0 {
	background-color: #eee;
}

.row1 {
	background-color: #fff;
}
</style>
</head>

<body>
	<ul id="nav_bar">
			<li id="sign_in"><a href="search.php">Home</a></li>
			<li id="sign_in"><a href="contact.php">Contact</a></li>
		<?php if (isset($_SESSION['user_id'])) {?>
			<li id="sign_in"><a href="profile.php">Profile</a></li>
			<li id="sign_in"><a href="logout.php">Logout</a></li>
		<?php } ?>
	</ul>