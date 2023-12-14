<?php

namespace App\Controller;

use App\Entity\Invitations;
use App\Form\InvitationsType;
use App\Repository\InvitationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Form\SearchInvitationsType;

#[Route('/invitations')]
class InvitationsController extends AbstractController
{
    #[Route('/', name: 'app_invitations_index', methods: ['GET'])]
    public function index(InvitationsRepository $invitationsRepository): Response
    {
        $invitations = $invitationsRepository->findBy(['EmailDestinataireinv' => 'yassine@esprit.tn']);

        return $this->render('invitations/index.html.twig', [
            'invitations' => $invitations,
        ]);
    }

    #[Route('/search', name: 'search_invitations')]
    public function searchInvitations(Request $request, InvitationsRepository $invitationsRepository): Response
    {
        // Retrieve the 'email' parameter from the request
        $email = $request->query->get('email');

        // Use the custom repository method to search for invitations
        $invitations = $invitationsRepository->findBy([
            'Emailinv' => $email,
            'EmailDestinataireinv' => 'yassine@esprit.tn',
        ]);

        // Create the search form directly in the controller
        $form = $this->createForm(SearchInvitationsType::class);

        return $this->render('invitations/index.html.twig', [
            'invitations' => $invitations,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{idinvi}/accept', name: 'app_invitations_accept', methods: ['POST'])]
    public function acceptInvitation(Request $request, EntityManagerInterface $entityManager, InvitationsRepository $invitationsRepository, int $idinvi): Response
    {
        // Find the invitation by ID
        $invitation = $invitationsRepository->find($idinvi);
    
        // Check if the invitation exists
        if (!$invitation) {
            throw $this->createNotFoundException('Invitation not found');
        }
    
        // Update the status to 'approved' only if the request method is POST
        if ($request->isMethod('POST')) {
            $invitation->setStatus('approved');
            $entityManager->flush();
    
            // Redirect after accepting to app_invitations_index
            return $this->redirectToRoute('app_invitations_index');
        }
    
        // This part is not reached if the request method is POST
        return new Response('Invalid request method.', Response::HTTP_BAD_REQUEST);
    }
    #[Route('/new', name: 'app_invitations_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $invitation = new Invitations();
        $form = $this->createForm(InvitationsType::class, $invitation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($invitation);
            $entityManager->flush();

            return $this->redirectToRoute('app_invitations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('invitations/new.html.twig', [
            'invitation' => $invitation,
            'form' => $form,
        ]);
    }

    #[Route('/{idinvi}', name: 'app_invitations_show', methods: ['GET'])]
    public function show(int $idinvi, InvitationsRepository $invitationsRepository): Response
    {
        $invitation = $invitationsRepository->find($idinvi);
    
        if (!$invitation) {
            throw $this->createNotFoundException('Invitation not found');
        }
    
        return $this->render('invitations/show.html.twig', [
            'invitation' => $invitation,
        ]);
    }

    #[Route('/{idinvi}/edit', name: 'app_invitations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $idinvi, InvitationsRepository $invitationsRepository, EntityManagerInterface $entityManager): Response
    {
        $invitation = $invitationsRepository->find($idinvi);
    
        if (!$invitation) {
            throw $this->createNotFoundException('Invitation not found');
        }
    
        $form = $this->createForm(InvitationsType::class, $invitation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            return $this->redirectToRoute('app_invitations_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('invitations/edit.html.twig', [
            'invitation' => $invitation,
            'form' => $form,
        ]);
    }

    #[Route('/{idinvi}', name: 'app_invitations_delete', methods: ['POST'])]
    public function delete(Request $request, int $idinvi, InvitationsRepository $invitationsRepository, EntityManagerInterface $entityManager): Response
    {
        $invitation = $invitationsRepository->find($idinvi);
    
        if (!$invitation) {
            throw $this->createNotFoundException('Invitation not found');
        }
    
        if ($this->isCsrfTokenValid('delete' . $invitation->getIdinvi(), $request->request->get('_token'))) {
            $entityManager->remove($invitation);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_invitations_index', [], Response::HTTP_SEE_OTHER);
    }
}