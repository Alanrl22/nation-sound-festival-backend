<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\ArtistFormType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index(Request $request): Response
    {

        // Enregistrer un artiste
        $artist = new Artist();

        $artistForm = $this->createForm(ArtistFormType::class, $artist);

        $artistForm->handleRequest($request);

        if ($artistForm->isSubmitted()) {

            if ($artistForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($artist);

                $em->flush();

                echo "Artiste enregistré";
            } else {
                echo "l'Artiste n'a pas été enregistré";
            }
        }

        // Afficher une liste d'artistes
        $artists = $this->getDoctrine()->getRepository(Artist::class)->findAll();


        return $this->render('artist/index.html.twig', [
            'artistForm' => $artistForm->createView(),
            'artists' => $artists
        ]);
    }


    // Modifier un Artiste 

    /**
     * @Route("artist/{id}/edit", name="artist_edit")
     * @param Artist $artist
     * @param Request $request
     * @return Response
     */
    public function editArtist($id, Request $request, EntityManagerInterface $entityManager)
    {

        $artist = $entityManager->getRepository(Artist::class)->find($id);
        $artistForm = $this->createForm(ArtistFormType::class, $artist);
        $artistForm->handleRequest($request);
        if ($artistForm->isSubmitted() && $artistForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('artist');
        }
        return $this->render("artist/edit.html.twig", [
            'artistForm' => $artistForm->createView(),
        ]);
    }

    // Supprimer un Artiste 












    /*
     * @return Response
     * @Route("/edit/{id}", name="artist_edit")
     
    public function editArtist($id, Request $request, EntityManagerInterface $entityManager) { 
        
        $artist = $entityManager->getRepository(Artist::class)->find($id);

        $artistForm = $this->createForm(ArtistFormType::class, $artist);
       
        $artistForm->handleRequest($request);

        if($artistForm->isSubmitted()){

            if($artistForm->isValid()){
                
                $entityManager= $this->getDoctrine()->getManager();
    
                $entityManager->flush();

                echo "Artiste modifié";
            } else{
                echo "l'Artiste n'a pas été enregistré";
            }

        }
    }
    */
}
