<?php 

include_once('../modeles/my_requete.php');

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
        $message .= 'Le nom_entite ne doit pas etre vide';     
    } 
}
else 
{
    $test++;
    $message .= 'Le nom_entite ne doit pas etre null'; 
}

//Vérifier si l'id_entite est correctement envoyé
if(isset($_GET['id_entite']))
{
    if($_GET['id_entite'] != '')
    {
        //recupération de l'id de la entite
        $tableauDonnees['id_entite'] = trim(htmlspecialchars($_GET['id_entite']));
    }
    else
    {
        $test++;  
        $message .= "L'id de la entite ne doit pas etre vide";     
    } 
}
else 
{
    $test++;
    $message .= "L'id de la entite ne doit pas etre null"; 
}
$entites = $RequeteEntite->afficher_detail_entite($tableauDonnees);
