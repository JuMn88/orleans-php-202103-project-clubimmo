<?php

namespace App\Controller;

use App\Model\AdvertisementManager;

class AdvertisementController extends AbstractController
{

    public function advertisement()
    {
        $advertisementManager = new AdvertisementManager();
        $photosTable = $advertisementManager->selectAll('nom');
        $photosAdress = [];

        foreach ($photosTable as $photosInformations) {
            $photosAdress[] = "/assets/images/" . $photosInformations['nom'];
        }

        if (empty($photosAdress)) {
            $photosAdress[] = "/assets/images/no_image.png";
        }
        return $this->twig->render('Advertisement/advertisement.html.twig', ['photosAdress' => $photosAdress]);
    }


    public function energy($id)
    {

        $advertisementManager = new AdvertisementManager();
        $bienTable = $advertisementManager->selectOneById('id');
        $classeEnergetique = "";

        $classeEnergetique = $bienTable['classe_energetique'];
        


        return $this->twig->render('Advertisement/advertisement.html.twig', ['classeEnergetique' => $classeEnergetique]);

    }


}



