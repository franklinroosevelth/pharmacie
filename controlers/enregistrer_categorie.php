<?php 
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

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


//Tester si il n'y a pas eu d'erreur pour enregistrer l'article
if($test == 0)
{
    //recupération de article_id
    $requeteDonnees['article_categorie_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);

    //enregistrer article 
    $RequeteEntite->enregistrer_article_categorie($requeteDonnees);
    $message .= 'Enregistrement reussi. ';
}
echo $message;

header('Location:../views/enregistrer_categorie.php');

?>