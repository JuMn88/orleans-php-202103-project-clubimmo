<?php

namespace App\Controller;

use App\Model\PhotoManager;
use App\Model\PropertyManager;

class HomeController extends AbstractController
{
    public function index()
    {
        //Special 3-fold eye-catcher slider in home page:
        //Focus is set on a select few appartments or houses for rental or sale
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectByPropertyId($this->getPicsLeftSlider()); //leftmost carousels pics
        $photos2 = $photoManager->selectByPropertyId($this->getPicsMidSlider()); //middle carousel pics
        $photos3 = $photoManager->selectByPropertyId($this->getPicRightSlider()); //rightmost carousel pics

        //retrieve slider card information data
        $propertyManager = new PropertyManager();
        $property1 = $propertyManager->selectOneById($this->getPicsLeftSlider());
        $property2 = $propertyManager->selectOneById($this->getPicsMidSlider());
        $property3 = $propertyManager->selectOneById($this->getPicRightSlider());

        //render page settings
        $page = 'Home/index.html.twig';
        $paramPhotos  = ['photos' => $photos,'photos2' => $photos2,'photos3' => $photos3];
        $paramsProperty = ['property1' => $property1,'property2' => $property2,'property3' => $property3];
        return $this->twig->render($page, array_merge($paramPhotos, $paramsProperty));
    }


    public function getPicsLeftSlider(): int
    {
       //TO DO:aller chercher dans base de données
        return 1;
    }
    public function getPicsMidSlider(): int
    {
       //TO DO:aller chercher dans base de données
        return 2;
    }
    public function getPicRightSlider(): int
    {
        //TO DO:aller chercher dans base de données
        return 3;
    }
}
