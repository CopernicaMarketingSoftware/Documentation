# Personaliseren binnen de Publisher

In de Publisher kun je van alles personaliseren. Je doet dit met behulp
van de zogeheten Smarty code. In het onderstaande artikel staan een aantal
voorbeeldscenario's uitgelegd waarin je personalisatie kunt toevoegen aan je
mailings en nieuwsbrieven.

Met Smarty kun je gemakkelijk personalizeren. Er zijn echter
wel wat belangrijke dingen om op te letten als je werkt met Smarty:

* SMARTY is *hoofdlettergevoelig*. **{$profile.name}** is dus wat anders dan `{$profile.NAME}`;
* Accolades gebruiken kan met de [literal](./publisher-personalization-functions#literal) functie.

## Database variabelen

Een personalisatievariabele bestaat uit een dollarteken **$**, het woord profile
of subprofile en de naam van een variabele, geplaatst tussen accolades. De
volgende variabelen kun je bijvoorbeeld in een template of document gebruiken:

* `{$profile.naam}`;
* `{$profile.email}`;
* `{$profile.aanhef}`;

Deze personalisatievariabelen werken natuurlijk alleen als je in de database ook
velden met de "naam", "email" en "aanhef" hebt opgenomen, en als je voor de
geadresseerden van de mailing deze gegevens hebt ingevuld. Als dat
het geval is, dan kun je deze variabelen gewoon in je mailing
gebruiken:

```text
Beste {$profile.aanhef} {$profile.naam},

Je ontvangt deze e-mail omdat bent aangemeld
met het volgende e-mailadres: {$profile.email}.
```

### Data uit een collectie weergeven

Je kunt ook eenvoudig data uit een collectie weergeven. Dit kun je op 
verschillende manieren doen. Om data uit de eerste rij van de collectie weer te 
geven kun je deze syntax gebruiken.

Vergeet in de Publisher niet de blokhaken te escapen.

```text
[literal]
{$profile.collectie[0].veldnaam}
[/literal]
```

Om data uit de volgende rij weer te geven kun je [0] vervangen door [1].

```text
[literal]
{$profile.collectie[1].veldnaam}
[/literal]
```

Om data uit de laatste (en nieuwste) rij weer te geven kun je de count 
modifier gebruiken om het aantal subprofielen te tellen waarna je 
van het totaal 1 moet aftrekken omdat wij beginnen met nul.

```text
[literal]
{$profile.collectie[$profile.collectie|count -1].veldnaam}
[/literal]
```

### Template variables

Je kunt ook extra personalisatie variabelen toevoegen door deze aan te maken
in het Template menu. Hier definieer je de naam, tijdens het aanmaken van
het document geef je er een waarde aan. Gebruik de waarde vervolgens met
**{$property.name}**, waar je "name" vervangt door de naam van je variabele.

Stel bijvoorbeeld dat je gebruikers een score wil geven gebaseerd op hun
aankopen en deze wil gebruiken in je e-mail. Later heb je deze score niet meer
nodig (anders kun je deze beter opslaan in je database!). Je kunt dan een
template variabele **score** instellen en deze gebruiken met **{$property.score}**.

## personalisatie functies

Naast variabelen kun je ook gebruik maken van functies. Een functie ziet er hetzelfde uit als een variabele, maar dan zonder dollarteken. De volgende functie kun je bijvoorbeeld gebruiken om een link naar de webversie van een e-mail te maken:

```
{webversion}
```

Bekijk het [overzicht van alle functies](publisher-personalization-functions)

## personalizatie modifiers

Je kunt de variabelen, waarmee je e-mails personaliseert, veranderen met behulp
van *modifiers*. Je doet dit door een `|` toe te voegen na de variabele.
Je gebruikt bijvoorbeeld **tolower** om de variabele **{$name}** te
bewerken. Dit ziet er dan zo uit: **{$name|tolower}**.
Tot slot, je kunt ook een aantal 'modifiers' achter elkaar gebruiken. 
Je kunt bijvoorbeeld **{$name|tolower|ucfirst}** gebruiken om te zorgen dat alle
namen met een hoofdletter beginnen en de resterende letters altijd kleine 
letters zijn. 

Bekijk het [overzicht van alle modifiers](./publisher-personalization-modifiers)

## De load subprofile functie
Je kunt profielen of subprofielen in een oplopende of aflopende volgorde ophalen, aan de hand van de waarde in een specifiek database of collectieveld.

Je doet dit door de optie als parameter toe te voegen aan de loadprofile of loadsubprofile tag

### Voorbeeld
Je hebt een collectieveld 'fruit' en een aantal subprofielen, die respectievelijk de waardes Appel, Banaan, Citroen, Nectarine, Watermeloen hebben in het veld 'fruit'

```
{loadsubprofile assign=loadedfruits multiple=true limit=2 orderby='fruit asc'}

Ik heb in mijn fruitschaal een:
{foreach $loadedfruits as $loadedfruit}
{$loadedfruit.fruit}
{/foreach}
```

Resultaat (asc):

Ik heb in mijn fruitschaal een: Appel, Banaan

Resultaat (desc):

Ik heb in mijn fruitschaal een: Watermeloen, Nectarine

Als je geen order parameter meegeeft in je load(sub)profile, dan wordt automatisch oplopend gesorteerd op het veld ID. [Voor meer informatie kun je dit artikel lezen](loadprofile-and-loadsubprofile).

## Accolades

Als je accolades in een template of een document wilt opnemen die niet als Smarty
code hoeven te worden herkend, dan kun je dit op twee manieren doen: door [{ldelim}](./publisher-personalization-functions#ldelim) en
[{rdelim}](./publisher-personalization-functions#rdelim) te gebruiken, of door van {literal} en {/literal} gebruik te maken.

Om voor een groot stuk HTML code de Smarty engine uit te schakelen kun je {literal}
en {/literal} gebruiken. Alle tekst die tussen {literal} en {/literal} staat wordt
niet Smarty gecontroleerd op accolades. Alle accolades worden letterlijk overgenomen,
zelfs als het wel geldige Smarty variabelen lijken te zijn:

```text
{literal}
	Ik ben gek op {accolades}!
{/literal}
```

Als je bovenstaand code in een mailing opneemt, dan wordt de code {accolades}
niet gezien als Smarty code en blijft het gewoon in de mailing staan.

## Personalisatie testen

Als je bezig bent met het ontwikkelen van een gepersonaliseerde mailing, dan
wil je vaak even een *sneak preview* zien om te controleren of de personalisatie 
wel uitpakt zoals je dat hebt bedoeld. Voor dit doel is er een *standaardbestemming*.

### De bewerkmodus instellen

Onderaan een document, naast de button voor de 
[personalisatieinstellingen](emailings-publisher-personalization#personalisatieinstellingen), vind je de button voor de bewerkmodus. Met deze button kun je de weergave van het document veranderen.

![Edit and preview mode](../images/preview.png)

Er zijn vier mogelijke instellingen, en ze spreken allemaal nogal voor zich:

    * bewerkmodes, met gepersonaliseerde content
    * bewerkmodes, nog niet gepersonaliseerd (smarty variabelen zijn zichtbaar)
    * preview mode, met gepersonaliseerde content
    * preview mode, nog niet gepersonaliseerd
    
Eigenlijk zijn het twee verschillende instellingen: (1) wil je het document 
weergeven in bewerkmodes of previewmodus, en (2) wil je dat de Smarty variabelen
direct worden ingevuld of niet?

Als je het document in bewerkmodus weergeeft, dan zijn de contentblokken 
aanklikbaar. Dit is meestal de handigste mode omdat je direct de teksten die 
je wilt wijzigen kunt aanklikken. Af en schakel je over naar de previewmodus 
om te zien hoe de ontvanger het bericht zal zien.

Daarnaast kun je kiezen of je de ruwe Smarty variabelen wilt zien of niet. 
Als je kiest voor het tonen van variabelen, dan zie je de variabelen
precies zoals je ze hebt ingevoerd (dus {$voornaam}, {$achternaam}, enzovoort).
Als je echter omschakelt naar de gepersonaliseerde modus, dan worden al deze
variabelen vervangen door de echte waardes van een profiel uit je database.

### De standaardbestemming instellen

In je database kun je één profiel aanwijzen als *standaardbestemming*. Dit
is het profiel dat wordt gebruikt om de variabelen in te vullen. Als je
variabelen in een document opneemt (zoals {$voornaam} en {$achternaam}), en
je schakelt de gepersonaliseerde modus in, dan zullen de voor- en achternaam
van dit profiel worden getoond op de plaats van de variabelen.

Je kunt op twee manieren de standaardbestemming invoeren: vanuit het profielenbeheer
en vanuit het helpmenu. In het profielenbeheer open je het profiel dat je voor
de standaardbestemming wilt gebruiken, en daarna kies je voor de optie 
"standaardbestemming instellen".

Vanuit het helpmenu kan het ook. Als je de de link "welkom <jouw naam>" klikt,
kom je bij een dialoogvenster met jouw persoonlijke instellingen. Hier is
ook een tabblad om de standaardbestemming in te stellen.

![Test destination dialog](../images/createtestdestination.png)

De standaardbestemming is gekoppeld aan je persoonlijke login. Een collega
die toegang heeft tot hetzelfde account zou een heel andere standaardbestemming
kunnen hebben.

## Waar kun je Smarty-personalisatie gebruiken?

Je kunt vrijwel overal Smarty personalisatie toepassen:

* In de onderwerpregel van een e-mail;
* In e-mails en webdocumenten;
* Andere e-mail headers (zoals afzenderadres, CC, BCC, x-headers);
* Gepersonaliseerde website content;
* Webformulieren (standaardwaardes, labels, etc.);
* Hyperlinks en mailto links;
* UTM parameters (bij het uitbreiden van hyperlinks);
* Opvolgacties;
* Etc.

Op een paar plekken kun je geen gebruik maken van personaliseren:

* In enquêtes
* In content feeds



## Personalisatieinstellingen

Bij elk document en template kun je de personalisatie-instellingen wijzigen. 
Met deze instellingen bepaal je onder meer in welke taal [datums](./using-the-smarty-date-function.md)
worden weergegeven. Je vindt deze instelling linksonder de geopende
template of document.

![](../images/personalisatieinstellingen.png)

Het formulier voor de instellingen vind je zowel bij templates als bij documenten.
Als je geen expliciete keuze voor deze instellingen op documentniveau maakt, dan valt
het document terug op de instellingen van de template. Je kunt de volgende
vier settings veranderen:

* taal: de taal die wordt gebruikt voor het weergeven van datums
* tijdzone: de tijdzone om te bepalen hoe tijdstippen worden opgemaakt
* codering: de wijze waarop "rare" tekens worden gecodeerd
* html filteren: moeten personalisatievariabelen automatisch worden gefilterd?

### Taal en tijdzone

In het artikel over het [weergeven van datums en tijden](./using-the-smarty-date-function.md)
hebben we dit ook al behandeld: als je de huidige datum wilt weergeven is daar
een speciale |date_format modifier voor. Deze modifier kun je gebruiken om een 
tijdstip in computernotatie om te zetten naar een tijdstip in mensennotatie. De
taal en tijdzone settings worden hierbij gebruikt om te bepalen in welke taal
een datum wordt getoond (elke taal heeft immers andere namen voor de maanden en
de dagen), en welke tijdzone moet worden gebruikt (*nu* in Tokyo is iets anders
dan *nu* in New York).

### Codering

Lang verhaal kort: de codering moet je altijd op UTF-8 zetten. Dat is eigenlijk 
altijd goed. De UTF-8 karakterset is namelijk een karakterset die eigenlijk alle 
letters en tekens ter wereld op een efficiënte manier kan coderen.

Hoe zit dat precies? Traditioneel kon e-mail alleen worden gebruikt voor ASCII 
teksten: teksten die bestaan uit letters van het gewone alfabet, cijfers en een 
kleine verzameling leestekens. Zeg maar de tekens die op een gewoon toetsenbord 
staan. Buitenlandse tekens, waaronder ook karakters die voor ons gewoon zijn, zoals
letters met een trema of een accent (bijvoorbeeld ë, ï of é) horen daar niet bij. 
Als je toch een mail met dergelijke tekens moet versturen, dan moet je expliciet 
in de header van het e-mailbericht opnemen in welke karakterset de mail is opgemaakt:
de West-Europese, de Oost-Europese, Russisch, Chinees, enzovoort.

De karakterset UTF-8 is later ontwikkeld, en bevat eigenlijk alle tekens ter 
wereld bevat. Dit omvat de gewone toetsenbordtekens, maar ook de "rare" tekens
uit andere landen. Dus als je voor UTF-8 kiest, zit je sowieso goed.

## Extra personalisatie opties
Binnen de e-mailings in de Publisher is het mogelijk je data verder te personaliseren, dit kan bijvoorbeeld met de [personalisatie modifiers](./publisher-personalization-modifiers.md). Hiermee kan de gepersonaliseerde data nog meer aangepast worden. Naast de standaard database velden op te halen is het mogelijk om nog meer data uit profielen of mailings te halen, dit worden [personalisatie variabelen](./publisher-personalization-variables) genoemd. Als laatst is het mogelijk om functies aan te roepen tijdens het personaliseren. Met deze [personalisatie functies](./publisher-personalization-functions)  is het bijvoorbeeld mogelijk om feeds in te laden, condities mee te geven of kan er externe html opgehaald worden.
