<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Observation;
use App\Form\ObservationType;

class ObservationController extends AbstractController
{
    /**
     * @Route("/observation", name="app_observation")
     */
    public function index(): Response
    {
          $observation= new Observation();
        $form = $this->createForm(ObservationType::class, $observation);

        return $this->render('observation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
