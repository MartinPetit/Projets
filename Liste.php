<?php

try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

// On récupere toutes les données de la tables user


$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

?>

<!-- Mise en forme du tableau des utilisateurs à l'aide de bootstrap -->


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

// boucles qui affiches toutes les données de la table user rentrés par l'utilisateur

foreach ($stmt as $user) { ?>

  <tbody>
	<tr>
		<td> <?php echo $user['nom']; ?> </td>
		<td> <?php echo $user['prenom']; ?> </td>
		<td> <?php echo $user['email']; ?> </td>



<td> <?php echo " <a href=\"supp_donnees.php?id=".$user['id']."\" class='btn btn-default'>Supprimmer</a>\n"; ?></td> <!-- On affecte l'id de la base de donnée correspondant aux informations rentrées par l'utilisateur au lien <a>  puis on redirige l'utilisateur vers la page suppression-->
<td> <?php echo " <a href=\"edit_donnees.php?id=".$user['id']."\" class='btn btn-default'>modifier informations</a>\n"; ?> <!-- idem ici  puis redirection vers modification--> 
</td>


</tr>

</tbody>


<?php }?>

</table>




<br/>

<a href="insert_donnees.php" class= 'btn btn-success'> Ajouter un utilisateur</a><br/>


</body>
</html>