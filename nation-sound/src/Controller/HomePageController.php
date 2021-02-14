<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;

class HomePageController extends AbstractController
{
    /**
     * @Route("/accueil", name="home_page")
     */
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {

        $newUsers = $entityManager->getRepository(User::class)->findByRoles([]);

        $emptyRoles = [];
        foreach ($newUsers as $newUser) {
            $emptyRoles[] = count($newUser->getRoles());
        };

        $counts = array_count_values($emptyRoles);


        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'newUsers' => $counts[1]
        ]);
    }
}
