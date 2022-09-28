
<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">G-Pharmacie</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Actions principales
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="enregistrer_vente.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Enregistrer une vente</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficher_liste_ventes.php">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Afficher les ventes</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="enregistrer_achat.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Enregistrer un achat</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficher_liste_achats.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Afficher les achats</span>
            </a>
					</li>

					<li class="sidebar-header">
						Autres actions
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="enregistrer_produit.php">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Enregistrer un produit</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficher_liste_articles.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Afficher les produits</span>
            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="enregistrer_categorie.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Enregistrer catégorie</span>
            </a>
					</li>

					

					<li class="sidebar-item active">
						<a class="sidebar-link" href="dashboard.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Situation en stock</span>
            </a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php" style="margin-top:20px;background:#d90d0d;color:#fff;width:170px;border-radius:5px; margin-left:30px;padding-top:4px;height:30px">
               <span class="align-middle">Se déconnecter</span>
            </a>
					</li>
					
					<li class="sidebar-item">
					<?php 
				   		include_once('../models/requete.php');
						$RequeteEntite = new Requete_entite();
						$devise_taux = $RequeteEntite->afficher_taux();
					?>
						<a class="sidebar-link" href="modifier_taux.php?taux=<?php echo $devise_taux[count($devise_taux)-1]['devise_taux'];?>" style="color:#fff; margin-left:25px;">
               <span class="align-middle" title="Cliquer pour modifier">
				   1 USD =
				   <?php 
						echo $devise_taux[count($devise_taux)-1]['devise_taux'];
			   		?>
					CDF
			   </span>
            </a>
					</li>
					
				</ul>
			</div>
		</nav>