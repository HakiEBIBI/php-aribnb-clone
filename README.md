# Clone d'Airbnb Laravel

Un clone complet d'Airbnb construit avec Laravel 12 et PostgreSQL, avec gestion des appartements, réservations et
utilisateurs.

## Prérequis

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [PHP 8.4](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [PostgreSQL](https://www.postgresql.org/download/)

## Installation

1. Cloner le dépôt:

```bash
git clone <url-du-depot>
cd <dossier-du-projet>
```

2. Copier le fichier env:

```bash
cp .env.example .env
```

3. Installer les dépendances PHP:

```bash
composer install
```

4. Installer les dépendances Node.js:

```bash
npm install
```

5. Générer la clé d'application:

```bash
php artisan key:generate
```

6. Démarrer les conteneurs Docker:

```bash
./vendor/bin/sail up -d
```

7. Exécuter les migrations avec les seeders:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

8. Démarrer le serveur de développement Vite:

```bash
pnpm run dev
```

## Fonctionnalités

### Gestion des Utilisateurs

- Inscription et authentification
- Gestion du profil
- Autorisation basée sur les rôles (Hôte/Invité)

### Gestion des Appartements

- Création et gestion des annonces
- Upload multiple d'images
- Configuration du prix par nuit
- Localisation avec intégration Google Maps
- Détails de l'appartement (titre, description, nombre max de personnes, etc.)

### Système de Réservation

- Calendrier de disponibilité en temps réel
- Création et gestion des réservations
- Notifications par email pour:
    - Nouvelles réservations
    - Modifications
    - Annulations

### Recherche & Filtres

- Recherche par localisation
- Filtres par:
    - Dates
    - Nombre de voyageurs
    - Fourchette de prix
    - Ville

## Développement

Points d'accès:

- Application: `http://localhost`
- Test des emails (Mailpit): `http://localhost:8025`
- Base de données (PostgreSQL): Port 5432

## Configuration des Clés API

### Google Maps API

1. Rendez-vous sur [Google Cloud Console](https://console.cloud.google.com/)
2. Créez un nouveau projet ou sélectionnez un projet existant
3. Activez les APIs suivantes:
    - Maps JavaScript API
    - Places API
    - Geocoding API
4. Créez une clé API dans "Identifiants"
5. Ajoutez la clé dans votre fichier `.env`:

```bash
GOOGLE_API_KEY=votre_cle_api
```

## Configuration de l'Environnement

Variables d'environnement requises:

```
DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=php_aribnb_clone
DB_USERNAME=sail
DB_PASSWORD=password

GOOGLE_API_KEY=votre_cle_api_google_maps
```

## Technologies Utilisées

- Laravel 12
- PostgreSQL
- Docker
- TailwindCSS
- API Google Maps
- Mailpit pour les tests d'email
