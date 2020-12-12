<?php

namespace App\Controller;

use App\Entity\Ticketting;
use App\Form\TickettingType;
use App\Repository\TickettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticketting")
 */
class TickettingController extends AbstractController
{
    /**
     * @Route("/", name="ticketting_index", methods={"GET"})
     */
    public function index(TickettingRepository $tickettingRepository): Response
    {
        return $this->render('ticketting/index.html.twig', [
            'tickettings' => $tickettingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ticketting_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ticketting = new Ticketting();
        $form = $this->createForm(TickettingType::class, $ticketting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticketting);
            $entityManager->flush();

            return $this->redirectToRoute('ticketting_index');
        }

        return $this->render('ticketting/new.html.twig', [
            'ticketting' => $ticketting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticketting_show", methods={"GET"})
     */
    public function show(Ticketting $ticketting): Response
    {
        return $this->render('ticketting/show.html.twig', [
            'ticketting' => $ticketting,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ticketting_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ticketting $ticketting): Response
    {
        $form = $this->createForm(TickettingType::class, $ticketting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticketting_index');
        }

        return $this->render('ticketting/edit.html.twig', [
            'ticketting' => $ticketting,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ticketting_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ticketting $ticketting): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketting->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ticketting);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ticketting_index');
    }
}
