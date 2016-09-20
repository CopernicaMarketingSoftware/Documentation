De beste HTML nieuwsbrief wordt nog steeds gemaakt in HTML tabellen.
Moderne XHTML/CSS technieken worden helaas niet ondersteund door de
meeste e-mailprogramma's zoals Microsoft Outlook 2007, Lotus Notes,
Apple mail of populaire e-maildiensten zoals Gmail, Hotmail en Yahoo.

**Lees het vernieuwde artikel:** [HTML-richtlijnen voor e-mail herzien]
(./html-email-guidelines-revisited.md)

HTML tabellen zijn de nieuwe divs
---------------------------------

Zoals eerder aangegeven, wordt de beste HTML nieuwsbrief gemaakt in HTML
tabellen. Programma's zoals Adobe Dreamweaver, GoLive of andere WYSIWYG
(What You See Is What You Get) editors zijn prima om HTML nieuwsbrieven
te ontwikkelen. Zolang er tabellen worden gebruikt. Het is aan te raden
om de HTML code zelf te schrijven, dit biedt meer vrijheid. Houd het
rustig met tabellen, het nesten van al te veel tabellen levert namelijk
problemen op voor bepaalde e-mailprogramma's. Probeer de HTML zo simpel
mogelijk te houden.

![HTML tabel voor e-mailnieuwsbrieven](../images/code-table.png)

Gebruik inline CSS in de nieuwsbrief
------------------------------------

Veel e-mailprogramma's verwijderen de CSS code uit de . Hierdoor wil het
wel eens voorkomen dat uw HTML nieuwsbrief er niet goed uitziet bij de
ontvanger. Zorg ervoor dat al uw stijlinstellingen inline zijn
opgenomen. Dat kan een enorme klus zijn, omdat alle plekken die content
bevatten een eigen inline stijl moeten krijgen.

Om het werk van de HTML designer makkelijker te maken, biedt Copernica
Marketing Software een zeer [handige CSS
inline-functie](./ontwerp-je-eigen-email-templates.md "handige CSS inline-functie").

![Inline CSS style voor e-mailnieuwsbrieven](../images/code-inline-style.png)

Positioneren
------------

Verder ondersteunen de meeste e-mailprogramma's twee belangrijke
CSS-attributen niet, margin & padding. Hierdoor moet de bekende
'spacer.gif' uit de kast worden gehaald. Bij de opmaak van uw HTML
nieuwsbrief met behulp van CSS, vermijdt u maar best het gebruik van
margin & padding.

Breedte van HTML nieuwsbrief
----------------------------

Nieuwsbrieven hebben altijd een vaste breedte en geen 'fluid' layout.
Dit heeft voornamelijk te maken met de ruimte die populaire
e-maildiensten zoals Hotmail, Gmail en Yahoo reserveren voor het
weergeven van e-mailings. Hiervoor wordt nooit de volledige breedte
benut omdat ze ook ruimte reserveren voor reclamebanners, zoals Gmail
doet.

Hoe breed mag een HTML nieuwsbrief dan zijn? De weergavebreedte van
populaire e-maildiensten als Gmail, Hotmail en Yahoo ligt tussen de 550
en 600 pixels, afhankelijk van de beeldscherminstellingen van de
gebruiker. Houd dit aan als breedte voor je nieuwsbrief en je zit altijd
goed. Lezers hoeven niet in de breedte te scrollen en alle informatie is
in één oogopslag te zien.

De hoogte van een HTML nieuwsbrief is natuurlijk afhankelijk van de
inhoud. Toch is het aan te raden om ook hier rekening mee te houden. De
hoogte van een gemiddeld voorbeeldscherm of 'preview pane' ligt tussen
de 300 en 500 pixels. Probeer daarom de belangrijkste inhoud van de
nieuwsbrief bovenaan te plaatsen.

### Bekijk ook

-   [HTML-richtlijnen voor e-mail herzien] (./html-email-guidelines-revisited.md)
-   [Ontwerp je eigen templates](./ontwerp-je-eigen-email-templates.md "Ontwerp je eigen templates")
-   [Responsive design: je e-mails klaarstomen voor
    mobile](./responsive-design-je-e-mails-klaarstomen-voor-mobile.md "Responsive design: je e-mails klaarstomen voor mobile")
-   [Gratis responsive HTML-e-mailtemplates](./gratis-responsive-html-e-mailtemplates.md)

