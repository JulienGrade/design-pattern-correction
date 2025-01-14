<?php
namespace App\Factory;

use App\Entity\Attendee;

class PdfBadgeFactory implements BadgeFactoryInterface
{
public function createBadge(Attendee $attendee): string
{
// Génération du contenu du PDF (simulation)
$pdfContent = "PDF Badge for {$attendee->getName()} ({$attendee->getRole()})";

// Utilisation d'un chemin absolu
$projectRoot = dirname(__DIR__, 2) . '/'; // Chemin absolu au projet
$uploadDir = $projectRoot . '/public/uploads/badges';
$filePath = $uploadDir . "/{$attendee->getId()}.pdf";

// Assurez-vous que le répertoire existe
if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $uploadDir));
    } // Création récursive des dossiers si nécessaire
}

// Simulez l'enregistrement d'un fichier PDF
file_put_contents($filePath, $pdfContent);

return $filePath;
}
}
