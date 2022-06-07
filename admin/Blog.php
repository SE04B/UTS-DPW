<?php
include('../admin/Include/Sessions.php');
include('../admin/Include/functions.php');
if ( isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username) || empty($password)) {
		$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out';
	}else {
		$foundAccount = LoginAttempt($username, $password);
		if ($foundAccount) {
			$_SESSION['successMessage'] = 'Login Successfully Welcome ' . $foundAccount['username'];
			$_SESSION['user_id'] = $foundAccount['id'];
			$_SESSION['username'] = $foundAccount['username'];
			Redirect_To('admin/Dashboard.php');
		}else {
			$_SESSION['errorMessage'] = 'Username/Password Is Invalid';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Pondok Pesantren Nurul Jadid Al - Mas'udiyah</title>
        <!-- MDB icon -->
        <link rel="icon" href="../img/icon/favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/dd822cdcdc.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet1" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/mdb.min.css" />
        <link rel="stylesheet" href="../css/blogCard.css">
    </head>

    <body>
    <header style="margin: 2cm;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/LogoPonpes_remove.png" height="30" alt="Pondok Pesantren Nurul Jadid Al - Mas'udiyah" loading="lazy" />
                </a>
                <!-- Responsive Header -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                <!-- Responsive Header -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="../index.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        Dashboard
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ppdb.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        PPDB
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blog.php">
                                <button type="button" class="btn btn-success btn-rounded">
                                        Berita
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php">
                                <button type="button" class="btn btn-link px-3 me-2">
                                        Tentang Kami
                                    </button>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="modal" data-bs-target="#modalForm">
                            <a>
                                <button type="button" class="btn btn-primary btn-rounded">
                                        Login
                                    </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Modal -->
    <form action="../index.php" method="post">
            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                </div>
                                <div class="modal-footer d-block">
                                    <button type="submit" id="submit" name="submit" class="btn btn-warning float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->

        <!-- Qoute -->
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Acara Pondok Pesantren</h1>
                <h1 class="text-center" style="color: #00b74a;">Nurul Jadid Al - Mas'udiyah</h1>
                <p class="text-center fst-italic"><cite>"Pribadi saleh, mandiri, berilmu, berjuang dan berbakti kepada agama, masyarakat dan bangsa"</cite></p>
            </div>
        </div>
        <!-- Qoute -->
        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true">
                    <!---->
                    <!---->
                    </div>
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section class="mb-10 text-center">
                            <h2 class="fw-bold mb-7 text-center">Berita Terbaru</h2>
                            <!-- Search -->
                            <section class="container m-5 ">
                                <div class="input-group justify-content">
                                    <div class="">
                                      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    </div>
                                    <button type="button" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                            </section>
                            <!-- Search -->

                            <!-- Main Content -->
                            <?php
					$page = 1;
					$query = "";
					if ( isset($_GET['search'])) {
						if ( empty($_GET['search'])) {
							Redirect_To('blog.php');
						}else {
							$search = $_GET['search'];
							$query = "SELECT * FROM cms_post WHERE post_date_time LIKE '%$search%' OR title LIKE '%$search%' OR category LIKE '$search%' ";
						}
					}else if ( isset($_GET['category'])) {
						$query = "SELECT * FROM cms_post WHERE category = '$_GET[category]'";
					}else if ( isset($_GET['page'])){
						$page = $_GET['page'];
						$showPost = ($page * 5) - 5;
						if ($page <= 0) {
							$showPost = 0;
						}
						$query = "SELECT * FROM cms_post ORDER BY post_date_time DESC LIMIT $showPost,5	";

					}else{

						$query = "SELECT * FROM cms_post ORDER BY post_date_time DESC LIMIT 0,5	";						
					}

					$exec = Query($query) or die(mysqli_error($con));
					if( $exec ) {
						if (mysqli_num_rows($exec) > 0) {
							while ( $post = mysqli_fetch_assoc($exec) ) {
								$post_id = $post['post_id'];
								$post_date = $post['post_date_time'];
								$post_title = $post['title'];
								$post_category = $post['category'];
								$post_author = $post['author'];
								$post_image = $post['image'];
								$post_content = substr($post['post'], 0,150) . '...'; 
							?>
                            
                            <div class="blog-card post">
                                <div class="meta">
                                    <div class="photo" style="background-image: url(Upload/Image/<?php echo $post_image; ?>);"></div>
                                        <ul class="details">
                                            <li class="author"><a href="#"><?php echo htmlentities($post_author)?></a></li>
                                            <li class="date"><?php echo htmlentities($post_date)?></li>
                                            <li class="tags">
                                        <ul>
                                            <li><a href="#"><?php echo htmlentities($post_category)?> </a></li>
                                        </ul>
                                         
                                        </ul>
                                    </div>
                                <div class="description">
                                    <h1><?php echo htmlentities($post_title); ?></h1>
                                    <h2></h2>
                                    <p><?php echo htmlentities($post_content); ?></p>
                                    <p class="read-more">
                                        <a href="Post.php?id=<?php echo $post_id;?>">Read More</a>
                                    </p>
                                </div>
                            </div>

                            <?php
							}

						}else {
							echo "<span class='lead'>No result<span>";
						}
					}else {

					}
				?>
                            <!-- Main Content -->
                        </section>
                    </section>
                    <!---->
                </div>
            </div>
        </div>

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="../index.php " class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="ppdb.php " class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="blog.php " class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="aboutus.php " class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>
    </body>
</html>
