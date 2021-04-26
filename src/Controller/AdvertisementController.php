<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        /*$propertyManager = new PropertyManager();
        $properties = $propertyManager->selectAll();

        foreach ($properties as $property) {
            $energyPerformanceDiagnostic = $property['energy_performance_diagnostic'];
            $greenhouseGas = $property['greenhouse_gas'];
        }
        return $this->twig->render('Advertisement/index.html.twig',
        ['greenhouseGas' => $greenhouseGas,
        'energyPerformanceDiagnostic' => $energyPerformanceDiagnostic]);*/

        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos]);
    }
}
