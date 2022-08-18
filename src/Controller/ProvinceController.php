<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Province;
use App\Form\ProvinceType;


class ProvinceController extends AbstractController
{
    /**
     * @Route("/province", name="app_province")
     */
    public function index(): Response
    {
        $province= new Province();
        $form = $this->createForm(ProvinceType::class, $province);
        return $this->render('province/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
