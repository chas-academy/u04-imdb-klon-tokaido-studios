# 📝 GitHub Strategi

## 📝 Beskrivning

För att vi ska kunna samarbeta smidigt i projektet är det viktigt att vi har en enkel och tydlig GitHub-strategi. Denna strategi hjälper oss att hantera commits, branches och pull requests på ett strukturerat sätt. Vårt mål är att hålla projektet organiserat och undvika problem.

## 🔍 Strategi

### Branch-struktur

- **Main branch**: Main ska alltid vara stabil och fungera. Vi gör inga direkta commits till main.

- **Feature branches**: Varje ny funktion eller ändring görs i en egen branch. Namnge branchen efter vad du jobbar med, t.ex. `feature/add-login` eller `bugfix/fix-header`.
  
### Testa innan commit

- Innan du commitar kod, kontrollera att all funktionalitet fungerar som förväntat.

  - Testa funktionerna du har ändrat, både i webbläsaren och i eventuell backend-logik.
  - Kontrollera att inga felmeddelanden visas i konsolen eller server-loggar.

- Om du lagt till ny funktionalitet, inkludera en kort beskrivning av hur den testats i commit-meddelandet eller PR:n.

### Commit-regler

- Skriv tydliga och korta commit-meddelanden som beskriver vad du gjort.

  - **Bra exempel:** `Lade till validering i login-formuläret`
  - **Dåliga exempel:** `Fix`, `Stuff`, `Update`

- Gör flera små commits istället för stora ändringar på en gång. Det är lättare att spåra vad som ändrats.

### Pull Requests (PRs)

- När du är klar med din branch, öppna en Pull Request (PR).

- Beskriv kort vad du har gjort i PR:n.

- Koden kontrolleras av samtliga gruppmedlemmar på möte, vid godkännande så mergas branch till main under mötets gång.

### Merge-strategi

- Använd **squash and merge** för att hålla historiken enkel och ren.

- Mergea inte kod som har kända problem eller som inte är klar.

### Arbetsflöde

1. Skapa en ny branch för varje funktion eller ändring.
2. Gör små commits och pusha din branch till GitHub.
3. Öppna en Pull Request när du är klar och be en klasskompis granska.
4. Mergea till main efter att den blivit godkänd.