<?php

session_start();

//Vérification et recupération de pseudo
if(isset($_POST['pseudo']))
{
    //recupération de pseudo
    $requeteDonnees['pseudo'] = htmlspecialchars($_POST['pseudo']); 
}
else 
{
    $test++;
    $message .= 'pseudo ne doit pas etre null. '; 
}

//Vérification et recupération de password
if(isset($_POST['password']))
{
    //recupération de la password
    $requeteDonnees['password'] = htmlspecialchars($_POST['password']); 
}
else 
{
    $test++;
    $message .= 'password ne doit pas etre null. '; 
}

if($test == 0)
{
    if($requeteDonnees['pseudo'] == '24516348' AND $requeteDonnees['password'] == 'gest_phar')
    {
        header('Location:../views/enregistrer_vente.php');
    }
    else
    {
        if($requeteDonnees['pseudo'] != '24516348')
        {
            $_SESSION['message'] = 'Code incorrect ! '; 
            header('Location:../views/index.php');
        }
        if($requeteDonnees['password'] != 'gest_phar')
        {
            $_SESSION['message'] = 'Mot de passe incorrect ! '; 
            header('Location:../views/index.php');
        }
    }
}


?>