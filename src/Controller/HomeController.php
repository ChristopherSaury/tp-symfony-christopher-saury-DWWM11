<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homePage(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/reglement', name: 'reglement')]
    public function internalRegulation(): Response
    {
        return $this->render('home/regulation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
