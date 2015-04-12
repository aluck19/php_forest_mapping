<?php
require_once ("../includes/session.php");
 ?>
<?php
require_once ("../includes/db_connection.php");
?>
<?php
require_once ("../includes/functions.php");
?>
<?php
include ("../includes/layouts/header.php");
?>
<?php find_selected_page(); ?>

<div id="main">
	<div id="navigation">
		<h2 style="border-bottom: 2px solid #fff;color: #FFFFFF;padding: 5px;"><i class="fa fa-th-list"></i> Select Categories</h2>
		<?php echo navigation($current_subject,$current_page); ?>
		<br />
		<a href="new_subject.php"><button" type="button" style="background: rgb(250, 176, 55);color: #fff;" class="ui button">+ Add new categoy</button></a>

		<div class="shareFix">
		<h2 style="margin: 0;display: inline-block;font-size: 19px;position: relative;top: -10px;">Share it!</h2>
		<span class='st_facebook_large' displayText='Facebook'></span>
		<span class='st_twitter_large' displayText='Tweet'></span>
		<span class='st_googleplus_large' displayText='Google +'></span>
		<span class='st_linkedin_large' displayText='LinkedIn'></span>
		<span class='st_pinterest_large' displayText='Pinterest'></span>
		<span class='st_email_large' displayText='Email'></span>
		</div>

		</div>

		<div id="page">
		<?php echo message(); ?>
		<?php if ($current_subject) {
		?>
		<h2 style="margin-top: 10px; border-bottom: 2px solid  #E7AE5F; width: 99%">Manage Category: <?php echo htmlentities($current_subject["menu_name"]); ?></h2>
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Category name:</b> <?php echo htmlentities($current_subject["menu_name"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Position:</b><?php echo $current_subject["position"]; ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Visible:</b> <?php echo $current_subject["visible"]==1?'yes':'no'; ?></p>
		<br />
		<br />
		<a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>">
		<button style="margin-top: 10px;" type="button" class="teal ui button">
		Edit Category
		</button>
		</a>

		<div style="margin-top: 2em; border-top: 1px solid #E7AE5F;width: 99%;">
		<h3>Post in this category:</h3>
		<ul>
		<?php $subject_pages=find_pages_for_subject($current_subject["id"]);
			while($page=mysqli_fetch_assoc($subject_pages)) {
			echo "<li style=\"margin-left: 20px;  font-size: 17px;\">";
			$safe_page_id=urlencode($page["id"]);
			echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
			echo htmlentities($page["menu_name"]);
			echo "</a>";
			echo "</li>";
			}
		?>
		</ul>
		<br />
		<a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>">
		<button" type="button" class="teal ui button">
		+ Post the new activity </button>
		</a>
		</div>

		<?php } elseif ($current_page) { ?>
		<h2 style="margin-top: 10px; border-bottom: 2px solid  #E7AE5F; width: 99%">Manage Activity: <?php echo htmlentities($current_page["menu_name"]); ?></h2>

		<img style="width: 99%; margin-bottom: 10px; border: 5px solid #ddd;" src="img/soilErosion.jpg"/>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Title:</b> <?php echo htmlentities($current_page["menu_name"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b> Full Name:</b>  <?php echo htmlentities($current_page["full_name"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Country: </b> <?php echo htmlentities($current_page["country"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>City: </b> <?php echo htmlentities($current_page["city"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Address:</b> <?php echo htmlentities($current_page["address"]); ?></p>
		<br />
		<div>
		<p style="font-size: 17px; margin-bottom: 10px; line-height: 1em;"><b>Map</b></p>
		<iframe width="99%" height="450" frameborder="0" style="border:0"
		src="https://www.google.com/maps/embed/v1/place?q=<?php echo htmlentities($current_page["address"]); ?>%2C%20<?php echo htmlentities($current_page["city"]); ?>%2C%20<?php echo htmlentities($current_page["country"]); ?> ?>&key=AIzaSyDi-sp-dS3Okdiiyu93-w3-fzhX3Nj4V-0"></iframe>
		</div>
		<br>
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Comments: </b> <?php echo htmlentities($current_page["content"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Reasons:</b>  <?php echo htmlentities($current_page["reasons"]); ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Position: </b> <?php echo $current_page["position"]; ?></p>
		<br />
		<p style="font-size: 17px; margin: 0; line-height: 1em;"><b>Visible:</b>  <?php echo $current_page["visible"]==1?'yes':'no'; ?></p>
		<br />
		<p style="font-size: 17px;  line-height: 1em;margin-top: -20px;margin-bottom: 20px;"><b>Send Email: </b><span style=  cursor: pointer;" class='st_email_large' displayText='Email'>Send Email to Authority</span></p>
		<div class="ui teal submit button">
		<a href="edit_page.php?page=<?php echo urlencode($current_page['id']); ?>">Edit activity</a>
		</div>

		<?php } else { ?>
		<div style="  margin-top: 16px; font-size: 20px; font-weight: bold;}">Please select a category.</div>
		<?php } ?>

		</div>
		</div>

		<?php
		include ("../includes/layouts/footer.php");
		?>
