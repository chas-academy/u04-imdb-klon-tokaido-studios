# Dokumentation av tester i projektet

## 🔍 **Typer av tester vi använder:**
| Typ av test        | Syfte |
|-------------------|--------------------------------------|
| **Enhetstester** | Testar enskilda funktioner/modeller isolerat. |
| **Integrationstester** | Säkerställer att flera delar av systemet fungerar tillsammans. |
| **Funktionstester** | Testar hela funktioner ur ett användarperspektiv. |
| **Säkerhetstester** | Verifierar att obehöriga inte kan utföra otillåtna operationer. |

---

## 🛠 **Verktyg och testkörning:**
- **PHPUnit** *(för enhets- och integrationstester i Laravel)*.  

📌 **Hur man kör tester:**  
- Tester körs med `php artisan test`.  
- Specifika testfiler kan köras med t.ex. `php artisan test tests/Feature/AuthTest.php`.
- För att spara felmeddelandet i en fil: `php artisan test > test_errors.txt`

---

## 📌 **Förklaringar av statusar:**
✅ **Godkänt** – Testet har lyckats och verifierats.  
❌ **Misslyckat** – Testet har identifierat ett problem.  
⏳ **Pågår** – Testet har ännu inte slutförts. 

---

## ✅ **Tester och status:**

### Utförelsedatum: 7 feb 2025
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **CreateGameTest**            | Funktionstest | Testar att spel kan skapas, uppdateras och raderas via controllern. | ✅ Godkänt |
| **ListGamesTest**  | Funktionstest | Hämtar en lista över alla spel och verifiera att de visas | ❌ Misslyckat: Får HTTP-statuskoden *500 Internal Server Error*.|
| **UserCreationTest**            | Funktionstest  | Skapa en användare och säkerställ att den sparas korrekt. | ❌ Misslyckat: Försöker verifiera om användardatan har sparats i databasen, men finns inga rader i users-tabellen. |
| **UserProfileTest**         | Funktionstest  | Hämtar en användares profil och verifierar att den går att nå. | ❌ Misslyckat: Får HTTP-statuskoden *500 Internal Server Error*. |
| **CreateReviewTest**            | Funktionstest  | Testar att skapa en recension för ett spel. |  ✅ Godkänt |

### Utförelsedatum: 9 feb 2025
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **CreateGameTest**            | Funktionstest | Testar att spel kan skapas, uppdateras och raderas via controllern. | ✅ Godkänt |
| **ListGamesTest**  | Funktionstest | Hämtar en lista över alla spel och verifiera att de visas | ✅ Godkänt  |
| **UserCreationTest**            | Funktionstest  | Skapa en användare och säkerställ att den sparas korrekt. |  ✅ Godkänt  |
| **UserProfileTest**         | Funktionstest  | Hämtar en användares profil och verifierar att den går att nå. |  ✅ Godkänt |
| **CreateReviewTest**            | Funktionstest  | Testar att skapa en recension för ett spel. |  ✅ Godkänt |

---

## 🔄 **Diverse:**
- [ ] Uppdatera dokumentationen löpande när nya tester skrivs.

---