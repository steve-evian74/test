<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JeuxController extends Controller {

    /**
     * @Route("/jeux", name="jeux")
     */
    public function index() {
        $json = file_get_contents('http://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=b6907d289e10d714a6e88b30761fae22');
        $jsondecode = json_decode($json, true);

        //echo $json;

        return $this->render('jeux/index.html.twig', [
                    'jeux' => $jsondecode]);
    }

}
