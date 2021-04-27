<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\SectorManager;
use App\Model\CriterionOfPropretyManager;
use App\Model\CriterionManager;
use App\Model\TransactionOfPropretyManager;
/*class AdvertisementController extends AbstractController
{
   private int $idProperty = 1;

    public function index()
    {
        $property = $this->property();
        $city = $this->cityByIdProperty();
        $criterions = $this->criterionsByIdProprety();
        $Transaction = $this->transactionByIdProprety();
        return $this->twig->render('Advertisement/index.html.twig',
        ['property' => $property,
        'city' => $city,
        'criterions' => $criterions,
        'transaction' => $Transaction,
        ]);
    }

    public function cityByIdProperty()
    {
        $propertys = new PropertyManager();
        $property = $propertys->selectOneById($this->idProperty);

        $idCityProperty = $property['secteur_id'];
        $idCityProperty2 = 1;
        $sectors = new SectorManager();
        $sector = $sectors->selectOneById($idCityProperty2);

        $city = $sector['ville'];
    }

    public function criterionsByIdProprety()
    {
        $criterionOfPropretyById  = [];
        $criterionOfPropretys = (new CriterionOfPropretyManager())->selectAll();

        foreach ($criterionOfPropretys as $criterionOfProprety) {
            if ($criterionOfProprety['bien_id'] = $idProperty) {
                $criterionOfPropretysByIdProprety[] = $criterionOfProprety['critere_id'];
            }
        }
        $criterionsByIdProprety = [];
        $criterions = new CriterionManager();
        foreach($criterionOfPropretysByIdProprety as $criterionOfPropretyByIdProprety)
        {
            $criterionsByIdProprety[] = $criterions->selectOneById($criterionOfPropretyByIdProprety);
        }
    }

    public function transactionByIdProprety()
    {
        $transactionOfPropretyById  = [];
        $transactionOfPropretys = (new TransactionOfPropretyManager())->selectAll();

        foreach ($transactionOfPropretys as $transactionOfProprety) {
            if ($transactionOfProprety['bien_id'] = $idProperty) {
                $TransactionOfPropretyById = $transactionOfProprety['transaction_id'];
            }
        }
    }

    public function property()
    {
        $propertyManager = new PropertyManager();
        $property = $propertyManager->selectOneById($this->idProperty);
        return $property;
    }*/

use App\Model\PhotoManager;

class AdvertisementController extends AbstractController
{
    public function index()
    {
/*
        $properties = new PhotoManager();
        $property = $photoManager->selectOneById($id);
*/
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectAll();

        return $this->twig->render('Advertisement/index.html.twig', ['photos' => $photos]);
    }
}
