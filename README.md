# Tokaido Studios - IMDb Klon

Ett Laravel-baserat projekt för att bygga en klon av IMDb.

## Installation

För att komma igång med projektet, följ dessa steg:

1. Installera beroenden:
   ```bash
   composer install
   npm install
   ```

2. Kopiera `.env.example` och skapa din egen `.env`:
   ```bash
   cp .env.example .env
   ```

3. Generera app-nyckeln:
   ```bash
   php artisan key:generate
   ```

4. Klistra in app-nyckeln:
   Gå till `.env`-filen och klistra in nyckeln efter `APP_KEY=`

5. Starta databasen:
   ```bash
   docker compose up -d
   ```

6. Kör migrationerna:
   ```bash
   php artisan migrate
   ```
