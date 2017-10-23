<?php

// play.php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
umask(0000);

require __DIR__.'/app/autoload.php';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

//setup done
$templating = $container->get('templating');

echo $templating->render(
    'EventBundle:Default:index.html.twig',
     array(
        'firstName' => 'Yoda',
        'count' => 5,
		'status' => 'It\'s a traaaaaaaap!',
     )
);
