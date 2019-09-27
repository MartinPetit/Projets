<?php 



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

    //on test si le mail a été utilisé

    $testmail = $link->prepare('SELECT * FROM user WHERE email = ?');
    $testmail->execute(array($email));
    $mailexist=$testmail->rowcount();

    if($mailexist==0) {
	

	$SQL = $link->prepare('INSERT INTO user(nom,prenom,email) VALUES(?,?,?)');
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
    
<link rel="stylesheet" href="bootstrap.min.css">
</head>
    <body>
        <form method="post">
            <p>Formulaire :</p>
            Nom:<input type="text" name="nom" />
            Prenom:<input type="text" name="prenom" />
            Email:<input type="text" name="email" />
            <input type="submit" name="send" value="envoyer"/>
        </form>


    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.css"></script>

    </body>
</html>