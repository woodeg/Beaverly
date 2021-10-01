<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_admin")
     */
    public function index(): Response
    {
        return $this->render('content/admin/admin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
