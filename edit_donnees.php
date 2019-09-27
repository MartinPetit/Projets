<?php
try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$id = $_GET["id"];
echo $id;

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



?>