<?php

namespace App\Controller;

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos]);
    }
}
