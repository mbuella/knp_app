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


/**** MAIN ENTRY HERE ****/

use Yoda\EventBundle\Entity\Event;

$templating = $container->get('templating');

//set column values for the new record
$event = new Event();
$event->setName('Darth\'s surprise birthday party');
$event->setLocation('Deathstar');
$event->setTime(new \DateTime('tomorrow noon'));
// $event->setDetails('Ha! Darth HATES surprises!!!!');

//get object manager for the Event entity
$em = $container->get('doctrine')->getManager();

//save the new object
// $em->persist($event);
// $em->flush();


$repo = $em->getRepository('EventBundle:Event');

$event = $repo->findOneBy(array(
	'name' => 'Darth\'s surprise birthday party',
));

dump($event);
