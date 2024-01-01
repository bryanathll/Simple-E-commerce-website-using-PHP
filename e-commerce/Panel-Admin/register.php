<?php
require "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="./style-login.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">	
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<form action="" method="post">	
									<div class="card-front">
										<div class="center-wrap">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Sign Up</h4>
												<div class="form-group mt-2">
													<input type="email" name="email" class="form-style"
														placeholder="Your Email" id="email" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2 text-end">
													<input type="password" name="password" class="form-style mb-3"
														placeholder="Your Password" id="password" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
													<a class="link pt-3" href="login.php">Login</a>
												</div>
												<input type="submit" name="submit" value="submit" class="btn mt-4" >
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
							$encryptedPass = password_hash($password, PASSWORD_DEFAULT);
							

							$query = mysqli_query($config, "SELECT email FROM  register_login WHERE email = '$email'");
							$count = mysqli_num_rows($query);

							if($count >0){
								echo "cannot register. this email already used";
							}
							elseif("$email" ==null){
								echo "Masukkan email";

							}
							elseif($password == null){
								echo "Masukkan password";
							}
							else{
								$queryinsert = mysqli_query($config, "INSERT INTO register_login(email, password) 
								VALUES('$email','$encryptedPass')");
								if($queryinsert){
									echo "Register sucess";
								}
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