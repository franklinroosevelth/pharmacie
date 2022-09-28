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
			font-size : 17px;
			height: 30px;
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
						<h3 class="h4 d-inline align-middle">Détail de la vente n° <?php if(isset($_GET['id_entite']))echo strtoupper($_GET['id_entite']);?></h3>
					</div>
					<div class="row">
							</div>
						</div>

						<!-- liste -->
						<div class="row" >
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="min-width:100%;">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>N°</th>
											<th class="d-none d-xl-table-cell">Produit</th>
                                            <th class="d-none d-xl-table-cell">Fabricant</th>
											<th class="d-none d-md-table-cell">PU</th>
											<th class="d-none d-md-table-cell">En franc</th>
                                            <th class="d-none d-md-table-cell">Qte</th>
                                            <th class="d-none d-md-table-cell">PT</th>
											<th class="d-none d-md-table-cell">En franc</th>
                                            <th class="d-none d-md-table-cell">Date et heure</th>
											<th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$_GET['nom_entite'] = 'article_vente_detail';
                                        
										include '../controlers/afficher_entite.php';?>
										
									</tbody>
								</table>
                                <tr><td><input type="button" class="input_total" value="Total général payé : <?php echo $ptg; ?> USD"></td></tr>
							</div>
						</div>
					</div>
					</div>
				</div>
				<?php include 'footer.php';?>
		</div>
	</div>
	<script src="js/app.js"></script>

</body>

</html>