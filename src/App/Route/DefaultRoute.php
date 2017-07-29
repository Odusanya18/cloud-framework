<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->app()->respond(array('GET', 'POST', 'HEAD'), '/welcome', (new \App\Controller\DefaultController)->indexAction($this->service()));
