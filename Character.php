<?php

class Character{
    private $name;
    private $names = ['Pierre', 'Paul', 'Jacques', 'Michel', 'Georges', 'Jérémy', 'Simon', 'Valentin', 'Alexandre', 'Thomas', 'Lucas'];
    private $strength;
    private $damages= 0;

    const DEAD = 0;
    const ALIVE = 1;
    const SELF_HIT = 2;
    const HIT = 3;

    const MAX_DAMAGE = 100;

    public function __Construct(){
        $this->name = $this->names[rand(0, count($this->names)-1)];
        $this->strength = rand(1,25);
        $this->damages;
    }

    public function getName(){
        return $this->name;
    } 

    public function getStrength(){
        return $this->strength;
    }

    public function getDamages(){
        return $this->damages;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setStrength(int $strength){
        $this->strength = $strength;
    }

    public function setDamages(int $damages){
        $this->damages = $damages;
    }

    public function hit(Character $char){
        if($this == $char){
            return self::SELF_HIT;
        }
        else{
            return self::HIT;
        }
    }

    public function receiveDamages(?int $dmg){

        $this->damages += $dmg;

        if($this->damages >= self::MAX_DAMAGE){
            return self::DEAD;
        }
        else{
            return self::ALIVE;
        }
    }
}