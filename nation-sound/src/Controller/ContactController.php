<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        // Enregistrer un contact
        $contact = new Contact();

        $contactForm = $this->createForm(ContactFormType::class, $contact);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted()) {

            if ($contactForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($contact);

                $em->flush();

                echo "contact enregistré";
            } else {
                echo "le contact n'a pas été enregistré";
            }
        }

        // Afficher une liste de contacts
        $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();


        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
            'contacts' => $contacts
        ]);
    }
}
