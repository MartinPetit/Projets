<?php 

session_start();


try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

if (isset($_POST['send']) && $_POST['send'] == "envoyer"){
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$SQL = $link->prepare('INSERT INTO user(nom,prenom,email) VALUES(?,?,?)');
	$SQL->execute(array($nom,$prenom,$email));
	header('Location: Liste.php');
	}
}
?>
<html>
    <body>
        <form method="post">
            <p>Formulaire :</p>
            Nom:<input type="text" name="nom" />
            Prenom:<input type="text" name="prenom" />
            Email:<input type="text" name="email" />
            <input type="submit" name="send" value="envoyer"/>
        </form>
    </body>
</html>