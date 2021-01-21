<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index(Request $resquet): Response
    {
        $artist = new Artist();

        $artistForm = $this->createForm(ArtistFormType::class, $artist);

        $artistForm->handleRequest($resquet);

        if($artistForm->isSubmitted()){

            $em= $this->getDoctrine()->getManager();

            $em->persist($artist); 

            $em->flush();

            return New Response('Artiste ajouté');

        }

        return $this->render('artist/index.html.twig', [
            'artistForm' => $artistForm->createView(),
        ]);
    }
}