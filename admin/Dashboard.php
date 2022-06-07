<?php require_once('Include/Sessions.php') ?>
<?php require_once('Include/functions.php') ?>
<?php ConfirmLogin(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
	<div class="main" id="dashboard">
		<div class="row">
			<div class="col-sm-2">
				<ul id="side-menu" class="nav nav-pills nav-stacked">
					<li class="active"><a href="Dashboard.php">
					<i class="fa-solid fa-house-user"></i>
					 &nbsp;Dashboard</a></li>
					<li><a href="NewPost.php">
					<i class="fa-solid fa-newspaper"></i>
					&nbsp;New Post</a></li>
					<li><a href="Categories.php">
					<i class="fa-solid fa-book-atlas"></i>
					&nbsp;Categories</a></li>
					<li><a href="Admin.php">
					<i class="fa-solid fa-lock"></i>
					&nbsp;Manage Admin</a></li>
					<li><a href="Comments.php">
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
				<div>
					<h1>Dashboard</h1>
					<?php echo SuccessMessage(); ?>
					<?php echo Message(); ?>
					<div class="table-responsive">
						
							<?php
							$sql = "SELECT * FROM cms_post ORDER BY post_date_time";
							$exec = Query($sql);
							$postNo = 1;
							if(mysqli_num_rows($exec) < 1	) {
								?>
									<p class="lead">You Have 0 Post For The Moment</p>
									<a href="NewPost.php"><button class="btn btn-info">Add Post</button></a>
								<?php
							}else{ ?>
							<table class="table table-hover">
							<tr>
								<th>Post No.</th>
								<th>Post Date</th>
								<th>Date Title</th>
								<th>Author</th>
								<th>Category</th>
								<th>Feature Image</th>
								<th>Comments</th>
								<th>Action</th>
								<th>Details</th>
							</tr>
							<?php
								while ($post = mysqli_fetch_assoc($exec)) {
									$post_id = $post['post_id'];
									$post_date = $post['post_date_time'];
									$post_title = $post['title'];
									$category = $post['category'];
									$author = "Admin";
									$image = $post['image'];
									?>
									<tr>
									<td><?php echo $postNo; ?></td>
									<td><?php echo $post_date; ?></td>
									<td><?php 
									if(strlen($post_title) > 20 ) {
										echo substr($post_title,0,20) . '...';
									}else {
										echo $post_title;
									}
					
									?></td>
									<td><?php echo $author; ?></td>
									<td><?php echo $category; ?></td>
									<td><?php echo "<img class='img-responsive' src='../pages/Upload/Image/$image' width='100px' height='150px'>"; ?></td>
									<td><?php echo 'Ongoing'; ?></td>
									<td><?php echo "<a href='editpost.php?post_id=$post_id'>Edit</a> | <a href='deletepost.php?delete_post_id=$post_id'>Delete</a>"; ?></td>
									<td><a href="Post.php?id=<?php echo $post_id; ?>"><button class="btn btn-primary">Live Preview</button></a></td>
									</tr>
									<?php
									$postNo++;
								}
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row navbar-inverse" id="footer">
	</div>
</div>

<script type="text/javascript" src="jquery.js"></script>
</body>
</html>