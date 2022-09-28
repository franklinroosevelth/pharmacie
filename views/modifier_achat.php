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

				<h1 class="h3 d-inline align-middle">Modifier un achat</h1>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/modifier_article_achat.php?article_achat_id=<?php if(isset($_GET['article_achat_id']))echo $_GET['article_achat_id'];?>">
									<div class="card-body">
										<label>Désignation du produit</label>
										<input type="text" class="form-control article_designation" value="<?php if(isset($_GET['article_designation']))echo $_GET['article_designation'];?>" required>
										<input type="text" class="form-control article_id" value="<?php if(isset($_GET['article_id']))echo $_GET['article_id'];?>" name="article_id">
										<div class="div_liste_article"></div>
										<label>Fabricant</label>
										<input type="text" class="form-control" value="<?php if(isset($_GET['article_achat_fabricant']))echo $_GET['article_achat_fabricant'];?>" name="article_achat_fabricant" required>
										<label>Prix unitaire de vente</label>
										<input type="text" class="form-control" value="<?php if(isset($_GET['article_achat_prix_unitaire']))echo $_GET['article_achat_prix_unitaire'];?>" name="article_achat_prix_unitaire" required>
										<label>Devise</label>
										<select name="devise_id" class="form-control" required>
											<option value="if(isset($_GET['devise_id']))echo $_GET['devise_id'];?>">USD</option>
										<select>
										<label>Quantité</label>
										<input type="number" class="form-control" value="<?php if(isset($_GET['article_achat_quantite']))echo $_GET['article_achat_quantite'];?>" name="article_achat_quantite" required>
                                        <label>Date de fabrication</label>
                                        <input type="date" class="form-control" value="<?php if(isset($_GET['article_achat_date_fabrication']))echo $_GET['article_achat_date_fabrication'];?>" name="article_achat_date_fabrication" required>
                                        <label>Date d'expiration</label>
                                        <input type="date" class="form-control" value="<?php if(isset($_GET['article_achat_date_expiration']))echo $_GET['article_achat_date_expiration'];?>" name="article_achat_date_expiration" required>
										<br>
										<input type="submit" class="form-control input_enregistrer" value="Modifier">
									</div>
								</form>

								
								
							</div>

							

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