<?php
try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}


// on recupere l'id correspondant que l'on stocke dans une variable $id puis on selectionne toute la ligne dans la base de donnée qui contient ce $id


$id = $_GET["id"];

$sql = "SELECT * FROM user WHERE id = '".$id."'";

$stmt = $link->prepare($sql);
$stmt->execute();


// Formulaire identique au formulaire d'insertion sauf que l'on affecte l'attribut value a chaque ligne qui prend comme valeur les noms, prenoms et mails que l'utilisateur veut modifié

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

            <div class = "form-group id2">
            <button type="submit" name="send" class="btn btn-primary"> Envoyer </button>
            </div>
        </form>
</div>
</div>

        ';

}

// requetes identiques à l'insertion à l'exception de la dernière requête update qui permet de modifier le nom, prenom, et mail d'une ligne dans la bdd

if (isset($_POST['send'])) {
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    //on test si le mail a été utilisé 

    $testmail = $link->prepare("SELECT * FROM user WHERE email = ? AND id != '".$id."'"); // on selectionne toutes les lignes sauf celle contenant l'id
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


?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="edit_donnees.css">

</head>
<body>
</body>
</html>