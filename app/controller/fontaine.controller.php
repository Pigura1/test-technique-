<?php

require_once 'app/controller/controller.php';//requiert le fichier controller

function pagefontaine()//definit la page 
{
    $data = [

        'page_title' => "fontaines à boire",
        'view' => 'app/view/fontaine.view.php',
        'layout' => 'app/view/common/layout.php',
    ];

    generatePage($data);//cree la page avec les donées mis plustot 
}
