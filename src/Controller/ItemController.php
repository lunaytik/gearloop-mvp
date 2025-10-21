<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Enum\ItemStatus;
use App\Form\ItemType;
use App\Repository\ItemRepository;
use App\Repository\KitItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/items')]
final class ItemController extends AbstractController
{
    #[IsGranted('IS_AUTHENTICATED')]
    #[Route(name: 'app_item_index', methods: ['GET'])]
    public function index(ItemRepository $itemRepository): Response
    {
        return $this->render('item/index.html.twig', [
            'totalItems' => $itemRepository->countActiveItems()
        ]);
    }

    #[IsGranted('IS_AUTHENTICATED')]
    #[Route('/new', name: 'app_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $item = new Item();
        $itemVariant = new ItemVariant();
        $itemVariant->setIsDefault(true);
        $item->addItemVariant($itemVariant);
        $item->setStatus(ItemStatus::PENDING);

        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemVariant->getName() ?? $itemVariant->setName("Default");

            $item->setCreatedBy($this->getUser());

            $entityManager->persist($item);
            $entityManager->flush();

            return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('item/new.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/suggestions', name: 'app_item_suggestions', methods: ['GET'])]
    public function suggestions(): Response
    {
        return $this->render('item/suggestions.html.twig');
    }

    #[Route('/{id}', name: 'app_item_show', methods: ['GET'])]
    public function show(Item $item): Response
    {
        return $this->render('item/show.html.twig', [
            'item' => $item,
        ]);
    }

    #[IsGranted('ITEM_EDIT', subject: 'item')]
    #[Route('/{id}/edit', name: 'app_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Item $item, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('item/edit.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    #[IsGranted('ITEM_VALIDATION', subject: 'item')]
    #[Route('/{id}/validate', name: 'app_item_validate', methods: ['GET'])]
    public function validate(Item $item, EntityManagerInterface $entityManager): Response
    {
        $item->setStatus(ItemStatus::VALIDATED);
        $entityManager->flush();

        return $this->redirectToRoute('app_item_show', ['id' => $item->getId()], Response::HTTP_SEE_OTHER);
    }

    #[IsGranted('ITEM_VALIDATION', subject: 'item')]
    #[Route('/{id}/reject', name: 'app_item_reject', methods: ['GET'])]
    public function reject(Item $item, EntityManagerInterface $entityManager, KitItemRepository $kitItemRepository): Response
    {
        $item->setStatus(ItemStatus::REJECTED);
        $entityManager->flush();

        return $this->redirectToRoute('app_item_show', ['id' => $item->getId()], Response::HTTP_SEE_OTHER);
    }

    #[IsGranted('ITEM_DELETE', subject: 'item')]
    #[Route('/{id}', name: 'app_item_delete', methods: ['POST'])]
    public function delete(Request $request, Item $item, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($item);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
