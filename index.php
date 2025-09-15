<?php




$route = $_GET['route'] ?? 'home';//on est redirigé vers la page home qui contient les equipements 

switch ($route) {//creation de case qui établissent les liens 

    case 'home':
        require_once 'app/controller/home.controller.php';
        pageActivite();
        break;

    case 'fontaine':
        require_once 'app/controller/fontaine.controller.php';
        pagefontaine();
        break;

    case 'vert':
        require_once 'app/controller/vert.controller.php';
        pagevert();
        break;
}
