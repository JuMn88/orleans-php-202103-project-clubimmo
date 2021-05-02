<?php

namespace App\Controller;

use App\Model\PhotoManager;
use App\Model\PropertyManager;
use App\Model\HomeCarouselManager;

class HomeController extends AbstractController
{
    public function index()
    {
        $photos = [];
        $properties = [];
        $recordCounter = 0;
        $photoManager = new PhotoManager();
        $propertyManager = new PropertyManager();

        /*Retrieve the last 3 houses for sale opr rent fed into the database
        to be displayed on homepage-based 3-fold eye-catcher slider */
        foreach ($photoManager->selectLastProperties() as $value) {
            $photos[$recordCounter] = $photoManager->selectByPropertyId($value["ID"]);
            $properties[$recordCounter] = $propertyManager->selectOneById($value["ID"]);
            $recordCounter++;
        }
        return $this->twig->render('Home/index.html.twig', ['photos' => $photos, 'properties' => $properties]);
    }
}
