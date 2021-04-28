<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ClientManager;

class ContactController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

    public const TOPICS = [
        "Je cherche un bien à acheter",
        "Je cherche un bien à louer",
        "J'ai un bien à vendre",
        "J'ai un bien à louer",
        "Autre"
        ];

    public const PROPERTY_TYPES = [
        "Maison",
        "Appartement",
        "Autre"
        ];

    public const MAX_NAME_LENGTH = 100;
    public const MAX_MESSAGE_LENGTH = 255;

    public function index()
    {          
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            $client = array_map('trim', $_POST);
            $errors = $this->validateForm($client,$errors);
            if (empty($errors)) {
                header('Location: /contact/index/');
            } else {
                return $this->twig->render('Contact/index.html.twig', [
                'topics' => self::TOPICS,
                'propertyTypes' => self::PROPERTY_TYPES,
                'errors' => $errors,
                'client' => $client,
                ]);
            }
        }  
        return $this->twig->render('Contact/index.html.twig', [
        'topics' => self::TOPICS,
        'propertyTypes' => self::PROPERTY_TYPES,
        ]);   
    }

    private function validateForm($client,$errors): array
    {
        // TODO validations (length, format...)
        if (empty($client['firstname'])) {
            $errors[] = 'Veuillez entrer votre prénom.';
        } elseif (strlen($client['firstname']) > self::MAX_NAME_LENGTH) {
            $errors[] = 'Votre prénom ne doit pas dépasser ' . self::MAX_NAME_LENGTH . ' characters';
        }

        if (empty($client['lastname'])) {
            $errors[] = 'Veuillez entrer votre nom.';
        } elseif (strlen($client['lastname']) > self::MAX_NAME_LENGTH) {
            $errors[] = 'Votre nom ne doit pas dépasser ' . self::MAX_NAME_LENGTH . '  characters';
        }

        if (!in_array($client['topic'], self::TOPICS)) {
            $errors[] = 'Veuillez choisir un sujet';
        }

        if (empty($client['message'])) {
            $errors[] = 'Veuillez écrire votre message.';
        } elseif (strlen($client['message']) > self::MAX_MESSAGE_LENGTH) {
            $errors[] = 'Votre message ne doit pas dépasser' . self::MAX_MESSAGE_LENGTH . ' characters';
        }
        
        $errors = $this->validatePhoneEmail($client, $errors);
        return $errors;
    }

    // Create a method to validate the input fields of phone number and email
    public function validatePhoneEmail($client, $errors): array
    {
        if (empty($client['phone'])) {
            $errors[] = 'Veuillez entrer votre numéro de téléphone';
        } else {
            //eliminate every characters except 0-9
            $justNumbers = preg_replace("/[^0-9]/", '', $client['phone']);
            // The input data is only valid if there are 10 numbers left.
            if (strlen($justNumbers) !== 10) {
                $errors[] = 'Votre numéro de téléphone est invalide';
            }
        }
        if (empty($client['email'])) {
            $errors[] = 'Veuillez entrer votre email.';
        } elseif (!filter_var($client['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Veuillez entrer un email valide.';
        }
        return $errors;
    }
}
