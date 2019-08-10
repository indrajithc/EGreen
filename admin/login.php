<?php
include_once('../includes/connection.php');
$db    = new Database();
$message = '';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmnt    = 'select * from admin where username=:username and password = :password';
	$params   = array(
		':username' => $username,
		':password' => $password

	);

	if ($db->display($stmnt, $params)) {
		session_start();
		$_SESSION['userid']   = 'admin';
		$_SESSION['type']     = 'admin';
		$_SESSION['username'] = $username;
		header('Location:index.php');
		exit();

	} else {
		$message = ' Invalid username or password ';
	}

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>


	<center>
		<div style="width: 400px; background: #B6B6B6; padding: 20px; text-align: center; margin-top:20%; ">



			<?php if( $message ) echo '<p style="color: #FF0000;">' . $message . '</p> ' ; ?>

				<form method="post" action="" >
					<label> username</label> <input type="email" name="username" placeholder="enter your email address" required>
					<br/>
					<br/>
					<label> password</label> <input type="password" name="password" placeholder="enter your password" required minlength="6">
					<br/>
					<br/>

					<input type="submit" name="login" value="login">

				</form>
			</div>
		</center>

	</body>
	</html>