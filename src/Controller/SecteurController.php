<?php

namespace App\Controller;

use App\Entity\Secteur;
use App\Form\SecteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecteurController extends AbstractController
{
    /**
     * @Route("/secteur", name="app_secteur")
     */
    public function index(): Response
    {
        $secteur= new Secteur();
        $form = $this->createForm(SecteurType::class, $secteur);
        return $this->render('secteur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
