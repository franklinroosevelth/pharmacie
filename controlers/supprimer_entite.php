<?php 
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$tableauDonnees = array();

//Vérification et recupération de nom_entite
if(isset($_GET['nom_entite']))
{
    if($_GET['nom_entite'] != '')
    {
        //recupération de nom_entite
        $tableauDonnees['nom_entite'] = trim(htmlspecialchars($_GET['nom_entite']) );
    }
    else
    {
        $test++;  
        $message .= 'Le nom_entite ne doit pas etre vide. ';     
    } 
}
else 
{
    $test++;
    $message .= 'Le nom_entite ne doit pas etre null. '; 
}

//Vérification et recupération de id_entite
if(isset($_GET['id_entite']))
{
    if($_GET['id_entite'] != '')
    {
        //recupération de id_entite
        $tableauDonnees['id_entite'] = trim(htmlspecialchars($_GET['id_entite']));
    }
    else
    {
        $test++;  
        $message .= "Le id_entite ne doit pas etre vide. ";     
    } 
}
else 
{
    $test++;
    $message .= "Le id_entite ne doit pas etre null. "; 
}

//Vérifier si tous les parametres ou variables sont envoyés correctement
if($test == 0)
{
    $RequeteEntite->supprimer_entite($tableauDonnees);
    $message .= "Suppression effectuée. ";
}

echo $message;

if($tableauDonnees['nom_entite'] == 'article')
{
    header('Location:../views/afficher_liste_articles.php');
}
elseif($tableauDonnees['nom_entite'] == 'article_achat')
{
    header('Location:../views/afficher_liste_achats.php');
}
elseif($tableauDonnees['nom_entite'] == 'article_vente_detail')
{
    if(isset($_GET['id_vente']))
        header('Location:../views/afficher_article_vente_detail.php?id_entite='.$_GET['id_vente'].'');
}
elseif($tableauDonnees['nom_entite'] == 'article_categorie')
{
    header('Location:../views/enregistrer_categorie.php');
}

?>