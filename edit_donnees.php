<?php
try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}


if (isset($_POST['send'])) {
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    //on test si le mail a été utilisé

    $testmail = $link->prepare('SELECT * FROM user WHERE email = ?');
    $testmail->execute(array($email));
    $mailexist=$testmail->rowcount();

    if($mailexist==0) {
	

	$SQL = $link->prepare("UPDATE user SET nom = ?, prenom = ?, email = ? WHERE id = '".$id."'");
	$SQL->execute(array($nom,$prenom,$email));
	header('Location: Liste.php');

} else { 
    echo "ce mail est utilisé, veuillez rentrer un autre mail";

}
	

    }


}






$id = $_GET["id"];

$sql = "SELECT * FROM user WHERE id = '".$id."'";

$stmt = $link->prepare($sql);
$stmt->execute();


foreach ($stmt as $user) {


echo '<div class = " i1 " >
            
                <div class="col-md-12 ">

                    <h1> Modifier vos données </h1>



	<form method="post" class="form-horizontal">
         
         <div class = "form-group">
			<label for = "mNom"> </label>
            <input type="text" id = "mNom" class = "form-control" placeholder = "Entrer votre nom" name="nom" value = "'.$user['nom'].'"/>
            </div>

            <div class = "form-group">
            <label for = "mPrenom"> </label>
            <input type="text" id = "mPrenom" class = "form-control" placeholder = "Entrer votre prénom" name="prenom" value = "'.$user['prenom'].'"/>
            </div>

            <div class = "form-group">
            <label for = "mEmail"> </label>
            <input type="text" id="mEmail" class ="form-control" placeholder = "Entrer votre adresse mail" name="email" value = "'.$user['email'].'"/>
            </div>

            <div class = "form-group">
            <button type="submit" name="send" class="btn btn-primary"> Envoyer </button>
            </div>
        </form>
</div>
</div>

        ';

}






?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="edit_donnees.css">

</head>
<body>
</body>
</html>