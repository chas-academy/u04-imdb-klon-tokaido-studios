# 🎮 Tokaido Studios - Game Review Platform

Ett **Laravel-baserat** projekt för att bygga en klon av IMDb, anpassad för **spel** istället för filmer.  
Användare kan recensera spel, skapa spellistor och se trailers.

🚀 **Live Version:**  
[🔗 Besök vår Render-sida](https://u04-imdb-klon-tokaido-studios.onrender.com/)

---

## 📥 Installation

För att köra projektet lokalt, följ dessa steg:

### 1️⃣ Klona repot och gå in i projektmappen
- `git clone https://github.com/your-repo/tokaido-studios.git`
- `cd tokaido-studios`

### 2️⃣ Installera beroenden
- `composer install`
- `npm install`

### 3️⃣ Kopiera `.env.example` och skapa `.env`
- `cp .env.example .env`

### 4️⃣ Generera app-nyckeln
- `php artisan key:generate`

### 5️⃣ Starta databasen
- `docker compose up -d`

### 6️⃣ Kör migrationerna
- `php artisan migrate`

### 7️⃣ Seed:a databasen
- `php artisan db:seed`

---

## ✉️ Mailgun – Begränsning vid lösenordsåterställning

Vi använder **Mailgun** för att skicka återställningsmejl.  
**OBS!** Eftersom vi använder en **gratisversion**, kan återställningsmejl endast skickas till vissa adresser.  

---

## 📚 Dokumentation

📌 **För mer information om projektets uppbyggnad och processer:**  
- 📌 [ER-Diagram & Databasstruktur](./documentation/erDiagramAndDatabaseStructure.md)  
- 🚀 [Deployment Guide](./documentation/deployment.md)  
- 🔗 [Routing-översikt](./documentation/routes.md)  

📌 **Övriga dokument:**  
- 📋 [GitHub Strategi](./GITHUB_STRATEGY.md)  
- 🎨 [Design Guide](./DESIGN_GUIDE.md)  
- 📜 [Scenarios](./documentation/scenarios.md)  
- 🧪 [Testing](./documentation/testing.md)  

---

## 🎨 Design & Planering

📌 **Länkar till våra designresurser i Figma:**  
- 🎮 [Projektet i Figma](https://www.figma.com/files/team/1463431489971115067/project/327856347/Team-project?fuid=1417977732575714300)  
- 🧑‍🎨 [Persona](https://www.figma.com/design/czdV9BmHyxK8182M49fo40/Persona?t=61YPz58jiXIW0uXl-0)  
- 📐 [Wireframe](https://www.figma.com/design/qyunZ8Fkymk6JJh32Dk83Q/Figma-Skisser?t=OLlyAw6hys9wndCH-0)  
- 🗺️ [Sitemap](https://www.figma.com/board/kOnpcHG2OSlIcbdZhhWiHx/Sitemap?node-id=0-1&t=FE719OdLxpFqbsIf-1)  
