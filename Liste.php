<?php 

session_start();


try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

?>
<html>
<head>
	<link rel="stylesheet" href="Liste.css" />
</head>
<body>
<h1>liste des user</h1>

<?php foreach ($stmt as $user) {
 echo $user['nom']."<br>";
}
?>

<br/>

<a href="insert_donnees.php"> Ajouter un utilisateur</a>
<a href="supp_donnees.php"> Supprimer un utilisateur</a>
<a href="insert_donnees.php"> Editer un utilisateur</a>


</body>
</html>