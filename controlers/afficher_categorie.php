<?php 

include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//recupération de nom_entite
$tableauDonnees['nom_entite'] = "article_categorie";


$liste_entites = $RequeteEntite->afficher_entite($tableauDonnees);

foreach($liste_entites AS $entite)
{
        
    echo '<option value="'.$entite['article_categorie_id'].'">'. strtoupper($entite['article_categorie_designation']).'</option>';
}
?>