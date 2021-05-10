<body class="hold-transition login-page">
	<div class="login-box">
	  	<div class="login-logo">
	    	<a href="<?= base_url(); ?>"><b>E-PO BOX</b></a>
	  	</div>
	  	<!-- /.login-logo -->
	  	<div class="card">
		    <div class="card-body login-card-body">
		      	<p class="login-box-msg">Login with your account</p>

		      	<form id="insert_login" method="POST" enctype="multipart/form-data">
			        <div class="input-group mb-3">
			          	<input type="email" name="user_email" class="form-control" placeholder="Email" required>
			          	<div class="input-group-append">
				            <div class="input-group-text">
				              	<span class="fas fa-envelope"></span>
				            </div>
			          	</div>
			        </div>
			        
			        <div class="input-group mb-3">
			          	<input type="password" name="user_password" class="form-control" placeholder="Password" required>
			          	<div class="input-group-append">
				            <div class="input-group-text">
				              	<span class="fas fa-lock"></span>
				            </div>
			          	</div>
			        </div>
			        <div class="row">
			          	<div class="col-8">
				            <div class="icheck-primary">
				              	<input type="checkbox" id="remember">
				              	<label for="remember">
				                	Remember Me
				              	</label>
				            </div>
			          	</div>
			          	<!-- /.col -->
			          	<div class="col-4">
			            	<button type="submit" class="btn btn-primary btn-block">Sign In</button>
			          	</div>
			          	<!-- /.col -->
			        </div>
		      	</form>
				<p class="mb-0">
					<a href="<?= base_url('Registration') ?>" class="text-center">Register a new membership</a>
				</p>
		    </div>
		    <!-- /.login-card-body -->
	  	</div>
	</div>
	<!-- /.login-box -->
</body>