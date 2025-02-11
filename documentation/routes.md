# Dokumentation över rutter i Laravel Breeze-projekt
## 1. Startsida
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|-------|------------------|------------|-------------|
| `GET`  | `/`  | - (view) | - | Visar startsidan |
---
## 2. Autentisering (`/auth`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|----------------|---------------------------------|------------|-------------------------------|
| `GET`  | `/auth/registerNewUser` | - (view) | - | Visar registreringsformuläret |
| `POST` | `/auth/registerNewUser` | `RegisterController@registerUser` | - | Hanterar registrering av ny användare |
| `GET`  | `/auth/login` | `AuthenticatedSessionController@create` | - | Visar inloggningsformuläret |
| `POST` | `/auth/login` | `AuthenticatedSessionController@store` | - | Hanterar inloggning |
| `POST` | `/auth/logout` | `AuthenticatedSessionController@destroy` | `auth` | Hanterar utloggning |
| `DELETE` | `/auth/delete-account` | `AuthenticatedSessionController@destroyAccount` | `auth` | Tar bort användarkonto |
---
## 3. Spel (`/games`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|----------------|-------------------------|------------|-----------------------|
| `GET`  | `/games/index` | `GameController@index` | - | Visar alla spel |
| `GET`  | `/games/search` | `GameController@search` | - | Söker efter spel |
| `GET`  | `/games/{game}/review` | `ReviewController@showReview` | - | Visar recension av ett spel |
---
## 4. Genre (`/genres`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|--------------------|----------------------|------------|-------------------------------|
| `GET`  | `/genres` | `GenreController@index` | - | Visar alla genrer |
| `GET`  | `/genres/{id}/games` | `GenreController@showGames` | - | Visar spel inom en genre |
---
## 5. Plattformar (`/platforms`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|--------------------|----------------------|------------|-------------------------------|
| `GET`  | `/platforms` | `PlatformController@index` | - | Visar alla plattformar |
| `GET`  | `/platforms/{id}/games` | `PlatformController@showGames` | - | Visar spel inom en plattform |
---
## 6. Recensioner (`/reviews`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|-----------------------------------|-------------------------|------------|--------------------------------|
| `GET`  | `/games/{game}/review/create` | `ReviewController@create` | `UserMiddleware` | Visar formulär för att skapa en recension |
| `POST` | `/reviews` | `ReviewController@store` | `UserMiddleware` | Skapar en ny recension |
| `PUT`  | `/reviews/{review}` | `ReviewController@update` | `UserMiddleware` | Uppdaterar en recension |
| `DELETE` | `/reviews/{review}` | `ReviewController@destroy` | `UserMiddleware` | Tar bort en recension |
---
## 7. Användarprofiler (`/profile`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|-----------------|----------------------|------------|-----------------------------|
| `GET`  | `/profile` | `UserController@showProfile` | `UserMiddleware` | Visar användarens profil |
| `GET`  | `/profile/reviews` | `UserController@showReviews` | `UserMiddleware` | Visar användarens recensioner |
| `GET`  | `/profile/lists` | `UserListController@index` | `UserMiddleware` | Visar användarens listor |
| `DELETE` | `/profile` | `UserController@destroy` | `UserMiddleware` | Tar bort användarkonto |
---
## 8. Admin (`/admin`)
| Metod | Route | Controller/Åtgärd | Middleware | Beskrivning |
|-------|---------------------------|----------------------|----------------------|-------------------------------|
| `GET`  | `/admin/profile` | `AdminController@showProfile` | `auth`, `AdminMiddleware` | Visar admin-profilen |
| `GET`  | `/admin/reviews` | `AdminController@showAllReviews` | `auth`, `AdminMiddleware` | Visar alla recensioner |
| `GET`  | `/admin/lists` | `AdminController@showAllLists` | `auth`, `AdminMiddleware` | Visar alla listor |
| `GET`  | `/admin/user` | `AdminController@showAllUsers` | `auth`, `AdminMiddleware` | Visar alla användare |
| `GET`  | `/admin/createUsers` | `AdminController@createUsers` | `auth`, `AdminMiddleware` | Skapar en ny användare |
| `PUT`  | `/admin/editUsers/{id}` | `AdminController@updateUser` | `auth`, `AdminMiddleware` | Uppdaterar en användare |
| `DELETE` | `/admin/users/{id}` | `AdminController@destroy` | `auth`, `AdminMiddleware` | Tar bort en användare |
---
## 9. Uppdateringshistorik
| Datum | Ändring | Ansvarig |
|-------|---------|----------|
| 2025-02-07 | Första versionen av dokumentationen | William Lundquist |
| 2025-02-10 | Andra versionen av dokumentationen | William Lundquist |
