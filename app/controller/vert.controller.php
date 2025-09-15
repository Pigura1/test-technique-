<?php

require_once 'app/controller/controller.php';//requiert le fichier controller

function pagevert()//definit la page 
{
    $data = [

        'page_title' => "Espaces vert",
        'view' => 'app/view/vert.view.php',
        'layout' => 'app/view/common/layout.php',
    ];

    generatePage($data);//cree la page avec les donées mis plustot 
}
