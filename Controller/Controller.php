<?php

declare(strict_types=1);

function getTestedWord(){
    if(!empty($_POST['testedWord'])){
        $testedWord = $_POST['testedWord'];
        $testedWord = str_split($testedWord, 1);
    }else{
        echo "Vous devez saisir un mot"; 
        echo "<br/> <a href='index.html'>Retenter";
        die;
    }
    return $testedWord; 
}

getTestedWord();