<?php

function login()
{
    session_start();

    $_POST['username'];
    $_POST['mdp'];

    $DB = new mysqli("127.0.0.1", "vincent", "vincent", "gest_employes");
    if($DB->connect_error){
        die("connection failed : ".$DB->connect_error);
    } else{
        $query = "SELECT * FROM users WHERE username = '".$_POST['username']."'";
        $statement = $DB->query($query);
        if($statement->num_rows > 0){
            $row = $statement->fetch_array();

            if(password_verify($_POST['mdp'], $row['hasha'])){
                $_SESSION['user'] = array(
                    'id'        =>     $row['id'],
                    'username'  =>     $row['username'],
                    'email'     =>     $row['email'],
                    'rang'      =>     $row['rang']
                );
                header("Location: index.php");
            } else {
                echo "wrong password";
            }
        } else {
            echo "username doesn't exist";
        }
    }
}

login();

?>