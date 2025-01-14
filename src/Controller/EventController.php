<?php

namespace App\Controller;

use App\Entity\Event;
use App\Observer\ApiNotificationObserver;
use App\Observer\EmailNotificationObserver;
use App\Observer\EventSubject;
use App\Observer\SmsNotificationObserver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController{
    #[Route('/event', name: 'event_list')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'message' => 'Welcome to the Event Management App!',
        ]);
    }

    #[Route('/event/update', name: 'event_update', methods: ['GET', 'POST'])]
    public function updateEvent(EntityManagerInterface $entityManager): Response
    {
        // Récupération d'un événement
        $event = $entityManager->getRepository(Event::class)->find(1); // Exemple avec ID = 1

        if (!$event) {
            throw $this->createNotFoundException('Event not found.');
        }

        // Vérification de la date
        if ($event->getDate() === null) {
            throw new \RuntimeException('Event date is not set.');
        }

        // Formatage de la date
        $formattedDate = $event->getDate()->format('Y-m-d H:i:s');

        // Retour d'une réponse avec la date formatée
        return new Response("The event date is: $formattedDate");
    }
}
