<?php

declare(strict_types=1);

//Permet à PHP de créer un fichier de session dés le lancement
session_start();

use App\Controller\MainController;

//fonction interne de PHP qui permet de "fouiller" dans tous les répertoires pour voir si on trouve les éléments.
//Ca permet d'éviter de mettre un require vers le fichier php DANS TOUTES LES CLASSES
spl_autoload_register(function($fqcn){
    //$fqcn est une variable php qui contient l'arborescence du projet

    //on remplace les \ par / pour que ça corresponde aux répertoires
    $path = str_replace('\\', '/', $fqcn);
    //On require once n'importe quel répertoire $path à la racine
    require_once(__DIR__.'/'.$path.'.php');
});

$controller = new MainController();

ob_start();
$controller->render();
$content = ob_get_clean();


echo $content;