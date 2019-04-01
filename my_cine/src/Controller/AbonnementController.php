<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement", name="abonnement")
     */
    public function index()
    {
        return $this->render('abonnement/index.html.twig', [
            'controller_name' => 'AbonnementController',
        ]);
    }
}
