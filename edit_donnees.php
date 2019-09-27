<?php
try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$id = $_GET["id"];

$sql = "SELECT * FROM user WHERE id = '".$id."'";

$stmt = $link->prepare($sql);
$stmt->execute();


foreach ($stmt as $user) {


echo '<form method="post">
            <p>Formulaire :</p>
            Nom:<input type="text" name="nom" value = "'.$user['nom'].'"/>
            Prenom:<input type="text" name="prenom" value = "'.$user['prenom'].'"/>
            Email:<input type="text" name="email" value = "'.$user['email'].'"/>
            <input type="submit" name="send" value="envoyer"/>
        </form>';

}


if (isset($_POST['send']) && $_POST['send'] == "envoyer"){
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



?>