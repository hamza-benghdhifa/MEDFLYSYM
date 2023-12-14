<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\Messages1Type;
use App\Repository\MessagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\PhoneNumber;
use Symfony\Component\Notifier\Chatter\TwilioChatter;
use Twilio\Rest\Client;
use App\Form\SearchMessagesType;


#[Route('/messages')]
class MessagesController extends AbstractController
{
    #[Route('/', name: 'app_messages_index', methods: ['GET'])]
    public function index(MessagesRepository $messagesRepository): Response
    {
        $messages = $messagesRepository->findBy(['EmailDestinataire' => 'yassine@esprit.tn']);

        return $this->render('messages/index.html.twig', [
            'messages' => $messages,
        ]);
    }
    #[Route('/search', name: 'search_messages')]
    public function searchMessages(Request $request, MessagesRepository $messagesRepository): Response
    {
        // Retrieve the 'email' parameter from the request
        $email = $request->query->get('email');
    
        // Use the custom repository method to search for invitations
        $messages = $messagesRepository->findBy([
            'Email' => $email,
            'EmailDestinataire' => 'yassine@esprit.tn',
        ]);
    
        // Create the search form directly in the controller
        $form = $this->createForm(SearchMessagesType::class);
    
        return $this->render('messages/index.html.twig', [
            'messages' => $messages,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/new', name: 'app_messages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, NotifierInterface $notifier): Response
    {
        $message = new Messages();
    
        // Set the fixed email value
        $fixedEmail = 'anis@esprit.tn';
        $message->setEmail($fixedEmail);
    
        $form = $this->createForm(Messages1Type::class, $message);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager->persist($message);
                $entityManager->flush();
                $localEmail = 'yassine@esprit.tn';
    
                // Check if the email matches the saved message
                if ($message->getEmailDestinataire() === $localEmail) {
                    // Trigger Twilio SMS notification
                    $this->sendTwilioSms($notifier, $message->getContenuMessage());
                }
    
                return $this->redirectToRoute('app_messages_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Exception $e) {
                dump('Error: ' . $e->getMessage());
                // You can log the exception or handle it in a way that fits your application
                // For example, you might want to redirect to an error page or display a flash message.
            }
        }
        
        return $this->renderForm('messages/new.html.twig', [
            'message' => $message,
            'form' => $form,
        ]);
    }

    private function sendTwilioSms(NotifierInterface $notifier, string $messageContent): void
    {
        // Replace with your Twilio account SID, authentication token, and Twilio phone number
        $accountSid = 'AC8265b76493f0d3bd734a586f57370628';
        $authToken = '3ddd692694352b4b88055ac7fc6ab924';
        $twilioPhoneNumber = '+12134654627';
    
        // Replace with the actual recipient phone number in the international format
        $recipientPhoneNumber = '+21690310670';
    
        // Create Twilio client
        $twilio = new Client($accountSid, $authToken);
    
        // Send Twilio SMS notification
        $message = $twilio->messages
            ->create(
                $recipientPhoneNumber,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => 'you have a new message , check it out',
                ]
            );
    
        // You can handle the response or check for success if needed
        // $messageSid = $message->sid;
    }

    #[Route('/{id}', name: 'app_messages_show', methods: ['GET'])]
    public function show(int $id, MessagesRepository $messagesRepository): Response
{
    $message = $messagesRepository->find($id);

    if (!$message) {
        throw $this->createNotFoundException('Message not found');
    }

    return $this->render('messages/show.html.twig', [
        'message' => $message,
    ]);
}

#[Route('/{id}/edit', name: 'app_messages_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, int $id, MessagesRepository $messagesRepository, EntityManagerInterface $entityManager): Response
{
    $message = $messagesRepository->find($id);

    if (!$message) {
        throw $this->createNotFoundException('Message not found');
    }

    $form = $this->createForm(Messages1Type::class, $message);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('app_messages_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('messages/edit.html.twig', [
        'message' => $message,
        'form' => $form,
    ]);
}

#[Route('/{id}', name: 'app_messages_delete', methods: ['POST'])]
public function delete(Request $request, int $id, MessagesRepository $messagesRepository, EntityManagerInterface $entityManager): Response
{
    $message = $messagesRepository->find($id);

    if (!$message) {
        throw $this->createNotFoundException('Message not found');
    }

    if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->request->get('_token'))) {
        $entityManager->remove($message);
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_messages_index', [], Response::HTTP_SEE_OTHER);
}
}
