<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageFormType;
use App\Repository\StageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InteractiveMapController extends AbstractController
{
    /**
     * @Route("/interactive-map", name="interactive_map")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stage = new Stage();

        $stageForm = $this->createForm(StageFormType::class, $stage);

        $stageForm->handleRequest($request);

        if ($stageForm->isSubmitted()) {

            if ($stageForm->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($stage);

                $em->flush();

                $this->addFlash('success', 'Point d\'intérêt ajouté !');
            } else {
                $this->addFlash('error', 'Erreur !');
            }
        }

        $stageRepo = $entityManager->getRepository(Stage::class);
        $all_stages = $stageRepo->findAll();

        return $this->render('interactive_map/index.html.twig', [
            'stageForm' => $stageForm->createView(),
            'stages' => $all_stages,
        ]);
    }


    // Modifier un POI 

    /**
     * @Route("interactive-map/{id}", name="stage_edit")
     * @param Stage $stage
     * @param Request $request
     * @return Response
     */
    public function editStage($id, Request $request, EntityManagerInterface $entityManager)
    {

        $stage = $entityManager->getRepository(Stage::class)->find($id);
        
        $stageForm = $this->createForm(StageFormType::class, $stage);
        
        $stageForm->handleRequest($request);
        
        if ($stageForm->isSubmitted() && $stageForm->isValid()) {
        
            $entityManager = $this->getDoctrine()->getManager();
        
            $entityManager->flush();

            $this->addFlash('success', 'Point d\'intérêt modifié !');
        } else {
            $this->addFlash('error', 'Erreur !');
        }


        // Afficher une liste de POI
        $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();


        return $this->render("interactive_map/index.html.twig", [
            'stageForm' => $stageForm->createView(),
            'stages' => $stages,
        ]);
    }

    // Supprimer un POI

    /**
     * @Route("/interactive-map/{id}/delete", name="stage_delete")
     * @param Stage $stage
     * @return RedirectResponse
     */
    public function deleteStage($id, Request $request, EntityManagerInterface $entityManager)
    {

        $stage = $entityManager->getRepository(Stage::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($stage);
        $entityManager->flush();

        return $this->redirectToRoute("interactive_map");
    }
}
