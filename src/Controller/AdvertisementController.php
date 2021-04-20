<?php

namespace App\Controller;

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{

    public function advertisement()
    {
        echo $this->carousel();
        return $this->twig->render('Advertisement/advertisement.html.twig');
    }

    public function carousel()
    {
        $photoManager = new PhotoManager();
        $photosTable = $photoManager->selectAll();
        $photosAdress = [];

        foreach ($photosTable as $photosInformations) {
            $photosAdress[] = "/assets/images/" . $photosInformations['nom'];
        }

        if (empty($photosAdress)) {
            $photosAdress[] = "/assets/images/no_image.png";
        }
        return $this->twig->render('Advertisement/advertisement.html.twig', ['photosAdress' => $photosAdress]);
    }
}
