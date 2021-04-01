# REST API: paging

Veel REST methodes retourneren een lijst van objecten. De methode om
[databases op te vragen](rest-get-databases) retourneert bijvoorbeeld een lijst
van databases, en de methode om [profielen op te vragen](rest-get-database-profiles)
retourneert een lijst van profielen.

Om te voorkomen dat een REST API call te lang duurt en dat enkelvoudige calls 
te veel resources van onze API servers vragen, wordt de output van deze methodes
standaard beperkt door het api.copernica.com endpoint: er worden niet meer dan 1000 
objecten per keer teruggegeven. Bij het rest.copernica.com endpoint werkt het iets
anders en kun je wel grotere datasets ophalen.

Je kunt door middel van *start* en *limit* parameters instellen welk deel van
de gegevens opvraagt.


## Teruggegeven data

Het antwoord van de meeste API calls is verpakt in een JSON object. Indien je
een methode gebruikt die _meerdere gegevens_ teruggeeft, dan is er altijd een aantal 
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

Het belangrijkst is de property *data*. Hierin zit een array met de opgevraagde 
gegevens. Bijvoorbeeld een array van databases of een array van profielen. De
andere properties bevatten numerieke waardes waar je aan kunt zien hoeveel
objecten er zijn opgevraagd, teruggegeven en hoeveel objecten beschikbaar zijn.

De property *count* bevat het totaal aantal geretourneerde objecten. De property 
*start* laat zien waar de data begint, en *limit* hoeveel objecten er zijn opgevraagd.
De *total* property bevat het totaal aantal beschikbare items.
Veronderstel dat er 1700 profielen in de database zijn opgeslagen, dan kun je 
deze profielen niet allemaal tegelijk ophalen (want dit is beperkt tot 1000 
profielen). Wel kun je een aantal calls achter elkaar doen:

```
https://api.copernica.com/v2/database/X/profiles?start=0&limit=1000
https://api.copernica.com/v2/database/X/profiles?start=1000&limit=1000
```

De eerste aanroept geeft de eerste 1000 profielen terug, de tweede aanroep
de daaropvolgende 700. In het eerste respons staat start=0, limit=1000, 
count=1000 en total=1700. De daaropvolgende call heeft de waardes start=1000,
limit=1000, count=700 en total=1700. Door naar de teruggegeven waardes te
kijken, kun je zien of je alle data hebt teruggekregen, of dat je nog een
volgende batch moet opvragen (als start+count kleiner is dan total, dan is er
nog meer data beschikbaar).

### De 'total' property

De 'total' property is relatief intensief om te berekenen. Als je in jouw
API call de property toch niet uitleest, dan kun je een extra parameter 
toevoegen om de REST API dit te laten weten. Dit maakt de call
wat efficienter:

```
https://api.copernica.com/v2/database/X/profiles?start=0&limit=1000&total=false
```

### De 'nextid' property

Naast *start* en *limit* wordt een *nextid* property teruggegeven.
Hiermee kun je wat efficienter pagen: bij de volgende call kun je dit
gebruiken om alleen profielen opvragen met een ID vanaf die specifieke waarde. Hoewel 
dit ook met de *start* en *limit* parameters kan, is het
voor onze API iets efficienter om met ID's te werken.

Let op: pagen me behulp van *nextid* is alleen zinvol indien de resultaten
op ID zijn gesorteerd! Als je een ander veld gebruikt om te sorteren, dan
moet je hoe dan ook gebruik maken van *start* en *limit*. Bovendien, het
opvragen van gegevens op basis van een ID werkt niet voor 
alle methodes. Alleen [methodes die de _fields_ parameter ondersteunen](./rest-fields-parameter.md)
kunnen dit. In de praktijk zijn dit methodes om profielen op te halen.

Inmiddels hebben we een elegantere manier om grote datasets op te vragen.

## Data streams en grotere data sets

Via het alternatieve endpoint https://rest.copernica.com/v2 kan de beperking tot 
1000 objecten per keer worden omzeild. Voor de meeste methodes werkt dit endpoint
precies hetzelfde als het reguliere endpoint https://api.copernica.com/v2, maar
voor sommige methodes zijn er wat subtiele verschillen:

- Voor sommige methodes (met name die om profielen op te vragen) geldt de beperking tot 1000 profielen niet indien je dit via rest.copernica.com opvraagt.
- Het respons van dergelijke methodes wordt "gestreamd".
- De HTTP header bevat dan geen 'content-length' header (omdat de grootte van het resultaat van te voren nog niet bekend is).
- Daarvoor in de plaats is er een 'content-transfer-encoding: chunked' header, en wordt het antwoord in delen teruggestuurd.

Als je gebruik maakt van dit alternatieve https://rest.copernica.com/v2 endpoint
dan moet je API-script overweg kunnen met twee soorten output: traditionele antwoorden
met een content-length header, en data-streams met een content-transfer-encoding
header. Je script moet met beide responses overweg kunnen omdat methodes in de
toekomst wellicht anders geimplementeerd gaan worden (en streaming gaan ondersteunen).

