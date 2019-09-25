<?php

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
	<link rel="stylesheet" href="Supp.css" />
</head>
<body>
<h1>Utilisateurs</h1>
<div> Cliquer sur un utilisateur pour le supprimer </div>

<?php foreach ($stmt as $user) {
 echo "<a href = 'Liste.php'>" .$user['nom']." </a><br>";
}
?>



</body>
</html>

