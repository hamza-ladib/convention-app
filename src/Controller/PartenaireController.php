<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Partenaire;
use App\Form\PartenaireType;

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="app_partenaire")
     */
    public function index(): Response

    {
        $partenaire= new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);

        return $this->render('partenaire/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
