<?php

namespace App\Controller;

use App\Model\PhotoManager;
use App\Model\PropertyManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        if (!empty($_GET)) {
            $idProperty = $_GET['id'];
            $propertyManager = new PropertyManager();
            $property = $propertyManager->selectOneById($idProperty);
        } else {
            $property = null;
        }

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos, 'property' => $property]);
    }
}
