<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amadou Dieng - Portfolio</title>

    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <div id="portfolioApp">
        <?php if (isset($_SESSION['logged']['id'])): ?>
          <nav class="navbar navbar-default" role="navigation">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo htmlImage('images/ad-32.png');  ?> Amadou DIENG</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li>
                    <?php echo htmlLink('Accueil','index.php'); ?>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Competence</a>
                    <ul class="dropdown-menu" role="menu">
                      <li><?php echo htmlLink('Modifier mes competence','competenceedit.php'); ?></li>
                      <li><?php echo htmlLink('Voir mes compétences','competence.php'); ?></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Portfolio</a>
                    <ul class="dropdown-menu" role="menu">
                      <li><?php echo htmlLink('Ajouter une réalisation','portfolioadd.php'); ?></li>
                      <li><?php echo htmlLink('Toutes mes réalisations','portfolioall.php'); ?></li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                      <?php echo htmlLink('Deconnexion('.$_SESSION['logged']['pseudo'].')','deconnexion.php'); ?>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        <?php endif ?>
        <?php if (!isset($_SESSION['logged']['id'])): ?>
          <header class="navbar navbar-default en-tete" role="navigation">
                <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><?php echo htmlImage('images/ad-32.png');  ?> Amadou DIENG</a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                      <li><?php echo htmlLink('Accueil','index.php'); ?></li>
                      <li><?php echo htmlLink('Portfolio','portfolio.php'); ?></li>
                      <li><?php echo htmlLink('Competences','competence.php'); ?></li>
                      <li><?php echo htmlLink('Contact','contact.php'); ?></li>
                    </ul>
                  </nav><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
          </header>
        <?php endif ?>
        <section class="content">
            <?php echo $content; ?>
        </section>
        <footer>
            
        </footer>
    </div>
</body>
</html>