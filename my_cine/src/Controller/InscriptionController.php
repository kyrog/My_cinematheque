<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Entity\Abonnement;
use App\Entity\FichePerso;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
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
        ->add('datenaissance', BirthdayType::class, [
            'widget' => 'choice',
            'label' => 'date de naissance'
        ])
        ->add('email', EmailType::class)
        ->add('adresse')
        ->add('ville')
        ->add('pays')
        ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($fiche);
            $manager->flush();

            $repository = $this->getDoctrine()->getRepository(Abonnement::class);
            $abo = $repository->find(1);

            
            $membre = new Membre();
            $membre->setAbo($abo)
            ->setDateAbo(new \DateTime())
            ->setDateInscription(new \DateTime())
            ->setFicheperso($fiche);


            $manager->persist($membre);

            $manager->flush();
            return $this->redirectToRoute('home'); // a modifier pour renvoyer sur la liste des membres

        }


        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
