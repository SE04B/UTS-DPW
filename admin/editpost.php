<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/functions.php') ?>
<?php ConfirmLogin(); ?>
<?php
if ( isset( $_POST['post-update'])) {
	date_default_timezone_set('Asia/Manila');
	$time = time();
	$title = mysqli_real_escape_string($con, $_POST['post-title']);
	$category = mysqli_real_escape_string($con, $_POST['post-category']);
	$content = mysqli_real_escape_string($con, $_POST['post-content']);
	$image = $_FILES['post-image']['name'];
	$author = $_SESSION['username'];
	$dateTime = strftime('%Y-%m-%d',$time);
	$title_length = strlen($title);
	$content_lenght = strlen($content);
	$updatedImage = $image;
	if( empty($image)) {
		$updatedImage = $_POST['currentImage'];
		$newImage = false;
	}
	$imageDirectory = "Upload/Image/" . basename($_FILES['post-image']['name']);
	$sql = "UPDATE cms_post SET post_date_time ='$dateTime', title = '$title', category = '$category', author ='$author', image = '$updatedImage', post = '$content' WHERE post_id = '$_POST[idFromUrl]' ";
	$exec = Query($sql);
	if($exec) {
		move_uploaded_file($_FILES['post-image']['tmp_name'], $imageDirectory);
		$_SESSION['successMessage'] = 'Post Edit Successfully';
		Redirect_To('Dashboard.php');
	}else {
		$_SESSION['errorMessage'] = 'Something Went Wrong Please Try Again Later';
		Redirect_To('Dashboard.php');
	}

}else if( isset($_GET['post_id'])) {
	if (!empty($_GET['post_id'])) {
		$sql = "SELECT * FROM cms_post WHERE post_id = '$_GET[post_id]'";
		$exec = Query($sql);
		if (mysqli_num_rows($exec) > 0 ) {
			if ($post = mysqli_fetch_assoc($exec)) {
				$post_id = $post['post_id'];
				$post_date = $post['post_date_time'];
				$post_title = $post['title'];
				$post_category = $post['category'];
				$post_author = $post['author'];
				$post_image = $post['image'];
				$post_content = $post['post'];
			}
		} 
	}
}else {
	Redirect_To('dashboard.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Post</title>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/adminDashboard.css">
	<link rel="stylesheet" href="../css/login.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/dd822cdcdc.js" crossorigin="anonymous"></script>
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
					<li class=""><a href="NewPost.php">
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
				<div class="page-title"><h1>Update Post</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<form action="editpost.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<labal for="post-title">Title</labal>
								<input type="text" name="post-title" class="form-control" id="post-title" value="<?php echo $post_title ?>">
							</div>
							<div class="form-group">
								<label>Existing Category : <?php echo htmlentities($post_category); ?></label><br>
								<labal for="post-category">Change Category</labal>
								<select class="form-control" name="post-category" id="post-category" value="<?php echo $post_category ?>">
									<?php
										$sql = "SELECT cat_name FROM cms_category";
										$exec = Query($sql);
										$selected = "";
										while($row = mysqli_fetch_assoc($exec)){ 
											// if ( $row['cat_name'] == $post_category ) {
											// 	$select = 'selected';
											// }
											if($post_category === $row['cat_name']) {
												?>
												<option selected="selected" ><?php echo htmlentities($row['cat_name']) ?></option>
												<?php
											}else {
												?>
												<option><?php echo htmlentities($row['cat_name']) ?></option>
												<?php
											}
										}
									?>
								</select>
							</div>
							<label>Existing Image: <img src="Upload/Image/<?php echo $post_image;  ?>" width='250' height='90'> </label>
							<div class="form-group">
								<labal for="post-image">Change Image</labal>
								<input type="File" name="post-image" class="form-control">
							</div>
							<div class="form-group">
								<labal for="post-content">Existing Content</labal>
								<textarea rows="20" class="form-control" name="post-content" id="post-content"><?php echo htmlentities($post_content);  mysqli_close($con); ?></textarea>
							</div>
							<input type="hidden" name="idFromUrl" value="<?php echo $_GET['post_id']; ?>">
							<input type="hidden" name="currentImage" value="<?php echo $post_image; ?>">
							<div class="form-group">
								<button name="post-update" class="btn btn-primary form-control">UPDATE</button>
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