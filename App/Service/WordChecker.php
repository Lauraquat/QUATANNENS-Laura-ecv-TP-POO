<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\LetterResult;

class WordChecker
{
    /* VERSION PHP 7 remplacée en PHP 8 par le code en dessous******
    private string $word;

    public function __construct(string $word)
    {
        $this->word = $word
    }
    */

    public function __construct(private string $word)
    {
    }

    public function check(string $testedWord): array
    {
        $testedWord = str_split(strtoupper($testedWord), 1);
        // en fait en php tu peux parcourir une chaine, comme en C, pas besoin de transformer.
        $word = str_split(strtoupper($this->word), 1);


        $result = [];

        // tu devrais boucler sur le mot cherché, sinon tu dépasses si je met un plus grand mot.
        foreach ($testedWord as $i => $letter) {
            // A chaque boucle, on créé un nouvel objet avec la nouvelle lettre
            $letterResult = new LetterResult();
            $letterResult->setLetter($letter);

            $result[$i] = $letterResult;

            // si on ne trouve pas la lettre du mot testé dans le tableau du mot à trouver
            if (!\in_array($letter, $word, true)) {
                // On met la lettre en rouge
                $letterResult->setColor('red');
                continue;
            }
            // Si l'index de la lettre contenue dans le mot à tester est le même que la lettre contenue dans le mot à trouver
            if ($testedWord[$i] === $word[$i]) {
                // On l'affiche en vert, car elle est bien placée
                $letterResult->setColor('green');
                continue;
            }

            // Sinon, on l'affiche en orange car elle est mal placée
            $letterResult->setColor('orange');
        }

        return $result;
    }
}
