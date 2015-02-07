<?php
/**
 *  Permet de rendre la vue d'une template
 *
 * @Param templateName - String Template name
 * @Param layout - String - Choosen layout
 * @Return void
 */

function render ($templateName, $layout = false, $message = false,$form = false,$data = false)
{


    $templatePath = _ROOT_.'templates/'.strtolower($templateName).'.php';

    if(file_exists($templatePath))
    {
        $messageErreurs = isset($message['Erreur']) ? $message['Erreur']: '' ;
        $flash = isset($message['Flash']) ? $message['Flash'] : '';
        $form = isset($form) ? $form : '';
        
        if($data){
            extract($data);
        }

        $layoutPath = ($layout) ? _ROOT_.'layouts/'.strtolower($layout).'.php': _ROOT_.'layouts/default.php';

        if(file_exists($layoutPath)){

            ob_start();
                require $templatePath;
            $content = ob_get_clean();

            require $layoutPath;
        }
    }else{
        echo 'Le template n existe pas.';
    }
}