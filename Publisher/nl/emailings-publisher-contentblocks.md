# Contentblokken in de Publisher
Dit kun je gebruiken in de broncode van een e-mailtemplate. Er zijn 3 soorten
content blokken/tags. Deze tags worden in dit artikel nader toegelicht.

## Text tags
Als je zelf een template maakt, kun je in de broncode van de template [text]
tags opnemen. Op de plaats van de [text] tag in de template kan op
documentniveau later tekst worden ingevoerd.

![](../images/textblockcode.png)

Zoals met alle tags die je in een template kunt plaatsen, is het verstandig om
de tag te voorzien van een *name* attribuut. Als je dan later de volgorde van
de tags verandert, of als je later een nieuwe tag toevoegt aan de template dan
blijven bestaande documenten intact. Door een *name* attribuut te gebruiken
kunnen op documentniveau de ingevoerde teksten herleid worden tot het juiste
blok in de template, zelfs als je later de template aanpast en de volgorde van
de blokken verandert.

`[text name="example"]`

Zorg er voor dat je voor elke text tag een andere naam gebruikt.

### De editor
Op documentniveau kan een tekst worden geplaatst op de plek van de [text] tag.
Normaal gesproken wordt hier een handige *what-you-see-is-what-you-get*
(WYSIWYG) editor voor gebruikt, waarmee het makkelijk is om de ingevoerde tekst
op te maken en van (eenvoudige) opmaak te voorzien. Deze editor is voor de
meeste mensen die  op documentniveau werken, vaak marketeers, het prettigst in
het gebruik.

Indien gewenst kan de marketeer als hij of zij een tekst bewerkt de handige
editor uitschakelen en overstappen op een ruwe HTML editor. Hij of zij moet dan
zelf de HTML code invoeren die op de plek van de [text] tag wordt geplaatst.

Als je bij het maken van een template al van te voren weet dat een gebruiker de
voorkeur geeft aan deze HTML editor in plaats van de WYSIWYG editor, dan kun je
dat in de template aangeven.

`[text name="example1" editor="poor"]`

We hebben de prettig te gebruiken WYSIWIG editor de "rich" editor genoemd. Deze
editor heeft immers allerlei tools en knopjes die het leven makkelijker maken
en verrijken. Voor de andere editor, waarmee je zelf de pure HTML code moet
invoeren, gebruiken we het tegenovergestelde als naam: "poor".

`[text name="example2" editor="rich"]`

### Inleidende en afsluitende HTML code
Je kunt ook een attribuut *begin* en *end* aan de [text] tag toevoegen.

`[text name="example" begin="<b>" end="</b>"]`

Als op documentniveau het tekstblok leeg blijft dan wordt de waarde van de
*begin* en *end* tags gegenereerd. Er komen dan dus ook geen &lt;b&gt; en
&lt;/b&gt; in het uiteindelijke document. Maar als er wel een tekst wordt
ingevoerd, dan wordt de waardes van deze attributen automatisch rond de
ingevoerde tekst geplaatst.

## Image tags
In een template kun je met behulp van [image] tags opgeven waar afbeeldingen
mogen worden geplaatst. Als de template wordt gebruikt voor het samenstellen
van een document, kan in het document op elke plek waar je een [image] tag hebt
gezet door de gebruiker een afbeelding worden ingevoerd.

![](../images/imageblocktag.png)

Ook hier geldt weer, net als bij de andere *tags* die je in een template kunt
plaatsen, dat het sterk is aan te raden om een attribuut *name* aan de tag toe
te voegen. Hierdoor kunnen op documentniveau de afbeeldingen worden gekoppeld
aan de juiste image tags, zelfs als je later de template wijzigt en de volgorde
van de tags verandert. Elke afbeelding binnen de template moet een unieke naam
hebben.

### Formaat
De afbeelding die op documentniveau door de gebruiker wordt ingevoerd, wordt
normaal gesproken ongewijzigd overgenomen, zelfs als de afbeelding veel te
groot is en daardoor de vormgeving uit zijn verband trekt. Maar er zijn
allerlei  attributen om dit te voorkomen. Met deze attributen kun je het
formaat van een  afbeelding afdwingen, of een minimum- en/of maximumgrootte
opgeven.

