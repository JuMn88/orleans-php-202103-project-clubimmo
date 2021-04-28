<?php

namespace App\Controller;

use App\Model\PropertyManager;

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
}


