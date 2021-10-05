<?php

namespace App\Controller\Admin;

use App\Entity\Label;
use App\Form\LabelType;
use App\Repository\LabelRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/label")
 */
class LabelController extends AbstractController
{
    /**
     * @Route("/", name="admin_label_index", methods={"GET"})
     */
    public function index(LabelRepository $labelRepository): Response
    {
        return $this->render('admin/label/index.html.twig', [
            'labels' => $labelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_label_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $label = new Label();
        $form = $this->createForm(LabelType::class, $label);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $label->setCreatedAt(new DateTimeImmutable('NOW'));
            $entityManager->persist($label);
            $entityManager->flush();

            return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/label/new.html.twig', [
            'label' => $label,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_label_show", methods={"GET"})
     */
    public function show(Label $label): Response
    {
        return $this->render('admin/label/show.html.twig', [
            'label' => $label,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_label_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Label $label): Response
    {
        $form = $this->createForm(LabelType::class, $label);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $label->setUpdatedAt(new DateTimeImmutable('NOW'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/label/edit.html.twig', [
            'label' => $label,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_label_delete", methods={"POST"})
     */
    public function delete(Request $request, Label $label): Response
    {
        if ($this->isCsrfTokenValid('delete'.$label->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($label);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
    }
}
