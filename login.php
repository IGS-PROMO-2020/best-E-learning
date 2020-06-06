
<?php
session_start();
require('dbconnect.php');

if (isset($_POST['submit'])){
  $nom = stripslashes($_POST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);

  $motpasse = stripslashes($_POST['motpasse']);
  $motpasse = mysqli_real_escape_string($conn, $motpasse);
  $query = "SELECT * FROM `users` WHERE nom='$nom' and motpasse='$motpasse'";
  $result = mysqli_query($conn,$query) or die('ERREUR SQL !'.$query.'<br>' .mysli_error($conn));
  $user = mysqli_fetch_array($result);
 	$recup= mysqli_num_rows($result);


	var_dump($recup);
  if ($recup == 1) {


        $_SESSION['id_user'] = $user['id_user'];
				var_dump($user);

	 $_SESSION['nom'] = $nom;
	 // $_SESSION['image'] = $user['image'];
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    echo '<script type="text/javascript">';
    echo 'window.location.href="index.php"';
		echo '</script>';


  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
 ?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>

			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="nom" class="form-control" placeholder="votre nom" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="motpasse" class="form-control" placeholder="votre mot de passe" required>
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
				<?php if (! empty($message)) { ?>
				     <p class="errorMessage"><?php echo $message; ?></p>
				<?php } ?>

			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="register.php">Sign Up</a>
				</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>
