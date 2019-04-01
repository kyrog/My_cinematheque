<?php

namespace App\Controller;

use App\Entity\Membre;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MembreController extends Controller
{
    /**
     * @Route("/membre", name="list_membre")
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(Membre::class);
        $membre = $repo->findAll();


        return $this->render('membre/index.html.twig', [
            'membres' => $membre
        ]);
        
    }

     /**
     * @Route("/membre/{id}", name="fiche_membre")
     */
    public function detail_membre($id){

        $repo = $this->getDoctrine()->getRepository(Membre::class);
        $membre = $repo->Find($id);

        if (!$membre) {
            return $this->render('error/404.html.twig');
        }
     
            return $this->render('membre/detailMembre.html.twig', [
            'membre' => $membre
            ]);
    }

}
