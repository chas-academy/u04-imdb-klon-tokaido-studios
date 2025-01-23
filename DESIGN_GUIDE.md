# Designspecifikation

Det här dokumentet beskriver designriktlinjer för att skapa en enhetlig och enkel design. Fokus ligger på färger, typografi och komponenter som vi använder i projektet. Specifikationerna är uppdelade i olika sektioner så att de är lätta att förstå och följa.

**Vänligen notera att detta är som ett utkast, dokumentet är levande och kräver feedback från hela gruppen.**

---

## ⚙️ För att se designen korrekt

🛏️ Öppna terminalen i projektmappen.

⚙️ Kör:

npm run dev

🔄 Uppdatera sidan i webbläsaren.

❓ Om du fortfarande inte ser designen, kontrollera om det finns några felmeddelanden i terminalen.

## 🌈 Bakgrundsfärger

### Huvudlayout (Main Layout)
Bakgrundsfärgen för huvudlayouten är en **linjär gradient** som ger en modern och snygg look:

- **Startfärg:** `#B2B5C0` (ljus blågrå)
- **Slutfärg:** `#525560` (mörk blågrå)
- **Lutning:** 45° (diagonal gradient)

Denna gradient är tänkt att ge en mjuk övergång mellan de två färgerna och fungera som en behaglig bakgrund.

### Innehållsrutor (Content Boxes)
Färgen för innehållsrutorna är neutral för att hålla saker tydliga och lätta att läsa. De har en markerad kant för att skilja dem från bakgrunden.

- **Bakgrundsfärg:** `#D7DAE5` (ljus grå)
- **Border:**
  - Färg: `#F57C00` (brand orange)
  - Tjocklek: `2px`
- **Textfärg:** Svart
- **Skugga:**
  - **X-offset:** `10px`
  - **Y-offset:** `10px`
  - **Spread:** `15px`
  - **Blur:** `5px`

---

### Primära knappar (Button-Style)

- **Bakgrundsfärg:** `#D7DAE5` (ljus grå)
- **Border:**
  - Färg: `#F57C00` (brand orange)
  - Tjocklek: `2px`
- **Textfärg:** Vit
- **Skugga:**
  - **X-offset:** `10px`
  - **Y-offset:** `10px`
  - **Spread:** `15px`
  - **Blur:** `5px`

---

## 🔄 Typsnitt

### Typsnittsfamiljer
Vi använder två olika typsnitt i projektet för att göra det enklare att följa hierarkin i texten:

- **Rubriker:** `"Inter", sans-serif`
- **Brödtext:** `"Roboto", sans-serif`

### Textstorlekar
För att göra texten lättläst har vi valt dessa storlekar:

- **H1:** `2.5rem` (40px)
- **H2:** `2rem` (32px)
- **Paragrafer:** `1rem` (16px)

---

## 🔧 Komponenter

### Standardknapp
Vår knappdesign är standardiserad och finns som komponenten `x-button-style`. Den är gjord för att vara enkel att använda och ser alltid konsekvent ut.

#### Exempel:
```html
<x-button-style>Klicka här</x-button-style>
```

### Standard Innehållsruta
Innehållsrutor är definierade som `x-box-content`. De är responsiva och lätta att arbeta med.

#### Exempel:
```html
<x-box-content>
    <h2>Rubrik</h2>
    <p>Innehåll i rutan</p>
</x-box-content>
```

---

## 🌐 Användning och Förbättringar

- **Responsiv design:** Alla komponenter fungerar på olika skärmstorlekar.
- **Enkel anpassning:** Standardkomponenterna kan användas direkt eller byggas ut vid behov.

Den här strukturen hjälper oss att hålla designen enkel och konsekvent, vilket sparar tid och gör koden lättare att underhålla.

