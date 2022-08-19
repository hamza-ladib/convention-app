<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Convention;
use App\Form\ConventionType;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(): Response
    {
        $convention= new Convention();
        $form = $this->createForm(ConventionType::class, $convention);
        return $this->render('convention/index.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
}
