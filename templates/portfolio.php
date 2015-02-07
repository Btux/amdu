<div class="portfolios">
	<div class="page-header">
	    <h1><div class="container">Portfolio</div></h1>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($portfolios as $portfolio): ?>
				<div class="col-md-3 portfolio">
					<div class="portfolio-entry">
						<div class="portfolio-img">
							<?php echo Image::resize($portfolio->miniature,294,205,array(), 100); ?>
						</div>
						<div class="portfolio-desc">
							<h3><?php echo $portfolio->titre; ?></h3>
							<p><?php echo html_entity_decode($portfolio->description); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="row">
			<div class="col-md-offset-4">
				<?php echo paginate('portfolio.php','?p=',$nbPages,$pageCourante); ?>
			</div>
		</div>
	</div>
</div>