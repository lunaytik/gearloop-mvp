<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use App\Repository\KitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home_index')]
    public function index(KitRepository $kitRepository, ItemRepository $itemRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'kitsLastCreated' => $kitRepository->findByCreatedAt(5),
            'itemLastCreated' => $itemRepository->findLastValidatedItems(9)
        ]);
    }
}
