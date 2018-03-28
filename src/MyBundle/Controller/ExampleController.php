<?php


namespace MyBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ExampleController extends Controller {

    public function cacheAction() {
        return $this->render('MyBundle:Cache:cache.html.twig',
            array('hello' => 'Hello World!!!'));
    }

    public function esiAction(Request $request) {
        $response = new Response();
        $response->setSharedMaxAge(10);
        $response->setPublic();
        $response->setMaxAge(10);

        // Check that the Response is not modified for the given Request
        if (!$response->isNotModified($request)) {
            $date = new \DateTime();
            $response->setLastModified($date);
            $response->setContent($this->renderView('MyBundle:Cache:esi.html.twig'));
        }
        return $response;
    }
}