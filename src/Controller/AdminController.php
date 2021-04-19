<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    /**
     * Display form page to add a property advertisement
     */
    public function form()
    {
        return $this->twig->render('Admin/form.html.twig');
    }
}