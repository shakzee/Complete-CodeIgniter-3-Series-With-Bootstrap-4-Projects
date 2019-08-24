<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url('assets/images/home-bg.jpg')?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>
						<?php echo $myblog[0]['bTitle']; ?>
					</h1>
					<span class="subheading"></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<?php echo $myblog[0]['bBody']; ?>
				<p class="post-meta">Posted by
					<a href="#">
						<?php echo $myblog[0]['fullName'] ;?>
					</a>
					<?php echo date('D m Y',strtotime($myblog[0]['bDate']));?>
				</p>
			</div>
	</div>
</article>
