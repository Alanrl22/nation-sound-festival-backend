<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetArtistsController extends AbstractController
{
    /**
     * @Route("/meet-artists", name="meet_artists")
     */
    public function index(): Response
    {
        return $this->render('meet_artists/index.html.twig', [
            'controller_name' => 'MeetArtistsController',
        ]);
    }
}
