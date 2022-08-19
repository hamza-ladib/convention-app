<?php

namespace App\Controller;

use App\Entity\Secteur;
use App\Form\SecteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteurController extends AbstractController
{
    /**
     * @Route("/secteur/add", name="app_add_secteur")
     */
    public function index(Request $request): Response
{
        $secteur= new Secteur();
        $form = $this->createForm(SecteurType::class, $secteur);
       
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($secteur);
            $entityManager->flush();
            return $this->redirectToRoute('app_secteur');
            } 
            return $this->render('secteur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/secteur", name="app_secteur")
     */
    public function showAll(): Response
    {
        $secteur = $this->getDoctrine()
            ->getRepository(Secteur::class)
            ->findAll();
            return $this->render('secteur/default.html.twig', [
                'secteurs' => $secteur,
            ]);
        }
    







}