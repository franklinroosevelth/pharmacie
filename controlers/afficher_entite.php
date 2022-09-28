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

if(isset($_GET['page']))
{
    //recupération de page
    $tableauDonnees['page'] = trim(htmlspecialchars($_GET['page']) );
}

if(isset($_GET['id_entite']))
{
    //recupération de article_designation
    $tableauDonnees['id_entite'] = trim(htmlspecialchars($_GET['id_entite']) );
}

if($test == 0)
{

    $devise_taux = $RequeteEntite->afficher_taux();
    $liste_entites = $RequeteEntite->afficher_entite($tableauDonnees);

    if($tableauDonnees['nom_entite'] == 'article')
    {
        $i = 1;
        foreach($liste_entites AS $entite)
        {
            if(isset($tableauDonnees['page']) AND $tableauDonnees['page']== 'afficher_achat')
            {
                echo '<label value="'.$entite['article_designation'].'" id="'.$entite['article_id'].'" class="lbl_article">'.strtoupper ($entite['article_designation']).'</label><br>';
            }
            else
            {
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <!--<td class="d-none d-xl-table-cell"> <?php echo $entite['article_id']; ?></td>-->
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_categorie_designation']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_date_creation']; ?></td>
            <td  class="td_action">
                <a href="../views/supprimer_article.php?id_entite=<?php echo $entite['article_id'];?> ">Supprimer</a>&nbsp
                <a href="../views/modifier_article.php?article_id=<?php echo $entite['article_id'];?>&article_categorie_id=<?php echo $entite['article_categorie_id'];?>&article_designation=<?php echo $entite['article_designation'];?>&categorie_designation=<?php echo $entite['article_categorie_designation'];?>">Modifier</a>
            </td>
        </tr>
        <?php } } ?>
        <tr>
        <?php
    }
    elseif($tableauDonnees['nom_entite'] == 'article_achat')
    {
        $i = 1;

        foreach($liste_entites AS $entite)
        {
            if(isset($tableauDonnees['page']) AND $tableauDonnees['page']== 'afficher_achat')
            {
                echo '<label taux="'.$entite['devise_taux'].'" value="'.$entite['article_designation'].'" qte="'.$entite['article_achat_quantite'].'" id="'.$entite['article_achat_id'].'" pu="'.$entite['article_achat_prix_unitaire'].' '.$entite['devise_designation'].'" class="lbl_article">'.strtoupper ($entite['article_designation']).' | '.$entite['article_achat_fabricant'].' | '.$entite['article_achat_quantite'].'</label><br>';
            }
            else
            {
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_fabricant']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_prix_unitaire'].' USD'; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_prix_unitaire']*$entite['devise_taux'].' CDF'; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_quantite']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_date_fabrication']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_date_expiration']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_date_creation']; ?></td>
            <td class="td_action">
                <a href="../views/supprimer_article_achat.php?id_entite=<?php echo $entite['article_achat_id'];?> ">Supprimer</a>
                <a href="../views/modifier_achat.php?article_achat_id=<?php echo $entite['article_achat_id'];?>
