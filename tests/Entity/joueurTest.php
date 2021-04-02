<?php

namespace App\Tests\Entity;

use PhpParser\Builder\Class_;
use PHPUnit\Framework\TestCase;

use App\Entity\Joueur;

Class RecipeTest extends TestCase
{
    public function testDureeJoueur()
    {
        $joueur = new Joueur();
        $joueur->setDateEntree(new \DateTime("2021-04-01"));

        $dateAAvoir = $joueur->dureeJoueur();

        $this->assertEquals(1,$dateAAvoir);
    }
}