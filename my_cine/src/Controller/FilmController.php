<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Genre;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class FilmController extends Controller
{
    /**
     * @Route("/film/add", name="film_add")
     */
    public function addFilm(Request $request, ObjectManager $manager){

        $film = new Film();
        $form = $this->createFormBuilder($film)
        ->add('titre')
        ->add('resume')
        ->add('sortie', BirthdayType::class)
        ->add('dureemin', IntegerType::class)
        ->add('genre', EntityType::class, [
            'class' => Genre::class, 
            'choice_label' => 'nom'])
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($film);
            $manager->flush();    
            
            return $this->redirectToRoute('home'); // a modifier pour renvoyer sur la liste des membres
        }
    

       return $this->render('film/addFilm.html.twig', [
        'form' => $form->createView()

    ]);
    }
    /**
     * @Route("/film/{id}", name="show_film")
     */
    public function index($id)
    {
        $repo = $this->getDoctrine()->getRepository(Film::class);
        $film = $repo->Find($id);

        if (!$film) {
            return $this->render('error/404.html.twig');
        }

        return $this->render('film/index.html.twig', [
            'film' => $film
        ]);
    }

    /**
     * @Route("/film", name="film_list")
    */

    public function filmList(Request $request){

        $repo = $this->getDoctrine()->getRepository(Film::class);
        $query = $repo->createQueryBuilder('f');
        
        if ($request->query->has('title')) {
        $query = $query->where('f.titre LIKE :title')->setParameter('title', "%".$request->query->get('title')."%");
        }

        $paginator = $this->get("knp_paginator");

        $films = $paginator->paginate($query->getQuery(), $request->query->getInt('page', 1), 10);

       return $this->render('film/listFilm.html.twig', [
            'films' => $films
        ]);
    }

    
}