Als je er zeker van wilt zijn dat een afbeelding altijd 100x100
pixels groot is, ook als een groter of kleiner plaatje wordt geüpload, dan kun
je dit doen door middel van de volgende code:

`[image name="example" width="100" height="100"]`

Afbeeldingen die niet precies 100x100 pixels groot zijn worden automatisch
vergroot of verkleind. Naast deze precies afgedongen grootte die je met de
*width* en *height* attributen instelt, kun je ook een minimum- of
maximumgrootte opgeven. Als de breedte van een afbeelding bijvoorbeeld binnen
de 100 en 150 pixels moet blijven, doe je dit als volgt:

`[image name="example" minwidth="100" maxwidth="150"]`

Er zijn ook *minheight* en *maxheight* attributen die hetzelfde doen voor de
hoogte van een plaatje. Afbeeldingen die niet voldoen aan de opgegeven limieten
worden vergroot of verkleind, waarbij de verhouding tussen breedte en hoogte
zoveel mogelijk wordt behouden: een foto wordt dus niet uitgerekt.

### Optionele afbeeldingen
Als een gebruiker besluit om een afbeelding leeg te laten ontstaat een
lege plek in het document. Een [image] tag die niet wordt ingevuld, wordt
namelijk standaard voorzien van een doorzichtige afbeelding. Er komt dus
in het uiteindelijke document in principe altijd een &lt;img&gt; tag op de
plaats van de [image] tag.

Maar het kan ook anders. Als je aangeeft dat een afbeelding *optioneel* is,
dan wordt er alleen een afbeelding in het document geplaatst als de gebruiker
ook zelf expliciet op documentniveau een afbeelding op de plaats van de
[image] tag plaatst. Als de gebruiker geen afbeelding uploadt, dan zal er ook
geen &lt;img&gt; tag in het uiteindelijke document staan.

`[image name="example" optional="yes"]`

### Inleidende en afsluitende HTML code

Als op documentniveau een afbeelding wordt geüpload, dan wordt in het document
een &lt;img&gt; tag geplaatst met deze afbeelding. Voor en na deze &lt;img&gt;
tag wordt de HTML code geplaatst die je in de "begin" en "end" attributen
hebt gezet:

`[image name="example" begin="<div class=x>" end="</div>"]`

Met bovenstaande code zorg je er voor dat er altijd een &lt;div&gt; element
rond de afbeelding wordt gezet. De *begin* en *end* attributen zijn optioneel.

### Class toevoegen

Voeg een class toe aan het image blok. Hiermee kun je de afbeelding responsive
maken.

`[image name='nameofblock' class='className']`

## Loop tags

Vermoedelijk de ingewikkeldste tag die je in templates kunt gebruiken, is de
[loop] tag. Maar hij is wel erg handig! Je kunt met de [loop] tags code
markeren die op documentniveau herhaald kan worden. Hierdoor kun je
bijvoorbeeld templates maken die net zo makkelijk kunnen worden gebruikt voor
een nieuwsbrief met één artikel, als voor een nieuwsbrief met tien artikelen.
Je kunt zelfs geneste loops maken, loops binnen loops dus, waardoor je een heel
krachtig templatesysteem krijgt.

```html
[loop name="example"]
    Deel dat je wilt herhalen
[/loop]
```

Bovenstaand voorbeeld is erg simpel en niet erg praktisch. Je ziet pas echt de
kracht als je binnen de loop weer andere tags opneemt. Bijvoorbeeld als je de
gebruiker op documentniveau in staat wilt stellen om meerdere paragrafen met
tekst en afbeeldingen op te nemen:

```html
[loop name="myloop"]
<table>
  <tr>
    <td>[text name="mytext"]</td>
    <td>[image name="myimage"]</td>
  </tr>
</table>
[/loop]
```

