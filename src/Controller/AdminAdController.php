<?php

namespace App\Controller;

use App\Model\BienManager;

class AdminAdvertisementController extends AbstractController
{
    public function index(): string
    {
        $advertisementManager = new BienManager();
        $advertisements = $advertisementManager->selectAll();

        return $this->twig->render('Admin/Advertisement/index.html.twig', [
            'advertisement' => $advertisements,
        ]);
    }
}
