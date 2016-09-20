Een afbeelding tag is de code waarmee je in een HTML template een
afbeeldingblok kan opnemen. Een afbeelding tag staat in de broncode van
het template, en kan alleen daar worden toegevoegd.

Dit ziet eruit als volgt:

![](../images/imageblocktag.png)

Gebruik een unieke naam voor ieder afzonderlijk afbeeldingblok dat je
aan je template toevoegt.

Extra opties voor een afbeeldingblok
------------------------------------

De opmaakopties voor een afbeeldingblok kan je direct vanuit de template
broncode instellen. In het onderstaande voorbeeld zijn alle beschikbare
opties opgenomen. Deze worden hieronder verder toegelicht.

`[image name='article-image' optional='yes' maxwidth='320' width='50' height='50' maxheight='10' minwidth='10' minheight='10' begin='Leading HTML code' end='Trailing HTML code']`

### Afbeelding is optioneel

Wanneer deze functie is aangezet, wordt alleen een afbeelding in het
document getoond, wanneer deze ook op documentniveau is toegevoegd.
Zonder afbeelding wordt ook geen ruimte getoond op de plek van de
afbeelding.

`[image name="blabla" optional="yes"]`

### Formaat

Stelt een vaste hoogte en breedte in voor elke afbeelding.\
 Een afbeelding die op documentniveau wordt toegevoegd, wordt aangepast
naar dit formaat (vergroot of verkleind).

`[image name="picture" width="200" height="200"]`

Afbeeldingen ingeladen met het bovenstaande blok worden teruggeschaald
naar 200x200 pixels.

#### **Minimale en maximale hoogte**

Stel een minimale en maximale hoogte in voor de afbeelding. Afbeeldingen
met een afwijkend formaat worden geschaald naar naar de opgegeven
waardes. De breedte wordt automatisch aangepast met behoud van de
proporties.

`[image name="header"  maxheight="600" minheight="300"]`

#### **Max and min width**

Stel een minimale en maximale breedte in voor de afbeelding.
Afbeeldingen met een afwijkend formaat worden geschaald naar naar de
opgegeven waardes. De hoogte wordt automatisch aangepast met behoud van
de proporties..

`[image name="header"  maxwidth="600" minwidth="300"]`

#### **Inleidende en afsluitende HTML**

Voeg HTML toe aan het afbeeldingblok. Deze code alleen wordt ingeladen
als op documentniveau ook daadwerkelijk een afbeelding wordt gebruikt.
Op deze wijze kan je het afbeeldingblok van speciale opmaak voorzien,
zonder de lay-out van de template te beinvloeden als er geen afbeelding
wordt toegevoegd in het document.

`[image name='nameofblock' begin='' end='']`
