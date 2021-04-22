<?php

namespace App\Controller;

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    private int $idProperty = 1;

    public function index()
    {
        $photosAdress = $this->carousel();
        return $this->twig->render('Advertisement/index.html.twig', ['photosAdress' => $photosAdress]);
    }

    public function carousel()
    {
        $photoManager = new PhotoManager();
        $photosTable = $photoManager->selectAll();
        $photosAdress = [];

        foreach ($photosTable as $photosInformations) {
            if ($photosInformations['bien_id'] == $this->idProperty) {
                $photosAdress[] = $photosInformations['url'];
            }
        }
        if (empty($photosAdress)) {
            $photosAdress[] = "/assets/images/no_image.png";
        }
        return $photosAdress;
    }
}
