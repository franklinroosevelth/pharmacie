<?php 

include_once('../models/requete.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$message = '';

$tableauDonnees = array();

//Vérification et recupération de article_designation
$tableauDonnees['article_designation'] = '';
if(isset($_POST['article_designation']))
{
    //recupération de article_designation
    $tableauDonnees['article_designation'] = trim(htmlspecialchars($_POST['article_designation']) );
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

    $devise_taux = $RequeteEntite->afficher_taux();
    $liste_entites = $RequeteEntite->afficher_situation($tableauDonnees);

    $i = 1;
    $somme_vendu = 0;
    $somme_stoc_dispo = 0;

        foreach($liste_entites AS $entite)
        {
            $somme_vendu += $entite['qte_vendu']*$entite['article_achat_prix_unitaire'];
            $somme_stoc_dispo += $entite['qte_dispo']*$entite['article_achat_prix_unitaire'];
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_fabricant']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_date_creation']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_achete']; ?></td>
            
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_vendu']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_prix_unitaire']; ?> USD</td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_vendu']*$entite['article_achat_prix_unitaire'];?> USD</td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_vendu']*$entite['article_achat_prix_unitaire']*$devise_taux[0]['devise_taux'];?> CDF</td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_dispo']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_dispo']*$entite['article_achat_prix_unitaire']; ?> USD</td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['qte_dispo']*$entite['article_achat_prix_unitaire']*$devise_taux[0]['devise_taux']; ?> CDF</td>
        </tr>
        <?php  }?>
        <tr class="input_total">
            <td ></td>
            <td class="d-none d-xl-table-cell"><b> Total</b></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"> <b><?php echo $somme_vendu?> USD</b></td>
            <td class="d-none d-xl-table-cell"> <b><?php echo $somme_vendu*$devise_taux[0]['devise_taux']?> CDF</b></td>
            <td class="d-none d-xl-table-cell"></td>
            <td class="d-none d-xl-table-cell"> <b><?php echo $somme_stoc_dispo; ?> USD</b></td>
            <td class="d-none d-xl-table-cell"> <b><?php echo $somme_stoc_dispo*$devise_taux[0]['devise_taux']; ?> CDF</b></td>
        </tr>
        <?php
    
}
?>
