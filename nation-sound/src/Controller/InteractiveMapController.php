<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InteractiveMapController extends AbstractController
{
    /**
     * @Route("/interactive-map", name="interactivemap")
     */
    public function index(): Response
    {
        return $this->render('interactivemap/index.html.twig', [
            'controller_name' => 'InteractiveMapController',
        ]);
    }
}
