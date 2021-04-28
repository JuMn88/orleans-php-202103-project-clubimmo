<?php

namespace App\Controller;

use App\Model\PropertyManager;
use App\Model\PropertyTypeManager;

class PropertyController extends AbstractController
{
    /**
     * this will list the photo
     */
    public function index()
    {
        $propertyManager = new PropertyManager();
        $propertyTypeManager = new PropertyTypeManager();
        $propertyTypes = $propertyTypeManager->selectAll('name', 'ASC');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchType = array_map('trim', $_POST);
            $id = $searchType['propertyType'];
            if (!empty($id)) {
                $properties = $propertyManager->selectAllByType(intval($id));
            } else {
                $properties = $propertyManager->selectAll();
            }
        } else {
            $properties = $propertyManager->selectAll('price', 'ASC');
        }
        return $this->twig->render('Property/index.html.twig', [
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
        ]);
    }
}
