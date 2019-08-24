</head>
    <body>


	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">Project</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.html">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="post.html">Sample Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.html">Contact</a>
					</li>
					<?php if(!$this->session->userdata('uId')):?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('login')?>">Log in</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('signup')?>">Sign up</a>
						</li>
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('blog/newblog')?>">New Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('login/logout')?>">Log out</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
