</div><!-- row -->
</div><!-- container -->
</div><!-- mainContent -->

<footer>
	<div class="container">
		<div class="row">
			<div id="liscene">
				<p>
					Copyright &copy; 2015 by Forest Mapping. All Rights Reserved.
				</p>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</footer>

</div><!-- bodyWrapper -->

<!-- Main Script -->
<script src="js/mainScript.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/bootstrap.js"></script>

</body>
</html>
<?php
// 5. Close database connection
if(isset($connection)) {
mysqli_close($connection);
}
?>
