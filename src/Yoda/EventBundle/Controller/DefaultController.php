<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//JsonResponse library
// use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction($firstName,$count)
    {
		// dumping variables:
		// dump($firstName,$count);die();
		
		// returning a Response object
		// return new Response('It\'s a traaaaaaaap!');
		
		// returning a JSON response
		// $arr = array(
			// 'firstName' => $firstName,
			// 'count' => $count,
			// 'status' => 'It\'s a traaaaaaaap!',
		// );
		// return new Response(json_encode($arr));
		// --or--
		//return new JsonResponse($arr);
		
		// returning with template
        return $this->render('EventBundle:Default:index.html.twig',
			array(
				'firstName' => $firstName,
				'count' => $count,
				'status' => 'It\'s a traaaaaaaap!',
			)
		);
		
    }
}
