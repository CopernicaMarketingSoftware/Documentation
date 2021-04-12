# REST API: paging

Veel REST-methodes retourneren een lijst van objecten. De methode om
[databases op te vragen](rest-get-databases) retourneert bijvoorbeeld een lijst
van databases, terwijl de methode om [profielen op te vragen](rest-get-database-profiles)
een lijst van profielen retourneert.

Om te voorkomen dat een REST API-call te lang duurt en dat enkelvoudige calls 
te veel van onze API-servers vragen wordt de output van deze methodes
standaard beperkt door het api.copernica.com-endpoint. Hierdoor worden er niet meer dan 1000 
objecten per keer teruggegeven. Het rest.copernica.com-endpoint maakt het wel mogelijk om
grotere datasets op te halen.

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

Via het alternatieve endpoint https://rest.copernica.com/v2 kan de beperking tot 
1000 objecten per keer worden omzeild. Voor de meeste methodes werkt dit endpoint
precies hetzelfde als het reguliere endpoint https://api.copernica.com/v2. Toch 
zijn er voor sommige methodes een aantal subtiele verschillen:

* Voor sommige methodes (met name methodes om profielen op te vragen) geldt de beperking tot 1000 profielen niet indien je deze via rest.copernica.com opvraagt.
* Het respons van dergelijke methodes wordt "gestreamd".
* De HTTP-header bevat dan geen 'content-length'-header (omdat de grootte van het resultaat van tevoren nog niet bekend is).
* Daarvoor in de plaats is er een 'content-transfer-encoding: chunked'-header en wordt het antwoord in delen teruggestuurd.

Als je gebruik maakt van dit alternatieve https://rest.copernica.com/v2 endpoint,
dan moet je API-script overweg kunnen met twee soorten output: (1) traditionele antwoorden
met een content-length-header en (2) datastreams met een content-transfer-encoding-header. 
Je script moet met beide responses overweg kunnen omdat methodes in de
toekomst wellicht anders geïmplementeerd gaan worden (en streaming gaan ondersteunen).

