<?php

declare(strict_types=1);

require_once('./TestedWord.php');

$word = str_split("voiture", 1);

foreach($testedWord as $letter){   
    //si on ne trouve pas la lettre du mot testé dans le tableau du mot à trouver
    if(!in_array($letter, $word)){
        //On met la lettre en rouge
        echo "<span style='font-size: 20px; background-color:red; padding: 10px; margin:10px;'>$letter</span>";
    }else{
        //Si la clé de la lettre contenue dans le mot à tester est la même que la lettre contenue dans le mot à trouver
        if(array_search($letter, $testedWord) == array_search($letter, $word)){
            //On l'affiche en vert, car elle est bien placée
            echo "<span style='font-size: 20px; background-color:green; padding: 10px; margin:10px;'>$letter</span>";
        }else{
            //Sinon, on l'affiche en orange car elle est mal placée
            echo "<span style='font-size: 20px; background-color:orange; padding: 10px; margin:10px;'>$letter</span>";

        }
    }
};


echo "<a href='../index.html'>Retenter";