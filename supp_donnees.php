<?php

try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

// on recupere l'id correspondant que l'on stocke dans une variable $id

$id = $_GET["id"];

// On effectue la requete Sql permettant de supprimer la ligne correspondant à l'id récupéré

$sql ="DELETE FROM user WHERE id = '".$id."'";

                $sth = $link->prepare($sql);
                $sth->execute();

// Identique à Liste.php

$sqli = "SELECT * FROM user";
$stmm = $link->prepare($sqli);
$stmm->execute();

?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="Liste.css" />
</head>
<body>
	
	<div id="titre">
<h1>Liste des utilisateurs</h1>
</div>

<table class="table table-bordered ">
  <thead class="thead-light">
    <tr class="t1">
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Supprimmer</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>

<?php 



foreach ($stmm as $user) { ?>

  <tbody>
	<tr>
		<td> <?php echo $user['nom']; ?> </td>
		<td> <?php echo $user['prenom']; ?> </td>
		<td> <?php echo $user['email']; ?> </td>



<td> <?php echo " <a href=\"supp_donnees.php?id=".$user['id']."\" class='btn btn-default'>Supprimmer</a>\n"; ?></td>
<td> <?php echo " <a href=\"edit_donnees.php?id=".$user['id']."\" class='btn btn-default'>modifier informations</a>\n"; ?>
</td>


</tr>

</tbody>


<?php }?>

</table>




<br/>

<a href="insert_donnees.php" class= 'btn btn-success'> Ajouter un utilisateur</a><br/>


</body>
</html>


