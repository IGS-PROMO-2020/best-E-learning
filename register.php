<?php

require('dbconnect.php');

if (isset($_REQUEST['submit'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$nom = stripslashes($_REQUEST['nom']);
	$nom= mysqli_real_escape_string($conn, $nom);

  $prenom = stripslashes($_REQUEST['prenom']);
	$prenom= mysqli_real_escape_string($conn, $prenom);

  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);

    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$motpasse = stripslashes($_REQUEST['motpasse']);
	$motpasse = mysqli_real_escape_string($conn, $motpasse);




	//requéte SQL + mot de passe crypté
    $query = "INSERT into users (nom,prenom,email,motpasse)
              VALUES ('$nom','$prenom', '$email','$motpasse')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){

       echo "<div class='sucess'>
            <center>  <h3>Inscription Reussie.</h3>
             <p>Vous recevrez une notification de confimation ulterieurement</p></center>
			 </div>";
    }
}else{
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>
<head><title>ADD</title>
<link href="style2.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="page-container">

            <form action="#" method="POST">
			<h1>Sign Up</h1>
                <input type="text" name="nom" class="Name" placeholder="votre Nom" required>
                <input type="text" name="prenom" class="Tele" placeholder="Votre Prenom" required>
				<input type="email" name="email" class="Email" placeholder="Votre Email" required>
				<input type="password" name="motpasse" class="Address" placeholder="Votre Mot de passe" required>
                <button type="submit" value="Add" name="submit">Inscription</button>
            </form>
        </div>

<?php } ?>
</body>
</html>
