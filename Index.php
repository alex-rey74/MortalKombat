<?php

require 'KingOfTheHill.php';

echo "Début du tournoi".PHP_EOL;

KingOfTheHill::tournament(2);

echo "GRAND GAGNANT : ".KingOfTheHill::getWinnerName().PHP_EOL;
