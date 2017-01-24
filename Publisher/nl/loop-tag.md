# Loop tags

Vermoedelijk de ingewikkeldste tag die je in templates kunt gebruiken, is de
[loop] tag. Maar hij is wel erg handig! Je kunt met de [loop] tags code 
markeren die op documentniveau herhaald kan worden. Hierdoor kun je bijvoorbeeld
templates maken die net zo makkelijk kunnen worden gebruikt voor een nieuwsbrief 
met één artikel, als voor een nieuwsbrief met tien artikelen. Je kunt zelfs 
geneste loops maken, loops binnen loops dus, waardoor je een heel krachtig 
templatesysteem krijgt. 

    [loop name="example"]
        Deel dat je wilt herhalen
    [/loop]

Bovenstaand voorbeeld is erg simpel en niet erg praktisch. Je ziet pas echt de
kracht als je binnen de loop weer andere tags opneemt. Bijvoorbeeld als je de 
gebruiker op documentniveau in staat wilt stellen om meerdere paragrafen met
tekst en afbeeldingen op te nemen:

    [loop name="myloop"]
        <div>
            <table>
                <tr>
                    <td>[text name="mytext"]</td>
                    <td>[image name="myimage"]</td>
                </tr>
            </table>
        </div>
    [/loop]
    
Op documentniveau kan een gebruiker zelf kiezen hoeveel iteraties (herhalingen) 
van de loop er in de mailing moeten worden geplaatst. Nul is ook een geldige 
waarde, waardoor je loop blocks ook kunt gebruiken voor conditionele content: 
als de gebruiker kiest voor nul iteraties verschijnt de HTML code niet in de 
mailing, en bij een waarde van 1 of hoger verschijnt de code wel in de mailing 
(en misschien zelfs meerdere keren).

Ook voor loopblokken geldt, net als bij alle andere soorten blokken, dat het
is aan te raden om elke blok een eigen unieke naam mee te geven. Bij loopblokken
heeft de naam zelfs een extra functie, omdat je de naam kunt gebruiken voor
scripting en *if* statements (hierover later meer).


## Minimum en maximum waardes

De gebruiker is vrij om zelf te bepalen hoeveel iteraties hij op documentniveau
wilt gebruiken. Nul is ook een geldige waarde is. Als je het aantal iteraties
wilt beperken, of als je juist een minimum aantal iteraties wilt instellen, kun 
je hiervoor de *min* en *max* attributen gebruiken.

    [loop name="example" min="1" max="5"]
        ...
    [/loop]

Beide attributen zijn optioneel. Je kunt ze ook allebei weglaten, of maar één
van de attributen opnemen.


## Inleidende en afsluitende HTML code

Met de *begin* en *end* attributen kun je eventueel inleidende en afsluitende
HTML code aan het loop blok koppelen. Deze code wordt alleen in het document 
opgenomen indien het aantal iteraties hoger is dan 0.

    [loop name="example" begin="<table>" end="</table>"]
        <tr>
            <td>[text]</td>
        </tr>
    [/loop]
    
Het bovenstaande (eenvoudige) voorbeeld bevat een tabel met een variabel 
aantal rijen. Als binnen het document het aantal iteraties op nul wordt gezet,
dan wordt er helemaal geen tabel in het document geplaatst. De &lt;table&gt;
tags worden alleen gebruikt als het aantal iteraties groter is.
        

## Templatevariabelen

Als je gebruik maakt van loop bloks, kun je ook templatevariabelen gebruiken.
Templatevariabelen lijken erg op personalisatievariabelen, maar ze bevatten
geen informatie over de geadresseerde, maar over de staat van de loop.
Er zijn verschillende variabelen die je kunt gebruiken:

* [$loop.naamvanloop.index] - het totaal aantal iteraties
* [$loop.naamvanloop.iteration] - de huidige iteratie
* [$loop.naamvanloop.first] - boolean waarde of dit de eerste iteratie is
* [$loop.naamvanloop.last] - boolean waarde of dit de laatste iteratie is

Deze variabalen kun je gebruiken om de opmaak van de loops wat te verfraaien:

    [loop name="myloop"]
        <p>
            [text name="mytext"]
        </p>
        [if !$loop.myloop.last]
            <hr/>
        [/if]
    [/loop]

Hierboven zie je een loop van paragrafen waarbij op documentniveau kan worden 
ingesteld hoeveel paragrafen er in de mailing moeten worden opgenomen. Tussen
elke twee paragrafen staan een horizontale lijn (dit is de &lt;hr/&gt; tag). Het
if-statement zorgt er voor dat de scheidingslijn alleen tussen de paragrafen
komt te staan, en niet ook onder de laatste paragraaf.

Als je gebruik maakt van geneste loops kun je ook gebruik maken van 
templatevariabelen, alleen heeft de variabele dan een iets langere naam. Je
moet dan de hele nesting van loops in de naam van de variabele zetten:

    [$loop.buitensteloop.binnensteloop.index]

Onder de motorkap gebruikt Copernica de Smarty engine van PHP voor het inlezen
van templates. Alleen gebruiken we niet de standaard accolades om variabelen
en functies mee aan te geven, maar vierkante haakjes. De [image], [text] en [loop]
blokken zijn dus eigenlijk gewone Smarty functies, en de [$loop.naamvanloop.*] 
variabelen zijn gewone Smarty variabelen. Je kunt daarom binnen een template 
alle trucjes en mogelijkheden van Smarty benutten, zolang je maar gebruik maakt 
van vierkante haakjes in plaats van accolades. Meer informatie over Smarty kun 
je vinden op [www.smarty.net](http://www.smarty.net).

