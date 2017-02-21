
<?php
		include 'includes/header.php' ;

		if($session->is_signed_in()){
			redirect('index.php');
		}

		if(isset($_POST['submit'])){
				$username  = trim($_POST['username']);
				$password  = trim($_POST['password']);

				//Method to check DB user

				$user_found = User::verify_user($username,$password);



				if($user_found){

					$session->login($user_found);
					redirect("index.php");
				} else {
					$the_message = "You username or password are incorrect";
				}


		}else{

			$the_message = "";
			$username = "";
			$password = "";
		}



?>

<div class="col-md-4 col-md-offset-3">
<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	<form action="" method="post">
		<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" >
		</div>
		<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
		</div>

		<div class="form-group">
		<input type="submit" value="submit" class="btn btn-primary" name="submit">
		</div>
	</form>

</div>