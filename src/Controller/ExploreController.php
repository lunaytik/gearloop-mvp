<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use App\Repository\KitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExploreController extends AbstractController
{

    #[Route('/explore/kits', name: 'app_explore_kits')]
    public function kits(KitRepository $kitRepository): Response
    {
        return $this->render('explore/kits.html.twig', [
            'totalKits' => $kitRepository->countPublicKits(),
        ]);
    }

    #[Route('/explore/items', name: 'app_explore_items')]
    public function items(ItemRepository $itemRepository): Response
    {
        return $this->render('explore/items.html.twig', [
            'totalItems' => $itemRepository->countActiveItems(),
        ]);
    }
}
