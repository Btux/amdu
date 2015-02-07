<?php 
    if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
    }
?>
<div class="portfolios">
    <div class="page-header">
        <div class="container"><h1>Portofolio <small> - Modification d'une réalisation</small></h1></div>
    </div>
    <div class="container">
        <?php if ($flash): ?>
            <?php foreach ($flash as $k => $v): ?>
                <div class="flash <?php echo $k; ?>">
                    <?php echo $v; ?>
                </div>
            <?php endforeach ?>  
        <?php endif ?>
        
        <form action="portfolioedit.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="hidden" name="id" value="<?php echo (isset($form->id)) ? $form->id:''; ?>">
            </div>
            <div class="form-group <?php echo (isset($messageErreurs['titre']))? 'has-error': ''; ?>">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="portfolioTitre" value="<?php echo (isset($form->titre)) ? $form->titre:''; ?>" />
                <?php if(isset($messageErreurs)): ?>
                <div class="input-error">
                    <?php echo (isset($messageErreurs['titre']))? $messageErreurs['titre']: ''; ?>
                </div>
                <?php endif; ?>
                <div class="help-block">
                    Le nom du projet ou du site web réalisé.
                </div>
            </div>
            <div class="form-group <?php echo (isset($messageErreurs['miniature']))? 'has-error': ''; ?>">
                <label for="miniature">Miniature</label>
                <input type="file" name="miniature" id="portfolioMiniature" class="form-control" />
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
                <input type="text" name="etiquettes" class="form-control" id="portfolioEtiquette" value="<?php echo (isset($form->etiquettes)) ? $form->etiquettes:''; ?>"/>
                <div class="help-block">
                    Mettre des etiquettes pour les différentes techhnologies utilisés, chacune suivie d'une virgule
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" id="portfolioDescription" cols="80" rows="15"><?php echo (isset($form->description)) ? $form->description:''; ?></textarea>
                <div class="input-help">
                    Decrire le projet, un petit résumé
                </div>
            </div>
            <div class="input-group">
                <button>Ajouter</button>
            </div>
        </form>
    </div>
</div>