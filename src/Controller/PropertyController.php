<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;

class PropertyController extends AbstractController
{
    public const FEATURES = [
        ["flaticon-bedroom", "chambres", "bedrooms"],
        ["flaticon-room", "pièces", "rooms"],
        ["flaticon-surface", "m²", "surface"],
        ["flaticon-bathroom", "salle de bain", "bathrooms"]];

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
        $features = [];

        if (!empty($idProperty)) {
            $propertyManager = new PropertyManager();
            $property = $propertyManager->selectOneById($idProperty);
        } else {
            $property = null;
        }

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        $featuresSize = count(self::FEATURES);
        foreach ($property as $key => $value) {
            for ($index = 0; $index < $featuresSize; $index++) {
                if ($key == self::FEATURES[$index][2]) {
                    $features[$index] = self::FEATURES[$index];
                    $features[$index][] = $value;
                }
            }
        }
        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos,
                                                                    'property' => $property,
                                                                    'features' => $features]);
    }
}
