# PDF documenten
Met de Copernica Publisher kan je gepersonaliseerde PDF bijlagen toevoegen aan
je e-mailtemplates. Alle tekst en afbeeldingen in een PDF zijn te
personaliseren. Hiervoor gebruik je speciale [Smarty](./what-is-
personalization)-tags, een template engine voor PHP. Dankzij deze code is het
mogelijk je de inhoud van je PDF-document volledig naar eigen wens te
personaliseren. Alle opgeslagen relatiegegevens uit je Copernica database,
kun je personaliseren.

De blokken waarmee je in Copernica (gepersonaliseerde) content toevoegt aan
PDF bestanden, maak je niet in Copernica, maar in Acrobat Pro. Je hebt
hiervoor de gratis PDF-lib plugin nodig.

Voor het opstellen van gepersonaliseerde PDF-bestanden dien je te beschikken
over Adobe acrobat PRO en de gratis plugin van PDFlib. Zodra je de plugin hebt
geïnstalleerd, zal Acrobat zijn uitgerust een extra menu met de naam PDFlib
blocks.

Klik in het menu op **PDFlib block tool** om de tool te activeren. Trek een
blok daar waar je het ongeveer in het document wilt hebben. De grootte en
positie van het blok kan je later nog aanpassen.

## Belangrijke instellingen
- Block name: de naam van het blok. Deze naam wordt ook in Copernica getoond
bij het blok. Geef dus een duidelijke naam aan het blok.
- Type: kies het type blok dat je wilt gebruiken. Selecteer **Text** voor het
 toevoegen van tekstuele content. Selecteer **Image** voor het toevoegen van
 een afbeelding.
- PDF: deze optie kan je negeren.

## Typografie wijzigen
Je kunt de weergave van de tekst in tekstblokken naar eigen smaak aanpassen.
Klik op de knop **Text** om bijvoorbeeld het gebruikte lettertype aan te
passen.

**Let op**: als de text meerdere regels beslaat, zorg er dan voor dat de
instelling Text flow op 'true' staat.

**Let op**: alle fonts die je wilt gebruiken, dien je apart te uploaden naar
Copernica.

## Blokken kopiëren
Je kan in Acrobat de blokken eenvoudig kopiëren middels CTRL + C of CMD + C en
CTRL + V of CMD + V.

## Conditionele content
Net als bij content blokken in e-mailings en websites, kan je PDF-blokken
conditioneel tonen. Dit maakt het bijvoorbeeld mogelijk om aan mannen een
geheel andere tekst te tonen dan aan de vrouwelijke lezers (ervan uitgaande
dat je het geslacht van de lezers hebt opgeslagen in de database).

Je maakt condities vanuit het tabblad **Conditie** het tekst- of
afbeeldingsblok van het PDF-document toevoegen.

Het blok wordt getoond aan de lezer als de conditie naar waar valideert. Je
kunt zoveel conditieregels toevoegen als je wilt. De totale conditie evalueert
alleen naar waar wanneer alle ingestelde condities naar 'waar' evalueren.

## JavaScript condities
Desgewenst kun je de JavaScript editor gebruiken voor het schrijven van
geavanceerde condities in JavaScript.

Een eenvoudige vergelijking in JavaScript, zou er als volgt uit kunnen zien:

```js
profile.Woonplaats == 'Amsterdam';
```

Het desbetreffende contentblok wordt dan alleen getoond als de woonplaats
gelijk is aan Amsterdam.
