<?php

namespace App\Controller;

use App\Entity\Attachedfile;
use App\Form\AttachedfileType;
use App\Repository\AttachedfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/attachedfile")
 */
class AttachedfileController extends AbstractController
{
    /**
     * @Route("/", name="app_attachedfile_index", methods={"GET"})
     */
    public function index(AttachedfileRepository $attachedfileRepository): Response
    {
        return $this->render('attachedfile/index.html.twig', [
            'attachedfiles' => $attachedfileRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_attachedfile_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AttachedfileRepository $attachedfileRepository): Response
    {
        $attachedfile = new Attachedfile();
        $form = $this->createForm(AttachedfileType::class, $attachedfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attachedfileRepository->add($attachedfile, true);

            return $this->redirectToRoute('app_attachedfile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attachedfile/new.html.twig', [
            'attachedfile' => $attachedfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_attachedfile_show", methods={"GET"})
     */
    public function show(Attachedfile $attachedfile): Response
    {
        return $this->render('attachedfile/show.html.twig', [
            'attachedfile' => $attachedfile,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_attachedfile_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Attachedfile $attachedfile, AttachedfileRepository $attachedfileRepository): Response
    {
        $form = $this->createForm(AttachedfileType::class, $attachedfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attachedfileRepository->add($attachedfile, true);

            return $this->redirectToRoute('app_attachedfile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attachedfile/edit.html.twig', [
            'attachedfile' => $attachedfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_attachedfile_delete", methods={"POST"})
     */
    public function delete(Request $request, Attachedfile $attachedfile, AttachedfileRepository $attachedfileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attachedfile->getId(), $request->request->get('_token'))) {
            $attachedfileRepository->remove($attachedfile, true);
        }

        return $this->redirectToRoute('app_attachedfile_index', [], Response::HTTP_SEE_OTHER);
    }
}
