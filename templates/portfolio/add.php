<?php 
    if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
    }
?>
<div class="portfolios">
    <div class="bloc-header">
        <h3><div class="container">Portofolio</div></h3>
    </div>
    <div class="container">
        <?php if ($flash): ?>
            <?php foreach ($flash as $k => $v): ?>
                <div class="flash <?php echo $k; ?>">
                    <?php echo $v; ?>
                </div>
            <?php endforeach ?>  
        <?php endif ?>
        
        <form action="portfolioadd.php" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo (isset($messageErreurs['titre']))? 'has-error': ''; ?>">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="portfolioTitre" class="form-control" />
                <?php if(isset($messageErreurs)): ?>
                <div class="input-error">
                    <?php echo (isset($messageErreurs['titre']))? $messageErreurs['titre']: ''; ?>
                </div>
                <?php endif; ?>
                <div class="help-block">
                    Le nom du projet ou du site web réalisé.
                </div>
            </div>
            <div class="form-group <?php echo (isset($messageErreurs['miniature']))? 'has-error': ''; ?> ">
                <label for="miniature">Miniature</label>
                <input type="file" name="miniature" class="form-control" id="portfolioMiniature"/>
                <?php if(isset($messageErreurs)): ?>
                <div class="input-error">
                    <?php echo (isset($messageErreurs['miniature']))? $messageErreurs['miniature']: ''; ?>
                </div>
                <?php endif; ?>
                <div class="help-block">
                    une capture illustrative  de votre realisation
                </div>
            </div>
            <div class="form-group">
                <label for="">Etiquettes</label>
                <input type="text" name="etiquettes" id="portfolioEtiquette" class="form-control" />
                <div class="help-block">
                    Mettre des etiquettes pour les différentes techhnologies utilisés, chacune suivie d'une virgule
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <div class="help-block">
                    Decrire le projet, un petit résumé
                </div>
                <textarea name="description" id="portfolioDesccription" cols="80" rows="15" class="form-control"></textarea>
            </div>
            <div class="input-group">
                <button>Ajouter</button>
            </div>
        </form>
    </div>
    
</div>
