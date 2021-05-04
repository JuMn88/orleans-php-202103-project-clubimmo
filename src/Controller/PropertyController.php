<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;
use App\Model\PropertyTypeManager;
use App\Model\PropertyFeatureManager;

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
        if (!empty($idProperty)) {
            $pFeaturesManager = new PropertyFeatureManager();
            $propertyFeatures = $pFeaturesManager->selectFeaturesByPropertyId($idProperty);
            $property = new PropertyManager();
            $property = $property->selectPropertyTypeByPropertyId($idProperty);
        } else {
            $property = null;
            $propertyFeatures = null;
        }
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos,
                                                                    'property' => $property,
                                                                    'propertyFeatures' => $propertyFeatures]);
    }
}
