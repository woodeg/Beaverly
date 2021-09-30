<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    private $user;
    private $em;

    public function __construct(UserRepository $user, EntityManagerInterface $em)
    {
        $this->UserRepository = $user;
        $this->EntityManager = $em;
    }

    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        $query =  $this->EntityManager
            ->createQuery(' SELECT USER
                            FROM App\Entity\User USER
                            INNER JOIN USER.groups GROUPS
                            '
            );
        $test = $query->getResult();

        dump($test); die;

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
