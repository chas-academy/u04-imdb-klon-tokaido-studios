# Takaido Studios - IMDb Klon

Ett Laravel-baserat projekt för att bygga en klon av IMDb.

## Installation

För att komma igång med projektet, följ dessa steg:

1. Klona repositoryt:
   ```bash
   git clone https://github.com/chas-academy/u04-imdb-klon-tokaido-studios.git

2. Installera beroenden:
   composer install
   npm install

3. Kopiera .env.example och skapa din egen .env:
    cp .env.example .env

4. Generera app-nyckeln:
    php artisan key:generate

6. Klistra in app-nyckeln
    Gå till .env filen
    Klistra in nyckeln efter APP_KEY=

7. Starta Databasen
    docker compose up -d

8. Kör migrationerna:
    php artisan migrate