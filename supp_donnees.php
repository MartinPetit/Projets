<?php

try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$id = $_GET["id"];
echo $id;

$sql ="DELETE FROM user WHERE id = '".$id."'";

                $sth = $link->prepare($sql);
                $sth->execute();

?>
