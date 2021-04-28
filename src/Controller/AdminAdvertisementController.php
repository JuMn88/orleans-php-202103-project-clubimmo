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
            $errors = $this->validateInput($advertisement, $errors);
            $errors = $this->validateTextSizeInput($advertisement, $errors);
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
    //Method to ensure every fields had been filled
    public function validateInput($advertisement, $errors): array
    {
        $fieldsList = [
            'reference' => 'Référence',
            'surface' => 'Surface',
            'price' => 'Prix',
            'propertyType' => 'Type de propriété',
            'transaction' => 'Type de transaction',
            'city' => 'Ville',
            'sector' => 'Secteur',
            'rooms' => 'Nombre de pièces',
            'bedrooms' => 'Nombre de chambres',
            'energyPerformance' => 'Performances énergétiques',
            'greenhouseGases' => 'GES',
        ];
        foreach ($advertisement as $adKey => $adValue) {
            if (empty($adValue)) {
                $errors[] = 'Le champ ' . $fieldsList[$adKey] . ' est requis.';
            }
        }
        return $errors;
    }
    //Method to check strings' length
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
    //Method to ensure positive values had been filled in the proper fields
    public function validatePositiveInput($advertisement, $errors): array
    {
        $integerFieldsList = [
            'surface' => 'Surface',
            'price' => 'Prix',
            'rooms' => 'Nombre de pièces',
            'bedrooms' => 'Nombre de chambres',
        ];
        foreach ($advertisement as $adKey => $adValue) {
            if ($adValue < 0) {
                $errors[] = 'La valeur ' . $integerFieldsList[$adKey] . ' doit être positive.';
            }
        }
        return $errors;
    }
    //Method to validate the "grades inputs" (energy performance and greenhouse gases)
    public function validateGradeInput($advertisement, $errors): array
    {
        $diagnostic = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        if (!in_array($advertisement['energyPerformance'], $diagnostic)) {
            $errors[] = 'Les Performances énergétiques doivent être comprises entre A et G.';
        }
        if (!in_array($advertisement['greenhouseGases'], $diagnostic)) {
            $errors[] = 'L\'indice GES doit être compris entre A et G';
        }
        return $errors;
    }
}
