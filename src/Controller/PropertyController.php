<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;

class PropertyController extends AbstractController
{
    /**
     * this will list the photo
     */
    public function index()
    {
        $propertyManager = new PropertyManager();
        $properties = $propertyManager->selectAll();
        return $this->twig->render('Property/index.html.twig', ['properties' => $properties]);
    }

    public function show(int $idProperty)
    {
        if (!empty($idProperty) && $idProperty) {
            $propertyManager = new PropertyManager();
            $property = $propertyManager->selectOneById($idProperty);
        } else {
            $property = null;
        }

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectByPropertyId($idProperty);

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos, 'property' => $property]);
    }
}
