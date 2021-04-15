<?php

namespace App\Controller;

class AnnonceController extends AbstractController
{
    public function annonce()
    {
        return $this->twig->render('Annonce/annonce.html.twig');
    }
}
