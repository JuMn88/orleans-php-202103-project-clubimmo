<?php

namespace App\Controller;

use App\Model\BienManager;

class AdvertisementController extends AbstractController
{
    private int $idBien = 2;

    public function index()
    {
        $energyInformations = $this->energyInformations();
        return $this->twig->render('Advertisement/index.html.twig', $energyInformations);
    }

    public function energyInformations()
    {
        $bienManager = new BienManager();
        $bienTable = $bienManager->selectOneById($this->idBien);

        $valueEPD = $bienTable['energy_performance_diagnostic'];
        $greenhouseGas = $bienTable['greenhouse_gas'];

        if (empty($valueEPD)) {
            $photoEPD = "/assets/images/DPE_vide.png";
            $valueEPD = "Vierge";
        } else {
            $photoEPD = "/assets/images/DPE.png";
        }

        if (empty($greenhouseGas)) {
            $photoGreenhouseGas = "/assets/images/GES_vide.png";
            $greenhouseGas = "Vierge";
        } else {
            $photoGreenhouseGas = "/assets/images/GES.png";
        }

        $energyInformations = ['photoEPD' => $photoEPD,
        'photoGreenhouseGas' => $photoGreenhouseGas,
        'valueEPD' => $valueEPD,
        'greenhouseGas' => $greenhouseGas];

        return $energyInformations;
    }
}
