<?php
namespace App\Factory;

use App\Entity\Attendee;

class HtmlBadgeFactory implements BadgeFactoryInterface
{
    public function createBadge(Attendee $attendee): string
    {
        // Génération du contenu HTML
        $htmlContent = "<html><body><h1>Badge for {$attendee->getName()} ({$attendee->getRole()})</h1></body></html>";

        // Utilisation d'un chemin absolu
        $projectRoot = dirname(__DIR__, 2) . '/';
        $uploadDir = $projectRoot . '/public/uploads/badges';
        $filePath = $uploadDir . "/{$attendee->getId()}.html";

        // Assurez-vous que le répertoire existe
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $uploadDir));
            }
        }

        // Sauvegarde du fichier HTML
        file_put_contents($filePath, $htmlContent);

        return $filePath;
    }
}
