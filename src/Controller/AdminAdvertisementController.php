<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdminAdvertisementController extends AbstractController
{
    public const MAX_FIELD_LENGTH = 100;

    public function index(): string
    {
        $propertyManager = new PropertyManager();
        $properties = $propertyManager->selectAll();

        return $this->twig->render('Admin/Advertisement/index.html.twig', [
            'properties' => $properties,
        ]);
    }
    public function add(): string
    {
        $errors = $property = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $property = array_map('trim', $_POST);

            if (empty($property['reference'])) {
                $errors[] = 'Champ référence requis';
            }
            if (strlen($property['reference']) > self::MAX_FIELD_LENGTH) {
                $errors[] = 'La référence doit faire moins de ' . self::MAX_FIELD_LENGTH . ' caractères';
            }
            if (empty($property['price'])) {
                $errors[] = 'Champ prix requis';
            }
            if ($property['price'] <= 0) {
                $errors[] = 'Le prix doit être supérieur à 0';
            }
            if (empty($property['surface'])) {
                $errors[] = 'Champ surface requis';
            }
            if ($property['surface'] <= 0) {
                $errors[] = 'La surface doit être supérieure à 0';
            }
            if (empty($errors)) {
                $propertyManager = new PropertyManager();
                $propertyManager->insert($property);

                header('Location: /adminAdvertisement/index');
            }
        }
        return $this->twig->render('Admin/Advertisement/add.html.twig', [
            'errors' => $errors,
            'property' => $property,
            ]);
    }
}
