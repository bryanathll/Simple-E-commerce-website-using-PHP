<?php
session_start();
require "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="style-login.css">

</head>

<body>
	<!-- partial:index.partial.html -->

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12  text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<form action="" method="post">
									<div class="card-front">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Log In</h4>
												<div class="form-group">
													<input type="email" name="email" class="form-style"
														placeholder="Your Email" id="email" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style"
														placeholder="Your Password" id="password" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
													<a class="link pt-3" href="register.php">register</a>
												</div>
												
												<input type="submit" name="submit" value="submit" class="btn mt-4">
												
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
								<?php
								if(isset($_POST['submit'])){
									$email = htmlspecialchars($_POST['email']);
									$password = htmlspecialchars($_POST['password']);

									$query = mysqli_query($config, "SELECT * FROM  register_login WHERE email = '$email'");
									$count = mysqli_num_rows($query);
						

									if($count > 0){
										$data= mysqli_fetch_array($query);
										
										if(password_verify($password, $data['password'])){
											$_SESSION['login'] = true;
											$_SESSION['email'] = $data['email'];
											header('location: index.php');
										}
										else{
											echo "Password salah";
										}
										

									}else{
										echo "Email atau Password salah";
									}

								}
								?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- partial -->

</body>

</html>