Op documentniveau kan een gebruiker zelf kiezen hoeveel iteraties (herhalingen)
van de loop er in de mailing moeten worden geplaatst. Nul is ook een geldige
waarde, waardoor je loop blocks ook kunt gebruiken voor conditionele content:
als de gebruiker kiest voor nul iteraties verschijnt de HTML code niet in de
mailing, en bij een waarde van 1 of hoger verschijnt de code wel in de mailing
(en misschien zelfs meerdere keren).

Ook voor loopblokken geldt, net als bij alle andere soorten blokken, dat het
is aan te raden om elk blok een eigen unieke naam mee te geven. Bij loopblokken
heeft de naam zelfs een extra functie, omdat je de naam kunt gebruiken voor
scripting en *if* statements (hierover later meer).

### Minimum en maximum waardes

De gebruiker is vrij om zelf te bepalen hoeveel iteraties hij op documentniveau
wilt gebruiken. Nul is ook een geldige waarde is. Als je het aantal iteraties
wilt beperken, of als je juist een minimum aantal iteraties wilt instellen, kun
je hiervoor de *min* en *max* attributen gebruiken.

```html
[loop name="example" min="1" max="5"]
    ...
[/loop]
```

Beide attributen zijn optioneel. Je kunt ze ook allebei weglaten, of maar één
van de attributen opnemen.

### Inleidende en afsluitende HTML code

Met de *begin* en *end* attributen kun je eventueel inleidende en afsluitende
HTML code aan het loop blok koppelen. Deze code wordt alleen in het document
opgenomen indien het aantal iteraties hoger is dan 0.

```html
[loop name="example" begin="<table>" end="</table>"]
    <tr>
        <td>[text]</td>
    </tr>
[/loop]
```

Het bovenstaande (eenvoudige) voorbeeld bevat een tabel met een variabel
aantal rijen. Als binnen het document het aantal iteraties op nul wordt gezet,
dan wordt er helemaal geen tabel in het document geplaatst. De &lt;table&gt;
tags worden alleen gebruikt als het aantal iteraties groter is.


### Templatevariabelen

Als je gebruik maakt van loop bloks, kun je ook templatevariabelen gebruiken.
Templatevariabelen lijken erg op personalisatievariabelen, maar ze bevatten
geen informatie over de geadresseerde, maar over de staat van de loop.
Er zijn verschillende variabelen die je kunt gebruiken:

* [$loop.naamvanloop.index] - het totaal aantal iteraties
* [$loop.naamvanloop.iteration] - de huidige iteratie
* [$loop.naamvanloop.first] - boolean waarde of dit de eerste iteratie is
* [$loop.naamvanloop.last] - boolean waarde of dit de laatste iteratie is

Deze variabelen kun je gebruiken om de opmaak van de loops wat te verfraaien:

```html
[loop name="myloop"]
    <p>
        [text name="mytext"]
    </p>
    [if !$loop.myloop.last]
        <hr />
    [/if]
[/loop]
```

Hierboven zie je een loop van paragrafen waarbij op documentniveau kan worden
ingesteld hoeveel paragrafen er in de mailing moeten worden opgenomen. Tussen
elke twee paragrafen staan een horizontale lijn (dit is de &lt;hr/&gt; tag).
Het if-statement zorgt er voor dat de scheidingslijn alleen tussen de
paragrafen komt te staan, en niet ook onder de laatste paragraaf.

Als je gebruik maakt van geneste loops kun je ook gebruik maken van
templatevariabelen, alleen heeft de variabele dan een iets langere naam. Je
moet dan de hele nesting van loops in de naam van de variabele zetten:

    [$loop.buitensteloop.binnensteloop.index]

Onder de motorkap gebruikt Copernica de Smarty engine van PHP voor het inlezen
van templates. Alleen gebruiken we niet de standaard accolades om variabelen
en functies mee aan te geven, maar vierkante haakjes. De [image], [text] en
[loop] blokken zijn dus eigenlijk gewone Smarty functies, en de
[$loop.naamvanloop.*]  variabelen zijn gewone Smarty variabelen. Je kunt daarom
binnen een template alle trucjes en mogelijkheden van Smarty benutten, zolang
je maar gebruik maakt  van vierkante haakjes in plaats van accolades.
