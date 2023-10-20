<?php 
	$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);	
	if(!empty($user)) {
	$_SESSION['username'] = $user[0]['username'];
	$_SESSION['userid'] = $user[0]['userid'];
	$chat->updateUserOnline($user[0]['userid'], 1);
	$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
	$_SESSION['login_details_id'] = $lastInsertId;
	header("Location:index.php");
	} else {
	$loginError = "Invalid username or password!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<br><br>
<div class="container">				
	<div class="row">
		<div class="col-sm-4 mx-auto shadow" style="background:white;">
		<h1 style="text-align:center; "><b><i><u> Login Page </u></i></b></h1>		
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="username" style="font-size:18px; "> User Name: </label>
					<input type="text" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd" style="font-size:18px; ">Password: </label>
					<input type="password" class="form-control" name="pwd" required>
				</div>  
				<button type="submit" name="login" style="margin-left:42%;" class="btn btn-info">Login</button>
			</form>
			<p >You have no account </p>
			<p >First you signup </p>
			<a href="signup.php" class="btn btn-primary">SignUp</a>
			<br><br>
		</div>
	</div>
</div>	
</body>
</html>
