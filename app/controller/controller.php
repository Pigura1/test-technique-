<?php
function generatePage(array $data)//definit la fonction create data 
{
    extract($data);//recupere les donees de data 

    ob_start();
    require_once $view;//demande la vue 
    $content = ob_get_clean();

    require_once $layout;//demande le layout 
}
