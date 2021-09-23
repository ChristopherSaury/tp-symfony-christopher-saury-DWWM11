<?php

namespace App\Controller;

use App\Entity\Prof;
use App\Form\ProfType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfController extends AbstractController
{
    #[Route('/ajouter-prof', name: 'ajouter-prof')]
    public function ajouterProf( Request $request ,EntityManagerInterface $em): Response
    {
        $prof = new Prof;
        $formulaire = $this->createForm(ProfType::class, $prof);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted() && $formulaire->isValid()){
            $em->persist($prof);
            $em->flush();

            return $this->redirectToRoute('home');
        }else {

            return $this->render('prof/ajouter-prof.html.twig', [
                'controller_name' => 'ProfController',
                'type' => 'Ajouter',
                'profForm' => $formulaire->createView()
            ]);
        }
    }
}
