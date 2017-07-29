<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of DefaultController
 *
 * @author falcon
 */
class DefaultController {
    public function indexAction($service)
    {
        $welcome = 'Hi  there, this is me!';
        return $service->respond('default.phtml', array($welcome));
    }
}
