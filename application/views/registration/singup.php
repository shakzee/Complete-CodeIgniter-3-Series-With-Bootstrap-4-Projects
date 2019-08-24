




<header class="masthead" style="background-image: url('<?php echo base_url('assets/images/home-bg.jpg')?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Sign up</h1>
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

			<form action="<?php echo site_url('signup/newUser'); ?>" method="post">
				<div class="form-group">
					<input type="text" name="fullName" class="form-control" placeholder="Enter Your Name">
				</div>
				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Enter Your email">
				</div>

				<div class="form-group">
					<input type="text" name="password" class="form-control" placeholder="Enter Your password">
				</div>
				<div class="form-group">
					<input type="text" name="conPassword" class="form-control" placeholder="Enter Your confirm Password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Signup Now
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

<hr>
