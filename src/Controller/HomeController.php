<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Home/index.html.twig') . $this->accueil();
    }

    public function accueil()
    {
        return $this->twig->render('Home/accueil.html.twig');
    }
}
