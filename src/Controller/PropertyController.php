<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PropertyTypeManager;
use App\Model\SectorManager;

class PropertyController extends AbstractController
{
    /**
     * this will list the photo
     */
        
    public function index()
    {
        $propertyManager = new PropertyManager();
        // class PropertyTypeManger
        $propertyTypeManager = new PropertyTypeManager();
        $propertyTypes = $propertyTypeManager->selectAll('name', 'ASC');
         // class SectorManger
        $sectorManager = new SectorManager();
        $sectors= $sectorManager->selectAll('name', 'ASC');
        //Initialize the varaibles used for stocking the input data
        $propertyTypeId = $sectorId = $budget= $transaction = null;
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
            $searchType = array_map('trim', $_GET);

            if ($searchType['propertyType']!=""){
                $propertyTypeId = $searchType['propertyType'];  
            } 

            if ($searchType['sector']!=""){
                $sectorId = $searchType['sector'];  
            }

            if ($searchType['transaction']!=""){
                $transaction = $searchType['transaction'];  
            }
            if (!empty($searchType['budget'])){
                $budget = $searchType['budget'];  
            }
        }

        $properties = $propertyManager->selectProperties($transaction, $propertyTypeId, $sectorId, $budget);
        return $this->twig->render('Property/index.html.twig', [
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'propertyTypeId' => $propertyTypeId,
            'sectorId' => $sectorId,
            'sectors' => $sectors,
            'transaction' => $transaction,
            'budget' => $budget,
        ]);
    }
}
