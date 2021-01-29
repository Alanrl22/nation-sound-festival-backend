<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Entity\Contact;
use App\Form\ConcertFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concert", name="concert")
     */
    public function index(Request $request): Response
    {

        // Enregistrer un concert
        $concert = new Concert();

        $concertForm = $this->createForm(ConcertFormType::class, $concert);

        $concertForm->handleRequest($request);

        if ($concertForm->isSubmitted()) {

            if ($concertForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($concert);

                $em->flush();

                $this->addFlash('success', 'Artiste enregistré !');

                if ($concert->getId()) {
                    return $this->redirect('concert/' . $concert->getId());
                }
            } else {
                echo "l'Artiste n'a pas été enregistré";
            }
        }

        // Afficher une liste d'artistes
        $concerts = $this->getDoctrine()->getRepository(Concert::class)->findAll();


        return $this->render('concert/index.html.twig', [
            'concertForm' => $concertForm->createView(),
            'concerts' => $concerts,
        ]);
    }
}
