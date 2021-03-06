<?php


namespace Hyperdrive\Quests;


use Hyperdrive\Entity\Person;
use Hyperdrive\Entity\Players\Player;
use Hyperdrive\Traps\Trap;
use Hyperdrive\Interfaces\TasksInterface;
use Hyperdrive\Ship\SpaceShip;

class VisitPlanets implements TasksInterface
{
    private int $countPlanet = 0;

    public function choosePrize(SpaceShip $ship, Person $person)
    {
        $bonus = new Trap();
        $bonus->getAward($ship, $person);
    }

    public function missionStatement(SpaceShip $ship, Person $person, Player $player)
    {
        if ($this->countPlanet == 5) {
            echo "\nYou've visited 5 planets (exp +200)\n";
            $player->setExp(200);
            $this->choosePrize($ship,$person);
            $this->countPlanet = 0;
        }
    }

    public function getCountPlanet(): int
    {
        return $this->countPlanet;
    }

    public function setCountPlanet(int $countPlanet): void
    {
        $this->countPlanet += $countPlanet;
    }


}