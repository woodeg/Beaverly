<?php

namespace App\Controller\User;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TaskController extends AbstractController
{
    /**
     * @Route("/user/task", name="task")
     */
    public function index(TaskRepository $TaskRepository): Response
    {
        return $this->render('content/task/index.html.twig', [
            'tasks' => $TaskRepository->findAll()
        ]);
    }

    /**
     * @Route("/user/task/new", name="task_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $task = new task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $task->setCreatedAt(new DateTimeImmutable('NOW'));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('task', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/task/new.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/user/task/{id}", name="task_show", methods={"GET","POST"})
     */
    public function show(Task $task): Response
    {
        return $this->render('content/task/show.html.twig', [
            'task' => $task
        ]);
    }

    /**
     * @Route("/user/task/{id}/edit", name="task_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, task $task): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $task->setUpdatedAt(new DateTimeImmutable('NOW'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('task', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('content/task/edit.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/user/task/delete{id}", name="task_delete", methods={"POST"})
     */
    public function delete(Request $request, Task $task): Response
    {
        if ($this->isCsrfTokenValid('delete'.$task->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($task);
            $entityManager->flush();
        }

        return $this->redirectToRoute('task', [], Response::HTTP_SEE_OTHER);
    }
}
