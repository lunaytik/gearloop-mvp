<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User\ChangePasswordType;
use App\Form\User\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

final class UserController extends AbstractController
{
   #[Route('/profile', name: 'app_profile_show', methods: ['GET'])]
    public function showProfile(#[CurrentUser] User $user): Response
    {
        return $this->render('user/profile/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/profile/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function editProfile(Request $request, #[CurrentUser] User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_profile_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/profile/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/settings', name: 'app_settings_show', methods: ['GET'])]
    public function showSettings(#[CurrentUser] User $user): Response
    {
        return $this->render('user/settings/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/settings/password', name: 'app_settings_change_password', methods: ['GET', 'POST'])]
    public function changePasswordSettings(
        Request $request,
        #[CurrentUser] User $user,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        $form = $this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            $newPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($newPassword);

            $entityManager->flush();
            return $this->redirectToRoute('app_settings_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/settings/change_password.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/settings/delete-account', name: 'app_settings_delete_account', methods: ['POST'])]
    public function deleteAccountSettings(
        Request $request,
        #[CurrentUser] User $user,
        EntityManagerInterface $entityManager,
        Security $security
    ): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();

            // Force security logout to avoid bugs
            $security->logout(false);
        }

        return $this->redirectToRoute('app_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
