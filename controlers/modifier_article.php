<?php 
session_start();
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

//Vérification et recupération de article_id
if(isset($_GET['article_id']))
{
    //recupération de article_id
    $requeteDonnees['article_id'] = htmlspecialchars($_GET['article_id']); 
}
else 
{
    $test++;
    $message .= 'article_id ne doit pas etre null. '; 
}

//Vérification et recupération de article_designation
if(isset($_POST['article_designation']))
{
    //recupération de article_designation
    $requeteDonnees['article_designation'] = htmlspecialchars($_POST['article_designation']); 
}
else 
{
    $test++;
    $message .= 'article_designation ne doit pas etre null. '; 
}

//Vérification et recupération de article_categorie_id
if(isset($_POST['article_categorie_id']))
{
    //recupération de article_categorie_id
    $requeteDonnees['article_categorie_id'] = htmlspecialchars($_POST['article_categorie_id']); 
}
else 
{
    $test++;
    $message .= 'article_categorie_id ne doit pas etre null. '; 
}

//Tester si il n'y a pas eu d'erreur pour creer la permission
if($test == 0)
{
    //enregistrer client 
    $RequeteEntite->modifier_article($requeteDonnees);
    $message = 'Modification reussie. ';
}
echo $message;

header('Location:../views/enregistrer_produit.php');
?>