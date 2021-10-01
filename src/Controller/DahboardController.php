<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DahboardController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {        
        return $this->render('content/dashboard/dashboard.html.twig', []);
    }
}
