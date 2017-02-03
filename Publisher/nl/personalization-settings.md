# Personalisatieinstellingen

Bij elk document en template kun je de personalisatie-instellingen wijzigen. 
Met deze instellingen bepaal je ondermeer in welke taal [datums](./using-the-smarty-date-function.md)
worden weergegeven. Je vindt deze instelling linksonder het geopende
template of document.

![](../images/personalisatieinstellingen.png)

Het formulier voor de instellingen vind je zowel bij templates als bij documenten.
Als je geen expliciete keuze voor deze instellingen op documentniveau, dan valt
het document terug op de instellingen van de template. Je kunt de volgende
vier settings veranderen:

* taal: de taal die wordt gebruikt voor het weergeven van datums
* tijdzone: de tijdzone om te bepalen hoe tijdstippen worden opgemaakt
* codering: de wijze waarop "rare" tekens worden gecodeerd
* html filteren: moeten personalisatievariabelen automatisch worden gefilterd?


## Taal en tijdzone

In het artikel over het [weergeven van datums en tijden](./using-the-smarty-date-function.md)
hebben we dit ook al behandeld: als je de huidige datum wilt weergeven is daar
een speciale |date_format modifier voor. Deze modifier kun je gebruiken om een 
tijdstip in computernotatie om te zetten naar een tijdstip in mensennotatie. De
taal en tijdzone settings worden hierbij gebruikt om te bepalen in welke taal
een datum wordt getoond (elke taal heeft immers andere namen voor de maanden en
de dagen), en welke tijdzone moet worden gebruikt (*nu* in Tokyo is iets anders
dan *nu* in New York).


## Codering

Lang verhaal kort: de codering moet je altijd op UTF-8 zetten. Dat is eigenlijk 
altijd goed. De UTF-8 karakterset is namelijk een karakterset die eigenlijk alle 
letters en tekens ter wereld op een efficiente manier kan coderen.

Hoe zit dat precies? Traditioneel kon e-mail alleen worden gebruikt voor ASCII 
teksten: teksten die bestaan uit het gewone alfabet, cijfers en een kleine 
verzameling leestekens. Zeg maar de tekens die op een gewoon toetsenbord staan. 
Buitenlandse tekens, waaronder ook voor ons gewone karakters zoals letters met 
een trema of een accent (bijvoorbeeld ë, ï of é) horen daar niet bij. Als je
toch een mail met dergelijke tekens moet versturen, dan moet je expliciet in de
header van het e-mailbericht opnemen in welke karakterset de mail is opgemaakt:
de West-Europese, de Oost-Europese, Russisch, Chinees, enzovoort.

De karakterset UTF-8 is later ontwikkeld, en bevat eigenlijk alle tekens ter 
wereld bevat. Dit omvat de gewone toetsenbordtekens, maar ook de "rare" tekens
uit andere landen. Dus als je voor UTF-8 kiest, zit je sowieso goed.


## HTML filteren

Zoals we [al eerder schreven](./what-is-personalization.md), is het escapen
van variabelen van heel groot belang. De variabelen die je gebruikt bij het
personaliseren zijn namelijk vaak door anonieme gebruikers van je website
ingevoerd, bijvoorbeeld bij het aanmelden voor de nieuwsbrief. Deze gegevens
kun je niet vertrouwen, omdat je nooit zeker weet of iemand niet stiekem HTML
code of een script als naam heeft gebruikt. Als je de ruwe personalisatie 
"Beste {$naam}" in een mailing of op een website plaatst, dan zou dit zomaar 
een script kunnen zijn die de opmaak van je mailing verpest, of erger: die er
voor zorgt dat je website of de accounts van je klanten worden gehackt.

Daarom is ons advies: escape al je variabelen. De Smarty |escape modifier
kun je gebruiken om alle variabelen te filteren en eventuele scripts of HTML
code onschadelijk te maken. Gebruik dus "Beste {$naam|escape}".

Met de personalisatieinstelling "HTML filteren" kun je dit automatisch doen.
Als je deze optie inschakelt wordt alle personalisatiedata gefiltered en
hoe je dus niet langer zelf expliciet de |escape modifier aan te roepen.

