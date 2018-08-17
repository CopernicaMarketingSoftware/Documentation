# Personalisatie functies

Er zijn heel veel functies standaard in Smarty, en een paar functies zijn
specifiek voor Copernica. Hieronder zie je alle beschikbare functies:       

| Functie naam                                                          | Functie omschrijving                                                         |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{assign}](./emailings-publisher-personalization-functions#assign)                        | waarde toekennen aan een variabele                                           |
| [{capture}](./emailings-publisher-personalization-functions#capture)                      | tekst in een variabele opslaan                                               |
| [{condition}](./emailings-publisher-personalization-functions#condition)                  | conditioneel blok op basis van JavaScript                                    |
| [{counter}](./emailings-publisher-personalization-functions#counter)                      | teller                                                                       |
| [{cycle}](./emailings-publisher-personalization-functions#cycle)                          | wisselen tussen array van waardes                                            |
| {eval}                                                                | Het evalueren van variabele als template                                     |
| [{fetch}](./emailings-publisher-personalization-functions-fetch)                          | inladen van een externe gehoste content                                      |
| [{foreach}](./emailings-publisher-personalization-functions#foreach)                      | itereren over een array                                                      |
| [{if}](./emailings-publisher-personalization-functions#if)                                | conditionele blokken                                                         |
| [{in_miniselection}](./emailings-publisher-personalization-functions#in_miniselection)    | blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort |
| [{in_selection}](./emailings-publisher-personalization-functions#in_selection)            | blok dat alleen wordt getoond indien profiel tot een selectie behoort        |
| [{ldelim}](./emailings-publisher-personalization-functions#delim)                         | linkeraccolade                                                               |
| [{literal}](./emailings-publisher-personalization-functions#literal)                      | blok markeren dat letterlijk genomen wordt                                   |
| [{linkfile}](./emailings-publisher-personalization-functions#linkfile)                    | linken naar een file                                                         |
| [{linkpdf}](./emailings-publisher-personalization-functions#linkpdf)                      | linken naar een PDF bestand                                                  |
| [{loadfeed}](./emailings-publisher-personalization-functions#loadfeed)                    | inladen van een externe RSS feed                                             |
| [{loadfile}](./emailings-publisher-personalization-functions#loadfile)                    | inladen van een bestand                                                      |
| [{loadprofile}](./emailings-publisher-personalization-functions#loadprofile)                    | inladen van een profiel                                                      |
| [{loadsubprofile}](./emailings-publisher-personalization-functions#loadsubprofile)                    | inladen van een subprofiel                                                      |
| [{mailonly}](./emailings-publisher-personalization-functions#mailonly)                    | blok markeren dat alleen in de mailversie wordt getoond                      |
| [{math}](./emailings-publisher-personalization-functions#math)                            | berekening uitvoeren                                                         |
| [{rawcapture}](./emailings-publisher-personalization-functions#rawcapture)                | als {capture}, maar dan zonder html escaping                                 |
| [{strip}](./emailings-publisher-personalization-functions#strip)                          | witruimte verwijderen                                                        |
| [{survey}](./emailings-publisher-personalization-functions#survey)                        | inladen van een enquête                                                      |
| [{rdelim}](./emailings-publisher-personalization-functions#delim)                         | rechteraccolade                                                              |
| [{textformat}](./emailings-publisher-personalization-functions#textform)                  | tekst formatteren                                                            |
| [{unsubscribe}](./emailings-publisher-personalization-functions#unsubscribe)              | afmeldlink                                                                   |
| [{webform}](./emailings-publisher-personalization-functions#webform)                      | inladen van een webformulier                                                 |
| [{webonly}](./emailings-publisher-personalization-functions#webonly)                      | blok markeren dat alleen in de webversie wordt getoond                       |

## assign

De {assign} functie kan gebruikt worden om een waarde in een variabele op te slaan. Je kunt deze dan later gebruiken.
Als je grotere blokken tekst of andere elementen wil gebruiken is het handiger om de [capture](./emailings-publisher-personalization-functions#capture) of de [rawcapture](./emailings-publisher-personalization-functions#rawcapture) functie te gebruiken, omdat deze hier beter voor geschikt zijn.

### Voorbeeld    
    {assign var="name" value="Bob"} of {assign "name" "Bob"}
    Hallo {$name},
    
    Deze email schreven we speciaal voor jou!
    
---
## capture

*Capture* kan gebruikt worden om de code tussen de begin tag en de eind tag op te slaan in een variabele. Het werkt vergelijkbaar met de [assign functie](./emailings-publisher-personalization-functions#assign), maar kan ook gebruikt worden op veel grotere stukken code of om arrays te maken, zonder dat dit er slordig uitziet. Het slaat de code op tijdens het verwerken van de template en kan verderop in de template weer gebruikt worden. 

De [rawcapture](./emailings-publisher-personalization-functions#rawcapture) functie is heel vergelijkbaar, maar gebruikt geen HTML escaping. Als je  dit niet wilt gebruiken kun je *capture* overal vervangen door *rawcapture* 
in de volgende voorbeelden. Het wordt echter wel aangeraden om HTML escaping te gebruiken om te zorgen dat er geen schadelijke content wordt gebruikt.

*Capture* heeft vele functionaliteiten. Je kunt er informatie mee opslaan of toevoegen aan een bestaande variabele om een array te maken. We laten nu eerst wat parameters zien voor de functie en vervolgens hoe je ze gebruikt.

## Parameters

| Parameter naam | Omschrijving                             |
|----------------|------------------------------------------|
| name           | Naam van het blok                        |
| assign         | Variabele om het blok op te slaan        |
| append         | (Bestaande) variabele om aan te plakken  |

Geen van deze variabelen is verplicht. Als je geen naam meegeeft aan de functie kun wordt de naam op 'default' gezet. Je gebruikt dit blok vervolgens met `{$smarty.capture.default}`.


## Capture zonder variabele naam

Het volgende voorbeeld laat zien hoe je *capture* gebruikt zonder op 
te slaan in een variabele.

    {capture name="someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
De kortere versie ziet er als volgt uit en doet hetzelfde:

    {capture "someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
Om de code tussen de capture te gebruiken kun je de volgende code in je template plaatsen:

    {$smarty.capture.someText}


## Opslaan in een variabele

In het vorige voorbeeld halen we de inhoud van de capture op met `{$smarty.capture.someText}`, maar we kunnen dit ook opslaan in een variabele.

    {capture name="someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
De kortere versie ziet er als volgt uit:
    
    {capture "someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
Je kunt nu het blok aanroepen met **{$myText}**.
    
In dit voorbeeld is de tekst kort en had ook de [assign](./emailings-publisher-personalization-functions#assign), gebruikt kunnen worden, maar je kunt alles wat geen HTML is tussen deze tags plaatsen. Als je toch HTML wil gebruiken kun je {capture} vervangen door {rawcapture}.


## Capture gebruiken met arrays

Een meer geavanceerde techniek is om *capture* te gebruiken in combinatiemet een array, die je kunt printen met de [foreach functie](./emailings-publisher-personalization-functions#foreach). Dit kan ontzettend nuttig zijn als je informatie op meerdere plekken op wil slaan in een object.

Je kunt de onderstaande code gebruiken en aanpassen om een array te maken:

    {capture append="information"}{assign "name" "Bob"}{$profile.age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$profile.age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$profile.age}{\capture}
    
Dit lijkt misschien veel code, maar er worden slechts drie variabelen gedefinieerd en opgeslagen in *information*. Dit voorbeeld laat ook zien hoe je functies kunt combineren (zoals hier met assign). 

Laten we nu de inhoud van de array printen in de template.

    {foreach $information as $text}{$text}{/foreach}
    
Wat er nu gebeurt is dat we door alle waardes in *information* heen gaan, deze omzetten naar tekst en printen. Het resultaat ziet er als volgt uit:

`Bob, 25, the Netherlands`

---

## condition
Een *condition* lijkt qua werking veel op de [if functie](./emailings-publisher-personalization-functions#if) maar evalueert JavaScript expressies. De enige parameter is de expressie in JavaScript die geëvalueerd moet worden.

### Voorbeeld

    {condition expression="Math.random<0.5"}
        {Display some content}
    {/condition}
    
Deze inhoud wordt maar in 50% van de gevallen getoond op willekeurige wijze, maar je kunt de expressies zo ingewikkeld maken als je wil.

---

## counter

De *counter* tag kan gebruikt worden om tellingen te printen en verhoogt zichzelf elke keer dat hij wordt aangeroepen. Je kunt zoveel tellingen bijhouden als je wil en deze zijn uit elkaar te houden door ze een duidelijke naam te geven.

### Parameter

| Parameter naam | Omschrijving                 |
|---------------|-------------------------------|
| name          | Naam van de counter           |
| start         | Start nummer                  |
| skip          | Tel interval                  |
| direction     | Tel op/af                     |
| print         | Print/print geen waarde       |
| assign        | Variabele voor opslaan output |

In het standaard geval waar er geen informatie is gegeven begint de telling op 1, wordt er steeds 1 bijgeteld en wordt de huidige waarde van de teller geprint.

### Voorbeeld 1

In het geval waar we geen enkele van de parameters specificeren kunnen we de volgende code gebruiken:

    {counter}<br />
    {counter}<br />
    {counter.default}<br />
en het volgende resultaat krijgen:
    1<br />
    2<br />
    3<br />
    
### Voorbeeld 2: Gepersonaliseerde teller
Kijk nu eens naar een wat ingewikkelder stuk code dat er als volgt uitziet:

    {counter name="the final countdown" start=6, skip=2 direction="down"}<br />
    {counter name="the final countdown"}<br />
    {counter name="the final countdown"}<br />
    {counter name="some less awesome counter" start="1" skip="2"}<br />
    {counter name="some less awesome counter"}<br />
    {counter name="the final countdown"}<br />
    
We hebben hier een teller die optelt en eentje die aftelt. De oneven getallen komen van de opteller en de even getallen van de afteller in de volgende output:

    6<br />
    4<br />
    2<br />
    1<br />
    3<br />
    0<br />
---
## cycle

De *cycle* functie kan gebruikt worden om te wisselen tussen een set waarden. Je kunt deze bijvoorbeeld gebruiken om twee kleuren af te wisselen in de regels van een tabel, om door een array met kleuren te loopen of door een andere array van waarden.

### Parameters

| Parameter naam | Omschrijving                                    |
|----------------|-------------------------------------------------|
| name           | Naam van de cycle                               |
| values         | Waarden in de cycle (in array of met delimiter) |
| print          | Wel/niet de waarde printen                      |
| advance        | Wel/niet doorgaan naar de volgende waarde        |
| delimiter      | Delimiter voor cycle                            |
| assign         | Variabele om output in op te slaan              |
| reset          | Reset naar eerste waarde                        |

De enige vereiste waarde zijn de *values*. Als er geen informatie verder wordt meegegeven is de naam "default" en wordt automatisch doorgewisseld en geprint. De standaard delimiter die de waardes scheidt is de komma.

### Voorbeeld

Het volgende voorbeeld laat zien hoe je kleuren van de regenboog toe kunt wijzen als product kleuren.

    {foreach from $products item=product}
        {cycle values="red;orange;yellow;green;blue;indigo;purple, name=$product.color, delimiter=";"}
    {\foreach}
    
Natuurlijk vereist dit voorbeeld een array met producten. Nadat deze code is gerund hebben alle producten een kleur die later weer opgevraagd kan worden. Dit voorbeeld gebruikt ook de [foreach functie](./emailings-publisher-personalization-functions#foreach).

---

## ldelim en rdelim

Zoals je misschien wel hebt gezien in de voorbeelden gebruikt Smarty syntax krulhaken. De Smarty code voor een naam is bijvoorbeeld **{$name}**.Dit betekent echter dat de krulhaak wat lastiger te gebruiken is als symbool. Er zijn drie manieren om dit op te lossen: Spaties plaatsen rond de krulhaken (Alleen [Smarty](./smarty-2-vs-smarty-3) 3), **ldelim** en **rdelim** en [literal](./emailings-publisher-personalization-functions#literal).

Om een linkerhaak '{' te printen kun je de code **{ldelim}** wat staat voor left delimiter. Om de rechterhaak '}' te printen kun je de code **{rdelim}** gebruiken, wat staat voor right delimiter.

Als je echter een groot stuk letterlijk wil printen zonder alle haken te vervangen is het verstandiger literalte gebruiken.

---
# fetch

Fetch kan gebruikt worden om bestanden van het locale systeem, HTTP of FTP op te vragen. Je kunt dan de inhoud van de bestanden tonen.

* **http**: URLs die beginnen met "http://" worden gebruikt om een website weer te geven.
* **ftp**: URLs die beginnen met "ftp://" zorgen dat het bestand wordt gedownload van de server en getoond in de template.
* **local**: Het volledige systeem pad of het pad relatief aan het PHP script wordt opgevraagd en getoond. Je kunt zo de inhoud van de locale machine laten zien.

De functie heeft een **name** parameter die verplicht is en met **assign** kun je ook de opgevraagde inhoud in een variabele opslaan in plaats van deze te laten zien.

## Voorbeeld

Met de volgende code kun je informatie opvragen van een website, bijvoorbeeld het weer voor komende week:

    {fetch file="http://www.myweather.com/today/"}
    
Of je kunt deze in een variabele zetten en deze met je eigen HTML gebruiken.

    {fetch file="http://www.theweather.com/today/" assign='weather'}
    {if $weather ne ''}
      <div id="weather">{$weather}</div>
    {/if}

Dit voorbeeld gebruikt ook de [if functie](./emailings-publisher-personalize-functions#if).    Je kunt ook downloaden van een FTP server. Het volgende voorbeeld laat daarnaast zien hoe je variabelen in een link kunt gebruiken.

    {fetch file="ftp://`$user`:`$password`@`$server`/`$path`"}
    
---

## foreach/foreachelse

De *foreach en foreachelse* functies kunnen gebruikt worden om bijvoorbeeld over arrays met data te loopen. Je kunt *foreach* loops ook in elkaar plaatsen. Het aantal iteraties wordt altijd bepaald door de lengte van de array of een integer voor een arbitraire hoeveelheid iteraties.

### Parmaters

| Parameter naam | Omschrijving                                    |
|----------------|-------------------------------------------------|
|index           | Huidige index in array                          |
|iteration       | Huidige loop iteratie, begint op 1 |
|first           | Boolean, alleen TRUE op eerste iteratie |
|last            | Boolean, alleen TRUE op laatste iteratie |
|show            | Boolean, alleen TRUE als data weergegeven wordt |
|total           | Totaal aantal iteraties dat uitgevoerd gaat worden | 

### Voorbeeld

Als we een array met waardes hebben, in dit geval definiëren we *information*, kunnen we hierover loopen en allerlei operaties uitvoeren. In dit geval houden we het simpel en printen we slechts de inhoud als tekst. De array wordt gemaakt met de [capture functie](./emailings-publisher-personalization-functions#capture).

    {capture append="information"}{assign "name" "Bob"}{$profile.age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$profile.age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$profile.age}{\capture}

    {foreach $information as $text}{$text}{/foreach}
    
De output van deze code is:

`Bob, 25, the Netherlands`
    
We kunnen ook de andere eigenschappen van de iterator gebruiken:

    {foreach $information as $text}
        {if $text@index eq 3}
            End of the list,
        {\if}
        {$text@index}, 
    {foreachelse}
        no text in the list
    {/foreach}
    
    
Hier printen we de index van elk item en een berichtje voor we de laatste printen. De output ziet er als volgt uit:

`1, 2, End of the list, 3`
    
---

## if

Met de *if* function is het mogelijke conditionele uitdrukkingen te maken en inhoud te plaatsen op basis van beschikbare informatie. Profiel en subprofiel velden zijn hier heel nuttig, bijvoorbeeld. Het is ook mogelijk om **{elseif}** en **{else}** te gebruiken of *if* statements in elkaar te plaatsen.

### Qualifiers

De volgende qualifiers zijn beschikbaar om expressies te maken voor de if functie:

| Symbol     | Syntax           | Description           |
|------------|------------------|-----------------------|
| ==         | $a eq $b         | gelijk                |
| !=         | $a ne/neq $b     | ongelijk              |
| >          | $a gt $b         | groter dan            |
| \<         | $a lt $b         | kleiner dan           |
| >=         | $a gte/ge $b     | groter dan            |
| \=         | $a lte/le $b     | kleiner dan           |
| ===        | $a === 0         | identiek              |
| !          | not $a           | negatie               |
| %          | $a mod $b        | modulair              |
| is div by  | $a is div by $b  | deelbaar door         |
| is even    | $a is even       | is even               |
| is even by | $a is even by $b | grouping level even   |
| is odd     | $a is odd        | is oneven             |
| is odd by  | $a is odd by $b  | grouping level oneven |

Het is ook mogelijk expressies aan elkaar te schakelen met 'and' en 'or'.

### Voorbeeld

    {if $profile.name eq 'Fred' or $profile.name eq 'Wilma'}
       ...
    {/if}
    
    {if isset($profile.name) && $profile.name == 'Blog'}
        {* doe een ding *}
    {elseif $profile.name == $foo}
        {* doe een ander ding *}
    {/if}
    
---

## in_miniselection

De *in_miniselection* functie kan gebruikt worden om te checken of een gespecificeerd subprofiel in een specifieke miniview zit. Deze functie is ontwikkeld door Copernica en kan gebruikt worden om content te specialiseren met behulp van miniselecties in je database. Je kunt bijvoorbeeld een selectie maken van vrouwen waarvan je weet dat ze kinderen hebben en in je mails naar hen specifiek kinderkleren adverteren.

Om de functie uit te voeren is een miniselectie verplicht. Als het subprofiel niet meegegeven wordt probeert de functie zelf het subprofiel op te halen waarvoor je personaliseert.

### Voorbeeld

    {in_miniselection miniselection="womenwithkids"}}
        { Display your content here! }
    {/in_miniselection}
    
---

# in_selection

De *in_selection* functie kan gebruikt worden om te checken of een gespecificeerd profiel in een specifieke view/selectie zit. Deze functie is ontwikkeld door Copernica en kan gebruikt worden om content te specialiseren met behulp van selecties in je database. Je kunt bijvoorbeeld een selectie maken van vrouwen waarvan je weet dat ze kinderen hebben en in je mails naar hen specifiek kinderkleren adverteren.

Om de functie uit te voeren is een selectie verplicht. Als het profiel niet meegegeven wordt probeert de functie zelf het profiel op te halen waarvoor je personaliseert.

## Voorbeeld

    {in_selection selection=145}
        { Display your content here! }
    {/in_selection}

    {in_selection miniselection=54}
        { Display your content here! }
    {/in_selection}
---

## linkfile

De *linkfile* functie laat je een file linken uit het files onderdeel 
van de profielen in je template of document.

Let op: Deze functie kan niet gebruikt worden in een **Content** web formulier 
tekst blok.

### Ondersteunde bestand types

* ZIP bestand: *.zip
* Plain tekst
* HTML tekst
* PDF bestand: *.pdf
* DOC/DOCX Word bestanden: *.doc/*.docx
* GIF/PNG/JPEG/JPG/JPE afbeeldingen: *.gif/*.png/*.jpeg/*.jpg/*.jpe


### Voorbeeld

De *linkfile* functie kan gebruikt worden om een file te linken die geüpload 
is onder profielen in een webpagina of mail document.

    {linkfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}

Als de file niet gevonden wordt zal alleen de filename worden weergeven 
aan de gebruiker. Het is daarom verstandig om naast de *file* optie ook 
altijd een *fallback* te definiëren. Als de file dan niet beschikbaar is 
wordt deze file in plaats daarvan weergeven.

---

## linkpdf

De linkpdf tag kan gebruikt worden om een link op te stellen naar een bestaand PDF bestand. Eerst moet er een document of template gevonden worden dat matcht met de aanvraag. Deze wordt dan omgezet naar een link, die automatisch escaped wordt, tenzij anders gespecificeerd.

### Voorbeeld

    {linkpdf document="mypreviousmailing" escape="true"}
    
Dit geeft alleen de link zelf weer, maar je kunt altijd HTML gebruiken om de link te vervangen door woorden en klikbaar te maken.

---

## literal

De *literal* functie wordt gebruikt om een blok code letterlijk te nemen. Dit is vooral nuttig als je een blok code wil gebruiken waarin veel krulhaken staan, omdat deze normaal worden geïnterpreteerd als Smarty syntax, bijvoorbeeld Javascript.

In een simpel geval waarin bijvoorbeeld maar twee krulhaken gebruikt worden kan het handiger zijn om de [*ldelim* en *rdelim* functies](./personalization-functions-delim)te gebruiken. Het is daarnaast in [Smarty 3](smarty-2-vs-smarty-3) ook mogelijk om simpelweg een spatie voor en achter elke haak te zetten.

### Voorbeeld

Om de *literal* functie te gebruiken hoef je alleen wat letterlijk genomen moet worden tussen de begin tag (`{literal}`) en end tag (`{\literal}`) te plaatsen.
 
    <script>
       // Deze haakjes zouden in Smarty 3 automatisch 
       // genegeerd worden door de whitespace
       function myFoo {
         alert('Foo!');
       }
       // Dit is een goede plek voor het literal blok,
       // omdat dat de code leesbaar houdt.
       {literal}
         function myBar {alert('Bar!');}
       {/literal}
    </script>
    
Dit voorbeeld komt uit de [Smarty documentatie](http://www.smarty.net/docs/en/).

---

## loadfeed

Met de loadfeed functie kun je eenvoudig feeds in je e-mail ofwebdocument laden. Je kunt met deze functie een feed inladen die je in het onderdeel Content hebt gemaakt of een feed welke elders issamengesteld en gehost.

### Voorbeeld


    {loadfeed feed='http://www.eendomein.nl/feed/feed.xml'}

Vervang *http://www.eendomein.nl/feed/feed.xml*  met het adres (URL) van de feed die elders is gepubliceerd.
Voor uitgebereide informatie over loadfeed met eigen styling klik dan [hier](./personalization-functions-loadfeed.md).

---

## loadfile

De *loadfile* functie laat je een file laden uit het files onderdeel van de profielen in je template of document.

Let op: Deze functie kan niet gebruikt worden in een **Content** web formulier tekst blok.

### Ondersteunde bestand types

- HTML files: *.html
- TXT files: *.txt

Als je andere formaten wil gebruiken kun je ook [linken naar een file](./emailings-publisher-personalization-functions#linkfile).

### Voorbeeld

De *loadfile* functie kan gebruikt worden om een file te laden die geüpload is onder profielen in een webpagina of mail document.

    {loadfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}

Als de file niet gevonden wordt zal alleen de filename worden weergeven aan de gebruiker. Het is daarom verstandig om naast de *file* optie ook altijd een *fallback* te definiëren. Als de file dan niet beschikbaar is wordt deze file in plaats daarvan weergeven.

---

## loadprofile

Voor het ophalen van een profiel uit een andere database gebruik je loadprofile. Plaats deze functie direct onder de **<body>** tag in je broncode.

```text
{loadprofile source="Offices" Area="$Area" assign="office"}
```

- Met source verwijs je naar de database die je als bron wilt gebruiken. We kijken nu in de database Offices.
- Met de veldnaamzoeker Area="$Area" koppel je het juiste profiel in de database Offices aan de klant, aan de hand van de waarde die in het databaseveld Area is opgeslagen.
- De gegevens uit de Office database wijs je met source toe aan de aanwijzer office.

Je kan hiermee bijvoorbeeld een document personaliseren met het telefoonnummer van het kantoor uit de database Offices: {$offices.Phone}

### Voorbeeld

    {loadprofile source="Offices" Area="$Area" assign="office"}
    {loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$offices.id"}
    Beste {$profile.FirstName},
    U bent aangesloten bij ons regiokantoor in {$office.City}. 
    U kunt dit kantoor direct bereiken door te bellen met {$office.Phone}.
    Voor vragen kan je altijd contact met mij opnemen.
    Met vriendelijke groet,
    {$account.Firstname} {$account.Lastname}, uw accountmanager
    {$account.Email}

Dit resulteert in:
Beste James,
U bent aangesloten bij ons regiokantoor in Haarlem. U kunt dit kantoor direct bereiken door te bellen met 031 23 123456789.
Voor vragen kan je altijd contact met mij opnemen.
Met vriendelijke groet,
Jerome Greenheart, uw accountmanager
j.greenheart@example.com

---

## loadsubprofile

Als de gegevens die je wilt gebruiken zijn opgeslagen in een subprofiel in de collectie account kan je ze bereiken met de loadsubprofile functie. Voor het halen van gegevens uit een collectie gebruik je de functie loadsubprofile. De volgende regel volstaat in het geval van dit voorbeeld:

```text
{loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$office.id"}
```

- Met **source** verwijs je naar de database Offices en de collectie Account
- Met de veldzoeker **AM** koppel je het profiel met de juiste accountmanager, aan de hand van de waarde die in het collectieveld AM is opgeslagen.
- Met de toevoeging `profile="$office.id"` zorg je ervoor dat alleen in de collectie van het aangeroepen profiel wordt gekeken (en dus niet in alle collecties).

Je kan een document hiermee personaliseren met een telefoonnummer van de juiste accountmanager middels de volgende smarty code: `{$account.Phone}`

### Voorbeeld

    {loadprofile source="Offices" Area="$Area" assign="office"}
    {loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$offices.id"}
    Beste {$profile.FirstName},
    U bent aangesloten bij ons regiokantoor in {$office.City}. 
    U kunt dit kantoor direct bereiken door te bellen met {$office.Phone}.
    Voor vragen kan je altijd contact met mij opnemen.
    Met vriendelijke groet,
    {$account.Firstname} {$account.Lastname}, uw accountmanager
    {$account.Email}

Dit resulteert in:
Beste James,
U bent aangesloten bij ons regiokantoor in Haarlem. U kunt dit kantoor direct bereiken door te bellen met 031 23 123456789.
Voor vragen kan je altijd contact met mij opnemen.
Met vriendelijke groet,
Jerome Greenheart, uw accountmanager
j.greenheart@example.com

---

## mailonly

Het {mailonly} blok kan gebruikt worden om een stuk code alleen zichtbaar 
te maken in de mail versie van het bericht. Als het vervolgens in de 
browser geopend wordt is de content binnen dit blok niet meer zichtbaar.

### Voorbeeld

    {mailonly}
        Click <a href="{webversion}">here</a> to view this mail in your browser
    {/mailonly}
    
In dit voorbeeld maken we gebruik van het {mailonly} block om de link 
naar de webversie te verbergen uit de webversie. De tegenhanger hiervan is [{webonly}](./emailings-publisher-personalization-functions#webonly) deze toon enkel content in de webversie. 

---

## math

De *math* functie maakt het mogelijk om wiskunde vergelijkingen uit te voeren in de template. Dit is echter een computationeel zware functie die sneller is in PHP. Het wordt niet aangeraden deze functie in loops te gebruiken.

## Parameters

De volgende parameters worden ondersteund:

| Parameter naam | Omschrijving                           |
|---------------|-----------------------------------------|
| equation      | Vergelijking om uit te voeren           |
| format        | Formaat voor resultaat                  |
| var           | Vergelijking variabele waarde           |
| assign        | Variabele voor opslaan resultaat        |
| \[var ...\]   | Waarden voor variabelen in vergelijking |

Als je een formule gebruikt als `$a * $b` moeten de variabelen $a en $b eerst gedefinieerd worden voordat we ermee kunnen rekenen.

### Ondersteunde operatoren

De ondersteunde operatoren zijn +, -, /, *, abs, ceil, cos, exp, floor, log, log10, max, min, pi, pow, rand, round, sin, sqrt, srans and tan.

### Voorbeeld

Een simpele vergelijking:

    {assign "height" 2}
    {assign "width" 3}
    {math equation="x * y" x=$height y=$width}
    
Deze code wordt gebruikt om het resultaat van x * y uit te rekenen, wat 6 is in dit geval. Dit is maar een simpele vergelijking, maar je kunt deze zo ingewikkeld maken als je zelf wil. Dit voorbeeld gebruikt daarnaast de [assign functie](./emailings-publisher-personalization-functions#assign) in de korte versie.

Als we een breuk uit willen rekenen echter is het handiger om decimalen weer te geven. We willen dit resultaat ook opslaan, zodat we "1.33" krijgen als we **{$frac}** in de template typen.

    {assign "height" 1}
    {assign "width" 3}
    {math equation="1 + x / y" assign="frac" format="%.2f" x=$height y=$width}

---
## rawcapture
De rawcapture functie is heel vergelijkbaar, maar gebruikt geen HTML escaping. Als je dit niet wilt gebruiken kun je capture overal vervangen door rawcapture in de volgende voorbeelden. Het wordt echter wel aangeraden om HTML escaping te gebruiken om te zorgen dat er geen schadelijke content wordt gebruikt.

### Voorbeeld

    {rawcapture}<h1>{$profile.title}</h1>{rawcapture}
---

## strip
De *strip* functie verwijdert ruimte uit de template, die anders de HTML output zou kunnen veranderen. Het is nuttig als je graag je code uitschrijft met whitespace om het meer leesbaar te maken en voorkomt de vreemde bijwerkingen die dit kan hebben.

### Voorbeeld

Het volgende voorbeeld laat zien hoe je de functie gebruikt. Dit voorbeeld komt uit de [Smarty documentatie](http://www.smarty.net/docs/en/).

    {strip}
    <table border='0'>
     <tr>
      <td>
       <a href="{$url}">
        <font color="red">This is a test</font>
       </a>
      </td>
     </tr>
    </table>
    {/strip}
    
Dit verandert alle HTML tags in een lange regel in je daadwerkelijke mail. Let wel op dat je geen normale tekst aan het begin of einde van een regel hebt staan, dit kan het resultaat onverwacht veranderen.

---

## survey

De *survey* functie kan gebruikt worden om een [enquête](./surveys) in je document te plaatsen die je van tevoren hebt aangemaakt. Je moet hiervoor ook een [XSLT](./css-and-xslt) meegeven.

### Voorbeeld

    {survey name="mysurvey" xslt="mystyle"}
    
Met deze regel wordt de enquête met de naam "mysurvey" in de stijl van de gegeven XSLT geplaatst in de template.

---

##  textformat

*Textformat* is een functie die toegepast kan worden op blokken tekst om deze te formatteren. Het verwijdert vooral spaties, speciale karakters en formatteert paragrafen door te wrappen en indentatie toe te voegen.

### Parameters

Het is mogelijk om een preset stijl te gebruiken (op het moment is alleen "email" beschikbaar), maar je kunt met de parameters ook zelf een stijl configureren.

| Variabele naam | Omschrijving                                     |
|----------------|--------------------------------------------------|
| style          | Preset stijl                                     |
| indent         | Aantal karakters voor indentatie                 |
| indent_first   | Aantal karakters voor indentatie eerste regel    |
| indent_char    | Character/string voor indentatie                 |
| wrap           | Aantal karakters om regel naar te wrappen        |
| wrap_char      | Karakter om een regel mee af te sluiten          |
| wrap_cut       | Wrap wel/niet op exact character ipv woord einde |
| assign         | Variabele om output aan toe te kennen            |

In het standaard geval wordt er geen indentatie gebruikt, maar een enkele spatie is wel de standaard voor *indent_char*. Elke regel wordt naar 80 karakters gewrapt en op de grens van het woord gewrapt. Elke regel wordt afgesloten met een line break "/n".

### Voorbeeld

Er volgt nu een simpel voorbeeld uit de [Smarty documentation](http://www.smarty.net/docs/en/):

    {textformat wrap=40}
    
       This is foo.
       This is foo.
       This is foo.
       This is foo.
    
       This is bar.
    
       bar foo bar foo     foo.
       bar foo bar foo     foo.
    
       {/textformat}

Van deze code krijgen we de volgende output:
    
    This is foo. This is foo. This is foo.
    This is foo.

    This is bar.

    bar foo bar foo foo. bar foo bar foo
    foo.
    
Maar dit bericht kan er ook heel anders uitzien:

    {textformat wrap=20 indent=5 indent_char="*" wrap_cut=TRUE}

    This is foo.
    This is foo.
    This is foo.
    This is foo.

    This is bar.

    bar foo bar foo     foo.
    bar foo bar foo     foo.

    {/textformat}
    
De output van deze code is het volgende:

    *****This is foo. Th
    *****is is foo. This 
    *****is foo. This is 
    *****foo.
    
    *****This is bar.
    
    *****bar foo bar foo
    *****foo. bar foo ba
    *****r foo foo.
    

---

## unsubscribe

Het is wettelijk verplicht om iedere (commerciële) e-mail die je verstuurt, te voorzien van een goed zichtbare en werkende uitschrijfmogelijkheid. Copernica biedt verschillende mogelijkheden voor het toevoegen van zulks een uitschrijflink. De meest gemakkelijke en laagdrempelige manier om een uitschrijflink toe te voegen is de tag **{unsubscribe}**.

**Belangrijke noot:** Wanneer je gebruik maakt van de {unsubscribe},
dien je tevens het [uitschrijfgedrag](./database-unsubscribe-behavior) in te stellen op de database of collectie waaraan je de e-mailing richt!

### Extra opties

Nadat een ontvanger op de uitschrijflink heeft gedrukt, wordt hij of zij doorverwezen naar een (nogal lege) standaardpagina.

Om een eigen pagina te tonen, gebruik je de 'redirect' functie

    {unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}

De uitschrijver wordt, bij het klikken op de link, direct doorverwezen naar de pagina die je als redirect hebt opgegeven.

Om in plaats van het standaarddomein (pic.vicinity.nl) van Copernica eeneigen domein te tonen, is de optie *domain* beschikbaar.

    {unsubscribe domain='nieuwsbrief.yourdomain.com'}

Let op: het uitschrijfdomein moet een CNAME verwijzing hebben naar onzeserver (http://vicinity.picsrv.net/) om de link te laten werken.

### De uitschrijflink toevoegen

Gebruik de volgende code om een uitschrijflink toe te voegen in de HTMLbroncode van het template of in een tekstblok in het document.

    <a  href="http://www.example.com" data-script="profile.unsubscribe();">Uitschrijven</a>

### Voorbeeld


    <a href="https://www.copernica.com/nl/afmelden/{$profile.id}/{$profile.code}/">
        Stuur mij geen e-mails meer
    </a>

---

## webform

De *webform* functie kan gebruikt worden om een web formulier toe te voegen aan je document als je deze van tevoren aangemaakt hebt en een valide [XSLT](./css-and-xslt) bestand hebt voor de layout.

### Voorbeeld

    {webform name="mywebform" xslt="mystyle"}
    
Door deze regel toe te voegen voeg je het web formulier met de gegeven naam toe in de stijl van de gegeven XSLT aan je template.

---

## webonly

Het {webonly} blok kan gebruikt worden om een stuk content alleen zichtbaar 
te maken in de webversie van een bericht. Als deze template gebruikt zou 
worden in een mail wordt het deel tussen de *webonly* tags genegeerd.

### Voorbeeld

    {webonly}
        Click <a href="{somepage}">here</a> to go to the homepage
    {/webonly}
    
In het voorbeeld gebruiken we het {webonly} blok om de link naar de homepage 
te verstoppen als de gebruiker in zijn mail kijkt. Deze content is alleen 
zichtbaar in de browser. De tegenhanger hiervan is [{mailonly}](./emailings-publisher-personalization-functions#mailonly) deze toont content in de mailclient. 




