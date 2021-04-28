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

        $propertyManager = new PropertyManager();
        $property1 = $propertyManager->selectOneById($this->getPicsLeftSlider()); //retrieve leftmost slider prop info data
        $property2 = $propertyManager->selectOneById($this->getPicsMidSlider()); //retrieve middle slider prop info data
        $property3 = $propertyManager->selectOneById($this->getPicRightSlider()); //retrieve rightmost slider prop info data

        return $this->twig->render('Home/index.html.twig', ['photos' => $photos,'photos2' => $photos2,'photos3' => $photos3, 'property1' => $property1,'property2' => $property2,'property3' => $property3, ]);
    }


    public function getPicsLeftSlider():int
    {
       //TO DO:aller chercher dans base de données
        return 1;
    }
    public function getPicsMidSlider():int
    {
       //TO DO:aller chercher dans base de données
        return 2;
    }
    public function getPicRightSlider():int
    {
        //TO DO:aller chercher dans base de données
        return 3;
    }
}
