<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route("/user/company", name="company")
     */
    public function index(): Response
    {
        return $this->render('content/company/company.html.twig', [
            'controller_name' => 'CompanyController',
        ]);
    }
}
