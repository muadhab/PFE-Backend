<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Form\UserProfileType;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/profile")
 */
class UserProfileController extends AbstractController
{
    /**
     * @Route("/", name="app_user_profile_index", methods={"GET"})
     */
    public function index(UserProfileRepository $userProfileRepository): Response
    {
        return $this->render('user_profile/index.html.twig', [
            'user_profiles' => $userProfileRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_user_profile_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserProfileRepository $userProfileRepository): Response
    {
        $userProfile = new UserProfile();
        $form = $this->createForm(UserProfileType::class, $userProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userProfileRepository->add($userProfile, true);

            return $this->redirectToRoute('app_user_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_profile/new.html.twig', [
            'user_profile' => $userProfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_user_profile_show", methods={"GET"})
     */
    public function show(UserProfile $userProfile): Response
    {
        return $this->render('user_profile/show.html.twig', [
            'user_profile' => $userProfile,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_user_profile_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, UserProfile $userProfile, UserProfileRepository $userProfileRepository): Response
    {
        $form = $this->createForm(UserProfileType::class, $userProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userProfileRepository->add($userProfile, true);

            return $this->redirectToRoute('app_user_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_profile/edit.html.twig', [
            'user_profile' => $userProfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_user_profile_delete", methods={"POST"})
     */
    public function delete(Request $request, UserProfile $userProfile, UserProfileRepository $userProfileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userProfile->getId(), $request->request->get('_token'))) {
            $userProfileRepository->remove($userProfile, true);
        }

        return $this->redirectToRoute('app_user_profile_index', [], Response::HTTP_SEE_OTHER);
    }
}
