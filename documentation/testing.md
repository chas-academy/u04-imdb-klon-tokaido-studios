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

### Utförelsedatum: 4 feb 2025
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **AuthTest**            | Funktionstest | Säkerställer att inloggning, registrering och autentisering fungerar. | ❌ Misslyckat |
| **GameTest**  | Integrationstest | Testar att spel/genrer kan skapas, uppdateras och raderas via controllern.  | ❌ Misslyckat |
| **ProfileTest**            | Enhetstest  | Testar att en användare kan skapas och sparas i databasen. | ❌ Misslyckat |
| **ReviewTest**         | Enhetstest  | Verifierar att en recension kan kopplas till ett spel och en användare. | ❌ Misslyckat |
| **UserTest**            | Enhetstest  | Testar att en användare/användarlistor kan skapas och sparas i databasen. | ❌ Misslyckat |

### Utförelsedatum: 5 feb 2025
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **AuthTest**            | Funktionstest | Säkerställer att inloggning, registrering och autentisering fungerar. | ❌ Misslyckat |
| **GameTest**  | Integrationstest | Testar att spel/genrer kan skapas, uppdateras och raderas via controllern.  | ❌ Misslyckat |
| **ProfileTest**            | Enhetstest  | Testar att en användare kan skapas och sparas i databasen. | ❌ Misslyckat |
| **ReviewTest**         | Enhetstest  | Verifierar att en recension kan kopplas till ett spel och en användare. | ❌ Misslyckat |
| **UserTest**            | Enhetstest  | Testar att en användare/användarlistor kan skapas och sparas i databasen. | ❌ Misslyckat |

### Utförelsedatum: 6 feb 2025
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **AuthTest**            | Funktionstest | Säkerställer att inloggning, registrering och autentisering fungerar. | ❌ Misslyckat: User::factory fungerar inte/User.php saknar factory |
| **GameTest**  | Integrationstest | Testar att spel/genrer kan skapas, uppdateras och raderas via controllern.  | ❌ Misslyckat: |
| **ProfileTest**            | Enhetstest  | Testar att en användare kan skapas och sparas i databasen. |  |
| **ReviewTest**         | Enhetstest  | Verifierar att en recension kan kopplas till ett spel och en användare. |  |
| **UserTest**            | Enhetstest  | Testar att en användare/användarlistor kan skapas och sparas i databasen. |  |

---

## 🔄 **Diverse:**
- [ ] Uppdatera dokumentationen löpande när nya tester skrivs.

---