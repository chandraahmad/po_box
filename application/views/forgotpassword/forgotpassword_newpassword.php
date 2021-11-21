<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="<?= base_url() ?>"><b>Renew Your Password</b></a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Input new password</p>
				<form id="update_forgotpassword" method="post" enctype="multipart/form-data">
					<div class="input-group mb-3">
                        <input type="hidden" name="user_id" value="<?= $getByIdUser->user_id ?>" required>
						<input type="password" name="user_password1" class="form-control" placeholder="Create New Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="user_password2" class="form-control" placeholder="Retype New password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
						</div>
						<div class="col-6">
							<button type="submit" class="btn btn-primary btn-block">Update Password</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('Login') ?>" class="text-center">Back to Login</a>
			</div>
		</div>
	</div>
</body>