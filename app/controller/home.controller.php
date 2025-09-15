<?php

require_once 'app/controller/controller.php';//requiert le fichier controller

function pageActivite()//definit la page 
{
    $data = [

        'page_title' => "environement rafraichissant",
        'view' => 'app/view/home.view.php',
        'layout' => 'app/view/common/layout.php',
    ];

    generatePage($data);//cree la page avec les donées mis plustot 
}
