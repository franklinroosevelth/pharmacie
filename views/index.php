<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Gestion pharmacie</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenue dans le logiciel de gestion des produits pharmaceutiques
								
							</h1>
							<p class="lead">
								Connectez-vous pour accéder aux fonctionnalités de l'application
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									
									<form method="post" action="../controlers/se_connecter.php">
										<div class="mb-3">
											<label class="form-label">Code</label>
											<input class="form-control form-control-lg" type="number" name="pseudo" placeholder="Saisissez le code" />
										</div>
										<div class="mb-3">
											<label class="form-label">Mot de passe</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Saisissez le mot de passe" />
											
										</div>
										<?php if(isset($_SESSION['message']))echo '<label class="lbl_login">'.$_SESSION['message'].'</label>'; ?>
										<div class="text-center mt-3">
											<!--<a href="dashboard.html" class="btn btn-lg btn-primary">Se connecter</a>-->
											<button type="submit" class="btn btn-lg btn-primary">Accéder</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

	<script src="js/jquery.min.js"></script>
	<script>
	
		$(document).ready(function()
		{
			setInterval(function(){
				$('.lbl_login').remove();
			}, 2000);
		});

	</script>
</body>

</html>