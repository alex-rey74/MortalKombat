<?php

require 'Combat.php';

class KingOfTheHill
{
    const NBR_COMBAT = 10;

    private static $trWinner;
    private static $WinnerName;

    public static function getWinnerName()
    {
        return self::$WinnerName;
    }

    public static function tournament($tour = KingOfTheHill::NBR_COMBAT)
    {
        $perso1 = new Character();

        for ($i = 0; $i < $tour; $i++) {
            echo "tour : " .$i.PHP_EOL;
            $perso2 = new Character();

            if ($i == 0) {
                $cmbt = new Combat($perso1, $perso2);
            } else {
                $cmbt = new Combat(self::$trWinner, $perso2);
            }
            $cmbt->doCombat();

            self::$trWinner = $cmbt->getResult();
            self::$trWinner->setDamages(0);

            echo "-----------------------------------------------> Gagnant de ce duel : " . self::$trWinner->getName(). PHP_EOL;
        }
        self::$WinnerName = self::$trWinner->getName();
    }
}