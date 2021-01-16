<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InteractiveMapController extends AbstractController
{
    /**
     * @Route("/interactive-map", name="interactive_map")
     */
    public function index(): Response
    {
        return $this->render('interactive_map/index.html.twig', [
            'controller_name' => 'InteractiveMapController',
        ]);
    }
}
