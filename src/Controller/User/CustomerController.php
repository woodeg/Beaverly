<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/user/customer", name="customer")
     */
    public function index(): Response
    {
        return $this->render('content/customer/customer.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }
}
