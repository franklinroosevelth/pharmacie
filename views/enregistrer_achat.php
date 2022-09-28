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
		
		.input_enregistrer
		{
			background-color: blue;
			color:#fff;
			font-weight: bold;
		}
		.div_liste_article
		{
			position: absolute;
			background-color: #eef;
			width: 96%;
			display:none;
		}
		.lbl_article
		{
			display: inline-block;
			width: 100%;
			border-bottom: 1px solid #ddd;
			max-height: 50px;
			padding: 3px;
		}
		.lbl_article:hover
		{
			background-color: #deeeef;
		}
		.article_id
		{
			display:none;
		}
		.th_action, .td_action
		{
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

				<h1 class="h3 d-inline align-middle">Enregistrer un achat</h1>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/enregistrer_article_achat.php">
									<div class="card-body">
										<label>Désignation du produit</label>
										<input type="text" class="form-control article_designation" placeholder="Veuillez saisir le nom du produit" required>
										<input type="text" class="form-control article_id" placeholder="Veuillez saisir le nom du produit" name="article_id">
										<div class="div_liste_article"></div>
										<label>Fabricant</label>
										<input type="text" class="form-control" placeholder="Veuillez saisir le nom du fabricant" name="article_achat_fabricant" required>
										<label>Prix unitaire de vente</label>
										<input type="text" class="form-control" placeholder="Veuillez saisir le prix unitaire de vente" name="article_achat_prix_unitaire" required>
										<label>Devise</label>
										<select name="devise_id" class="form-control" required>
											<option value="<?php echo $devise_taux[count($devise_taux)-1]['devise_id'] ?>">USD</option>
										<select>
										<label>Quantité</label>
										<input type="number" class="form-control" placeholder="Veuillez saisir la quantité" name="article_achat_quantite" required>
                                        <label>Date de fabrication</label>
                                        <input type="date" class="form-control" name="article_achat_date_fabrication" required>
                                        <label>Date d'expiration</label>
                                        <input type="date" class="form-control" name="article_achat_date_expiration" required>
										<br>
										<input type="submit" class="form-control input_enregistrer" value="Enregistrer">
									</div>
								</form>
							</div>
						</div>
							</div>
						</div>

						<!-- liste -->
						<div class="row" style="min-width:100%; overflow:scroll">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="min-width:110%;">
							<div class="card flex-fill">
								<table class="table table-hover my-0"  style="overflow: scroll;">
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
                                            <th class="d-none d-md-table-cell th_action">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$_GET['nom_entite'] = 'article_achat';
										include '../controlers/afficher_entite.php';?>
										
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
			function afficher_liste_article()
			{
				var article_designation = $('.article_designation').val();
				$.post('../controlers/afficher_entite.php?nom_entite=article&page=afficher_achat',{article_designation:article_designation},function(donnee){
					$('.div_liste_article').html(donnee);
				});
				return false;
			}
			setInterval(afficher_liste_article, 1000);

			$('.article_designation').click(function(){
				$('.div_liste_article').toggle();
			})

			


		});

	</script>
</body>

</html>