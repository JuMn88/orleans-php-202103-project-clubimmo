<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\SectorManager;
use App\Model\CriterionOfPropretyManager;
use App\Model\CriterionManager;
use App\Model\TransactionOfPropretyManager;
use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        $idProperty = $_GET['id'];

        $properties = new PropertyManager();
        $property = $properties->selectOneById($idProperty);

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos, 'property' => $property]);
    }
}
