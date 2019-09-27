<?php

try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$id = $_GET["id"];


$sql ="DELETE FROM user WHERE id = '".$id."'";

                $sth = $link->prepare($sql);
                $sth->execute();


$sqli = "SELECT * FROM user";
$stmm = $link->prepare($sqli);
$stmm->execute();

?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<h1>liste des user</h1>

<?php 



foreach ($stmm as $user) { ?>

	<table>

	<tr>

<td> <?php echo $user['nom']; ?> </td>
<td> <?php echo $user['prenom']; ?> </td>
<td> <?php echo $user['email']; ?> </td>

<td> <?php echo $user['id']; ?> </td>



<td> <?php echo " <a href=\"supp_donnees.php?id=".$user['id']."\">Supprimmer</a>\n";
		echo " <a href=\"edit_donnees.php?id=".$user['id']."\">modifier informations</a>\n";?>
</td>

</tr>

<?php }?>

</table>


<br/>

<a href="insert_donnees.php"> Ajouter un utilisateur</a><br/>


</body>
</html>


