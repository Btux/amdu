<div class="container">
	<section class="accroche">
		<h1>Que recherchez vous ?</h1>
		<?php echo htmlImage('images/code.png'); ?>
		
		<h3>Un développeur?</h3>
		<div class="contactlink">
		<?php echo htmlLink('Contactez-moi','contact.php',array('class' => 'button button-black')); ?>
		</div>
	</section>

	<section class="row badges">
		<div class="col-md-6 col-md-offset-3">
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/html.png'); ?>
			</div>
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/js.png'); ?>
			</div>
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/css.png'); ?>
			</div>
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/php.png'); ?>
			</div>
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/jquery.png'); ?>
			</div>
			<div class="col-xs-2 col-md-2">
				<?php echo htmlImage('images/badges/wp.png'); ?>
			</div>		
		</div>
	</section>
</div>
<!-- <section class="jumbo">
    <div class="container">
        <h5>Portofolio</h5>
        <div class="row">
        	<?php foreach ($portfolios as $portfolio): ?>
        		<div class="portofolio two columns">
        			<?php echo Image::resize($portfolio->miniature,225,145,array(), 100); ?>
        			<h4><?php echo $portfolio->titre; ?></h4>
        		</div>
        	<?php endforeach ?>
        </div>
        <div class="row">
        	<?php echo htmlLink('Portfolio >>','portfolio.php',array('class' => 'button button-portfolio u-pull-right')); ?>
        </div>
    </div>
</section>
 -->