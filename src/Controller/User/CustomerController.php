<?php

namespace App\Controller\User;

use App\Entity\Contact;
use App\Entity\Customer;
use App\Form\ContactType;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;

/**
 * @Route("/user/customer")
 */
class CustomerController extends AbstractController
{
    /**
     * @Route("/", name="customer")
     */
    public function index(CustomerRepository $customerRepository): Response
    {
        return $this->render('content/customer/index.html.twig', [
            'companies' => $customerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="customer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $customer->setCreatedAt(new DateTimeImmutable('NOW'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($customer);
            $entityManager->flush();

            return $this->redirectToRoute('customer', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/customer/new.html.twig', [
            'customer' => $customer,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="customer_show", methods={"GET","POST"})
     */
    public function show(Customer $customer, Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $contact->setCustomer($customer);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $referer = $request->headers->get('referer');
            return $this->redirect($referer);
        }

        return $this->render('content/customer/show.html.twig', [
            'customer' => $customer,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="customer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, customer $customer): Response
    {
        $form = $this->createForm(customerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $customer->setUpdatedAt(new DateTimeImmutable('NOW'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customer', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/customer/edit.html.twig', [
            'customer' => $customer,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="customer_delete", methods={"POST"})
     */
    public function delete(Request $request, Customer $customer): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($customer);
        $entityManager->flush();

        return $this->redirectToRoute('customer', [], Response::HTTP_SEE_OTHER);
    }
}
