<?php
include('Include/Sessions.php');
include('Include/functions.php');
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
			Redirect_To('Dashboard.php');
		}else {
			$_SESSION['errorMessage'] = 'Username/Password Is Invalid';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>How To Create Login Example</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <!-- Click on Modal Button -->
        <button type="button" class="btn btn-primary mx-auto d-block mt-5" data-bs-toggle="modal" data-bs-target="#modalForm">
            Bootstrap Modal popup
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" />
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="modal-footer d-block">
                                <p class="float-start">Not yet account <a href="#">Sign Up</a></p>
                                <button type="submit" class="btn btn-warning float-end">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<!-- Modal -->
        <!-- Bootstrap JS -->
        <script src="../js/bootstrap.bundle.js"></script>
    </body>
</html>