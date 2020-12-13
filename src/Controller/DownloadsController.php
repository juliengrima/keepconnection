<?php

namespace App\Controller;

use App\Entity\Downloads;
use App\Form\DownloadsType;
use App\Repository\DownloadsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/downloads")
 */
class DownloadsController extends AbstractController
{
    /**
     * @Route("/", name="downloads_index", methods={"GET"})
     */
    public function index(DownloadsRepository $downloadsRepository): Response
    {
        return $this->render('downloads/index.html.twig', [
            'downloads' => $downloadsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="downloads_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $download = new Downloads();
        $form = $this->createForm(DownloadsType::class, $download);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($download);
            $entityManager->flush();

            return $this->redirectToRoute('downloads_index');
        }

        return $this->render('downloads/new.html.twig', [
            'download' => $download,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="downloads_show", methods={"GET"})
     */
    public function show(Downloads $download): Response
    {
        return $this->render('downloads/show.html.twig', [
            'download' => $download,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="downloads_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Downloads $download): Response
    {
        $form = $this->createForm(DownloadsType::class, $download);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('downloads_index');
        }

        return $this->render('downloads/edit.html.twig', [
            'download' => $download,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="downloads_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Downloads $download): Response
    {
        if ($this->isCsrfTokenValid('delete'.$download->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($download);
            $entityManager->flush();
        }

        return $this->redirectToRoute('downloads_index');
    }
}
