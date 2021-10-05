<?php

namespace App\Controller\User;

use App\Entity\Company;
use App\Entity\Contact;
use App\Form\CompanyType;
use App\Form\ContactType;
use App\Repository\CompanyRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/", name="company")
     */
    public function index(CompanyRepository $companyRepository): Response
    {
        return $this->render('content/company/index.html.twig', [
            'companies' => $companyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $company->setCreatedAt(new DateTimeImmutable('NOW'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('company', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/company/new.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_show", methods={"GET","POST"})
     */
    public function show(Company $company, Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $contact->setCompany($company);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('company', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('content/company/show.html.twig', [
            'company' => $company,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Company $company): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $company->setUpdatedAt(new DateTimeImmutable('NOW'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/company/edit.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($company);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company', [], Response::HTTP_SEE_OTHER);
    }
}
