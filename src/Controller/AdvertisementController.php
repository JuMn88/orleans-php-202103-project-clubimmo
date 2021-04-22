<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
        $energyInformations = $this->energy();
        return $this->twig->render('Advertisement/index.html.twig', $energyInformations);
    }

    public function energy()
    {
        $propertyManager = new PropertyManager();
        $propertys = $propertyManager->selectAll();
        foreach($propertys as $property) {
            $energyPerformanceDiagnostic = $property['energy_performance_diagnostic'];
            $greenhouseGas = $property['greenhouse_gas'];

        }
        $energyInformations = ['energyPerformanceDiagnostic' => $energyPerformanceDiagnostic,
        'greenhouseGas' => $greenhouseGas];

        return $energyInformations;
    }
}
