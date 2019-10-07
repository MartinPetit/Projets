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
                header('Location: Liste.php');


?>
