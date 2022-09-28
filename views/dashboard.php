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
	<style>
		.input_total
		{
			margin-top: 3px;
			width: auto;
			text-align:left;
			border: none;
			background-color: #e1cb00;
			color: #fff;
			font-size : 16px;
		}
	</style>
</head>

<body>
	<div class="wrapper">
	<?php include 'nav.php'; ?>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Situation générale</h1>
						
					</div>
					<div class="row">
					<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/enregistrer_article_achat.php">
									<div class="card-body">
										<input type="text" class="form-control input_recherche input_txt article_designation" placeholder="Rechercher par nom du produit ou date" required>
									</div>
								</form>
							</div>

						</div>


							</div>
						</div>

						<!-- liste -->
						<div class="row" style="min-width:100%; overflow:scroll" >
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="min-width:130%;">
							<div class="card flex-fill" >
								<div class="card-header">

									<h5 class="card-title mb-0"></h5>
								</div>
								<table class="table table-hover my-0" >
									<thead>
										<tr>
											<th>N°</th>
											<th class="d-none d-xl-table-cell">Produit</th>
											<th class="d-none d-md-table-cell">Fabricant</th>
											<th class="d-none d-md-table-cell">Date</th>
											<th class="d-none d-md-table-cell">Qté acheté</th>
											<th class="d-none d-md-table-cell">Qté vendu</th>
											<th class="d-none d-md-table-cell">PUV</th>
											<th class="d-none d-md-table-cell">Vendu</th>
											<th class="d-none d-md-table-cell">En franc</th>
											<th class="d-none d-md-table-cell">Stock dispo</th>
											<th class="d-none d-md-table-cell">Valeur</th>
											<th class="d-none d-md-table-cell">En franc</th>
										</tr>
									</thead>
									<tbody class="tbody_vente">
										
										
										
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
				var article_designation = $('.input_recherche').val();
				$.post('../controlers/afficher_situation.php',{article_designation:article_designation},function(donnee){
					$('.tbody_vente').html(donnee);
				});
				$.post('../controlers/afficher_somme_vente.php?nom_entite=article_vente',{code_vente:code_vente},function(donnee){
					$('.input_total').val(donnee);
				});
				return false;
			}
			setInterval(afficher_liste_vente, 1000);

		});
		</script>
</body>

</html>