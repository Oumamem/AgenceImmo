<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PropertyRepository $repository): Response
    {
        $property=$repository->findlatest();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'properties'=> $property,
        ]);
    }
}