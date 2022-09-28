<?php 
session_start();
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$requeteDonnees = array(); 

//Vérification et recupération de devise_taux
if(isset($_POST['taux']))
{
    //recupération de devise_taux
    $requeteDonnees['devise_taux'] = htmlspecialchars($_POST['taux']); 
}
else 
{
    $test++;
    $message .= 'devise_taux ne doit pas etre null. '; 
}

//Tester si il n'y a pas eu d'erreur pour creer la permission
if($test == 0)
{
    //enregistrer client 
    $RequeteEntite->enregistrer_taux($requeteDonnees);
    $message = 'Modification reussie. ';
}
echo $message;

header('Location:../views/enregistrer_vente.php');
?>