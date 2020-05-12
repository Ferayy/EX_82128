<!doctype html>
<html lang="nl">
<head>
	<!-- Benodigde meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- Eigen CSS -->
	<link rel="stylesheet" href="../../CSS/login.css">

	<title> Inloggen | Admin </title>
</head>

<body>
	<!--- <h1> login </h1>
<form action="login.php" method="post">
<p>
<label for="username"> Username: </label>
<input type="text" name="username" id="username" required>
</p>
<p>
<label for="password"> Password: </label>
<input type="text" name="password" id="password" required>
</p>
<p>
<input type="submit" name="submit" id="submit" value="Log in">
</p>
</form> --->
	<div class="sidenav">
		<div class="login-main-text">
			<h2> Admin </h2>
		</div>
	</div>
	<div class="main">
		<div class="col-md-6 col-sm-12">
			<div class="login-form">
				<form action="../inlogverwerk/" method="POST" role="form" class="login-form">
					<div class="top-content">
						<div class="inner-bg">
							<div class="container">
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2 text"> </div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3 form-box">
										<div class="form-top">
											<div class="form-top-left">
												<h3> Log in </h3>
												<p> Voer uw gebruikersnaam en wachtwoord in om in te loggen! </p>
											</div>
											<div class="form-top-right"> <i class="fa fa-lock"></i> </div>
										</div>
											<div class="form-group">
												<p>
													<label class="sr-only" for="Gebruikersnaam"> Gebruikersnaam </label>
													<input type="text" name="Gebruikersnaam" id="Gebruikersnaam" placeholder="Voer uw gebruikersnaam in" required>
												</p>
											</div>
											<div class="form-group">
												<p>
													<label class="sr-only" for="Wachtwoord"> Wachtwoord </label>
													<input type="password" name="Wachtwoord" class="form-password form-control" id="Wachtwoord" placeholder="Voer uw wachtwoord in" required>
												</p>
											</div>
											<button type="submit" name="submit" class="btn btn-primary"> Inloggen </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>


	<!-- Optionele JavaScript -->
	<!-- JQuery, Popper, Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>