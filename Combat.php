<?php

require 'Character.php';

class Combat
{
    private $char1;
    private $char2;
    private $result;
    private $nbrRound = 0;

    public function __construct(Character $perso1, Character $perso2)
    {
        $this->char1 = $perso1;
        $this->char2 = $perso2;

    }

    public function getResult()
    {
        return $this->result;
    }

    public function getNbrRound()
    {
        return $this->nbrRound;
    }

    public function doCombat()
    {
        while (1) {
            $this->nbrRound++;

            if ($this->char1->hit($this->char2) == Character::SELF_HIT) {
                echo "Le personnage s'est frappé lui même ! " . PHP_EOL;
            } else {
                if ($this->char2->receiveDamages($this->char1->getStrength()) == Character::DEAD) {
                    $this->result = $this->char1;
                    break;
                }
            }

            if ($this->char2->hit($this->char1) == Character::SELF_HIT) {
                echo "Le personnage s'est frappé lui même ! " . PHP_EOL;
            } else {
                if ($this->char1->receiveDamages($this->char2->getStrength()) == Character::DEAD) {
                    $this->result = $this->char2;
                    break;
                }
            }

            $this->displayDmg();
        }
    }

    private function displayDmg()
    {
        echo "Fin du round : " . $this->nbrRound . PHP_EOL;
        echo $this->char1->getName() . " a subi un total de " . $this->char1->getDamages() . " dégats" . PHP_EOL;
        echo $this->char2->getName() . " a subi un total de " . $this->char2->getDamages() . " dégats" . PHP_EOL;
        echo "-------------------------------------" . PHP_EOL;
    }
}
