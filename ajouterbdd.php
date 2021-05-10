<?php 

//                         CONNECTION

//     $bdd = mysqli_init();                                                                 INNITIALISATION DE LA BDD
//     mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");        CONNECTION A LA BDD

//     contrôle de la donnée 

//     if (preg_match("#^[0-9]{4}$#", $_POST['noemp'])) {
//     echo"C bon" ; 

//     fin controle de la donnée 

//     $postForm = $_POST['noemp'].", '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['emploi']."', ".$_POST['sup'].", '".$_POST['embauche']."', '".$_POST['salaire']."', '".$_POST['comm']."', ".$_POST['noserv']." ,sysdate()".";"; RECUPERATION DE TOUTES LES DONNEES CAPTE VIA LE FORM DANS UNE VARIABLE
//     $query = mysqli_query($bdd, "INSERT INTO employes VALUES(".$postForm.")");            REQUETE POUR AJOUTER LES DONNEES DU FORM DANS LE TAB DE LA BDD
// }
//     else {
//         echo "C vraiment pas bon !";
//     }


                            // CONNECTION//
function ajouterbdd ($postForm) {


    include_once("connexionbdd.php");
    // $bdd = mysqli_init();                                                                 //INNITIALISATION DE LA BDD//
    // mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");        //CONNECTION A LA BDD//

    //contrôle de la donnée //

    // if (preg_match("#^[0-9]{4}$#", $_POST['noemp'])) {
    //     echo "format noemp correct" ; 

        //fin controle de la donnée //

        $postForm = $_POST['noemp'].", '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['emploi']."', ";
        $postForm .= $_POST['sup'].", '".$_POST['embauche']."', '".$_POST['salaire']."', '".$_POST['comm']."', ";
        $postForm .= $_POST['noserv'].", '".date("Y-m-d")."'"; //RECUPERATION DE TOUTES LES DONNEES CAPTE VIA LE FORM DANS UNE VARIABLE//

        echo $postForm;
        // exit();
        // $test = "INSERT INTO employes VALUES(".$postForm.")";
        $conn->query("INSERT INTO employes VALUES($postForm)");
        // var_dump($test);            //REQUETE POUR AJOUTER LES DONNEES DU FORM DANS LE TAB DE LA BDD//
    // }
    // else {echo "C vraiment pas bon !";
    // }
// }
}

ajouterbdd($postForm);
?>