<?php 
session_start();
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

//Vérification et recupération de article_achat_id
if(isset($_POST['article_achat_id']))
{
    //recupération de article_achat_id
    $requeteDonnees['article_achat_id'] = htmlspecialchars($_POST['article_achat_id']); 
}
else 
{
    $test++;
    $message .= 'article_achat_id ne doit pas etre null. '; 
}

//Vérification et recupération de article_vente_detail_id
if(isset($_POST['article_vente_detail_id']))
{
    //recupération de article_vente_detail_id
    $requeteDonnees['article_vente_detail_id'] = htmlspecialchars($_POST['article_vente_detail_id']); 
}
else 
{
    $test++;
    $message .= 'article_vente_detail_id ne doit pas etre null. '; 
}

//Vérification et recupération de article_detail_vente_quantite
if(isset($_POST['article_detail_vente_quantite']))
{
    //recupération de article_detail_vente_quantite
    $requeteDonnees['article_detail_vente_quantite'] = htmlspecialchars($_POST['article_detail_vente_quantite']); 
}
else 
{
    $test++;
    $message = 'article_detail_vente_quantite ne doit pas etre null. '; 
}

//Tester si il n'y a pas eu d'erreur pour creer la permission
if($test == 0)
{
    //enregistrer client 
    $RequeteEntite->modifier_article_detail_vente($requeteDonnees);
    $message = 'Modification reussie. ';
}
echo $message;

header('Location:../views/afficher_article_vente_detail.php?id_entite='.$_GET['id_entite'].'');
?>