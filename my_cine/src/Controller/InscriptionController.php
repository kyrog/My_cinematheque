<?php

namespace App\Controller;

use App\Entity\FichePerso;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, ObjectManager $manager)
    {

        $fiche = new FichePerso();

        $form = $this->createFormBuilder($fiche)
        ->add('prenom')
        ->add('nom')
        ->add('datenaissance', DateType::class, [
            'widget' => 'choice',
        ]) // date sans l heure
        ->add('email', EmailType::class)
        ->add('adresse')
        ->add('ville')
        ->add('pays')
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($fiche);
            $manager->flush();
        }


        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}