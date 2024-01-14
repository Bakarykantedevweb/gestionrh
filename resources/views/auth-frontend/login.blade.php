<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>BIM sa | Login</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<a href="/" class="btn btn-primary apply-btn">Apply Job</a>
				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<a href="/"><img src="{{ asset('admin/assets/img/or.jpg') }}" alt="Dreamguy's Technologies"></a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Connexion</h3>
							<p class="account-subtitle">Access to our dashboard</p>

							<!-- Account Form -->
							<form action="{{ url('login-candidat') }}" method="POST">
                                @csrf
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="">
												Forgot password?
											</a>
										</div>
									</div>
									<input class="form-control" type="password" name="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Se Connecter</button>
								</div>
								<div class="account-footer">
									<p>Vous n'avez pas de compte ? <a href="{{ url('register-candidat') }}">Creez un compte</a></p>
								</div>
							</form>
							<!-- /Account Form -->

						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('admin/assets/js/app.js') }}"></script>

    </body>
</html>
