<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;

class PropertyController extends AbstractController
{
    const FEATURES = [
        ["flaticon-bedroom", "chambres", "bedrooms"],
        ["flaticon-room", "pièces", "rooms"],
        ["flaticon-surface", "m²", "surface"]];

    /**
     * this will list the photo
     */
    public function index()
    {
        $propertyManager = new PropertyManager();
        $properties = $propertyManager->selectAll();
        return $this->twig->render('Property/index.html.twig', ['properties' => $properties]);
    }

    public function show($idProperty)
    {
        $features = [];

        if (!empty($idProperty) && is_numeric($idProperty)) {
            $propertyManager = new PropertyManager();
            $property = $propertyManager->selectOneById($idProperty);
        } else {
            return '404 - Page not found';
        }

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();
        
        foreach($property as $key => $value)
        {
            for($i=0; $i<count(self::FEATURES); $i++)
            {
                if ($key == self::FEATURES[$i][2])
                {
                    $features[$i] = self::FEATURES[$i];
                    $features[$i][] = $value;
                }
            }
        }
    
        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos, 'property' => $property, 'features' => $features]);
    }
}
