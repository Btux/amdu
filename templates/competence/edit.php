<?php 
if(!isset($_SESSION['logged']['id'])){
  header('Location: login.php');
}
 ?>
<div class="competence">
   <div class="bloc-header">
       <h3><div class="container">Competence</div></h3>
   </div>
   <div class="container">
    <form action="competenceedit.php" method="Post">
        <div class="input-group">
               <label for="titre">Competence</label>
               <textarea name="content" cols="120" rows="150" style="height: 500px;"><?php echo $competence->content; ?></textarea>
               <?php if(isset($messageErreurs)): ?>
               <div class="input-error">
                   <?php echo (isset($messageErreurs['titre']))? $messageErreurs['titre']: ''; ?>
               </div>
               <?php endif; ?>
               <div class="input-help">
                   Decrivez vos competences.
               </div>
           </div>
           <button type="submit">Enregistrer</button>
    </form>
   </div> 
</div>
