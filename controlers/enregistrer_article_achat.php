<?php 
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

//Vérification et recupération de article_id
if(isset($_POST['article_id']))
{
    //recupération de article_id
    $requeteDonnees['article_id'] = htmlspecialchars($_POST['article_id']); 
}
else 
{
    $test++;
    $message .= 'article_id ne doit pas etre null. '; 
}

//Vérification et recupération de devise_id
if(isset($_POST['devise_id']))
{
    //recupération de devise_id
    $requeteDonnees['devise_id'] = htmlspecialchars($_POST['devise_id']); 
}
else 
{
    $test++;
    $message = 'devise_id ne doit pas etre null. '; 
}

//Vérification et recupération de article_achat_fabricant
if(isset($_POST['article_achat_fabricant']))
{
    //recupération de la article_achat_fabricant
    $requeteDonnees['article_achat_fabricant'] = htmlspecialchars($_POST['article_achat_fabricant']); 
}
else 
{
    $test++;
    $message .= 'article_achat_fabricant ne doit pas etre null. '; 
}

//Vérification et recupération de article_achat_prix_unitaire
if(isset($_POST['article_achat_prix_unitaire']))
{
    //recupération de la article_achat_prix_unitaire
    $requeteDonnees['article_achat_prix_unitaire'] = htmlspecialchars($_POST['article_achat_prix_unitaire']); 
}
else 
{
    $test++;
    $message .= 'article_achat_prix_unitaire ne doit pas etre null. '; 
}

//Vérification et recupération de article_achat_quantite
if(isset($_POST['article_achat_quantite']))
{
    //recupération de la article_achat_quantite
    $requeteDonnees['article_achat_quantite'] = htmlspecialchars($_POST['article_achat_quantite']); 
}
else 
{
    $test++;
    $message .= 'article_achat_quantite ne doit pas etre null. '; 
}


//Vérification et recupération de article_achat_date_fabrication
if(isset($_POST['article_achat_date_fabrication']))
{
    //recupération de la article_achat_date_fabrication
    $requeteDonnees['article_achat_date_fabrication'] = htmlspecialchars($_POST['article_achat_date_fabrication']); 
}
else 
{
    $test++;
    $message .= 'article_achat_date_fabrication ne doit pas etre null. '; 
}

//Vérification et recupération de article_achat_date_expiration
if(isset($_POST['article_achat_date_expiration']))
{
    //recupération de la article_achat_date_expiration
    $requeteDonnees['article_achat_date_expiration'] = htmlspecialchars($_POST['article_achat_date_expiration']); 
}
else 
{
    $test++;
    $message .= 'article_achat_date_expiration ne doit pas etre null. '; 
}


//Tester si il n'y a pas eu d'erreur pour enregistrer l'article
if($test == 0)
{
    //recupération de article_achat_id
    $requeteDonnees['article_achat_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);
    //enregistrer article 
    $RequeteEntite->enregistrer_article_achat($requeteDonnees);
    //enregistrer vente 
    $requeteDonnees['article_vente_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);
    $RequeteEntite->enregistrer_article_vente($requeteDonnees);
    //enregistrer detail vente
    $requeteDonnees['article_vente_detail_quantite'] = 0;
    $requeteDonnees['article_vente_detail_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);
    $RequeteEntite->enregistrer_article_vente_detail($requeteDonnees);
    $message .= 'Enregistrement reussi. ';
}
echo $message;

header('Location:../views/enregistrer_achat.php');

?>