<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\WordChecker;

class MainController
{
    public const WORD = 'voiture';

    public function render(): void
    {
        if (empty($_POST)) {
            echo file_get_contents(__DIR__.'/../../index.html');
            return;
        }

        if (!empty($_POST['testedWord'])) {
            $wordChecker = new WordChecker(self::WORD);

            $this->displayResult($wordChecker->check($_POST['testedWord']));
        } else {
            $this->displayEmptyField();
        }


        echo file_get_contents(__DIR__.'/../../index.html');
    }

    private function displayResult(array $result): void
    {
        echo 'Résultat :';

        // Pour chaque resultat calculé dans letterResult (lettre + couleur associée), on va chercher les données dans la classe WordChecker
        foreach ($result as $letterResult) {
            printf('<span style="font-size: 20px; background-color:%s; padding: 10px; margin:10px;">%s</span>', $letterResult->getColor(), $letterResult->getLetter());
        }
    }

    private function displayEmptyField(): void
    {
        echo 'Vous devez saisir un mot';
        echo "<br/> <a href='../index.php'>Retenter";
        exit;
    }
}
