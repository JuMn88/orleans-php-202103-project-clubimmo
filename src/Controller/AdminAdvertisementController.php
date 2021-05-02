<?php

namespace App\Controller;

use App\Model\PropertyManager;

class AdminAdvertisementController extends AbstractController
{
    public const MAX_TEXT_LENGTH = 50;
    public const MAX_TRANSACTION_LENGTH = 25;
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
    public const MAX_UPLOAD_FILE = 1000000;
    public const ALLOWED_MIMES = ['image/jpeg', 'image/png'];

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
            $errors = $this->validateImageFormat($_FILES['photo'], $errors);
            if (empty($errors)) {
                $fileName = uniqid() . '_' . $_FILES['photo']['name'];
                $advertisement['photo'] = $fileName;
                move_uploaded_file(
                    $_FILES['photo']['tmp_name'],
                    __DIR__ . '/../../public/uploads/' . $fileName
                );
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
        ]);
    }
    //Method to ensure every fields had been filled
    public function validateInput(array $advertisement, array $errors): array
    {
        $fieldsList = [
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
                //since empty(0) = true, another condition is necessary for properties with no room or bedroom
                if ($adValue != '0' || $adKey != 'rooms' && $adKey != 'bedrooms') {
                    $errors[] = 'Le champ ' . $fieldsList[$adKey] . ' est requis.';
                }
            }
        }
        return $errors;
    }
    //Method to check strings' length
    public function validateTextSizeInput(array $advertisement, array $errors): array
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
    public function validatePositiveInput(array $advertisement, array $errors): array
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
    public function validateGradeInput(array $advertisement, array $errors): array
    {
        if (!in_array($advertisement['energyPerformance'], self::DIAGNOSTIC_GRADES)) {
            $errors[] = 'Les Performances énergétiques doivent être comprises entre A et G.';
        }
        if (!in_array($advertisement['greenhouseGases'], self::DIAGNOSTIC_GRADES)) {
            $errors[] = 'L\'indice GES doit être compris entre A et G.';
        }
        return $errors;
    }
    //Method to validate files MIME
    public function validateImageFormat(array $file, array $errors): array
    {
        //var_dump($_FILES); die;
        if ($file['error'] != 0) {
            $errors[] = 'Problème dans l\'envoi de fichier.';
        } else {
            if ($file['size'] > self::MAX_UPLOAD_FILE) {
                $errors[] = 'Le fichier doit faire moins de ' . self::MAX_UPLOAD_FILE / 1000000 . 'Mo.';
            }
            if (!empty($file['tmp_name'])) {
                if (!in_array(mime_content_type($file['tmp_name']), self::ALLOWED_MIMES)) {
                    $errors[] = 'Le fichier doit être de type ' . implode(', ', self::ALLOWED_MIMES);
                }
            } else {
                $errors[] = 'Pas de photo sélectionnée';
            }
        }
        return $errors;
    }
}
