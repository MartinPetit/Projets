<?php 



try {
	$link = new PDO('mysql:host=localhost;dbname=b3','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}



if (isset($_POST['send'])){
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
    
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="insert_donnees.css">

</head>
    <body>


        <div class = " i1 " >
            
                <div class="col-md-12 ">

                    <h1> Connexion </h1>
                    


                    <form method="post" class="form-horizontal">
                        <div class = "form-group">

                         <label for = "mNom"> </label>
                         <input type="text" id = "mNom" class = "form-control" placeholder = "Entrer votre nom" name="nom" />
                     </div>
                     <div class = "form-group">
                         <label for = "mPrenom"> </label>
                         <input type="text" id = "mPrenom" class = "form-control" placeholder = "Entrer votre prénom" name="prenom" />
                     </div>
                     <div class = "form-group">

                         <label for = "mEmail"> </label>
                         <input type="text" name="email" id="mEmail" class ="form-control" placeholder = "Entrer votre adresse mail"/>

                     </div>
                     <div class = "form-group id2">
                               <button type="submit" name="send" class="btn btn-primary"> Envoyer </button>

                           </div>

                       </form>
                    



                <script src="js/jquery-3.3.1.slim.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.css"></script>
            </div>



      

        </div>

    </body>
</html>