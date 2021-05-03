<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdminAdvertisementController extends AbstractController
{
    public const MAX_TEXT_LENGTH = 255;
    public const SHORT_TEXT_LENGTH = 25;
    public const PROPERTY_TYPES = [
        "Maison",
        "Appartement",
        "Autre",
    ];
    public const TRANSACTION_TYPES = [
        "A vendre",
        "A louer",
        "Autre",
    ];
    public const DIAGNOSTIC_GRADES = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
    public const YES_NO_ANSWERS = ['Oui', 'Non'];

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
            $advertisement['reference'] = uniqid();
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
            'propertyTypes' => self::PROPERTY_TYPES,
            'transactionTypes' => self::TRANSACTION_TYPES,
            'diagnosticGrades' => self::DIAGNOSTIC_GRADES,
            'yesNoAnswers' => self::YES_NO_ANSWERS,
        ]);
    }
    //Method to ensure every fields had been filled
    public function validateInput($advertisement, $errors): array
    {
        $fieldsList = [
            'transaction' => 'Type de transaction',
            'propertyType' => 'Type de propriété',
            'surface' => 'Surface',
            'price' => 'Prix',
            'address' => 'Adresse',
            'sector' => 'Secteur',
            'rooms' => 'Nombre de pièces',
            'bedrooms' => 'Nombre de chambres',
            'bathrooms' => 'Nombre de salles de bain',
            'toilets' => 'Nombre de toilettes',
            'parkingSpace' => 'Nombre de places de stationnement',
            'kitchen' => 'Cuisine',
            'lift' => 'Ascenseur',
            'energyPerformance' => 'Performances énergétiques',
            'greenhouseGases' => 'GES',
            'description' => 'Description',
        ];
        $probableNullCriteria = ['rooms', 'bedrooms', 'bathrooms', 'toilets', 'parkingSpace'];
        foreach ($advertisement as $adKey => $adValue) {
            if (empty($adValue)) {
                //since empty(0) = true, another condition is necessary for properties with no room or bedroom
                if ($adValue != '0' || !in_array($adKey, $probableNullCriteria)) {
                    $errors[] = 'Le champ ' . $fieldsList[$adKey] . ' est requis.';
                }
            }
        }
        return $errors;
    }
    //Method to check strings' length
    public function validateTextSizeInput($advertisement, $errors): array
    {
        if (strlen($advertisement['reference']) > self::SHORT_TEXT_LENGTH) {
            $errors[] = 'Le champ Référence doit faire moins de ' . self::SHORT_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['transaction']) > self::SHORT_TEXT_LENGTH) {
            $errors[] = 'Le champ Transaction doit faire moins de ' . self::SHORT_TEXT_LENGTH . ' caractères.';
        }
        if (strlen($advertisement['address']) > self::MAX_TEXT_LENGTH) {
            $errors[] = 'Le champ Adresse doit faire moins de ' . self::MAX_TEXT_LENGTH . ' caractères.';
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
        if (!in_array($advertisement['energyPerformance'], self::DIAGNOSTIC_GRADES)) {
            $errors[] = 'Les Performances énergétiques doivent être comprises entre A et G.';
        }
        if (!in_array($advertisement['greenhouseGases'], self::DIAGNOSTIC_GRADES)) {
            $errors[] = 'L\'indice GES doit être compris entre A et G';
        }
        return $errors;
    }
    //Method to validate the "yes/no inputs" (kitchen and lift)
    public function validateYNInput($advertisement, $errors): array
    {
        if (!in_array($advertisement['kitchen'], self::YES_NO_ANSWERS)) {
            $errors[] = 'La réponse au champ Cuisine doit être oui ou non.';
        }
        if (!in_array($advertisement['lift'], self::YES_NO_ANSWERS)) {
            $errors[] = 'La réponse au champ Ascenseur doit être oui ou non';
        }
        return $errors;
    }
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propertyManager = new PropertyManager();
            $propertyManager->delete($id);

            header('Location: /adminAdvertisement/index');
        }
    }
}
