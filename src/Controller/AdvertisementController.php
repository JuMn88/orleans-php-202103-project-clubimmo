<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        $idProperty = $_GET['id'];

        $propertyManager = new PropertyManager();
        $property = $propertyManager->selectOneById($idProperty);


        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos, 'property' => $property]);
    }
    
}
