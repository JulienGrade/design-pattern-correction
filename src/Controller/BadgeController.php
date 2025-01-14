<?php
namespace App\Controller;

use App\Entity\Attendee;
use App\Factory\HtmlBadgeFactory;
use App\Factory\ImageBadgeFactory;
use App\Factory\PdfBadgeFactory;
use App\Service\BadgeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class BadgeController extends AbstractController
{
    #[Route('/badge/generate/{type}', name: 'badge_generate', methods: ['GET'])]
    public function generate(string $type, EntityManagerInterface $entityManager): JsonResponse
    {
        // Création d'un utilisateur fictif
        $attendee = new Attendee();
        $attendee->setName('John Doe')->setRole('student');
        $entityManager->persist($attendee);
        $entityManager->flush();

        // Instanciation du service de génération de badge
        $badgeService = new BadgeService();

        // Sélection de la factory en fonction du type
        switch ($type) {
        case 'pdf':
        $badgeService->setFactory(new PdfBadgeFactory());
        break;
        case 'image':
        $badgeService->setFactory(new ImageBadgeFactory());
        break;
        case 'html':
        default:
        $badgeService->setFactory(new HtmlBadgeFactory());
        break;
        }

        // Génération du badge
        $badge = $badgeService->generateBadge($attendee);

        return new JsonResponse(['badge' => $badge]);
    }
}
