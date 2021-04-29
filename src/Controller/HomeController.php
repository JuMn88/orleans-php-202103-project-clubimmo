<?php

namespace App\Controller;

use App\Model\PhotoManager;
use App\Model\PropertyManager;
use App\Model\HomeCarouselManager;

class HomeController extends AbstractController
{
    public function index()
    {
        define('LEFT', 0); //left-most slider
        define('MIDDLE', 1); //middle slider
        define('RIGHT', 2); //right-most slider

        // retrieve last 3 houses for sale to be displayed on homepage based 3-fold eye-catcher slider
        $photoManager = new PhotoManager();
        $photos = $photoManager->selectByPropertyId($this->getPics(new HomeCarouselManager())[LEFT]);
        $photos2 = $photoManager->selectByPropertyId($this->getPics(new HomeCarouselManager())[MIDDLE]);
        $photos3 = $photoManager->selectByPropertyId($this->getPics(new HomeCarouselManager())[RIGHT]);

        //retrieve slider card information data
        $propertyManager = new PropertyManager();
        $property1 = $propertyManager->selectOneById($this->getPics(new HomeCarouselManager())[LEFT]);
        $property2 = $propertyManager->selectOneById($this->getPics(new HomeCarouselManager())[MIDDLE]);
        $property3 = $propertyManager->selectOneById($this->getPics(new HomeCarouselManager())[RIGHT]);

        //render page settings
        $page = 'Home/index.html.twig';
        $paramPhotos  = ['photos' => $photos,'photos2' => $photos2,'photos3' => $photos3];
        $paramsProperty = ['property1' => $property1,'property2' => $property2,'property3' => $property3];
        return $this->twig->render($page, array_merge($paramPhotos, $paramsProperty));
    }

    private function getPics(HomeCarouselManager $myPics): array
    {
        foreach($myPics->selectAll() as $key => $value) {
          $picsCollection[] = $value["id"];
         }
        return $picsCollection;
    }
}
