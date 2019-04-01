<?php

namespace App\Controller;

use App\Entity\Salle;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleController extends AbstractController
{
    /**
     * @Route("/salle", name="salle")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Salle::class);
        $salle = $repo->findAll();


        return $this->render('salle/index.html.twig', [
            'salles' => $salle
        ]);
    }
}
