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
label {
	font-weight: bold;
}
.input_enregistrer
{
	background-color: blue;
	color:#fff;
	font-weight: bold;
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
						<h1 class="h3 d-inline align-middle">Enregistrer une catégorie</h1>
						
					</div>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card">
								
								<form method="post" action="../controlers/enregistrer_categorie.php">
									<div class="card-body">
										<label>Désignation</label>
										<input type="text" class="form-control" placeholder="Veuillez saisir le nom de la catégorie" name="article_categorie_designation" required>
										
										<br>
										<input type="submit" class="form-control input_enregistrer" value="Enregistrer">
									</div>
								</form>
							</div>
						</div>

						


							</div>
						</div>

						<!-- liste -->
						<div class="row" style="overflow: scroll;">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex" style="width:120%;">
							<div class="card flex-fill">
								
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>N°</th>
											<th class="d-none d-xl-table-cell">Désignation</th>
											<th class="d-none d-md-table-cell">Enregistré le</th>
											<th class="d-none d-md-table-cell">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 

											$_GET['nom_entite'] = 'article_categorie';
											include '../controlers/afficher_entite.php';
											
										?>
										
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

</body>

</html>