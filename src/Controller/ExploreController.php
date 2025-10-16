<?php

namespace App\Controller;

use App\Repository\KitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExploreController extends AbstractController
{

    #[Route('/explore', name: 'app_explore_index')]
    public function index(KitRepository $kitRepository): Response
    {
        return $this->render('explore/index.html.twig', [
            'totalKits' => $kitRepository->countPublicKits(),
        ]);
    }
}
