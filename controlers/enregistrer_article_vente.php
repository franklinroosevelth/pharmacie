<?php 
include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$reponseDonnees = array();
$requeteDonnees = array(); 

    if(isset($_POST['article_vente_detail']))
    {   
        $requeteDonnees['article_vente_detail'] = $_POST['article_vente_detail'];
    }
    else 
    {
        $resultat['message'] = 'Le article_vente_detail ne doit pas être null. ';
        $test++;
    }

    function isJson($string) { json_decode($string); return (json_last_error() == JSON_ERROR_NONE); }

    $jsonString = $requeteDonnees['article_vente_detail'];
    
   try 
   {
        if(isJson($jsonString) == 1)
        {
            $data = json_decode($jsonString);
        }
        else
        {
            $resultat['message'] = "Les données envoyées ne respectent pas le format json. ";
            $test++;
        }
   }  
   catch(Exception $e)
   {
       $resultat['message'] = "Format Json incorrect.";
       $resultat['status'] = 2;
   }

    //Tester s'il n'y a pas eu d'erreur pour creer l'entité
    if($test == 0)
    {
        $requeteDonnees['article_vente_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);
        $RequeteEntite->enregistrer_article_vente($requeteDonnees);
       
        //Effectuer les enregistrements des details commandes
        foreach($data->article_vente_detail as $article_vente_detail)
        {
            $requeteDonnees['article_achat_id'] = $article_vente_detail->article_achat_id;
            $requeteDonnees['article_vente_detail_quantite'] = $article_vente_detail->article_vente_detail_quantite;
            
            $requeteDonnees['article_vente_detail_id'] =  $RequeteEntite->generer_code_unique($requeteDonnees);
            $RequeteEntite->enregistrer_article_vente_detail($requeteDonnees);
            $message = "Enregistrement réussi.";
        }
    }

    echo $message;

//header('Location:../vues/creer_commande.php?id_client='.$requeteDonnees['id_client'].'&nom_client='.$requeteDonnees['nom_client'].' '.$requeteDonnees['article_achat_prix_unitaire'].' '.$requeteDonnees['prenom_client'].'');

?>