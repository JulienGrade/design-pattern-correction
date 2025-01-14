<?php
namespace App\Factory;

use App\Entity\Attendee;

class ImageBadgeFactory implements BadgeFactoryInterface
{
    public function createBadge(Attendee $attendee): string
    {
        // Génération du contenu image (simulation avec une chaîne)
        $imageContent = "Image Badge for {$attendee->getName()} ({$attendee->getRole()})";

        // Utilisation d'un chemin absolu
        $projectRoot = dirname(__DIR__, 2) . '/';
        $uploadDir = $projectRoot . '/public/uploads/badges';
        $filePath = $uploadDir . "/{$attendee->getId()}.png";

        // Assurez-vous que le répertoire existe
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $uploadDir));
            }
        }

        // Simulez l'enregistrement d'une image (contenu texte pour l'exemple)
        file_put_contents($filePath, $imageContent);

        return $filePath;
    }
}
