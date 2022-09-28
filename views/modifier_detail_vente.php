<?php 
session_start();
$_SESSION['message'] = '';

?>
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
		.article_achat_id, .article_vente_detail_id
		{
			display:none;
		}
        .input_txt
        {
            margin-bottom: 2px;
        }
		.input_total
		{
			display:none;
			margin-top: 3px;
			width: auto;
			text-align:left;
			border: none;
			background-color: #e1cb00;
			color: #fff;
			font-size : 17px;
			height: 30px;
		}
		tr
		{
			height: 30px;
			padding: 0;
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

				<h1 class="h3 d-inline align-middle">Modifier une ligne d'une vente</h1>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/modifier_article_vente_detail.php?id_entite=<?php if(isset($_GET['id_vente']))echo $_GET['id_vente'];?>">
									<div class="card-body">
										<label>Nom du produit</label>
										<input type="text" class="form-control article_designation input_txt article_designation" value="<?php if(isset($_GET['designation']))echo $_GET['designation'];?>" placeholder="Veuillez saisir le nom du produit" required>
										<input type="text" name="article_achat_id" class="form-control  article_achat_id" value="<?php if(isset($_GET['article_achat_id']))echo $_GET['article_achat_id'];?>">
										<input type="text" name="article_vente_detail_id" class="form-control  article_vente_detail_id" value="<?php if(isset($_GET['id_entite']))echo $_GET['id_entite'];?>">
										<div class="div_liste_article"></div>
										<label>Prix unitaire</label>
										<input type="number" class="form-control input_txt article_achat_pu" placeholder="Prix unitaire" value="<?php if(isset($_GET['pu']))echo $_GET['pu'];?>" readOnly>
										<label>Quantité</label>
										<input type="number" name="article_detail_vente_quantite" class="form-control input_txt article_achat_qte" placeholder="Veuillez saisir la quantité" value="<?php if(isset($_GET['qte']))echo $_GET['qte'];?>">
										<input type="submit" class="form-control input_enregistrer btn_ajouter_article" value="Modifier">
									</div>
								</form>
							</div>

						</div>

							</div>
						</div>

						<!-- liste -->
						<div class="row" >
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="width:100%; overflow: scroll;">
							
							
						</div>
						
					</div>
					<br>
					<!--<input type="button" class="form-control input_enregistrer btn_enregistrer_vente" value="Enregistrer la commande">-->


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
				$.post('../controlers/afficher_entite.php?nom_entite=article_achat&page=afficher_achat',{article_designation:article_designation},function(donnee){
					$('.div_liste_article').html(donnee);
				});
				return false;
			}
			setInterval(afficher_liste_article, 1000);

			$('.article_designation').click(function(){
				$('.div_liste_article').toggle();
			})

			let i = 1;
			let pt;
			let ptg = 0;
			let article_vente_detail = '';
			let jsonPart = '';

            

			$('.btn_enregistrer_vente').click(function(){
				$.post('../controlers/enregistrer_article_vente.php',{article_vente_detail:article_vente_detail});
				$('.tbody_liste_vente').empty();
				$('.input_total').hide();
				$('.input_total').val("Enregistrement effectué.");
				$('.input_total').show(400);
				i = 0;
			});

		});

	</script>
</body>

</html>