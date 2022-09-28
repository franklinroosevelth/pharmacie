<?php 

    include_once('connexion.php');
    class Requete_entite
    {
        //CRUD entité
        function afficher_entite($tableauDonnees)
        {
            global $bdd;
            $req = $bdd->query('SELECT * 
            FROM tb_'.$tableauDonnees['nom_entite'].' ORDER BY '.$tableauDonnees['nom_entite'].'_date_creation DESC');
            if($tableauDonnees['nom_entite'] == 'article')
            {
                $req = $bdd->query("SELECT * 
                FROM tb_article a, tb_article_categorie b  
                WHERE a.article_categorie_id = b.article_categorie_id
                AND article_designation LIKE '%".$tableauDonnees['article_designation']."%'
                ORDER BY ".$tableauDonnees['nom_entite']."_date_creation DESC");
            }
            if($tableauDonnees['nom_entite'] == 'article_achat')
            {
                try
                {
                    $recherche = array('', '');
                    $recherche = explode(',', $tableauDonnees['article_designation']);
                    if(count($recherche) <= 1)
                    {
                        $req = $bdd->query("SELECT *
                        FROM tb_article a, tb_article_achat b, tb_devise c
                        WHERE a.article_id = b.article_id AND b.devise_id = c.devise_id
                        AND (article_designation LIKE '%".$recherche[0]."%'
                        OR article_achat_date_creation LIKE '%".$recherche[0]."%')
                        ORDER BY ".$tableauDonnees['nom_entite']."_date_creation DESC");
                    }
                    else
                    {
                        $req = $bdd->query("SELECT *
                        FROM tb_article a, tb_article_achat b, tb_devise c
                        WHERE a.article_id = b.article_id AND b.devise_id = c.devise_id
                        AND (article_achat_date_creation LIKE '%".$recherche[1]."%'
                        AND article_designation LIKE '%".$recherche[0]."%')
                        ORDER BY ".$tableauDonnees['nom_entite']."_date_creation DESC");
                    }
                }
                catch(Exception $e)
                {

                }
            }
            if($tableauDonnees['nom_entite'] == 'article_vente')
            {
                $req = $bdd->query("SELECT *, sum(article_vente_detail_quantite*article_achat_prix_unitaire) AS montant_vendu 
                FROM tb_article_vente a, tb_article_vente_detail b, tb_article_achat c, tb_devise d
                WHERE a.article_vente_id = b.article_vente_id  
                AND b.article_achat_id = c.article_achat_id
                AND c.devise_id = d.devise_id
                AND (b.article_vente_id LIKE '%".$tableauDonnees['code_vente']."%'
                OR article_vente_date_creation LIKE '%".$tableauDonnees['code_vente']."%')
                GROUP BY a.article_vente_id
                ORDER BY ".$tableauDonnees['nom_entite']."_date_creation DESC");
            }
            if($tableauDonnees['nom_entite'] == 'article_vente_detail')
            {
                $req = $bdd->query("SELECT *
                FROM tb_article a, tb_article_achat b, tb_article_vente c, tb_article_vente_detail d, tb_devise e
                WHERE a.article_id = b.article_id
                AND b.article_achat_id = d.article_achat_id AND c.article_vente_id = d.article_vente_id
                AND b.devise_id = e.devise_id
                AND c.article_vente_id = '".$tableauDonnees['id_entite']."' 
                ORDER BY ".$tableauDonnees['nom_entite']."_date_creation DESC");
            }
            return $req->fetchAll(2);                     
        }

        function afficher_situation($tableauDonnees)
        {
            global $bdd;
            $req = $bdd->query("SELECT article_achat_quantite
            AS qte_achete, SUM(article_vente_detail_quantite) AS qte_vendu,  
            (article_achat_quantite - SUM(article_vente_detail_quantite)) qte_dispo, 
            article_designation, article_achat_fabricant, article_achat_prix_unitaire, 
            article_vente_date_creation, article_achat_date_creation
            FROM tb_article a, tb_article_achat b, tb_article_vente c, tb_article_vente_detail d, tb_devise e
            WHERE a.article_id = b.article_id AND b.article_achat_id = d.article_achat_id 
            AND b.devise_id = e.devise_id
            AND c.article_vente_id = d.article_vente_id 
            AND (article_designation LIKE '%".$tableauDonnees['article_designation']."%'
            OR article_vente_date_creation LIKE '%".$tableauDonnees['article_designation']."%') GROUP BY b.article_achat_id
            ORDER BY article_designation ASC");
            
            return $req->fetchAll(2);  
        }

        function afficher_commande_par_client($tableauDonnees)
        {
            global $bdd;
            $req = $bdd->query("SELECT nom_client, postnom_client, prenom_client, 
            SUM(montant_commande) AS commande, 
            SUM(montant_payer_commande) AS payer, SUM(dette_payer_commande) AS bpp_som FROM tb_client, tb_commande 
            WHERE tb_client.id_client = tb_commande.id_client AND tb_commande.date_manuelle_commande LIKE '%".$tableauDonnees['mois_commande']."%' GROUP BY tb_client.id_client");
            return $req->fetchAll(2);                     
        }

        function afficher_detail_entite($tableauDonnees)
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * 
            FROM tb_'.$tableauDonnees['nom_entite'].' 
            WHERE id_'.$tableauDonnees['nom_entite'].' = :entiteId');
            $req->execute(array('entiteId'=> $tableauDonnees['id_entite']));
            return $req->fetchAll(2);                        
        }

        function afficher_taux()
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * FROM tb_devise');
            $req->execute(array());
            return $req->fetchAll(2);                        
        }

        function enregistrer_article($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT 
            INTO tb_article(article_id, article_designation, article_categorie_id)
            VALUES(?,?,?)');
            $req->execute(array(
                $tableauDonnees['article_id'], 
                $tableauDonnees['article_designation'], 
                $tableauDonnees['article_categorie_id']
            ));
        }

        function enregistrer_article_categorie($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT 
            INTO tb_article_categorie(article_categorie_designation)
            VALUES(?)');
            $req->execute(array(
                $tableauDonnees['article_categorie_designation']
            ));
        }
 

        function enregistrer_taux($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT 
            INTO tb_devise(devise_designation, devise_taux)
            VALUES(?,?)');
            $req->execute(array(
                'USD',
                $tableauDonnees['devise_taux']
            ));
        }
 
        function enregistrer_article_achat($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT 
            INTO tb_article_achat(article_achat_id, devise_id, article_id, article_achat_fabricant, article_achat_prix_unitaire, article_achat_quantite, article_achat_date_fabrication, article_achat_date_expiration)
            VALUES(?,?,?,?,?,?,?,?)');
            $req->execute(array(
                $tableauDonnees['article_achat_id'], 
                $tableauDonnees['devise_id'],
                $tableauDonnees['article_id'], 
                $tableauDonnees['article_achat_fabricant'],
                $tableauDonnees['article_achat_prix_unitaire'],
                $tableauDonnees['article_achat_quantite'], 
                $tableauDonnees['article_achat_date_fabrication'],
                $tableauDonnees['article_achat_date_expiration']
            ));
        }

        function enregistrer_article_vente($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT INTO tb_article_vente(article_vente_id) VALUES(?)');
            $req->execute(array($tableauDonnees['article_vente_id']));
        }

        function enregistrer_article_vente_detail($tableauDonnees)
        {
            global $bdd;

            $req = $bdd->prepare('INSERT 
            INTO tb_article_vente_detail(article_vente_detail_id, article_achat_id, article_vente_id, article_vente_detail_quantite)
            VALUES(?,?,?,?)');
            $req->execute(array(
                $tableauDonnees['article_vente_detail_id'], 
                $tableauDonnees['article_achat_id'], 
                $tableauDonnees['article_vente_id'],
                $tableauDonnees['article_vente_detail_quantite']
            ));
        }

        public function modifier_article($requeteDonnee)
        {
            global $bdd;
            $req = '';
            $req = $bdd->prepare('UPDATE tb_article
            SET article_designation = :articleDesignation,
            article_categorie_id = :articleFabricant
            WHERE article_id = :idArticle');
            $req->execute(array(
                'articleDesignation' => $requeteDonnee['article_designation'], 
                'articleFabricant' => $requeteDonnee['article_categorie_id'], 
                'idArticle'=> $requeteDonnee['article_id']));
        }


        public function modifier_categorie($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE tb_article_categorie
            SET article_categorie_designation = :articleDesignation
            WHERE article_categorie_id = :idArticle');
            $req->execute(array(
                'articleDesignation' => $requeteDonnee['article_categorie_designation'], 
                'idArticle'=> $requeteDonnee['article_categorie_id']
            ));
        }

        public function modifier_taux($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE tb_devise SET devise_taux = :taux WHERE devise_id = 1');
            $req->execute(array(
                'taux' => $requeteDonnee['devise_taux']
            ));
        }


        public function modifier_article_detail_vente($requeteDonnee)
        {
            global $bdd;
            $req = '';
            $req = $bdd->prepare('UPDATE tb_article_vente_detail
            SET article_achat_id = :articleAchatId,
            article_vente_detail_quantite = :articleVenteDetailQuantite
            WHERE article_vente_detail_id = :articleVenteDetailId');
            $req->execute(array(
                'articleAchatId' => $requeteDonnee['article_achat_id'], 
                'articleVenteDetailQuantite' => $requeteDonnee['article_detail_vente_quantite'], 
                'articleVenteDetailId'=> $requeteDonnee['article_vente_detail_id']));
        }

        public function modifier_article_achat($requeteDonnee)
        {
            global $bdd;
            $req = '';
            $req = $bdd->prepare('UPDATE tb_article_achat
            SET article_id = :idArticle,
            devise_id = :idDevise,
            article_achat_fabricant = :articleAchatfabricant,
            article_achat_prix_unitaire = :articleAchatPrixUnitaire,
            article_achat_quantite = :articleAchatQuantite,
            article_achat_date_fabrication = :articleAchatDateFabrication,
            article_achat_date_expiration = :articleAchatDateExpiration
            WHERE article_achat_id = :idArticleAchat');
            $req->execute(array(
                'idArticle' => $requeteDonnee['article_id'], 
                'idDevise' => $requeteDonnee['devise_id'], 
                'articleAchatfabricant' => $requeteDonnee['article_achat_fabricant'], 
                'articleAchatPrixUnitaire' => $requeteDonnee['article_achat_prix_unitaire'], 
                'articleAchatQuantite'=> $requeteDonnee['article_achat_quantite'],
                'articleAchatDateFabrication' => $requeteDonnee['article_achat_date_fabrication'], 
                'articleAchatDateExpiration'=> $requeteDonnee['article_achat_date_expiration'],
                'idArticleAchat'=> $requeteDonnee['article_achat_id']
            ));
        }

        function supprimer_entite($tableauDonnees) 
        {
            global $bdd;
            $req = '';
            $req = $bdd->prepare('DELETE FROM tb_'.$tableauDonnees['nom_entite'].' 
            WHERE '.$tableauDonnees['nom_entite'].'_id = :entiteId');
            $req->execute(array('entiteId'=> $tableauDonnees['id_entite']));
        }

        function generer_code_unique($requeteDonnees)
        {
            //recupérer la date actuelle
            $chaine_a_coder = date('d-m-y h:i:s');
            //Recupérer l'adresse mac de l'ordinateur du client
            $mac = exec('getmac');
            $mac = strtok($mac, ' ');
            foreach ($requeteDonnees as $donnee)
            {
                $chaine_a_coder .= $donnee;
            }
            $chaine_a_coder .= $mac;

            return md5($chaine_a_coder);
        }
    }
    ?>