


<header class="masthead" style="background-image: url('<?php echo base_url('assets/images/home-bg.jpg')?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Log in</h1>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<div class="form-group">
				<?php echo validation_errors(); ?>
				<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); }?>
			</div>

			<form action="<?php echo site_url('login/checkUser'); ?>" method="post">
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Enter Your email">
				</div>

				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Enter Your password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Login
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

<hr>
