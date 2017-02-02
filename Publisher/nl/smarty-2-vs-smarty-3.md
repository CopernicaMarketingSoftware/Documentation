# Smart 2 of Smarty 3: wat is beter?

Voor het personaliseren van templates en documenten maakt Copernica
gebruik van de op PHP gebaseerde Smarty engine. Wanneer je een template
aanmaakt kan je kiezen welke versie van Smarty je wilt gebruiken. Smarty
3 heeft soms namelijk een net andere syntax dan haar voorganger.

De belangrijkste verschillen worden in dit artikel uiteengezet.

-   Wanneer je een nieuw template aanmaakt, kan je kiezen of je gebruikt
    wilt maken van smarty versie 2 of versie 3.
-   Wanneer een template eenmaal is aangemaakt, kan er niet meer worden
    overgeschakeld naar een andere versie van Smarty.
-   Smarty 3 heeft onze voorkeur, omdat deze een stuk betere performance
    heeft. Dit heeft ondermeer grote gevolgen voor de snelheid waarmee
    een mailing kan worden samengesteld.
-   Indien je kiest voor smarty 3, moet je er rekening mee houden dat de
    syntax van smarty 3 soms net iets anders is dan de voorganger.
-   Vooralsnog kan alleen in templates en documenten (ook in SMS en PDF
    documenten) gebruik worden gemaakt van smarty 3. Webformulieren en
    personalisatie gebruikt in opvolgacties zijn nog steeds gebaseerd op
    smarty 2.
-   Wanneer je twijfel heeft over de smarty versie waarvan jouw template
    gebruik maakt, dan kan je gemakkelijk (tijdelijk) de versie
    achterhalen door de code {$smarty.version} in de template of het
    document op te nemen. Wanneer je het document gepersonaliseerd
    weergeeft zal de gebruikte smarty versie worden weergegeven.


## Voordelen van Smarty 3

Smarty 3 is beter dan Smarty 2. Het is sneller, krachtiger en makkelijker
in het gebruik. Laten we een aantal voordelen op een rij zetten.


### Auto-escapen van "{" en "}"

In Smarty 2 worden alle accolades (de tekens "{" en "}") als personalisatietekens
herkend, dus ook als je ergens in een template of je document zo'n losstaand teken hebt
geplaatst, zonder de bedoeling om er mee te personaliseren. Dit is erg onhandig, 
omdat je deze tekens soms veel gebruikt. Vooral in JavaScript code heb je deze 
karakters veel nodig. Als je Smarty 2 gebruikt moet je elke keer dat je ergens 
een "{" of een "}" teken wilt neerzetten daarom gebruik maken van "{ldelim}" en 
"{rdelim}" om aan te geven dat je een puur accoladeteken bedoelt, en niet een 
personalisatievariabele.

In Smarty 3 worden losse scheidingstekens, dus accolades omgeven door witruimte, 
gelukkig niet meer herkend als personalisatievariabelen. Alleen aaneengesloten 
variabelen, zoals {$voornaam} en {$achternaam} worden door Smarty omgezet, terwijl
losse accolades ongemoeid worden gelaten.

### Het aanmaken van variabelen gaat sneller

In Smarty 2 kan je in je template en document een variabele aanmaken door
middel van {capture assign="naam"}Dit is een variabele{/capture}. In Smarty 3 gaat 
dit een stuk sneller en eenvoudiger, namelijk {$naam="Dit is een variabele"}.
Het resultaat is precies het zelfde: in beide gevallen wordt de waarde "Dit
is een variabele" aan de variabele $naam toegekend.

### Functies

Niet nieuw in Smarty 3, maar wel pas sinds kort toegestaan in de
Publisher, is het gebruik van functies. Functies zijn handig als je
bijvoorbeeld dezelfde personalisatie op verschillende plaatsen in de
template gebruikt. Met een functie hoef je maar een maal te definieren
wat er moet gebeuren en dit op verschillende plaatsen aanroepen. Dit
maakt de code beter beheersbaar.

Meer informatie over [Smarty In-template
functies](http://www.smarty.net/docs/en/language.function.function.tpl)

### Strictere syntax voor parameters

Wanneer je een of meerdere parameters meegeeft aan een smarty 3 functie,
dan dient deze gequote te worden wanneer hierin spaties of bijvoorbeeld
dubbele punten instaan.

Bijvoorbeeld:

[text name="alinea 1"]

of

{in_miniselection miniselection="database:myCollection:myMiniSelection"}

## Meer lezen over smarty 3

-   Smarty 3 is uitgebreid gedocumenteerd. Kijk hiervoor alvast op
    [http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/)

