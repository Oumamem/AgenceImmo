<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @var PropertyRepository
     */
    private $repository;
    public function __construct(PropertyRepository $repo){
        $this->repository=$repo;
    }
    
    /**
     * @Route("/ventes", name="property.index")
     * @return Response
     */
    public function index(): Response
    {
        $properties=$this->repository->findAllVisible();
        dump($properties);
        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
            'current_menu' => 'properties',
        ]);
    }
    /**
     * @Route("/ventes/{id}", name="property.show")
     * @return Response
     */
    public function show($id) : Response
    {
        $propy=$this->repository->find($id);
        if($propy){
        return $this->render('property/show.html.twig', [
            
            'current_menu' => 'properties',
            'property'=> $propy,
        
        ]);
    }else{
            $this->addFlash('error', 'Propriété inexistante');
            return $this->redirectToRoute('property.index');
    }
    }
}
