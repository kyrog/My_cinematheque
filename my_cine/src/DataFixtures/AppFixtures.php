<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Film;
use App\Entity\Genre;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genre = new Genre();
        $genre->setNom("drame");
        $manager->persist($genre);
        // $repository = $manager->getDoctrine()->getRepository(Genre::class);

        for($i = 0; $i < 10; $i++){
             $film = new Film();
            $film->setTitre("titre n°$i")
            ->setDureeMin(120)
            ->setResume("resume n°$i")
            ->setSortie(new \DateTime())
            ->setGenre($genre);
            $manager->persist($film);
        }
       

        $manager->flush();
    }
}
