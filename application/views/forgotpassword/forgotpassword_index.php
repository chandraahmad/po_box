<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="<?= base_url() ?>"><b>Forgot the password</b></a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Input your email for verification it's you</p>
				<form id="insert_forgotpassword" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
						<input type="email" name="user_email" class="form-control" placeholder="Your Email Address" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Send</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('Login') ?>" class="text-center">Back to Login</a>
			</div>
		</div>
	</div>
</body>