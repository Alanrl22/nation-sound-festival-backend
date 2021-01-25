<?php

namespace App\Controller;

use App\Entity\Festival;
use App\Form\FestivalFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FestivalController extends AbstractController
{
    /**
     * @Route("/festival", name="festival")
     */
    public function index(Request $request): Response
    {

                // Enregistrer un festival
                $festival = new Festival();

                $festivalForm = $this->createForm(FestivalFormType::class, $festival);
        
                $festivalForm->handleRequest($request);
        
                if ($festivalForm->isSubmitted()) {
        
                    if ($festivalForm->isValid()) {
        
                        $em = $this->getDoctrine()->getManager();
        
                        $em->persist($festival);
        
                        $em->flush();
        
                        echo "Festival créé";
                    } else {
                        echo "le Festival n'a pas été enregistré";
                    }
                }
        
                // Afficher une liste d'artistes
                $festivals = $this->getDoctrine()->getRepository(Festival::class)->findAll();



        return $this->render('festival/index.html.twig', [
            'festivalForm' => $festivalForm->createView(),
            'festivals' => $festivals
        ]);
    }
}
