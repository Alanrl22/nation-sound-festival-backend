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

class ApiController extends AbstractController
{
    /**
     * @Route("/api/artist", name="api_artist")
     */
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Filtrer selon le GET dans l'URL artist?bigArtist=1
        $bigArtist = $request->get('bigArtist');

        /** @var ArtistRepository */
        $artistRepository = $entityManager->getRepository(Artist::class);
        $artists= $artistRepository->findByFilter($bigArtist);

        // Récupérer la liste de tous les artistes
        // $artists = $entityManager->getRepository(Artist::class)->findAll();

        $arrayArtists = $this->artistToArray($artists);

        // Renvoie le tableau dans un json
        return $this->json($arrayArtists);
    }

    private function artistToArray($artists) 
    {
        $arrayArtists = [];
        foreach($artists as $artist) {
            $arrayArtists[] = [
                'name' => $artist->getName(),
                'description' => $artist->getDescription(),
                'image' => $artist->getImage(),
                'bigArtist' => $artist->isBigArtist(),
                // 'musicStyle' => $artist->getMusicStyle()->getName(),
            ];
        }

        return $arrayArtists;
    }
}
