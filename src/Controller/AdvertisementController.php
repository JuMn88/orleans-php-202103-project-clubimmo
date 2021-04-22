<?php

namespace App\Controller;

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
        public function index()
    {
        $photosAdress = $this->carousel();
        return $this->twig->render('Advertisement/index.html.twig', ['photosAdress' => $photosAdress]);
    }

    public function carousel()
    {
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();
        $photosAdress = [];

        foreach ($photos as $photosInformations) {
            if (empty($photosInformations['url'])) {
            } else {
                $photosAdress[] = $photosInformations['url'];
            }
        }
        if (empty($photosAdress)) {
            $photosAdress[] = "/assets/images/no_image.png";
        }
        return $photosAdress;
    }
}
