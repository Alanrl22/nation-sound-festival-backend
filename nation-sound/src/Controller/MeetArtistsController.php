<?php

namespace App\Controller;

use App\Entity\Meeting;
use App\Form\MeetingFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetArtistsController extends AbstractController
{
    /**
     * @Route("/meeting", name="meet_artists")
     */
    public function index(Request $request): Response
    {
       // Enregistrer un meeting
       $meeting = new Meeting();

       $meetingForm = $this->createForm(MeetingFormType::class, $meeting);

       $meetingForm->handleRequest($request);

       if ($meetingForm->isSubmitted()) {

           if ($meetingForm->isValid()) {

               $em = $this->getDoctrine()->getManager();

               $em->persist($meeting);

               $em->flush();

               echo "meeting enregistré";
           } else {
               echo "le meeting n'a pas été enregistré";
           }
       }

       // Afficher une liste de meetings
       $meetings = $this->getDoctrine()->getRepository(Meeting::class)->findAll();


       return $this->render('meeting/index.html.twig', [
           'meetingForm' => $meetingForm->createView(),
           'meetings' => $meetings
       ]);
    }
}
