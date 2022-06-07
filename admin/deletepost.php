<?php require_once('Include/Sessions.php'); ?>
<?php require_once('Include/functions.php') ?>
<?php ConfirmLogin(); ?>
<?php
if ( isset( $_POST['post-delete'])) {
	$sql = "DELETE  FROM cms_post WHERE post_id = '$_POST[deleteID]' ";
	$exec = Query($sql);
	if ($exec) {
		$_SESSION['successMessage'] = "Post Deleted Successfully";
		Redirect_To('Dashboard.php');
	}else {
		$_SESSION['errorMessage'] = "Something Went Wrong, Post Is Not Deleted. Please Try Again Later";
		Redirect_To('Dashboard.php');
	}

}else if( isset($_GET['delete_post_id'])) {
	if (!empty($_GET['delete_post_id'])) {
		$sql = "SELECT * FROM cms_post WHERE post_id = '$_GET[delete_post_id]'";
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
	<title>Delete Post</title>
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
					<li><a href="Dashboard.php">
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
				<div class="page-title"><h1>Delete Post</h1></div>
					<?php echo Message(); ?>
					<?php echo SuccessMessage(); ?>
					<form action="deletepost.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<button name="post-delete" class="btn btn-danger form-control">DELETE</button>
							</div>
							<div class="form-group">
								<labal for="post-title">Title</labal>
								<input disabled type="text" name="post-title" class="form-control" id="post-title" value="<?php echo $post_title ?>">
							</div>
							<div class="form-group">
								<label>Existing Category : <?php echo htmlentities($post_category); ?></label><br>
								<labal for="post-category">Change Category</labal>
								<select disabled class="form-control" name="post-category" id="post-category" value="<?php echo $post_category ?>">
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
								<input disabled type="File" name="post-image" class="form-control">
							</div>
							<div class="form-group">
								<labal for="post-content">Existing Content</labal>
								<textarea disabled rows="20" class="form-control" name="post-content" id="post-content"><?php echo htmlentities($post_content);  mysqli_close($con); ?></textarea>
							</div>
							<input type="hidden" name="deleteID" value="<?php echo $_GET['delete_post_id']; ?>">
							<input type="hidden" name="currentImage" value="<?php echo $post_image; ?>">
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