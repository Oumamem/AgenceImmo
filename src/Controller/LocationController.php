<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{
    /**
     * @Route("/location", name="location.index")
     */
    public function index(): Response
    {
        return $this->render('location/index.html.twig', [
            'controller_name' => 'LocationController',
            'current_menu' => 'location',
        ]);
    }
}