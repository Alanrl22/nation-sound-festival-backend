<?php

namespace App\Controller;

use App\Entity\Bar;
use App\Entity\Stage;
use App\Entity\Wc;
use App\Form\PoiFormType;
use App\Form\StageFormType;
use App\Form\WcFormType;
use App\Repository\StageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InteractiveMapController extends AbstractController
{
    // Create POI

    /**
     * @Route("/poi", name="interactive_map")
     */
    public function editPoi(Request $request, EntityManagerInterface $entityManager)
    {
        $poiForm = $this->createForm(PoiFormType::class);

        $poiForm->handleRequest($request);

        if ($poiForm->isSubmitted()) {
            if ($poiForm->isValid()) {

                $category = $poiForm->get('category')->getData();

                switch ($category->getName()) {
                    case 'stage':
                        $stage = new Stage();

                        $stage->setTitle($poiForm->get('title')->getData());
                        $stage->setCoordinates($poiForm->get('coordinates')->getData());
                        $stage->setFestival($poiForm->get('festival')->getData());
                        $stage->setCategory($poiForm->get('category')->getData());

                        $entityManager->persist($stage);

                        $entityManager->flush();

                        $lastId = $stage->getId();

                        return $this->redirectToRoute("stage_edit", ['id' => $lastId]);

                        $this->addFlash('success', 'Scène ajoutée !');

                        break;

                    case 'wc':
                        $wc = new Wc();

                        $wc->setFestival($poiForm->get('festival')->getData());
                        $wc->setCategory($poiForm->get('category')->getData());
                        $wc->setTitle($poiForm->get('title')->getData());
                        $wc->setCoordinates($poiForm->get('coordinates')->getData());
                        $wc->setGender($poiForm->get('gender')->getData());
                        $wc->setNumber($poiForm->get('number')->getData());
                        $wc->setCompany($poiForm->get('company')->getData());

                        $entityManager->persist($wc);

                        $entityManager->flush();

                        $this->addFlash('success', 'Point WC ajouté !');

                        return $this->redirectToRoute("wc_edit", ['id' => $wc->getId()]);

                        break;

                    case 'bar':
                        $wc = new Bar();

                        $wc->setFestival($poiForm->get('festival')->getData());
                        $wc->setCategory($poiForm->get('category')->getData());
                        $wc->setTitle($poiForm->get('title')->getData());
                        $wc->setCoordinates($poiForm->get('coordinates')->getData());
                        $wc->setDescription($poiForm->get('description')->getData());
                        $wc->setCompany($poiForm->get('company')->getData());

                        $entityManager->persist($wc);

                        $entityManager->flush();

                        $this->addFlash('success', 'Point WC ajouté !');

                        return $this->redirectToRoute("bar_edit", ['id' => $wc->getId()]);

                        break;

                    default:
                        // Retourne une 404
                        return $this->createNotFoundException();
                }
            } else {
                $this->addFlash('error', 'Erreur !');
            }
        }

        // Afficher une liste de POI
        // $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();

        // Récupère toutes les scènes
        $stageRepo = $entityManager->getRepository(Stage::class);
        $stages = $stageRepo->findAll();

        // Récupère tous les points WC
        $wcRepo = $entityManager->getRepository(Wc::class);
        $wcs = $wcRepo->findAll();

        // Récupère tous les bars
        $barRepo = $entityManager->getRepository(Bar::class);
        $bars = $barRepo->findAll();

        return $this->render('interactive_map/index.html.twig', [
            'poiForm' => $poiForm->createView(),
            'pois' => $stages + $wcs + $bars,
        ]);
    }

    // EDIT Stage

    /**
     * @Route("stage/{id}", name="stage_edit")
     * @param Stage $stage
     * @param Request $request
     * @return Response
     */
    public function editStage($id, Request $request, EntityManagerInterface $entityManager)
    {

        $stage = $entityManager->getRepository(Stage::class)->find($id);

        $stageForm = $this->createForm(StageFormType::class, $stage);

        $stageForm->handleRequest($request);

        if ($stageForm->isSubmitted()) {
            if ($stageForm->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->flush();

                $this->addFlash('success', 'Point d\'intérêt modifié !');
            } else {
                $this->addFlash('error', 'Erreur !');
            }
        }

        // Afficher une liste de POI
        // $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();

        // Récupère toutes les scènes
        $stageRepo = $entityManager->getRepository(Stage::class);
        $stages = $stageRepo->findAll();

        // Récupère tous les points WC
        $wcRepo = $entityManager->getRepository(Wc::class);
        $wcs = $wcRepo->findAll();

        // Récupère tous les bars
        $barRepo = $entityManager->getRepository(Bar::class);
        $bars = $barRepo->findAll();


        return $this->render("interactive_map/edit_stage.html.twig", [
            'stageForm' => $stageForm->createView(),
            'pois' => $stages + $wcs + $bars,
        ]);
    }


    // EDIT WC

    /**
     * @Route("wc/{id}", name="wc_edit")
     * @param Wc $wc
     * @param Request $request
     * @return Response
     */
    public function editWc($id, Request $request, EntityManagerInterface $entityManager)
    {

        $wc = $entityManager->getRepository(Wc::class)->find($id);

        $wcForm = $this->createForm(WcFormType::class, $wc);

        $wcForm->handleRequest($request);

        if ($wcForm->isSubmitted()) {
            if ($wcForm->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->flush();

                $this->addFlash('success', 'Point WC modifié !');
            } else {
                $this->addFlash('error', 'Erreur !');
            }
        }

        // Afficher une liste de POI
        // $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();

        // Récupère toutes les scènes
        $stageRepo = $entityManager->getRepository(Stage::class);
        $stages = $stageRepo->findAll();

        // Récupère tous les points WC
        $wcRepo = $entityManager->getRepository(Wc::class);
        $wcs = $wcRepo->findAll();

        // Récupère tous les bars
        $barRepo = $entityManager->getRepository(Bar::class);
        $bars = $barRepo->findAll();

        return $this->render("interactive_map/edit_wc.html.twig", [
            'wcForm' => $wcForm->createView(),
            'pois' => $stages + $wcs + $bars,
        ]);
    }

    // EDIT Bar

    /**
     * @Route("bar/{id}", name="bar_edit")
     * @param Bar $bar
     * @param Request $request
     * @return Response
     */
    public function editBar($id, Request $request, EntityManagerInterface $entityManager)
    {

        $bar = $entityManager->getRepository(Bar::class)->find($id);

        $barForm = $this->createForm(BarFormType::class, $bar);

        $barForm->handleRequest($request);

        if ($barForm->isSubmitted()) {
            if ($barForm->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->flush();

                $this->addFlash('success', 'Bar modifié !');
            } else {
                $this->addFlash('error', 'Erreur !');
            }
        }

        // Récupère toutes les scènes
        $stageRepo = $entityManager->getRepository(Stage::class);
        $stages = $stageRepo->findAll();

        // Récupère tous les points WC
        $wcRepo = $entityManager->getRepository(Wc::class);
        $wcs = $wcRepo->findAll();

        // Récupère tous les bars
        $barRepo = $entityManager->getRepository(Bar::class);
        $bars = $barRepo->findAll();


        // Afficher une liste de POI
        $stages = $this->getDoctrine()->getRepository(Stage::class)->findAll();


        return $this->render("interactive_map/edit_bar.html.twig", [
            'barForm' => $barForm->createView(),
            'pois' => $stages + $wcs + $bars,
        ]);
    }






    // Supprimer un POI

    /**
     * @Route("/poi/{id}/delete", name="poi_delete")
     * @param Stage $stage
     * @return RedirectResponse
     */
    public function deletePoi($id, EntityManagerInterface $entityManager)
    {

        $stage = $entityManager->getRepository(Stage::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($stage);
        $entityManager->flush();

        return $this->redirectToRoute("interactive_map");
    }
}
