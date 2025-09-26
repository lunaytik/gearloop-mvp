<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Entity\Kit;
use App\Form\KitType;
use App\Repository\KitRepository;
use App\Service\KitStatsCalculator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/kit')]
final class KitController extends AbstractController
{
    public function __construct(private KitStatsCalculator $calculator)
    {
    }

    #[Route(name: 'app_kit_index', methods: ['GET'])]
    public function index(KitRepository $kitRepository): Response
    {
        return $this->render('kit/index.html.twig', [
            'kits' => $kitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_kit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $kit = new Kit();
        $form = $this->createForm(KitType::class, $kit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kit->setOwner($this->getUser());

            $entityManager->persist($kit);

            if (!$kit->getKitItems()->isEmpty()) {
                $calculatedStats = $this->calculator->calculateStats($kit);
                $kit->setStats($calculatedStats);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_kit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kit/new.html.twig', [
            'kit' => $kit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kit_show', methods: ['GET'])]
    public function show(Kit $kit): Response
    {
        return $this->render('kit/show.html.twig', [
            'kit' => $kit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_kit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kit $kit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KitType::class, $kit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->flush();
            return $this->redirectToRoute('app_kit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('kit/edit.html.twig', [
            'kit' => $kit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_kit_delete', methods: ['POST'])]
    public function delete(Request $request, Kit $kit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kit->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($kit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_kit_index', [], Response::HTTP_SEE_OTHER);
    }
}
