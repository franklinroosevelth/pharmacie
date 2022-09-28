<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/ui-forms.html" />

	<title>Gestion pharmacie</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
	<?php include 'nav.php'; ?>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Liste des entrées enregistrées</h1>
						
					</div>
					
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/enregistrer_article_achat.php">
									<div class="card-body">
										<input type="text" class="form-control input_recherche input_txt article_designation" placeholder="Rechercher en le nom du produit ou la date" required>
									</div>
								</form>
							</div>

						</div>

					<div class="row">


							</div>
						</div>

						<!-- liste -->
						<div class="row" style="min-width:100%; overflow:scroll">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="min-width:110%;">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"></h5>
								</div>
								<table class="table table-hover my-0" style="width:100%;">
									<thead>
										<tr>
											<th>N°</th>
											<th class="d-none d-xl-table-cell">Produit</th>
											<th class="d-none d-xl-table-cell">Fabricant</th>
                                            <th class="d-none d-xl-table-cell">PUV</th>
											<th class="d-none d-xl-table-cell">En franc</th>
											<th class="d-none d-md-table-cell">Qte</th>
											<th class="d-none d-md-table-cell">Fabriqué le</th>
											<th class="d-none d-md-table-cell">Expire le</th>
                                            <th class="d-none d-md-table-cell">Enregistré le</th>
                                            <th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody class="tbody_achat">
										<?php 
										$_GET['nom_entite'] = 'article_achat';
										//include '../controlers/afficher_entite.php';?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>



					</div>



					
				</div>

				
				
				<?php include 'footer.php';?>
			</main>

			

		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/jquery.min.js"></script>
	<script>
	
		$(document).ready(function()
		{
			function afficher_liste_vente()
			{
				var recherche = $('.article_designation').val();
				$.post('../controlers/afficher_entite.php?nom_entite=article_achat',{article_designation:recherche},function(donnee){
					$('.tbody_achat').html(donnee);
				});
				/*$.post('../controlers/afficher_somme_vente.php?nom_entite=article_vente',{recherche:recherche},function(donnee){
					$('.input_total').val(donnee);
				});*/
				return false;
			}
			setInterval(afficher_liste_vente, 1000);

		});
		</script>
</body>

</html>