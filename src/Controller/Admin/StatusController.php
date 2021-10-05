<?php

namespace App\Controller\Admin;

use App\Entity\Status;
use App\Form\StatusType;
use App\Repository\StatusRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/status")
 */
class StatusController extends AbstractController
{
    /**
     * @Route("/", name="admin_status_index", methods={"GET"})
     */
    public function index(StatusRepository $statusRepository): Response
    {
        return $this->render('admin/status/index.html.twig', [
            'statuses' => $statusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_status_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $status = new Status();
        $form = $this->createForm(StatusType::class, $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $status->setCreatedAt(new DateTimeImmutable('NOW'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($status);
            $entityManager->flush();

            return $this->redirectToRoute('admin_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/status/new.html.twig', [
            'status' => $status,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_status_show", methods={"GET"})
     */
    public function show(Status $status): Response
    {
        return $this->render('admin/status/show.html.twig', [
            'status' => $status,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_status_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Status $status): Response
    {
        $form = $this->createForm(StatusType::class, $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $status->setUpdatedAt(new DateTimeImmutable('NOW'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/status/edit.html.twig', [
            'status' => $status,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_status_delete", methods={"POST"})
     */
    public function delete(Request $request, Status $status): Response
    {
        if ($this->isCsrfTokenValid('delete'.$status->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($status);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_status_index', [], Response::HTTP_SEE_OTHER);
    }
}
