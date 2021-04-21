<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdminAdvertisementController extends AbstractController
{
    public function index(): string
    {
        $propertyManager = new PropertyManager();
        $properties = $propertyManager->selectAll();

        return $this->twig->render('Admin/Advertisement/index.html.twig', [
            'properties' => $properties,
        ]);
    }
}
