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
						<h1 class="h3 d-inline align-middle">Modifier une catégorie</h1>
						
					</div>
					<div class="row">
						<div class="col-12 col-lg-6" style="min-width:100%;">
							<div class="card">
								
								<form method="post" action="../controlers/modifier_categorie.php?article_categorie_id=<?php if(isset($_GET['id_entite']))echo $_GET['id_entite'];?>">
									<div class="card-body">
										<label>Désignation</label>
										<input type="text" class="form-control" placeholder="Veuillez saisir le nom de la catégorie" value="<?php if(isset($_GET['designation']))echo $_GET['designation'];?>" name="article_categorie_designation" required>
										<br>
										<input type="submit" class="form-control input_enregistrer" value="Modifier">
									</div>
								</form>
							</div>
						</div>

						


							</div>
						</div>

						<!-- liste -->
						
						
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