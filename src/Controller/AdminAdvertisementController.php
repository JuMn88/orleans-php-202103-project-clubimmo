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
        $errors = $advertisement = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $advertisement = array_map('trim', $_POST);
            if (empty($advertisement['reference'])) {
                $errors[] = 'Le champ Référence est requis';
            }
            if (strlen($advertisement['reference']) > self::MAX_FIELD_LENGTH) {
                $errors[] = 'Le champ Référence doit faire moins de ' . self::MAX_FIELD_LENGTH . ' caractères.';
            }
            if (empty($advertisement['surface'])) {
                $errors[] = 'Le champ Surface est requis';
            }
            if ($advertisement['surface'] < 0) {
                $errors[] = 'La surface doit être positive';
            }
            if (empty($advertisement['price'])) {
                $errors[] = 'Le champ Prix est requis';
            }
            if ($advertisement['price'] < 0) {
                $errors[] = 'Le prix doit être positif';
            }
            if (empty($errors)) {
                //insert in database
                $advertisementManager = new PropertyManager();
                $advertisementManager->insert($advertisement);
                //redirection
                header('Location: /adminAdvertisement/index');
            }
        }

        return $this->twig->render('Admin/Advertisement/add.html.twig', [
            'errors' => $errors,
            'advertisement' => $advertisement,
        ]);
    }
}
