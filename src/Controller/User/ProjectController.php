<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/user/project", name="project")
     */
    public function index(): Response
    {
        return $this->render('content/project/project.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
}
