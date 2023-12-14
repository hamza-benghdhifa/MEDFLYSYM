<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Medecin;
use Twilio\Rest\Client;
use App\Entity\Medecinm;
use App\Form\MedecinType;
use App\Entity\Reservation;
use App\Entity\Reservasion ;
use App\Form\ReservasionType;
use App\Form\MedecinSearchType;
use App\Form\SearchMaissaType ;
use App\Entity\MedecinSearchMaissa;
use App\Form\MedicinRevervationType;


use App\Repository\MedecinRepository;
use App\Repository\MedecinmRepository;
use Twilio\Exceptions\TwilioException;
use App\Entity\MedecinSearchReservation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Twilio\Exceptions\ConfigurationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/reservation')]
class ReservationController extends AbstractController
{

   
    
  

    #[Route('/newRESERVATION/{id}', name: 'app_Fform_new', methods: ['GET', 'POST'])]
public function new(
    Request $request,
    EntityManagerInterface $entityManager,
    $id,
    
   
    
  
    
): Response {



    $medecin = $this->getDoctrine()->getRepository(Medecinm::class)->find($id);

    $reservasion = new Reservation();

    // $patientForm = $this->createForm(PatientType::class, $patient); // Cette ligne est commentée, je ne sais pas si vous en avez besoin
     $reservasionForm = $this->createForm(ReservasionType::class, $reservasion);

    // Correction pour récupérer un patient et un médecin
 
    $reservasionForm->handleRequest($request);

    if ($reservasionForm->isSubmitted() && $reservasionForm->isValid()) {
      //$reservasion->setReservation($patient);
      $reservasion->setMedecinId($medecin);

        

/*
      $email = (new Email())
      ->from('maissa.benghalba@esprit.tn')
      ->to('maissa.benghalba@esprit.tn')
      ->subject('Details RESERVATION')
      ->text("Bonjour  Vous avez réservé un rendez-vous à " . $reservasion->getDateRdv()->format('d-m-Y H:i:s'));
  
  try {
      $mailer->send($email);
      $this->addFlash('message', 'E-mail de ticket envoyé.');
  } catch (TransportExceptionInterface $e) {
     
      $this->addFlash('error', 'Erreur lors de l\'envoi de l\'e-mail.');
  }

*/

        $entityManager->persist($reservasion);
        $entityManager->flush();

        return $this->redirectToRoute('app_patient_get_by_id', ['id' => $reservasion->getId()], Response::HTTP_SEE_OTHER);
    }

    return $this->render('reservation/Add.html.twig', [
        'reservasionForm' => $reservasionForm->createView(),
       
    ]);
}























    
    




 #[Route('/searchMaissa', name: 'app_medecin_searchMa')]
public function search(EntityManagerInterface $entityManager, Request $request, MedecinmRepository $medecinRepository): Response
{
    $propertySearch = new MedecinSearchMaissa();
    $form = $this->createForm(SearchMaissaType::class, $propertySearch);
    $form->handleRequest($request);

    $medecin = [];

    if ($form->isSubmitted() && $form->isValid()) {
        $specialite = $propertySearch->getSpecialite();
        $pays = $propertySearch->getPays();

        // Utiliser le MedecinRepository pour effectuer la recherche
        $medecin = $medecinRepository->findBy(['specialite' => $specialite, 'pays' => $pays]);
    } else {
        // Utiliser le MedecinRepository pour récupérer tous les médecins
        $medecin = $medecinRepository->findAll();
    }

    // ...

    return $this->render('reservation/Show.html.twig', [
        'form' => $form->createView(),
        'medecin' => $medecin,
    ]);
}



#[Route('/patient/{id}', name: 'app_patient_get_by_id', methods: ['GET'])]
public function getById(int $id): Response
{
   
    $reservation = $this->getDoctrine()->getRepository(Reservation::class)->find($id);

    if (!$reservation) {
        throw $this->createNotFoundException('Réservation non trouvée');
    }

    return $this->render('reservation/getById.html.twig', [
        'reservation' => $reservation,
    ]);
}

#[Route('/edit/{id}', name: 'app_form_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, EntityManagerInterface $entityManager,  int $id): Response
{
    
    $reservasion = $this->getDoctrine()->getRepository(Reservation::class)->find($id);

    
    if (!$reservasion) {
        throw $this->createNotFoundException('Réservation non trouvée');
    }

    // Créez les formulaires
   // $patientForm = $this->createForm(PatientType::class, $reservasion->getPatient());
    $reservasionForm = $this->createForm(ReservasionType::class, $reservasion);
  //  $medecinForm = $this->createForm(MedecinFormType::class, $reservasion->getMedecin());

    // Gérez la soumission du formulaire
   // $patientForm->handleRequest($request);
    $reservasionForm->handleRequest($request);
  //  $medecinForm->handleRequest($request);

    if ($reservasionForm->isSubmitted() ) {
        // Mettez à jour les relations entre les entités
     

        // Persistez les modifications
        $entityManager->flush();

        // Envoyez un e-mail, etc.

        // Redirigez vers la page de détails après modification
        return $this->redirectToRoute('app_patient_get_by_id', ['id' => $reservasion->getId()], Response::HTTP_SEE_OTHER);
    }

    // Affichez le formulaire de modification
    return $this->render('reservation/edit.html.twig', [
  
        'reservasionForm' => $reservasionForm->createView(),
        
    ]);
}










#[Route('/pdf/{id}', name: 'pdf', methods: ['GET'])]
public function pdf(EntityManagerInterface $entityManager, Request $request, $id): Response
{
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($options);

    $article = $entityManager->getRepository(Reservation::class)->find($id);

    if (!$article) {
        // Gérer le cas où l'article n'est pas trouvé, peut-être rediriger vers une page d'erreur
    }

    $html = $this->renderView('reservation/pdf.html.twig', [
        'articles' => [$article], // Notez que j'ai mis l'article dans un tableau
    ]);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("mypdf.pdf", ["Attachment" => true]);
}




#[Route('/admin', name: 'app_revervation_search')]
public function reservation(EntityManagerInterface $entityManager, Request $request): Response
{
    $propertySearch = new MedecinSearchReservation();
    $form = $this->createForm(MedicinRevervationType::class, $propertySearch);
    $form->handleRequest($request);

    $medecinWithReservations = [];

    if ($form->isSubmitted() && $form->isValid()) {
        $nom = $propertySearch->getNom();

        // Récupérer le médecin en fonction du nom
        $medecin = $this->getDoctrine()->getRepository(Medecinm::class)->findOneBy(['nom' => $nom]);

        if ($medecin) {

            $reservations = $this->getDoctrine()->getRepository(Reservation::class)->findBy(['medecinId' => $medecin]);

            $medecinWithReservations[] = [
                'medecin' => $medecin,
                'reservations' => $reservations,
            ];
        }
    } else {
       
        $medecins = $this->getDoctrine()->getRepository(Medecinm::class)->findAll();

       
        foreach ($medecins as $medecin) {
            $reservations = $this->getDoctrine()->getRepository(Reservation::class)->findBy(['medecinId' => $medecin]);

            $medecinWithReservations[] = [
                'medecin' => $medecin,
                'reservations' => $reservations,
            ];
        }
    }

    return $this->render('reservation/ShowReservation.html.twig', [
        'form' => $form->createView(),
        'medecinWithReservations' => $medecinWithReservations,
    ]);
}







    

    
}

