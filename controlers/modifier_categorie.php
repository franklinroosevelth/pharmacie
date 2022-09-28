<?php 
session_start();
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

//Vérification et recupération de article_categorie_id
if(isset($_GET['article_categorie_id']))
{
    //recupération de article_categorie_id
    $requeteDonnees['article_categorie_id'] = htmlspecialchars($_GET['article_categorie_id']); 
}
else 
{
    $test++;
    $message .= 'article_categorie_id ne doit pas etre null. '; 
}

//Vérification et recupération de article_categorie_designation
if(isset($_POST['article_categorie_designation']))
{
    //recupération de article_categorie_designation
    $requeteDonnees['article_categorie_designation'] = htmlspecialchars($_POST['article_categorie_designation']); 
}
else 
{
    $test++;
    $message .= 'article_categorie_designation ne doit pas etre null. '; 
}

//Tester si il n'y a pas eu d'erreur pour creer la permission
if($test == 0)
{
    //enregistrer client 
    $RequeteEntite->modifier_categorie($requeteDonnees);
    $message = 'Modification reussie. ';
}
echo $message;

header('Location:../views/enregistrer_categorie.php');
?>