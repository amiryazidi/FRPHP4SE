<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        $user=[
            ['id' => 1, 'name'=>'ali','email'=>'ali@gmail.com', 'age'=>25,"image"=>'https://www.w3schools.com/w3images/avatar2.png'],
            ['id' => 2,'name'=>'reza','email'=>'reza@esprit.tn', 'age'=>30,"image"=>'https://www.w3schools.com/w3images/avatar2.png'],
            ['id' => 3,'name'=>'mohammad','email'=>'mohammad@hotmail.com', 'age'=>35,"image"=>'https://www.w3schools.com/w3images/avatar2.png'],
            ['id' => 4,'name'=>'sara','email'=>'sara@esprittn', 'age'=>20,"image"=>'https://www.w3schools.com/w3images/avatar2.png'],
        ];
        return $this->render('user/index.html.twig',['users'=>$user]);
    }

    #[Route('/list2/{name}', name: 'list2')]
    public function list2($name): Response
    {
        return $this->render('user/index.html.twig',['name'=>$name]);
    }
}
