<?php require_once('../admin/Include/Sessions.php'); ?>
<?php require_once('../admin/Include/functions.php') ?>
<?php ConfirmLogin(); ?>
<?php

date_default_timezone_set('Asia/Manila');
$time = time();
if ( isset( $_POST['post-submit'])) {
	$title = mysqli_real_escape_string($con, $_POST['post-title']);
	$category = mysqli_real_escape_string($con, $_POST['post-category']);
	$content = mysqli_real_escape_string($con, $_POST['post-content']);
	$image = $_FILES['post-image']['name'];
	$author = $_SESSION['username'];
	$dateTime = strftime('%Y-%m-%d',$time);
	$title_length = strlen($title);
	$content_lenght = strlen($content);
	$imageDirectory = "Upload/Image/" . basename($_FILES['post-image']['name']);
	if ( empty($title)) {
		$_SESSION['errorMessage'] = "Title Is Emtpy";
		Redirect_To('NewPost.php');
	}else if ( $title_length > 50) {
		$_SESSION['errorMessage'] = "Title Is Too Long";
		Redirect_To('NewPost.php');
	}else if ( empty($content)) {
		$_SESSION['errorMessage'] = "Content Is Empty";
		Redirect_To('NewPost.php');
	}else if ( $content_lenght > 4000) {
		$_SESSION['errorMessage'] = "Content Is Too Long";
		Redirect_To('NewPost.php');
	}else {
		$query = "INSERT INTO cms_post (post_date_time, title, category, author, image, post) 
		VALUES ('$dateTime', '$title', '$category', '$author', '$image', '$content')";
		$exec = Query($query);
		if ($exec) {
			move_uploaded_file($_FILES['post-image']['tmp_name'], $imageDirectory);
			$_SESSION['successMessage'] = "Post Added Successfully";
		}else {
			$_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";

		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Post</title>
	<script src="jquery-3.2.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/adminDashboard.css">
	<link rel="stylesheet" href="../css/login.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<Header style="margin: 1cm;"></Header>
<div class="container-fluid">
	<div class="main">
		<div class="row">
			<div class="col-sm-2">
				<ul id="side-menu" class="nav nav-pills nav-stacked">
					<li class=""><a href="Dashboard.php">
					<i class="fa-solid fa-house-user"></i>
					 &nbsp;Dashboard</a></li>
					<li class="active"><a href="NewPost.php">
					<i class="fa-solid fa-newspaper"></i>
					&nbsp;New Post</a></li>
					<li class=""><a href="Categories.php">
					<i class="fa-solid fa-book-atlas"></i>
					&nbsp;Categories</a></li>
					<li><a href="Categories.php">
					<i class="fa-solid fa-lock"></i>
					&nbsp;Manage Admin</a></li>
					<li><a href="Admin.php">
					<i class="fa-solid fa-comments"></i>
					&nbsp;Comments</a></li>
					<li><a href="Blog.php">
					<i class="fa-regular fa-window-restore"></i>
					&nbsp;Live Blog</a></li>
					<li><a href="Lagout.php">
					<i class="fa-solid fa-right-from-bracket"></i>
					&nbsp;Lagout</a></li>
				</ul>
			</div>
			<div class="col-xs-10">
				<div class="page-title"><h1>Add New Post</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<form action="NewPost.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<labal for="post-title">Title</labal>
								<input type="text" name="post-title" class="form-control" id="post-title">
							</div>
							<div class="form-group">
								<labal for="post-category">Category</labal>
								<select class="form-control" name="post-category" id="post-category">
									<?php
										$sql = "SELECT * FROM cms_category";
										$exec = Query($sql);
										while($row = mysqli_fetch_assoc($exec)){
											echo "<option>$row[cat_name]</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<labal for="post-image">Feature Image</labal>
								<input type="File" name="post-image" class="form-control">
							</div>
							<div class="form-group">
								<labal for="post-content">Content</labal>
								<textarea rows="10" class="form-control" name="post-content" id="post-content">
									
								</textarea>
							</div>
							<div class="form-group">
								<button name="post-submit" class="btn btn-primary form-control">Publish</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="footer">
		<div class="col-sm-12">
		<hr>
			<p>All Rights Reserved 2017 | Theme By :  Alger Makiputin</p>
		<hr>
		</div>
	</div>
</div>
<script type="text/javascript" src="jquery.js"></script>
</body>
</html>