<?php
include('admin/Include/Sessions.php');
include('admin/Include/functions.php');
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
        <link rel="icon" href="img/icon/favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/mdb.min.css" />
    </head>

    <body>
        <header style="margin: 2cm;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/LogoPonpes_remove.png" height="30" alt="Pondok Pesantren Nurul Jadid Al - Mas'udiyah" loading="lazy" />
                    </a>
                    <!-- Responsive Header -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <!-- Responsive Header -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="index.php">
                                    <button type="button" class="btn btn-success btn-rounded">
                                        Dashboard
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ppdb.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        PPDB
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/blog.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Berita
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/aboutus.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Tentang Kami
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a>
                                    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalForm">
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
        <form action="index.php" method="post">
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
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Email" />
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

        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true" class="" draggable="false">
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section class="mb-10">
                            <!-- Background image -->
                            <div
                                class="p-5 text-center shadow-5-strong rounded"
                                style="background-image: url('img/pesantren-nurul-jadid\ 2.svg'); height: 500px; background-size: cover; background-position: 50% 50%; background-color: rgba(0, 0, 0, 0);"
                                aria-controls="#picker-editor"
                            ></div>
                            <!-- Background image -->
                            <!-- Card Qoute -->
                            <div class="card mx-4 mx-md-5 text-center shadow-5-strong" style="margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px);">
                                <div class="card-body px-4 py-5 px-md-5">
                                    <h1 class="display-3 fw-bold ls-tight mb-4">
                                        <span>Pondok Pesantren</span> <br />
                                        <span class="text-success">Nurul Jadid Al - Mas'udiyah</span>
                                        <p><cite style="font-style: italic; font-size: 20px;">"Pribadi saleh, mandiri, berilmu, berjuang dan berbakti kepada agama, masyarakat dan bangsa"</cite></p>
                                    </h1>
                                    <a class="btn btn-success btn-lg py-3 px-5 mb-2 me-2" href="pages/ppdb.php" role="button" aria-controls="#picker-editor" draggable="false">Info PPDB</a>
                                    <!-- <a class="btn btn-link btn-lg py-3 px-5 text-danger mb-2 me-2" data-ripple-color="danger" href="#berita1" role="button" aria-controls="#picker-editor" draggable="false">Baca selengkapnya</a> -->
                                </div>
                                <!-- Card Qoute -->
                            </div>
                        </section>
                    </section>
                    <!---->
                </div>

                <!-- Main Content -->
                <div style="position: relative;" data-draggable="true" class="" draggable="false">
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section id="berita1" class="mb-10">
                            <h2 class="fw-bold mb-5 text-center">Berita Acara Terbaru <br /></h2>
                            <div class="row gx-lg-5 mb-5 align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0 hover-zoom">
                                    
                                    <img src="img/event/event_Akhirussanah_1.jpeg" class="w-75 shadow-5-strong rounded-4 mb-4" alt="" aria-controls="#picker-editor" draggable="false" />
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h3 class="fw-bold">Peserta Juara Lomba Membaca Al-Qur'an</h3>
                                    <div class="mb-2 text-danger small"><i class="fas fa-book-open me-2" aria-controls="#picker-editor"></i><span>Lomba</span></div>
                                    <p class="text-muted">Ut pretium ultricies dignissim. Sed sit amet mi eget urna placerat vulputate. Ut vulputate est non quam dignissim elementum. Donec a ullamcorper diam.</p>
                                    <p class="text-muted">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quae nulla saepe rerum aspernatur odio amet perferendis tempora mollitia? Ratione unde magni omnis quaerat blanditiis cumque dolore placeat
                                        rem dignissimos?
                                    </p>
                                    <a class="btn btn-primary" href="blog/2022_02_02.php" role="button" aria-controls="#picker-editor" draggable="false">Read more</a>
                                </div>
                            </div>
                            <div class="row gx-lg-5 mb-5 flex-lg-row-reverse align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0 hover-zoom">
                                    <img src="img/event/event_Akhirussanah_2.jpeg" class="w-100 shadow-5-strong rounded-4 mb-4" alt="" aria-controls="#picker-editor" draggable="false" />
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h3 class="fw-bold">Pembagian Hadiah Pemenang Lomba</h3>
                                    <div class="mb-2 text-primary small"><i class="fas fa-book-reader me-2" aria-controls="#picker-editor"></i><span>Lomba</span></div>
                                    <p class="text-muted">
                                        Duis sagittis, turpis in ullamcorper venenatis, ligula nibh porta dui, sit amet rutrum enim massa in ante. Curabitur in justo at lorem laoreet ultricies. Nunc ligula felis, sagittis eget nisi vitae,
                                        sodales vestibulum purus. Vestibulum nibh ipsum, rhoncus vel sagittis nec, placerat vel justo. Duis faucibus sapien eget tortor finibus, a eleifend lectus dictum. Cras tempor convallis magna id
                                        rhoncus. Suspendisse potenti. Nam mattis faucibus imperdiet. Proin tempor lorem at neque tempus aliquet. Phasellus at ex volutpat, varius arcu id, aliquam lectus. Vestibulum mattis felis quis ex
                                        pharetra luctus. Etiam luctus sagittis massa, sed iaculis est vehicula ut.
                                    </p>
                                    <a class="btn btn-primary disabled" href="#" role="button" aria-controls="#picker-editor" draggable="false">Read more</a>
                                </div>
                            </div>
                            <div class="row gx-lg-5 mb-5 align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0 hover-zoom">
                                    <img src="img/event/event_Akhirussanah_3.jpeg" class="w-100 shadow-5-strong rounded-4 mb-4" alt="" aria-controls="#picker-editor" draggable="false" />
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h3 class="fw-bold">Pembagian Sembako</h3>
                                    <div class="mb-2 text-warning small"><i class="fas fa-box-open me-2" aria-controls="#picker-editor"></i><span>Akhirussanah</span></div>
                                    <p class="text-muted">
                                        Sed sollicitudin purus sed nulla dignissim ullamcorper. Aenean tincidunt vulputate libero, nec imperdiet sapien pulvinar id. Nullam scelerisque odio vel lacus faucibus, tincidunt feugiat augue ornare.
                                        Proin ac dui vel lectus eleifend vestibulum et lobortis risus. Nullam in commodo sapien. Curabitur ut erat congue sem finibus eleifend egestas eu metus. Sed ut dolor id magna rutrum ultrices ut eget
                                        libero. Duis vel porttitor odio. Ut pulvinar sed turpis ornare tincidunt. Donec luctus, mi euismod dignissim malesuada, lacus lorem commodo leo, tristique blandit ante mi id metus. Integer et vehicula
                                        leo, vitae interdum lectus. Praesent nulla purus, commodo at euismod nec, blandit ultrices erat. Aliquam eros ipsum, interdum et mattis vitae, faucibus vitae justo. Nulla condimentum hendrerit leo, in
                                        feugiat ipsum condimentum ac. Maecenas sed blandit dolor.
                                    </p>
                                    <a class="btn btn-primary disabled" href="#" role="button" aria-controls="#picker-editor" draggable="false">Read more</a>
                                </div>
                            </div>
                        </section>
                    </section>
                    <!---->
                </div>
            </div>
        </div>
        <!-- Main Content -->

        <!-- Sambutan -->
        <section class="pt-5 pb-5">
            <div class="container my-5">
                <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                        <h1 class="display-4 fw-bold lh-1">Sambutan Ketua Yayasan</h1>
                        <p class="lead">
                            Segala puji marilah kita panjatkan kehadirat Allah SWT bahwa atas berkah-Nya kita senantiasa mendapat limpahan rahmat dan keridoan-Nya sehingga Pondok Pesantren Nurul Jadid Al - Mas'udiyah terus berkembang maju
                            dan memberi kontribusi bagi masyarakat dan dunia pendidikan. Sholawat teriring salam semoga tercurahkan kepada junjungan Nabi Muhammad SAW, beserta keluarga, pada sahabat dan pengikutnya hingga akhir zaman.
                            Aamiin Ya Robbal Aalamiin.
                        </p>
                        <figcaption class="blockquote-footer">
                            TRIYONO, S.E.
                        </figcaption>
                    </div>
                    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                        <img class="img-thumbnail" src="https://dummyimage.com/200x200/000/fff" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Sambutan -->

        <!-- Statistic -->
        <div class="container my-2">
        <div class="row">
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-pencil-alt text-info fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>278</h3>
                <p class="mb-0">Posts</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="far fa-comment-alt text-warning fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>156</h3>
                <p class="mb-0">Comments</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-success">156</h3>
                <p class="mb-0">Murid</p>
              </div>
              <div class="align-self-center">
                <i class="far fa-user text-success fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-map-marker-alt text-danger fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>423</h3>
                <p class="mb-0">Total Website Visits</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
        </div>
        
        <!-- Statistic -->
        <!-- Map -->
        <div id="preview" class="preview">
            <div style="display: none;"></div>
            <div>
                <div style="position: relative;" data-draggable="true">
                    <!---->
                    <!---->
                    <section draggable="false" class="container pt-5" data-v-271253ee="">
                        <section class="mb-10">
                            <style>
                                /* Map settings */

                                .map-container-2 {
                                    height: 500px;
                                }

                                .map-container-2 iframe {
                                    left: 0;
                                    top: 0;
                                    height: 100%;
                                    width: 100%;
                                }

                                .rounded-t-5 {
                                    border-top-left-radius: 0.5rem;
                                    border-top-right-radius: 0.5rem;
                                }

                                @media (min-width: 992px) {
                                    .rounded-tr-lg-0 {
                                        border-top-right-radius: 0;
                                    }
                                    .rounded-bl-lg-5 {
                                        border-bottom-left-radius: 0.5rem;
                                    }
                                }
                            </style>
                            <div class="card mb-3">
                                <div class="row g-0 d-flex align-items-center">
                                    <div class="col-lg-4 d-none d-lg-flex">
                                        <div class="map-container-2 w-100 mb-4 mb-lg-0">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.9539162717847!2d109.26038598160889!3d-7.455918280292359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaa5f74cfb8b9e069!2zN8KwMjcnMTkuNiJTIDEwOcKwMTUnMjguNyJF!5e0!3m2!1sen!2sid!4v1652519686949!5m2!1sen!2sid"
                                                width="600"
                                                height="450"
                                                style="border: 0;"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"
                                            ></iframe>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body py-5 px-md-5">
                                            <div class="row gx-lg-5">
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-headset fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Kontak Kami</p>
                                                            <p class="text-muted mb-0">pondoknuruljadidgmail.com</p>
                                                            <p class="text-muted mb-0">+62 858-6864-6334 (Edi)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-dollar-sign fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Website</p>
                                                            <p class="text-muted mb-0">pondoknuruljadid.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <div class="p-3 bg-primary rounded-4 shadow-2-strong"><i class="fas fa-bug fa-lg text-white fa-fw" aria-controls="#picker-editor"></i></div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-4">
                                                            <p class="fw-bold mb-1">Bug report</p>
                                                            <p class="text-muted mb-0">muhammadirfani@pm.me</p>
                                                            <p class="text-muted mb-0">+62 822-2009-1122</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                    <!---->
                </div>
            </div>
        </div>
        <!-- Map -->

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="pages/ppdb.php" class="nav-link px-2 text-muted">PPDB</a></li>
                <li class="nav-item"><a href="pages/blog.php" class="nav-link px-2 text-muted">Berita</a></li>
                <li class="nav-item"><a href="pages/aboutus.php" class="nav-link px-2 text-muted">Tentang Kami</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Pondok Pesantren Nurul Jadid Al - Mas'udiyah</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
