<?php include "header.php";?>
<?php require_once "vadersentiment.php"; ?>

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

		<form method="post">
			<input type="text" name="keyword" value="Search"
				onfocus="this.value = '';" required 
				onblur="if (this.value == '') {this.value = 'Search';}"> <input
				type="submit" value="Search" />
		</form>
	</div>
</div>

<?php
// if there is serach for user
// echo $_POST ['keyword'];
if (isset ( $_POST ['keyword'] )) {
	?>
        
       <?php
require __DIR__ . '/vendor/autoload.php';

// If account is public you can query Instagram without auth

$instagram = new \InstagramScraper\Instagram();
$instagram1 = new \InstagramScraper\Instagram();

// For getting information about account you don't need to auth:

$medias = $instagram->getCurrentTopMediasByTagName($_POST ['keyword'], 10);
?>

<br />
<br />
<br />
<br />
<br />
<br />

<div style="background-color: #fff; margin: auto; width: 100%; text-align: center;">

	<br /> <br /> <br />

<?php foreach ($medias as $media ) {
	$media_details = $instagram->getMediaById($media->getId());
	$account = $instagram->getAccount($media_details->getOwner()->getUsername());
	
	// get media comments
	$comments = $instagram->getMediaCommentsById($media->getId(), 50);
	
	$count = 0;
	$all_comments = "";
	foreach ($comments as $comment) {
		
		$sentimenter = new SentimentIntensityAnalyzer ();
		$result = $sentimenter->getSentiment ( $comment->getText() );

		// sum compunds
		$count += $result['compound'];
		
		$all_comments .= $comment->getText();
	}
?>
	<center>
	<table align="center" width="90%" id="searched_table">
		<tr>
			<td colspan="6" align="center"
				style="color: #fff; font-size: 30px; margin-left: 50px; background-color: #3d3d3d;">
				<h4>
					<b>Media Information</b>
				</h4>
			</td>

		</tr>

		<tr>
			<td colspan="6" align="center"><img width="200" height="200"
				src="<?php echo $media->getImageHighResolutionUrl(); ?>"></td>
		</tr>
		<tr>
			<th class="headerBlue">Media Type</th>
			<th class="headerBlue">Likes</th>
			<th class="headerBlue">Comments</th>
			<th class="headerBlue">Caption</th>
			<th class="headerBlue">Created At</th>
			<th class="headerBlue">Link</th>
		</tr>
		<tr align="center">
			<td><?php echo $media->getType();?></td>
			<td><?php echo $media->getLikesCount();?></td>
			<td><?php echo $media->getCommentsCount();?></td>
			<td><?php echo $media->getCaption();?></td>
			<td><?php echo $media->getCreatedTime();?></td>
			<td><a href="<?php echo $media->getLink()?>" target="_blank">Open</a></td>
		</tr>
	</table>

	<!-- 	</center> -->
	<br/>
<!--         <center> -->
	<table align="center" width="50%" id="searched_table">
		<tr>
			<td colspan="2" align="center"
				style="color: #fff; font-size: 30px; margin-left: 50px; background-color: #3d3d3d;">
				<h4>
					<b>User Information</b>
				</h4>
			</td>
		</tr>
		<tr>
			<td colspan="6" align="center"><img width="200" height="200"
				src="<?php echo $account->getProfilePicUrl(); ?>"></td>
		</tr>
		<tr>
			<th width="35%">Id</th>
			<td><?php echo $account->getId() ;?></td>
		</tr>
		<tr>
			<th class="row1">Username</th>
			<td class="row1"><?php echo $account->getUsername() ?></td>
		</tr>
		<tr>
			<th>Full name</th>
			<td><?php echo $account->getFullName()   ;?></td>
		</tr>
		<tr>
			<th class="row1">Biography</th>
			<td class="row1"><?php echo $account->getBiography()  ;?></td>
		</tr>
		<tr>
			<th>Posts</th>
			<td><?php echo $account->getMediaCount()  ;?></td>
		</tr>
		<tr>
			<th class="row1">Followers</th>
			<td class="row1"><?php echo $account->getFollowedByCount()  ;?></td>
		</tr>
		<tr>
			<th>Follows</th>
			<td><?php echo $account->getFollowsCount() ;?></td>
		</tr>
		<tr>
			<th class="row1">Positivity</th>
			<td class="row1"><?php echo round($count, 2) ;?></td>
		</tr>
		<tr>
			<th class="row1">Frequency of Keyword</th>
			<td class="row1"><?php echo substr_count($all_comments, $_POST ['keyword']) ;?></td>
		</tr>
		<tr>
			<th  class="row1">Influence Ratio</th>
			 
<td class="row1"><?php  $scor = ((( $account->getFollowedByCount() * 0.2 ) + ( $media->getLikesCount() * 0.2 ) + ( round($count * 0.3 ) ) + ( substr_count($all_comments, $_POST ['keyword']) * 0.3 ) ) / 100);
if( $scor < 100){ echo round($scor, 2) ; }
elseif ($scor > 1000){
	echo 95;
}
elseif ($scor > 500){
	echo 85;
}
elseif ($scor > 100){
	echo 80;
}
else{ echo 98; } ?> %  </td>
		</tr>
	</table>
	<!-- 	</center> -->
	<br/>
	<br/>
<?php } ?>

        <?php } ?>
       </center>
       <?php include 'footer.php';?>