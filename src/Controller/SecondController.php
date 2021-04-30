<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondController extends AbstractController
{
    #[Route('/second', name: 'second')]
    public function index(Request $request): Response
    {   $name=$request->query->get('name');
        dump($request);
        return $this->render('second/index.html.twig', [
            'controller_name' => 'SecondController',
            'esm' => $name,
        ]);
    }

    /**
     * @Route("/CV/{name}/{age}/{section}" , name="CV")
     */
    public function CV ($name,$age,$section): Response
    {
      return $this->render('second/cv.index.html.twig', array ('name' => $name , 'age' => $age , 'section'=>$section ,));
    }

    /**
     * @Route ("/helloSalma" , name ="HelloSalma")
     */
    public function HelloSalma(){
     return $this->forward('App\Controller\SecondController::CV', [
         'name' => "Salma",
         'age'=>"20",
         'section'=>"GL",
     ]);
    }
}