&article_id=<?php echo $entite['article_id'];?>&article_designation=<?php echo $entite['article_designation'];?>
&article_achat_fabricant=<?php echo $entite['article_achat_fabricant'];?>
&article_achat_prix_unitaire=<?php echo $entite['article_achat_prix_unitaire'];?>
&devise_id=<?php echo $entite['devise_id'];?>
&article_achat_quantite=<?php echo $entite['article_achat_quantite'];?>
&article_achat_date_fabrication=<?php echo $entite['article_achat_date_fabrication'];?>
&article_achat_date_expiration=<?php echo $entite['article_achat_date_expiration'];?> ">Modifier</a>
            </td>
        </tr>
        <?php  } }?>
        <tr>
        <?php
    }
    elseif($tableauDonnees['nom_entite'] == 'article_vente')
    {
        $i = 1;
        $somme_montant = 0;
        foreach($liste_entites AS $entite)
        {
            if(isset($tableauDonnees['page']) AND $tableauDonnees['page']== 'afficher_vente')
            {
                $somme_montant += $entite['montant_vendu'];
                echo '<label value="'.$entite['article_designation'].'" id="'.$entite['article_achat_id'].'" pu="'.$entite['article_achat_prix_unitaire'].'" class="lbl_article">'.strtoupper ($entite['article_designation']).'</label><br>';
            }
            else
            {
                if($entite['montant_vendu'] != 0)
                {
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_vente_id']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo round($entite['montant_vendu'],2).' '.$entite['devise_designation']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo round($entite['montant_vendu']*$entite['devise_taux'],2).' CDF'; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_vente_date_creation']; ?></td>
            <td class="td_action">
                <a href="../views/afficher_article_vente_detail.php?id_entite=<?php echo $entite['article_vente_id'];?> ">Voir détail</a>
            </td>
        </tr>
        <?php  } }}?>
        
        <?php

    }

    elseif($tableauDonnees['nom_entite'] == 'article_vente_detail')
    {
        $i = 1;
        $ptg = 0;
        foreach($liste_entites AS $entite)
        {
        
            $ptg += ($entite['article_achat_prix_unitaire']*$entite['article_vente_detail_quantite']);
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_fabricant']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_prix_unitaire'].' '.$entite['devise_designation']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_achat_prix_unitaire']*$entite['devise_taux'].' CDF'; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_vente_detail_quantite']; ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo ($entite['article_achat_prix_unitaire']*$entite['article_vente_detail_quantite'].' '.$entite['devise_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo ($entite['article_achat_prix_unitaire']*$entite['article_vente_detail_quantite']*$entite['devise_taux'].' CDF'); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_vente_date_creation']; ?></td>
            <td>
                <a href="../views/supprimer_article_vente_detail.php?id_vente=<?php echo $entite['article_vente_id'];?>&id_entite=<?php echo $entite['article_vente_detail_id'];?> ">Supprimer</a>&nbsp &nbsp
                <a href="../views/modifier_detail_vente.php?
article_achat_id=<?php echo $entite['article_achat_id'];?>
&pu=<?php echo $entite['article_achat_prix_unitaire'];?>
&designation=<?php echo $entite['article_designation'];?>
&qte=<?php echo $entite['article_vente_detail_quantite'];?>
&id_vente=<?php echo $entite['article_vente_id'];?>
&id_entite=<?php echo $entite['article_vente_detail_id'];?> ">Modifier</a>
            </td>
        </tr>
        <?php  } ?>
        <tr>
        <?php
    }
    elseif($tableauDonnees['nom_entite'] == 'article_categorie')
    {
        $i = 1;
        foreach($liste_entites AS $entite)
        {
            ?>
        <tr>
            <td > <?php echo $i++; ?></td>
            <!--<td class="d-none d-xl-table-cell"> <?php echo $entite['article_categorie_id']; ?></td>-->
            <td class="d-none d-xl-table-cell"> <?php echo strtoupper ($entite['article_categorie_designation']); ?></td>
            <td class="d-none d-xl-table-cell"> <?php echo $entite['article_categorie_date_creation']; ?></td>
            <td  class="td_action">
                <a href="../views/supprimer_article_categorie.php?id_entite=<?php echo $entite['article_categorie_id'];?> ">Supprimer</a>
                <a href="../views/modifier_categorie.php?designation=<?php echo $entite['article_categorie_designation'];?>&id_entite=<?php echo $entite['article_categorie_id'];?> ">Modifier</a>
            </td>
        </tr>
        <?php } ?>
        <tr>
        <?php
    }
}
?>

<script type="text/javascript">
            $(document).ready(function(){
        
				$('.lbl_article').click(function(){
					var code = $(this).attr('value');
                    var id = $(this).attr('id');
                    var pu = $(this).attr('pu');
                    var qte = $(this).attr('qte');
                    var taux = $(this).attr('taux');

                    $('.article_designation').val(code);
                    $('.article_id').val(id);
                    $('.article_achat_id').val(id);
                    $('.article_achat_pu').val(pu);
                    $('.article_vente_qte').val(qte);
                    $('.devise_taux').val(taux);
                    
					$('.div_liste_article').hide(500);
				});
                
            });
            </script>