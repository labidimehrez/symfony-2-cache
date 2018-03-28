<?php

namespace MyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExampleController extends Controller {

    public function cacheAction() {
        
        $response = new Response();
        $response->setMaxAge(300);
        // Check that the Response is not modified for the given Request
        if (!$response->isNotModified($this->getRequest())) {
            $date = new \DateTime();
            $response->setLastModified($date);
            $response->setContent($this->renderView('MyBundle:Cache:cache.html.twig', array('hello' => 'Hello World!!!')));
        }

        return $response;
    }

}
