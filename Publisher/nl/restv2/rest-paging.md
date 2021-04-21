# REST API: paging

Veel REST-methodes retourneren een lijst van objecten. De methode om
[databases op te vragen](rest-get-databases) retourneert bijvoorbeeld een lijst
van databases, terwijl de methode om [profielen op te vragen](rest-get-database-profiles)
een lijst van profielen retourneert.

Om te voorkomen dat een REST API-call te lang duurt en dat enkelvoudige calls 
te veel van onze API-servers vragen wordt de output van deze methodes
standaard beperkt door het api.copernica.com endpoint. Hierdoor worden er niet meer dan 1000 
objecten per keer teruggegeven. Het rest.copernica.com endpoint (dit is dus een andere
domeinnaam!) maakt het wel mogelijk om grotere datasets op te halen.

Je kunt door middel van *start*- en *limit*-parameters instellen welk deel van
de gegevens je opvraagt.

## Teruggegeven data

Het antwoord van de meeste API-calls is verpakt in een JSON-object. Indien je
een methode gebruikt die _meerdere gegevens_ teruggeeft, dan zijn er altijd een aantal 
standaardvelden in de output aanwezig:

```
{
    "start":    50,
    "limit":    100,
    "count":    100,
    "total":    335,
    "data":     [ .... ],
    "nextid":   12345
}
```

De *data*-property is het belangrijkst. Deze bevat een array met de opgevraagde 
gegevens (bijvoorbeeld databases of profielen). De andere properties bevatten 
numerieke waardes waaraan je kunt zien hoeveel objecten er zijn opgevraagd en 
teruggegeven. Ook laten ze zien hoeveel objecten er beschikbaar zijn.

De *count*-property bevat het totale aantal geretourneerde objecten. De *start*-property 
laat zien waar de data begint. De *limit*-property toont hoeveel objecten er zijn opgevraagd. 
De *total*-property bevat het totale aantal beschikbare items.

Veronderstel dat er 1700 profielen in de database zijn opgeslagen. Gezien de eerdergenoemde
beperking tot 1000 profielen kun je deze profielen niet allemaal tegelijk ophalen.  Wel kun 
je een aantal calls achter elkaar versturen:

```
https://api.copernica.com/v2/database/X/profiles?start=0&limit=1000
https://api.copernica.com/v2/database/X/profiles?start=1000&limit=1000
```

De eerste aanroep retourneert de eerste 1000 profielen. De tweede aanroep
retourneert de daaropvolgende 700 profielen. De eerste respons bevat de waardes start=0, limit=1000, 
count=1000 en total=1700. De daaropvolgende call bevat de waardes start=1000,
limit=1000, count=700 en total=1700. 

Je kunt zien of je alle data hebt teruggekregen door naar de geretourneerde waardes te kijken.
Zo bepaal je ook of je een volgende batch moet opvragen. Er is meer data beschikbaar als start+count 
kleiner is dan total.


### De 'total'-property

De berekening van de 'total'-property is relatief intensief. Als je in jouw
API-call de property toch niet uitleest, dan kun je een extra parameter 
toevoegen om dit aan de REST API te laten weten. Dit maakt de call efficiënter:

```
https://api.copernica.com/v2/database/X/profiles?start=0&limit=1000&total=false
```

### De 'nextid'-property

Naast *start* en *limit* wordt er een *nextid*-property teruggegeven.
Hiermee kun je efficiënter pagen: bij de volgende call kun je dit
gebruiken om alleen profielen op te vragen met een ID vanaf die specifieke waarde. 
Hoewel dit ook met de *start*- en *limit*-parameters kan is het
voor onze API iets efficiënter om met ID's te werken.

**Let op:** pagen met behulp van *nextid* is alleen zinvol indien de resultaten
op ID gesorteerd zijn. Als je een ander veld gebruikt om te sorteren, dan
moet je hoe dan ook gebruik maken van *start* en *limit*. Het
opvragen van gegevens op basis van een ID werkt bovendien niet voor 
alle methodes. Alleen [methodes die de _fields_-parameter ondersteunen](./rest-fields-parameter.md)
kunnen dit. In de praktijk zijn dit methodes om profielen op te halen.

Inmiddels bieden we een elegantere manier om grote datasets op te vragen.

## Datastreams en grotere datasets

Via het alternatieve endpoint https://rest.copernica.com/v2 (met een andere domeinnaam)
kan _voor sommige methodes_ de beperking tot 1000 objecten per keer worden omzeild. In principe
werken rest.copernica.com/v2 en api.copernica.com/v2 hetzelfde, maar voor een aantal methodes (met
name methodes om profielen op te vragen) geldt dat rest.copernica.com/v2 limieten groter dan 1000 items ondersteunt:

* De respons van dergelijke methodes wordt 'gestreamd'.
* De HTTP-respons-header heeft dan geen 'content-length'-header (omdat de grootte van het resultaat van tevoren nog niet bekend is).
* Daarvoor in de plaats is er een 'content-transfer-encoding: chunked'-header en wordt het antwoord in delen teruggestuurd.

Als je gebruik maakt van het alternatieve rest.copernica.com/v2 endpoint,
dan moet je API-koppeling overweg kunnen met twee soorten responses: (1) traditionele antwoorden
met een content-length-header en (2) datastreams met een content-transfer-encoding-header.
Meestal krijg je een traditioneel respons terug (met een content-length-header dus), maar ook 
een streamed respons is mogelijk. 

Indien je een call doet naar rest.copernica.com om meer dan 1000 items op te halen en toch maar 
1000 items terugkrijgt, dan heeft de methode nog geen streaming-implementatie gekregen in de 
Copernica-API. Je zult de data dan alsnog in meerdere batches moeten ophalen door middel van paging. 
Je kunt contact met ons opnemen als dit te omslachtig is. We kijken dan of er extra prioriteit gegeven
kan worden aan het omzetten van de methode naar een streaming-implementatie.

We zijn gaandeweg bezig met het omzetten van methodes van een traditionele 'content-length'-implementatie 
naar de schaalbaardere 'content-transfer-encoding'-implementatie. Je dient er daarom rekening mee te houden 
dat deze methodes (via rest.copernica.com/v2) data in de toekomst op een andere manier kunnen gaan terugsturen.
Methodes die vandaag nog werken met een content-length-header kunnen in de toekomst het resultaat 'chunked'
gaan terugsturen. Indien je een koppeling maakt met rest.copernica.com/v2 is het daarom aan te raden om hier 
nu al rekening mee te houden en je code compatible te houden met beide responses. Het is echter veiliger om 
api.copernica.com/v2 te blijven gebruiken omdat daar sowieso geen streaming wordt toegepast.

