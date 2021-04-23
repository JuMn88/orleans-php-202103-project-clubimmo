<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ContactManager;

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

    public const TOPIC = [
        "Je cherche un bien à acheter",
        "Je cherche un bien à louer",
        "J'ai un bien à vendre",
        "J'ai un bien à louer",
        "Autres"
        ];

    public const PROPERTY_TYPE = [
        "Maison",
        "Appartement",
        "Autres"
        ];

    public function index()
    {
        return $this->twig->render('Contact/index.html.twig', [
            'topics' => self::TOPIC,
            'propertyTypes' => self::PROPERTY_TYPE,
        ]);
    }

    private function validateForm($client): array
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // TODO validations (length, format...)
            //$firstnameLength = 80;
            if (empty($client['firstname'])) {
                $errors[] = 'Veuillez entrer votre prénom.';
            } /* elseif (strlen($client['firstname']) > $firstnameLength) {
                $errors[] = 'Votre prénom ne doit pas dépasser ' . $firstnameLength . ' characters';
            }*/

            $lastnameLength = 80;
            if (empty($client['lastname'])) {
                $errors[] = 'Veuillez entrer votre nom.';
            } elseif (strlen($client['lastname']) > $lastnameLength) {
                $errors[] = 'Votre nom ne doit pas dépasser ' . $lastnameLength . '  characters';
            }

            $errors = $this->validatePhoneEmail($client, $errors);

            if (!in_array($client['topic'], self::TOPIC)) {
                $errors[] = 'Veuillez choisir un sujet';
            }

            $messageLength = 255;
            if (empty($client['message_client'])) {
                $errors[] = 'Veuillez écrire votre message.';
            } elseif (strlen($client['message_client']) > $messageLength) {
                $errors[] = 'Votre message ne doit pas dépasser' . $messageLength . ' characters';
            }

            /* Hidden form: optional
        // Validation of the input fields in case the client owns his properties

                if (empty($client['residence'])) {
                    $errors[] = 'Veuillez entrer votre adresse.';
                }

                if (empty($client['city'])) {
                    $errors[] = 'Veuillez entrer votre ville.';
                }

                if (empty($client['postalcode'])) {
                    $errors[] = 'Veuillez entrer votre code postal.';
                }

                if (!in_array($client['propertyType'], $propertyTypes)) {
                    $errors[] = 'Veuillez choisir un type de bien';
                }
*/
        }
        return $errors;
    }
    // Create a method to validate the input fields of phone number and email
    public function validatePhoneEmail($client, $errors)
    {
        if (empty($client['phone'])) {
            $errors[] = 'Veuillez entrer votre numéro de téléphone';
        } else {
        //eliminate every char except 0-9
            $justNumbers = preg_replace("/[^0-9]/", '', $client['phone']);
        //eliminate leading 1 if its there
            if (strlen($justNumbers) == 11) {
                $justNumbers = preg_replace("/^1/", '', $justNumbers);
            }
            //if we have 10 digits left, it's probably valid.
            if (strlen($justNumbers) !== 10) {
                $errors[] = 'Votre numéro de téléphone est invalid';
            }
        }
        if (empty($client['email'])) {
            $errors[] = 'Veuillez entrer votre email.';
        } elseif (!filter_var($client['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Veuillez entrer un email valid.';
        }
        return $errors;
    }

    // Create a method that redirect the page after submitting the form
    public function submitForm()
    {
        $client = array_map('trim', $_POST);
        $errors = $this->validateForm($client);
        if (!empty($errors)) {
            return $this->twig->render('Contact/index.html.twig', [
                'errors' => $errors,
                'topics' => self::TOPIC,
                'propertyTypes' => self::PROPERTY_TYPE,
            ]);
        } else {
            // insert data in database
            var_dump($client);
            $contactManager = new ContactManager();
            $contactManager->insert($client);
            // redirect the page
            //header('Location:/contact/index');
            return $this->twig->render('Contact/index.html.twig', [
                'success' => 'Merci pour votre message. Nous vous contacterons dès que possible.',
                'client' => $client,
                'topics' => self::TOPIC,
                'propertyTypes' => self::PROPERTY_TYPE,
            ]);
            /* In case of redirecting the page to another page (par ex: validateForm.html.twig):
            return $this->twig->render('Contact/validateForm.html.twig'); */
        }
    }
}
