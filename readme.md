# Atelier Symfony avec Design Patterns

Ce projet Symfony a été conçu pour illustrer l'utilisation de différents Design Patterns dans un contexte pratique et réaliste. Vous y trouverez des implémentations pour les patterns suivants :

- **Strategy** : Gestion des frais d'inscription.
- **Factory** : Génération de badges pour les participants.
- **Decorator** : Personnalisation des emails.
- **Observer** : Notification des participants.
- **Command** : Génération de rapports périodiques.
- **Chain of Responsibility** : Gestion des paiements multi-canaux.

## Prérequis

- PHP >= 8.1
- Symfony CLI
- Composer
- Une base de données configurée (MySQL, PostgreSQL, etc.)

## Installation

```bash
# Cloner le projet
$ git clone <url-du-projet>

# Accéder au dossier du projet
$ cd <nom-du-dossier>

# Installer les dépendances
$ composer install

# Configurer la base de données
$ symfony console doctrine:database:create

# Exécuter les migrations
$ symfony console doctrine:migrations:migrate

# Lancer le serveur Symfony
$ symfony server:start
```

## Utilisation des Design Patterns

### Strategy : Gestion des frais d'inscription

#### Description
Ce pattern permet de calculer les frais d'inscription en fonction du rôle d'un participant.

#### Tester avec cURL
```bash
curl "https://127.0.0.1:8000/fee/calculate?role=student&baseFee=200"
```

---

### Factory : Génération de badges

#### Description
Ce pattern génère des badges pour les participants sous différents formats (PDF, HTML, Image).

#### Tester avec cURL

- **PDF**
```bash
curl "https://127.0.0.1:8000/badge/generate/pdf"
```

- **HTML**
```bash
curl "https://127.0.0.1:8000/badge/generate/html"
```

- **Image**
```bash
curl "https://127.0.0.1:8000/badge/generate/image"
```

---

### Decorator : Personnalisation des emails

#### Description
Ce pattern personnalise les emails en ajoutant des fonctionnalités comme la journalisation, la mise en cache et le chronométrage.

#### Tester avec cURL
```bash
curl -X POST "https://127.0.0.1:8000/email/send" -d '{"recipient":"test@example.com", "subject":"Test Email", "body":"Hello World!"}' -H "Content-Type: application/json"
```

---

### Observer : Notification des participants

#### Description
Ce pattern envoie des notifications aux participants lorsqu'un événement est mis à jour.

#### Tester avec cURL
```bash
curl -X POST "https://127.0.0.1:8000/event/update"
```

---

### Command : Génération de rapports périodiques

#### Description
Ce pattern exécute des commandes pour générer des rapports.

#### Tester avec Symfony Console
```bash
symfony console app:generate-reports
```

---

### Chain of Responsibility : Gestion des paiements

#### Description
Ce pattern permet de gérer les paiements via différents canaux (carte bancaire, PayPal, virement).

#### Tester avec cURL
```bash
curl -X POST "https://127.0.0.1:8000/payment/process" -d '{"method":"credit_card", "amount":100}' -H "Content-Type: application/json"
```

---

## Structure du Projet

```plaintext
src/
├── Command/
├── Controller/
├── Entity/
├── Factory/
├── Handler/
├── Observer/
├── Repository/
├── Service/
└── Strategy/
```

---

## Tests

### Lancer les tests
Utilisez la commande suivante pour exécuter tous les tests :
```bash
php bin/phpunit
```

Ajoutez ou modifiez des tests pour couvrir chaque design pattern.
