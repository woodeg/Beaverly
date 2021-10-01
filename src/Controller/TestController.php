<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\User;
use App\Form\CompanyType;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        /* dump($form); die; */

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // encode the plain password
            $company = $form->getData();
            $company->setCreatedAt(new DateTimeImmutable('NOW'));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'form' => $form->createView(),
        ]);
    }
}
