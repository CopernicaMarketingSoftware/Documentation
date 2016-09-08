Wanneer je HTML nieuwsbrieven opmaakt, kan je er tegenwoordig niet meer
omheen. Mobiel! Steeds meer ontvangers lezen jouw nieuwsbrieven op hun
smartphone of tablet. Bij het bepalen van je activiteiten op gebied van
e-mailmarketing dien je hier vanaf nu absoluut rekening mee te houden.

Momenteel wordt gemiddeld 10 tot 30% van de e-mails mobiel gelezen. -
eMailmonday - "Party safe mobile email stats" (2011)\
 43% van mobiele e-maillezers controleren hun e-mail 4x of meer per dag,
ten opzichte van 29% van mensen die geen gebruik maken van mobiele
e-mail. - Merkle "View From the Digital Inbox 2011" (2011)

Dus ontstaat er steeds meer de nood om je HTML nieuwsbrieven op te maken
voor mobiel gebruik. Maar hoe ga je hierbij te werk? 5 technische punten
waarmee je rekening moet houden wanneer je HTML nieuwsbrieven opmaakt
voor mobiel gebruik:

1. CSS optimaliseren voor mobiel
--------------------------------

Een vaak voorkomend fenomeen bij het lezen van e-mails op mobiele
telefoons zijn de stijlaanpassingen die mobiele browsers toepassen. Dit
kan je voorkomen door gebruik te maken van CSS (Cascading Style Sheets).
Door de onderstaande code in de \<head\>-tag van je nieuwsbrief te
plaatsen, zullen de mobiele browsers de tekstgrootte niet aanpassen.

> `<style type="text/css">     body {-webkit-text-size-adjust:none;}     div, p, a, li, td {-webkit-text-size-adjust:none;}     </style>`

Dit geeft aan dat de tekstgrootte niet mag veranderen (bij het weergeven
van de nieuwsbrief op een mobiel scherm). Wanneer je CSS gebruikt binnen
je HTML nieuwsbrief, gebruik dan inline CSS! Veel e-mailprogramma's
verwijderen namelijk de CSS code uit de `<head>`-tag.

Door gebruik te maken van goede marketingsoftware beschik je over
functies die automatisch de opgegeven stijlregels omzetten naar inline
style attributen en voorkom je het verwijderen van CSS-code uit de
`<head>`-tag van je nieuwsbrief.

2. Opmaak van je HTML nieuwsbrieven
-----------------------------------

Zorg ervoor dat je lezer niet teveel hoeft te scrollen bij het openen
van je nieuwsbrieven. Plaats daarom de inhoudsopgave van je nieuwsbrief
bovenaan. Zo kan de lezer makkelijker inschatten of hij verder wil
lezen.

Bij het opmaken van je nieuwsbrief, beperk je de breedte best tot 640
pixels of minder. E-mails waarvan de breedte geschikt is voor mobiel
gebruik, verhogen de interactie met je lezer en uiteindelijk ook je CTR
(click-through-rate). Meeste mobiele telefoons (smartphones) hebben een
scherm van ongeveer 320 en 480 pixels breed (iPhone is 320px breed
staand en 480px breed liggend). Wanneer je nieuwsbrief dus 640 pixels
breed is, is deze al goed leesbaar voordat je lezer gaat inzoomen.

3. Hou rekening met de vinger
-----------------------------

Je lezers beschikken namelijk niet over een muis wanneer ze je
nieuwsbrieven lezen op hun smartphone of tablet. Naast de breedte, zul
je daarom ook rekening moeten houden met de opmaak van hyperlinks en
call-to-actions (CTA). Bekende frustratie bij het lezen van mobiel is
namelijk het moeilijk openen van hyperlinks en CTA's omdat deze
simpelweg te klein zijn op het scherm of niet duidelijk staan
aangegeven.

Dit los je op door effectief gebruik te maken van een eenvoudig design:
één kolom gebruiken en je witruimte optimaal benutten. Een vinger
beslaat ongeveer 45 pixels op je mobiele scherm. Door een padding toe te
voegen aan je CTA's van ongeveer 10 a 15 pixels, maak je de CTA
makkelijker klikbaar en voorkom je veel frustratie bij de lezer. Een
ander leuk extraatje is je CTA's een 'display:block;' mee te geven.
Hierdoor wordt de oppervlakte groter, maar dat zie je niet omdat er
padding omheen zit.

Of geef je hyperlinks een groter lettertype. Je belangrijkste informatie
wordt duidelijker en de nieuwsbrieven zijn makkelijker te scannen.

4. Denk om je bestandsgrootte
-----------------------------

Vergeet niet dat een mobiele internetverbinding een stuk langzamer loopt
dan die glasvezelverbinding bij jou op kantoor! Een PDF meesturen of
verschillende afbeeldingen van gemiddeld 300Kb in je nieuwsbrieven
toevoegen, heeft dus geen zin voor mobiele lezers. Deze krijgen zij niet
gemakkelijk geopend. Hoe meer je de bestandsgrootte van je HTML
nieuwsbrieven kan minderen, hoe beter.

5. Hou rekening met de landingspagina
-------------------------------------

Zijn je HTML nieuwsbrieven 'mobiel-vriendelijk' opgemaakt? Hou er dan
rekening mee dat de
[landingspagina](./een-goede-landingspagina-waar-moet-je-op-letten.md "Landingspagina optimaliseren")
achter je link en CTA dat ook is. Het heeft weinig zin om nieuwsbrieven
op te maken die een goede weergave hebben op mobiel als de
achterliggende pagina's er niet uitzien. Je mobiele lezers zullen de
volgende keer minder geneigd zijn door te klikken. Zorg dus dat je de
landingspagina:

-   De juiste breedte meegeeft.
-   To-the-point houdt. Laat verdere informatie op dieperliggende
    pagina's terugkomen. Mobiele lezers die meer willen weten, zullen je
    website wel bezoeken zodra ze weer achter hun PC zitten.
-   Gebruik je Flash op je landingspagina's? Vervang dit dan met HTML5,
    CSS3 of Javascript. Iphone en Blackberry ondersteunen namelijk geen
    Flash.
-   Android doet dit wel maar de laadtijd is vrij lang. Flash wordt dus
    best vermeden.
-   Links op mobiele touchscreens hebben geen hover-state. Dat houdt in
    dat je niet over een link of afbeelding kan gaan met je muis om te
    zien of het daadwerkelijk een link betreft. Raak je het scherm aan,
    dan klik je. Zorg er voor dat het duidelijk is voor de lezer wat een
    link is en wat een CTA is.

6. Last but not least: testen!
------------------------------

Het laatste puntje dat ik je graag mee geef maar daarom niet minder
belangrijk. De punten die ik hierboven aanhaal zijn allemaal goede
aandachtspunten. Maar het is niet de bedoeling dat je die zomaar
doorvoert en dan maar gaat verzenden. Test je aanpassingen eerst om te
zien of alles wel goed werkt. Werken je hyperlinks goed? Wordt de
opgegeven stijl wel goed toegepast? Worden je landingspagina's goed
weergegeven? Zodra je zeker weet dat alles in orde is, en zowel je
mobiele als andere lezers je HTML nieuwsbrief goed ontvangen, ben je
klaar om te versturen.

*Dit artikel is eerder verschenen op Marketingfacts; [HTML nieuwsbrieven
opmaken voor mobiel
gebruik](http://www.marketingfacts.nl/berichten/20110711_html_nieuwsbrieven_opmaken_voor_mobiel_gebruik/ "HTML nieuwsbrieven opmaken voor mobiel gebruik")*
