<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Bar;
use App\Entity\Concert;
use App\Entity\Restauration;
use App\Entity\Stage;
use App\Entity\Wc;
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
        $artists = $artistRepository->findByFilter($bigArtist);

        // Récupérer la liste de tous les artistes
        // $artists = $entityManager->getRepository(Artist::class)->findAll();

        $arrayArtists = $this->artistToArray($artists);

        // Renvoie le tableau dans un json
        return $this->json($arrayArtists);
    }

    private function artistToArray($artists)
    {
        $lineUp = [];
        foreach ($artists as $artist) {
            $lineUp[] = [
                'artist' => $artist->getName(),
                'description' => $artist->getDescription(),
                'img' => $artist->getImage(),
                'bigArtist' => $artist->isBigArtist(),
                'type' => $artist->getMusicStyle()->getName(),
                'image' => $artist->getImage(),
            ];
        }

        return $lineUp;
    }


    /**
     * @Route("/api/lineup", name="api_lineup")
     */
    public function lineup(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Récupérer la liste de tous les artistes
        $concerts = $entityManager->getRepository(Concert::class)->findAll();

        $lineUp = [];
        foreach ($concerts as $concert) {
            $lineUp[] = [
                'concert' => $concert->getArtist()->getName(),
                'description' => $concert->getArtist()->getDescription(),
                'img' => $concert->getArtist()->getImage(),
                'bigArtist' => $concert->getArtist()->isBigArtist(),
                'type' => $concert->getArtist()->getMusicStyle()->getName(),
                'stage' => $concert->getStage()->getTitle(),
                'day' => $concert->getDay(),
                'hour' => $concert->getHour(),
            ];
        }


        // Renvoie le tableau dans un json
        return $this->json($lineUp);
    }


    /**
     * @Route("/api/map", name="api_map")
     */
    public function showMap(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Récupérer la liste de tous les artistes
        $stages = $entityManager->getRepository(Stage::class)->findAll();
        $wcs = $entityManager->getRepository(Wc::class)->findAll();
        $bars = $entityManager->getRepository(Bar::class)->findAll();
        $caterings = $entityManager->getRepository(Restauration::class)->findAll();

        $map = [];
        foreach ($stages as $stage) {
            $map[] = [
                'name' => $stage->getTitle(),
                'coordinates' => $stage->getCoordinates(),
                'category' => $stage->getCategory()->getName(),
            ];
        }

        foreach ($wcs as $wc) {
            $map[] = [
                'name' => $wc->getTitle(),
                'coordinates' => $wc->getCoordinates(),
                'category' => $wc->getCategory()->getName(),
                'gender' => $wc->getGender(),
                'number' => $wc->getNumber(),
                'company' => $wc->getCompany(),
            ];
        }

        foreach ($bars as $bar) {
            $map[] = [
                'name' => $bar->getTitle(),
                'coordinates' => $bar->getCoordinates(),
                'description' => $bar->getDescription(),
                'category' => $bar->getCategory()->getName(),
                'company' => $bar->getCompany(),
            ];
        }

        foreach ($caterings as $catering) {
            $map[] = [
                'name' => $catering->getTitle(),
                'coordinates' => $catering->getCoordinates(),
                'description' => $catering->getDescription(),
                'category' => $catering->getCategory()->getName(),
                'company' => $catering->getCompany(),
            ];
        }

        // Renvoie le tableau dans un json
        return $this->json($map);
    }
}
