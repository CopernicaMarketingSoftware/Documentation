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
    achterhalen door de code {\$smarty.version} in de template of het
    document op te nemen. Wanneer je het document gepersonaliseerd
    weergeeft zal de gebruikte smarty versie worden weergegeven.

Voordelen van Smarty 3
----------------------

### Auto-escapen van "{" en "}"

Smarty scheidingstekens zoals {} omgeven door spaties (witruimte) worden
niet meer herkend als Smarty tags. Bijvoorbeeld: { abc } wordt genegeerd
door Smarty en wordt gezien als een normale accolade. Maar {abc} wordt
herkend als een Smarty tag. Vanaf Smarty versie 3 is het daarom niet
meer nodig om gebruik te maken van {ldelim} en {rdelim} om accolades te
escapen als de scheidingstekens zijn omgegeven door spaties.

### Het aanmaken van variabelen gaat sneller

In Smarty 2 kan je in je template en document een variabel aanmaken door
middel van {capture assign="variabelnaam"}Dit is een variabel
{/capture}.\
\
 In Smarty 3 gaat dit een stuk sneller en eenvoudiger. Namelijk:\
\
 {\$variabelnaam="Dit is een variabel"}\
\
 De output is precies het zelfde. In dit voorbeeld is de output: *Dit is
een variabel*

### Functies

Niet nieuw in Smarty 3, maar wel pas sinds kort toegestaan in de
Publisher, is het gebruik van functies. Functies zijn handig als je
bijvoorbeeld dezelfde personalisatie op verschillende plaatsen in de
template gebruikt. Met een functie hoef je maar een maal te definieren
wat er moet gebeuren en dit op verschillende plaatsen aanroepen. Dit
maakt de code beter beheersbaar.

Meer informatie over [Smarty In-template
functies](http://www.smarty.net/docs/en/language.function.function.tpl)

### Strictere syntax parameters

Wanneer je een of meerdere parameters meegeeft aan een smarty 3 functie,
dan dient deze gequote te worden wanneer hierin spaties of bijvoorbeeld
dubbele punten instaan.

Bijvoorbeeld:

[text name="alinea 1"]

of

{in\_miniselection
miniselection="database:myCollection:myMiniSelection"}

Meer lezen over smarty 3
------------------------

-   Meer informatie over Smarty 3 kan je vinden op de website van
    Smarty[http://www.smarty.net/v3\_overview](http://www.smarty.net/v3_overview)
-   Smarty 3 is uitgebreid gedocumenteerd. Kijk hiervoor alvast op
    [http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/)
-   Bekijk ook onze whiteboardsessie over smarty
    3: [http://www.copernica.com/nl/kennis/smarty-3](http://www.copernica.com/nl/over-ons/nieuws/smarty-2-naar-smarty-3-copernica-whiteboard)

