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
        $message .= 'Le nom_entite ne doit pas etre vide';     
    } 
}
else 
{
    $test++;
    $message .= 'Le nom_entite ne doit pas etre null'; 
}



//Vérification et recupération de code_vente
$tableauDonnees['code_vente'] = '';
if(isset($_POST['code_vente']))
{
    //recupération de code_vente
    $tableauDonnees['code_vente'] = trim(htmlspecialchars($_POST['code_vente']) );
}

if($test == 0)
{

    $liste_entites = $RequeteEntite->afficher_entite($tableauDonnees);
    $somme_montant = 0;
    foreach($liste_entites AS $entite)
    {
        $somme_montant += $entite['montant_vendu'];
    }

    echo 'La somme totale vaut : '.round($somme_montant,2).' USD';
    
}

?>
