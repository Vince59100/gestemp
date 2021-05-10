<?php 

    // $bdd = mysqli_init();                                                                 INNITIALISATION DE LA BDD
    // mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");        CONNECTION A LA BDD

    // $postForm = "nom = '".$_POST['nom']."', ";
    // $postForm .= "noemp = '".$_POST['noemp']."', ";
    // $postForm .= "prenom = '".$_POST['prenom']."', ";
    // $postForm .= "emploi = '".$_POST['emploi']."', ";
    // $postForm .= "sup = '".$_POST['sup']."', ";
    // $postForm .= "embauche = '".$_POST['embauche']."', ";
    // $postForm .= "salaire = '".$_POST['salaire']."', ";
    // $postForm .= "comm = '".$_POST['comm']."', ";
    // $postForm .= "noserv = '".$_POST['noserv']."',";

    // $query = mysqli_query ($bdd, "UPDATE  employes SET $postForm");   REQUETE POUR MODIFIER LES DONNEES DU FORM DANS LE TAB DE LA BDD


    //$bdd = mysqli_init();                                                                 //INNITIALISATION DE LA BDD
    //mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");        //CONNECTION A LA BDD

    

    function modifierEmploye($postForm) {                       //l'argument peut prendre n'importequel nom 

    include_once("connexion.php");

    $postForm =  "noemp = ".$_POST['noemp'].", ";
    $postForm .= "nom = '".$_POST['nom']."', ";
    $postForm .= "prenom = '".$_POST['prenom']."', ";
    $postForm .= "emploi = '".$_POST['emploi']."', ";
    $postForm .= "sup = ".$_POST['sup'].", ";
    $postForm .= "embauche = '".$_POST['embauche']."', ";
    $postForm .= "sal = '".$_POST['sal']."', ";
    $postForm .= "comm = '".$_POST['comm']."', ";
    $postForm .= "noserv = ".$_POST['noserv'];

    // $query = mysqli_query ($bdd, "UPDATE  employes SET $postForm where noemp = '".$_POST['noemp']."';");
    //REQUETE POUR MODIFIER LES DONNEES DU FORM DANS LE TAB DE LA BDD

    // echo $postForm;

    $conn->query("UPDATE employes SET $postForm WHERE noemp=".$_POST['noemp']);

    header("Location: index.php");

    if($conn->error)
    {
        echo "erreur de query : " . $conn->error;
    }
}
modifierEmploye($postForm);
    