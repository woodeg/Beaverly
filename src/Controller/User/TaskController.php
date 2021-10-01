<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/user/task", name="task")
     */
    public function index(): Response
    {
        return $this->render('content/task/task.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
