<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdminAdvertisementController extends AbstractController
{
    public const MAX_TEXT_LENGTH = 50;
    public const MAX_TRANSACTION_LENGTH = 25;

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
            $errors = $this->validateTextInput($advertisement, $errors);
            $errors = $this->validateTextSizeInput($advertisement, $errors);
            $errors = $this->validateIntInput($advertisement, $errors);
            $errors = $this->validatePositiveInput($advertisement, $errors);
            $errors = $this->validateGradeInput($advertisement, $errors);
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
    public function validateTextInput($advertisement, $errors): array
    {
        if (empty($advertisement['reference'])) {
            $errors[] = 'Le champ Référence est requis';
        }
        if (empty($advertisement['propertyType'])) {
            $errors[] = 'Le champ Type de propriété est requis';
        }
        if (empty($advertisement['city'])) {
            $errors[] = 'Le champ Ville est requis';
        }
        if (empty($advertisement['sector'])) {
            $errors[] = 'Le champ Secteur est requis';
        }
        if (empty($advertisement['transaction'])) {
            $errors[] = 'Le champ Transaction est requis';
        }
        return $errors;
    }
    public function validateTextSizeInput($advertisement, $errors): array
    {
        if (strlen($advertisement['reference']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Référence doit faire moins de ' . self::MAX_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['propertyType']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Type de propriété doit faire moins de ' . self::MAX_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['city']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Ville doit faire moins de ' . self::MAX_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['sector']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Secteur doit faire moins de ' . self::MAX_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['transaction']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Transaction doit faire moins de ' . self::MAX_TRANSACTION_LENGTH . ' caractères.';
        }
        return $errors;
    }
    public function validateIntInput($advertisement, $errors): array
    {
        if (empty($advertisement['surface'])) {
            $errors[] = 'Le champ Surface est requis';
        }
        if (empty($advertisement['price'])) {
            $errors[] = 'Le champ Prix est requis';
        }
        if (empty($advertisement['rooms'])) {
            $errors[] = 'Le champ Nombre de pièces est requis';
        }
        if (empty($advertisement['bedrooms'])) {
            $errors[] = 'Le champ Nombre de chambres est requis';
        }
        return $errors;
    }
    public function validatePositiveInput($advertisement, $errors): array
    {
        if ($advertisement['surface'] < 0) {
            $errors[] = 'La surface doit être positive';
        }
        if ($advertisement['price'] < 0) {
            $errors[] = 'Le prix doit être positif';
        }
        if ($advertisement['rooms'] < 0) {
            $errors[] = 'Le nombre de pièces doit être positif';
        }
        if ($advertisement['bedrooms'] < 0) {
            $errors[] = 'Le nombre de chambres doit être positif';
        }
        return $errors;
    }
    public function validateGradeInput($advertisement, $errors): array
    {
        $diagnostic = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        if (empty($advertisement['energyPerformance'])) {
            $errors[] = 'Le champ Performances énergétiques est requis';
        }
        if (!in_array($advertisement['energyPerformance'], $diagnostic)) {
            $errors[] = 'Les Performances énergétiques doivent être comprises entre A et G.';
        }
        if (empty($advertisement['greenhouseGases'])) {
            $errors[] = 'Le champ GES est requis';
        }
        if (!in_array($advertisement['greenhouseGases'], $diagnostic)) {
            $errors[] = 'L\'indice GES doit être compris entre A et G';
        }
        return $errors;
    }
}
