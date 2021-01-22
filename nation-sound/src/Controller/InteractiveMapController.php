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

                echo 'Scène ajoutée';
            } else {
                var_dump("Scène non valide");
            }
        }

        $stageRepo = $entityManager->getRepository(Stage::class);
        $all_stages = $stageRepo->findAll();

        return $this->render('interactive_map/index.html.twig', [
            'stageForm' => $stageForm->createView(),
            'stages' => $all_stages,
        ]);
    }

    // /**
    //  * @Route("/interactive-map/{id}", name="stage_show")
    //  */
    // public function show(int $id, StageRepository $stageRepository): Response
    // {
    //     $one_stage = $stageRepository
    //         ->find($id);

    //     return $this->render('interactive_map/index.html.twig', [
    //         'stage' => $one_stage
    //     ]);
    // }
}
