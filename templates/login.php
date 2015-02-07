<div class="login-form">
	<div class="login col-md-offset-4 col-md-3">
		<form action="login.php" method="post" accept-charset="utf-8">
			<h3>Connexion</h3>
			<?php if ($messageErreurs): ?>
				<div class="alert alert-danger" role="alert"><?php echo $messageErreurs ?></div>
			<?php endif ?>
			<div class="form-group">
				<label>Identifiant</label>
				<input type="text" name="pseudo" class="form-control">
			</div>
			<div class="form-group">
				<label>Mot de passe</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Connexion" class="btn btn-success">
			</div>
		</form>
	</div>
</div>