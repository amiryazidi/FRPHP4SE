<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
       return  $this->render('home/index.html.twig');
    }

    #[Route('/show', name: 'show')]
    public function show(): Response
    {
       return new Response('<h1> hello 4se3 </h1>');
    }
    #[Route('/json', name: 'json')]
    public function show2(): Response
    {
       return new JsonResponse('hello');
    }

}
