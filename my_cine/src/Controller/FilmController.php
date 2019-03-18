<?php

namespace App\Controller;

use App\Entity\Film;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class FilmController extends Controller
{
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
