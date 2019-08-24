<header class="masthead" style="background-image: url('<?php echo base_url('assets/images/home-bg.jpg')?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Blog</h1>
					<span class="subheading">New blog</span>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form action="<?php echo site_url('blog/addblog'); ?>" method="post" id="" class="">
				<div class="form-group">
					<label>Blog title</label>
					<input type="text" name="btitle" class="form-control" placeholder="Enter your blog title">
				</div>
				<div class="form-group">
					<label>Blog body</label>
					<textarea name="bbody" class="form-control" placeholder="Blog body.." cols="10" rows="10">

					</textarea>
				</div>
				<div class="form">
					<button class="btn btn-primary" type="submit">Add blog</button>
				</div>
			</form>
		</div>
	</div>
</div>
