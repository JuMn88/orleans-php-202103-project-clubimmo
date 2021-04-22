<?php

namespace App\Controller;

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    private int $idProperty = 1;

    public function index()
    {
        $photosAdress = $this->carousel($this->idProperty);
        return $this->twig->render('Advertisement/index.html.twig', ['photosAdress' => $photosAdress]);
    }

    public function carousel(int $idProperty)
    {
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();
        $photosAdress = [];

        foreach ($photos as $photosInformations) {
            if ($photosInformations['property_id'] == $idProperty) {
                if (empty($photosInformations['url'])) {
                    $photosAdress[] = "/assets/images/no_image.png";
                    break;
                } else {
                    $photosAdress[] = $photosInformations['url'];
                }
            }
        }
        if (empty($photosAdress)) {
            $photosAdress[] = "/assets/images/no_image.png";
        }
        return $photosAdress;
    }
}
