In een database kunnen typefouten of stijlfouten voorkomen in tekst.
Zeker wanneer een deel van de informatie binnenkomt via
aanmeldformulieren door relaties zelf ingevuld. Om in publicaties hun
gegevens toch netjes weer te geven, kan je de personalisatie
opmaakregels meegeven. Dit kan eenvoudig het verwijderen van
hoofdletters zijn, maar ook bepalen hoe een datum wordt weergegeven of
het inkorten of afbreken van teksten.

We zetten enkele mogelijkheden op een rij. Een volledig overzicht vind
je op de [website van
Smarty](http://www.smarty.net/docsv2/en/language.modifiers.tpl).

Filters worden altijd vooraf gegaan door een pijpteken (|). Deze vind je
direct boven de entertoets op je toetsenbord.

Weergave van datums
-------------------

### Filter: |date \_format

Dit filter biedt opmaak aan datumvelden in het document.

Let op dat je de [taal van het
document](./personalisatie-instellingen-van-het-template-of-document.md "Personalisatie-instellingen van het template of document")
instelt bij het gebruik van datum\_format, voor een juiste weergave van
bijvoorbeeld de maand (deziembre vs. december).

Dit voorbeeld gebruikt \$smarty.now om de huidige datum in te vullen,
maar kan op alle datumvelden worden toepepast.

In het volgende overzicht een aantal voorbeelden van de mogelijkheden.

  -------------------------------------------- -----------------------------
  `{$smarty.now|date_format}  `                Dec 4, 2007
  `{$smarty.now|date_format:"%D"}    `         12/04/07
  `{$smarty.now|date_format:“%d-%m-%Y”}  `     04-12-2007
  `{$smarty.now|date_format:"%A, %e %B %Y"}`   Tuesday, 4 decembre 2007
  `{$smarty.now|date_format:“%A"} `            Tuesday
  `{$smarty.now|date_format:"%c"}    `         Tu 04 dec 2007 15:20:28 CET
  -------------------------------------------- -----------------------------

Als je een datum ophaalt uit het profiel kan je op dezelfde wijze het
filter toepassen:

Bijvoorbeeld: `{$Geboortedatum|date_format:"%D"}`

Voor meer datumcoderingen, zie de website van smarty
([smarty.net](http://www.smarty.net/docs/en/language.modifier.date.format.tpl)).

Hoofdletters en kleine letters
------------------------------

### Filter: |capitalize

Met het filter ‘capitalize’ wordt de eerste letter van elk woord in een
tekst vervangen door een hoofdletter. Als een profiel in het veld
{\$Naam} de waarde ‘richard van de zande’ heeft, dan zorgt de code
{\$Naam|capitalize} er voor dat dit in het document wordt getoond als
‘Richard Van De Zande’.

Woorden waar getallen in voorkomen worden NIET voorzien van een
hoofdletter, tenzij de optionele parameter ‘true’ wordt meegegeven:
{\$Model|capitalize} wordt na het personaliseren getoond als ‘k3’,
{\$Model|capitalize:true} wordt getoond als ‘K3’.

### Filter: |lower

Dit filter wordt gebruikt om alle hoofdletters te verwijderen. Dit is
gelijk aan de *PHP strtolower()*functie.

Als de variabele {\$Naam|lower} de waarde heeft: ‘Karel APPEL'

Dan zorgt de code {\$Naam|lower} ervoor dat wordt weergegeven: 'karel
appel'

De volgorde van de filters wordt aangehouden bij de toepassing. Wanneer
je als code {\$Naam|lower|capitalize} plaatst, dan zal in de
gepersonaliseerde publicatie: 'Karel Appel' worden weergegeven.

### Filter: |upper

Dit filter wordt gebruikt om alle tekens hoofdletters te maken. Dit
filter is gelijk aan de PHP *strtoupper()* functie.

Als het veld {\$Title} als volgt luidt: ‘Computers zijn ingewikkeld om
mee te werken’, dan zal door de code {\$Title|upper} het volgende in het
document komen te staan:

> 'COMPUTERS ZIJN INGEWIKKELD OM MEE TE WERKEN.'

### Filter: |cat

Met dit filter voeg je tekst toe aan de variabele. Bijvoorbeeld als de
variabele {\$Naam} de waarde ‘Karel Appel' heeft, dan zorgt de code
{\$voornaam|cat:“junior”} er voor dat de tekst ‘Karel Appel junior’ in
het document wordt geplaatst.

### Filter: |indent

Dit filter laat elke regel inspringen. Standaard springt de regel 4
tekens in. Optioneel kan je het aantal van karakters specificeren
waarmee je wilt inspringen.

Voorbeeld:

> {\$Title|indent:8}

Als de code {\$Title} is:

> ’De installatie bestanden moet je eerst downloaden van de website.\
>  Hierna dien je het ZIP bestand gewoon te unzippen.\
>  Best zet je het ergens in de map van je website.’

Als u achter de code {\$Title|indent} 8 plaatst krijgt u een inspringing
van 8 tekens.

Het document ziet er dan als volgt uit:

> 'De installatie bestanden moet je eerst downloaden van de website.\
>  Hierna dien je het ZIP bestand gewoon te unzippen.\
>  Best zet je het ergens in de map van je website.'

### Filter: |replace

Met dit filter kan je tekst in een variabele vervangen door andere
tekst. Deze is gelijk aan de PHP’s *str\_replace()* functie.

Bijvoorbeeld bij een veld {\$Title} staat de zin: ‘Kinderen spelen met
hun *moeder* in de tuin.’\
 Om het woord ‘moeder’ te vervangen in ‘oma’ gebruikt u de code

> {\$Title|replace:'moeder':'oma'}

Hierdoor zal de zin veranderen in: ‘Kinderen spelen met hun *oma* in de
tuin.’

### Filter: |spacify

Het filter ‘spacify’ is een manier om een spatie tussen elk karakter van
een variabele te plaatsen. U kunt eventueel ook een ander karakter of
zin invoegen.\
\
 Als ‘Title’ de volgende zin bevat: ‘Het sneeuwt buiten’.

Dan kan je met de code {\$Title|spacify} spaties tussen de karakters van
de zin plaatsen.

Als je de codes ingeeft

> {\$Title|spacify}\
>  {\$Title|spacify:"\*"}

dan wordt de weergave:

> ’H e ts n e e u w tb u i t e n.’\
>  ’H\*e\*t \*s\*n\*e\*e\*u\*w\*t \*b\*u\*i\*t\*e\*n.’

### Filter: |truncate

Dit filter kapt een variabele af na een bepaald aantal tekens, standaard
is dit 80.

De code die hierbij gebruikt wordt is: {\$Title|truncate}.

Als de variabele {\$Title} als volgt luidt: 'Websites zijn zeer
ingewikkeld opgebouwd'.

Dan zal in het document door de volgende codes

> {\$Title|truncate}\
>  {\$Title|truncate:30}\
>  {\$Title|truncate:30:""}

het volgende komen te staan:

> Websites zijn zeer ingewikkeld opgebouwd.\
>  Websites zijn zeer ingewikkeld...\
>  Websites zijn zeer ingewikkeld

### Filter: |wordwrap

Dit filter zorgt ervoor dat een zin over meerdere regels wordt verdeeld.
Standaard breekt het filter de zin af na 80 tekens.\
 Als de variabele {\$Title} luidt: ‘Computers zijn zeer ingewikkeld om
mee te werken’.

Dan zal bij de volgende codes

> {\$Title}\
>  {\$Title|wordwrap:30}\
>  {\$Title|wordwrap:20}

het volgende komen te staan:

> Computers zijn zeer ingewikkeld om mee te werken.\
>  Computers zijn zeer\
>  ingewikkeld om mee te werken.\
>  Computers zijn zeer \
>  ingewikkeld om mee \
>  te werken.\
>  Tellen van tekens

### Filter: |count\_characters

Met dit filter wordt het aantal karakters in een variabele geteld, met
of zonder spaties. Als de variabele {\$Title} de waarde ‘Klant in kaart’
heeft, dan zorgt de code

> {\$Title}{\$Title|count\_characters}\
>  {\$Title}{\$Title|count\_characters:true}

voor de volgende weergave:

> Klant in kaart\
>  12 (zonder spaties)\
>  Klant in kaart\
>  14 (met spaties)

### Filter: |count\_paragraphs

Met dit filter wordt het aantal paragrafen in een variabele geteld. Als
de variabele {\$Title} twee paragrafen heeft, bijvoorbeeld:

> ‘Smarty is een open-source template engine voor PHP'.

Het zorgt er voor dat je HTML pagina's en PHP code gescheiden kan
houden.’

Dan zorgt de code {\$Title}{\$Title|count\_paragraphs} ervoor dat in het
document het volgende te zien is:

> 'Smarty is een open-source template engine voor PHP.

Het zorgt er voor dat je HTML pagina's en PHP-code gescheiden kan
houden.\
 2'

### Filter: count sentences

Dit filter wordt gebruikt om het aantal zinnen in een variabele te
tellen. Als de variabele {\$Title} twee zinnen bevat, bijvoorbeeld;

> ’Bij grote projecten heb je ook het voordeel dat een programmeur aan
> de PHP scripts kan werken. Terwijl een graficus de HTML pagina's kan
> maken.’

Dan zorgt de code {\$Title}{\$Title|count\_sentences} ervoor dat in het
document het volgende geplaatst wordt:

> 'Bij grote projecten heb je ook het voordeel dat een programmeur aan
> de PHP scripts kan werken. Terwijl een graficus de HTML pagina's kan
> maken.\
>  2'

### Filter: count words

Met dit filter wordt het aantal woorden in een variabele geteld. Als de
variabele {\$Title} 14 woorden bevat, bijvoorbeeld;

> ’Bovendien heeft Smarty heel wat interessante mogelijkheden om snel
> HTML tabellen op te bouwen.’

Dan zorgt de code {Title}{\$Title|count\_words} ervoor dat in het
document het volgende geplaatst wordt:

> 'Bovendien heeft Smarty heel wat interessante mogelijkheden om snel
> HTML tabellen op te bouwen.'\
>  14

HTML
----

### Filter: escape

Dit filter wordt gebruikt om HTML-code uit een (sub)profielveld te
filteren. Wanneer bijvoorbeeld per ongeluk in het veld {\$Voornaam}
'Pieter' staat, wordt via {\$Voornaam|escape} het gedeelte weggefilterd,
zodat de adressering toch gewoon 'Pieter' zal zijn.

Let op: Dubbel escapen kan tot ongewenste situaties leiden. Smarty
personalisatie wordt door de applicatie automatisch gefilterd, tenzij je
dit zelf hebt
[uitgeschakeld](./personalisatie-instellingen-van-het-template-of-document.md "Personalisatie-instellingen van het template of document").
Gebruik het escape filter alleen als je het automatisch filteren hebt
uitgeschakeld.

### Filter: nl2br

Alle "\\n" lijnonderbrekingen zullen worden omgezet naar html \
 markeringen in de gegeven variabele. Dit filter is gelijk aan PHP's
*nl2br()*functie.

Als de variabele {\$Title} de volgende zin bevat: ‘Zon en regen
worden\\nvandaag verwacht’.\
 En de code {\$Title|nl2br} wordt gebruikt, dan wordt de weergave:

> ‘Zon en regen worden
>
> vandaag verwacht’.

### Filter: regex\_replace

Dit filter laat u code vervanging binnen een variabele. De code
`{$Title|regex_replace:"/[\r\t\n]/":" "} `zorgt ervoor dat er een ruimte
ontstaat tussen woorden.\
 Zo wordt in de volgende zin de \\n vervangen door een ruimte:

> 'Websites bouwen is erg ingewikkeld, \\n zeggen experts.'

Dit wordt dan:

'Websites bouwen is erg ingewikkeld,\
 zeggen experts'.

### Filter: |strip

Dit filter vervangt alle herhaalde spaties, nieuwe regels en tabs met
één spatie.\
 Als de {\$Title} luidt: ‘Websites hebben\\n veel \\t onderhoud nodig.'

Dan kan je met de code {\$Title|strip} de spaties verwijderen.

In het gepersonaliseerde document krijg je dan het volgende te zien:

Websites hebben veel onderhoud nodig.

### Filter: |strip\_tags

De code {\$Title|strip\_tags} verwijdert alle gemarkeerde tags, namelijk
alles dat tussen \< en \> staat.\
 Als het veld {\$Title} luidt 'Internetis \<h1\>vandaag\</h1\>de dag erg
belangrijk .'

Dan krijgt je door de code {\$Title|strip\_tags} het volgende in het
document te zien:

> Internet is vandaag de dag erg belangrijk.
