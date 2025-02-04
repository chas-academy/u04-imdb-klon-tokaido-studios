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
- Specifika tester kan köras med `php artisan test --filter test_namn`.

---

## 📌 **Förklaringar av statusar:**
✅ **Godkänt** – Testet har lyckats och verifierats.  
❌ **Misslyckat** – Testet har identifierat ett problem.  
⏳ **Pågår** – Testet har ännu inte slutförts. 

---

## ✅ **Tester och status:**
| Testnamn                 | Typ av test  | Syfte | Status |
|--------------------------|-------------|--------------------------------------------------|---------|
| **AuthTest**            | Funktionstest | Säkerställer att inloggning, registrering och autentisering fungerar. | ❌ Misslyckat |
| **GameTest**  | Integrationstest | Testar att spel/genrer kan skapas, uppdateras och raderas via controllern.  | ⏳ Pågår |
| **ProfileTest**            | Enhetstest  | Testar att en användare kan skapas och sparas i databasen. | ⏳ Pågår |
| **ReviewTest**         | Enhetstest  | Verifierar att en recension kan kopplas till ett spel och en användare. | ⏳ Pågår |
| **UserTest**            | Enhetstest  | Testar att en användare kan skapas och sparas i databasen. | ⏳ Pågår |

---

## 🔄 **Diverse:**
- [ ] Uppdatera dokumentationen löpande när nya tester skrivs.

---