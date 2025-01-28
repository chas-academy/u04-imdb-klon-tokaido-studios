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

---
## Länkar
[Länk till Projektet](https://www.figma.com/files/team/1463431489971115067/project/327856347/Team-project?fuid=1417977732575714300)<br>
[Länk till Persona](https://www.figma.com/design/czdV9BmHyxK8182M49fo40/Persona?t=61YPz58jiXIW0uXl-0)<br>
[Länk till ER-Diagram](https://www.figma.com/board/Vm57pOkwmrsDaM94NxQhll/ER-Diagram?t=OLlyAw6hys9wndCH-0)<br>
[Länk till Wireframe](https://www.figma.com/design/qyunZ8Fkymk6JJh32Dk83Q/Figma-Skisser?t=OLlyAw6hys9wndCH-0)<br>
[Länk till Github Strategi](./GITHUB_STRATEGY.md)
