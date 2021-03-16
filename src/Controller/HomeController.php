<?php

namespace App\Controller;

use App\Entity\Days;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/days", name="day")
     */
    public function day(EntityManagerInterface $em, SerializerInterface $serializer, Request $request)
    {
        $serializer->deserialize($request->getContent(), Days::class,'json');
        return new Response("cool");
    }
}
