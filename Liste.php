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
	<link rel="stylesheet" href="Liste.css" />
</head>
<body>
<h1>liste des user</h1>

<?php 



foreach ($stmt as $user) { ?>

	<table>

	<tr>

<td> <?php echo $user['nom']; ?> </td>
<td> <?php echo $user['prenom']; ?> </td>
<td> <?php echo $user['email']; ?> </td>

<td> <?php echo $user['id']; ?> </td>



<td> <?php echo " <a href=\"supp_donnees.php?id=".$user['id']."\">Supprimmer</a>\n";?>


</tr>

<?php }?>

</table>


<br/>

<a href="insert_donnees.php"> Ajouter un utilisateur</a><br/>


</body>
</html>