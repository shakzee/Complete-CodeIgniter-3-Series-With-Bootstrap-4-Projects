<header class="masthead" style="background-image: url('<?php echo base_url('assets/images/home-bg.jpg')?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Clean Blog</h1>
					<span class="subheading">A Blog Theme by Start Bootstrap</span>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<?php if(!empty($blogs)): ?>
			<?php foreach($blogs->result() as $myblog):?>
				<div class="post-preview">
				<a href="<?php echo site_url('blog/readBlog/'.$myblog->bId)?>">
					<h2 class="post-title">
						<?php echo $myblog->bTitle;?>
					</h2>
				</a>
					<div class="dcon">
						<?php echo $myblog->bBody;?>
					</div>
				<p class="post-meta">Posted by
					<a href="#">
						<?php echo $myblog->fullName;?>
					</a>
					<?php echo date('D m Y',strtotime($myblog->bDate));?>
				</p>
			</div>
			<?php endforeach;?>
			<?php else: ?>
				Blogs not found.
			<?php endif; ?>
			<hr>

			<hr>
			<!-- Pager -->
			<div class="clearfix">
				<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
			</div>
		</div>
	</div>
</div>

<hr>
