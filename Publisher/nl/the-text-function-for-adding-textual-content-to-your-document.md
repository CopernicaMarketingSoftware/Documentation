Een tekst tag is de code waarmee een tekstblok in een HTML template
wordt opgenomen. Een text tag staat in de broncode van het template, en
kan alleen daar worden toegevoegd. In de documenten onder de template
gebruik je de tekstblokken om content toe te voegen.

Voor het toevoegen van een tekstblok gebruik je de tag [text name="naam
van tekstblok"]. Dit ziet er in de HTML broncode van de template als
volgt uit:

![](../images/textblockcode.png)

In de blokstructuur worden alle tags uit een template weergegeven.
Binnen dit venster kan HTML code aan de tag worden toegevoegd om het
blok een vaste opmaak te geven die doorwerkt op alle onderliggende
documenten. Ook kan je de naam van de tag aanpassen.

![](../images/documentloop.png)

Om de inhoud van de tekstblokken in het document te bewerken, klik je op
**Bewerkmodus** in de werkbalk onderaan het document. Alle aanwezige
blokken worden dan aanklikbaar.

### De HTML editor standaard inladen

Als de eindgebruiker een tekstblok aanklikt, dan wordt standaard de
uitgebreide editor getoond. Als je wilt dat standaard de HTML editor
wordt getoond, voeg dan de volgende optie toe aan aan de tekst tag in de
broncode:

`[text name="article" editor="poor"]`

Let wel, hiermee wordt de uitgebreide editor niet volledig
uitgeschakeld. De eindgebruiker kan deze blijven gebruiken.

#### **Inleidende en afsluitende HTML** {#**inleidende-en-afsluitende-html**}

Voeg HTML toe aan het tekstblok. Deze code alleen wordt ingeladen als op
documentniveau ook daadwerkelijk tekst is ingevoerd. Op deze wijze kan
je het tekstblok van speciale opmaak voorzien, zonder de lay-out van de
template te beinvloeden als er geen tekst wordt toegevoegd in het
document.

`[text name='nameofblock' begin='' end='']`
