<?php 
session_start();
$_SESSION['message'] = '';
include_once('../models/requete.php');
$RequeteEntite = new Requete_entite();
$devise_taux = $RequeteEntite->afficher_taux();
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
		.article_achat_id, .article_vente_qte, .devise_taux
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

				<h1 class="h3 d-inline align-middle">Enregistrer une vente</h1>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card" style="min-width:100%;">
								
								<form method="post" action="../controlers/enregistrer_article_achat.php">
									<div class="card-body">
										<input type="text" class="form-control article_designation input_txt article_designation" placeholder="Veuillez saisir le nom du produit" required>
										<input type="text" class="form-control  article_achat_id">
										<div class="div_liste_article"></div>
										<input type="text" class="form-control input_txt article_achat_pu" placeholder="Prix unitaire" readOnly>
										<input type="number" class="form-control input_txt article_achat_qte" placeholder="Veuillez saisir la quantité" >
										<input type="number" class="form-control input_txt article_vente_qte">
										<input type="number" class="form-control input_txt devise_taux">
										<input type="button" class="form-control input_enregistrer btn_ajouter_article" value="+ Ajouter">
									</div>
								</form>
							</div>

						</div>

							</div>
						</div>

						<!-- liste -->
						<div class="row" >
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="width:100%; overflow: scroll;">
							<div class="card flex-fill">
								<table class="table table-hover my-0"  style="overflow: scroll;">
									<thead>
									<tr>
											<th>N°</th>
											<th class="d-none d-xl-table-cell">Produit</th>
                                            <th class="d-none d-xl-table-cell">PU</th>
											<th class="d-none d-xl-table-cell">En franc</th>
											<th class="d-none d-md-table-cell">Qte</th>
                                            <th class="d-none d-md-table-cell">PT</th>
											<th class="d-none d-md-table-cell">En franc</th>
                                            <th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody class="tbody_liste_vente">
										<?php 
										$_GET['nom_entite'] = 'article_achat';
										//include '../controlers/afficher_entite.php';?>
										
									</tbody>
								</table>
								<tr><td><input type="button" class="input_total"></td></tr>
							</div>
							
						</div>
						
					</div>
					<br>
					<input type="button" class="form-control input_enregistrer btn_enregistrer_vente" value="Enregistrer la commande">


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

            $('.btn_ajouter_article').click(function(){
				qte_vente = $('.article_achat_qte').val();
				qte_dispo = $('.article_vente_qte').val();
				if(qte_dispo >= qte_vente)
				{
					
					if($('.article_designation').val() != '' && $('.article_achat_qte').val() != '')
					{
						const chaine = $('.article_achat_pu').val();
						const pu = chaine.split(" ");
						pt = $('.article_achat_qte').val()*pu[0];
						pt = Math.round(pt * 100) / 100;
						ptg += pt;
						const taux = $('.devise_taux').val();
						
						//tableau.push("<tr><td>"+i+"</td><td>"+$('.article_designation').val()+"</td><td>"+$('.article_achat_id').val()+"</td><td>"+$('.article_achat_pu').val()+"</td><td>"+$('.article_achat_qte').val()+"</td><td>"+pt+"</td><td><a>Supprimer</a></td></tr>");

						//$('.tbody_liste_vente').append(tableau.join(''));
						$('.tbody_liste_vente').append('<tr class="tr'+i+'"><td>'+i+'</td><td>'+$(".article_designation").val()+'</td><td>'+$(".article_achat_pu").val()+'</td><td>'+pu[0]*taux+' CDF</td><td>'+$(".article_achat_qte").val()+'</td><td>'+pt+' USD</td><td>'+pt*taux+' CDF</td><td><a>Supprimer</a></td></tr>');

						$('.input_total').hide();
						$('.input_total').val("Total général à payer : " + Math.round(ptg*100)/100 + " USD soit "+Math.round(ptg*100)/100*taux + " CDF");
						$('.input_total').show(400);

						if(i < 2)
						{
							jsonPart += '{"article_achat_id":"'+$('.article_achat_id').val()+'", "article_vente_detail_quantite":'+$('.article_achat_qte').val()+'}';
						}
						else
						{
							jsonPart += ',{"article_achat_id":"'+$('.article_achat_id').val()+'", "article_vente_detail_quantite":'+$('.article_achat_qte').val()+'}';
						}
						
						$('.article_designation').val('');
						$('.article_achat_id').val('');
						$('.article_achat_pu').val('');
						$('.article_achat_qte').val('');

						i++;
					}
					article_vente_detail = '{"article_vente_detail":[' + jsonPart + ']}';
					//article_vente_detail ='{ "article_vente_detail":[{"article_achat_id":"1", "article_vente_detail_quantite":50}, {"article_achat_id":"1", "article_vente_detail_quantite":70}]}  ';
				}
				else
				{
					$('.input_total').show(400);
					$('.input_total').val("La quantité à vendre doit être inférieure à la quantité disponible");
					setTimeout(() => {
						$('.input_total').hide(400);
					}, 4000);
				}

            });

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