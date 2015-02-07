<?php 
    if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
    }
?>
<div class="portfolios">
	<div class="page-header">
	    <h1><div class="container">Portfolio</div></h1>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($portfolios as $portfolio): ?>
				<div class="col-md-3 portfolio">
						<div class="pull-right">
							<?php 
								echo htmlLink('Modifier','portfolioedit.php?id='.$portfolio->id);
								echo htmlLink('Supprimer','portfoliodelete.php?id='.$portfolio->id);
							 ?>
						</div>
						<div class="portfolio-img">
							<?php echo Image::resize($portfolio->miniature,294,205,array(), 100); ?>
						</div>
						<div class="portfolio-des">
							<h3><?php echo $portfolio->titre; ?></h3>
						</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="row">
			<div class="col-md-offset-4">
				<?php echo paginate('portfolioall.php','?p=',$nbPages,$pageCourante); ?>
			</div>
		</div>
	</div>
</div>