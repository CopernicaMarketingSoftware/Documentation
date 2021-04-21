# Filter data met smarty modifiers

Het kan zijn dat er in de profieldata binnen je typefouten of stijlfouten voorkomen.
Zeker als een deel van de informatie binnenkomt via formulieren die door de relatie zelf is ingevuld. Om de profieldata in je templates en documenten toch netjes weer te geven, kan je de personalisatie opmaakregels meegeven. Dit kan eenvoudig het verwijderen van hoofdletters zijn, maar ook bepalen hoe een datum wordt weergegeven of het inkorten of afbreken van teksten.

We zetten enkele mogelijkheden op een rij. Een volledig overzicht vind je op de website van Smarty](https://www.smarty.net/docs/en/language.modifiers.tpl).

Filters worden altijd vooraf gegaan door een pipe (|). Deze vind je direct boven de entertoets op je toetsenbord.

## Data en tijden dynamisch weergeven

Voor meer informatie over het dynamisch weergeven van data en tijden kun je dit artikel bekijken: [Data en tijden dynamisch weergeven](publisher-personalization-variables#data-en-tijden-dynamisch-weergeven).

### Filter: |date\_format

Dit filter biedt opmaak aan datumvelden in het document.

Let op dat je de taal van het document instelt bij het gebruik van datum\_format, voor een juiste weergave van bijvoorbeeld de maand (deziembre vs. december). 
Je kunt dit doen bij de _personalisatie-instellingen_ binnen je template of document.

In het volgende overzicht geven we enkele voorbeelden van de mogelijkheden in combinatie met de [$smarty.now](https://www.smarty.net/docs/en/language.variables.smarty.tpl#language.variables.smarty.now) variabale.

```txt
{$smarty.now|date_format}                   Apr 1, 2021
{$smarty.now|date_format:"%d-%m-%Y"}        01-04-2021
{$smarty.now|date_format:"%Y-%m-%d"}        2021-04-01
{$smarty.now|date_format:"%A, %e %B %Y"}    donderdag, 1 april 2021
{$smarty.now|date_format:“%A"}              donderdag
{$smarty.now|date_format:"%D"}              04/01/21
{$smarty.now|date_format:"%c"}              wo 21 apr 2021 10:07:17 CEST 
```

Als je een datum ophaalt uit het profiel kan je op dezelfde wijze het filter toepassen:

Bijvoorbeeld: `{$profile.Geboortedatum|date_format:"%d-%m-%Y"}`

Voor meer datumcoderingen, zie de website van smarty
([smarty.net](http://www.smarty.net/docs/en/language.modifier.date.format.tpl)).

### Filter: |capitalize

Met het filter ‘capitalize’ wordt de eerste letter van elk woord in een tekst vervangen door een hoofdletter. 
Als een profiel in het veld `{$Naam}` de waarde `richard van de zande` heeft, dan zorgt de code `{$Naam|capitalize}` er voor dat dit in het document wordt getoond als `Richard Van De Zande`.

Woorden waar getallen in voorkomen worden NIET voorzien van een hoofdletter, tenzij de optionele parameter ‘true’ wordt meegegeven: `{$Naam|capitalize}` wordt na het personaliseren getoond als `k3`, `{$Naam|capitalize:true}` wordt getoond als `K3`.

### Filter: |lower

Dit filter wordt gebruikt om alle hoofdletters te verwijderen. 

Als je variabele `{$Naam}` de waarde `Karel APPEL` bevat, zorgt de code `{$Naam|lower}` ervoor dat dit wordt weergegeven als: `karel appel`.

De volgorde van je opgegeven filters wordt aangehouden bij het toepassen van de filters. Wanneer je {$Naam|lower|capitalize} gebruikt, zal dit worden weergegeven als: 'Karel Appel'.

### Filter: |upper

Dit filter wordt gebruikt om alle tekens hoofdletters te maken. 

Als je variabele `{$Naam}` de waarde `Karel Appel` bevat, zorgt de code `{$Naam|upper}` ervoor dat dit wordt weergegevens als: `KAREL APPEL`.

### Filter: |cat

Met dit filter voeg je tekst toe aan de variabele. Als je variabele `{$Naam}` de waarde `Karel Appel` bevat, zorgt de code
`{$Naam|cat:"junior"}` ervoor dat de tekst `Karel Appel junior` in je template of document wordt geplaatst.

### Filter: |replace

Met dit filter kan je tekst in een variabele vervangen door andere tekst.

Stel je hebt een variabale `{$artikel}` met de tekst `Klik hier om de nieuwsbrief in te zien`, maar je wilt het woord nieuwsbrief vervangen met `e-mail`, dan kun je gebruik maken van de volgende code:

```
{$artikel|replace:'nieuwsbrief':'e-mail'}
```

De tekst wordt nu: `Klik hier om de e-mail in te zien`.

### Filter: |truncate

Dit filter kapt een variabele af na een bepaald aantal tekens, standaard
is dit 80.

De code die hierbij gebruikt wordt is: `{$Title|truncate}`.

Als de variabele `{$Title}` als volgt luidt: `Two Sisters Reunite after Eighteen Years at Checkout Counter.`.

Dan zal in het document door de volgende codes

```
{$Title}
{$Title|truncate}
{$Title|truncate:30}
{$Title|truncate:30:""}
{$Title|truncate:30:"---"}
```

het volgende komen te staan:

```
Two Sisters Reunite after Eighteen Years at Checkout Counter.
Two Sisters Reunite after Eighteen Years at Checkout Counter.
Two Sisters Reunite after...
Two Sisters Reunite after
Two Sisters Reunite after---
```

### Filter: |wordwrap

Dit filter zorgt ervoor dat een zin over meerdere regels wordt verdeeld.
Standaard breekt het filter de zin af na 80 tekens. Als de variabele `{$Title}`
luidt: `Blind woman gets new kidney from dad she has not seen in years.`.

Dan zal bij de volgende codes

```
{$Title}

{$Title|wordwrap:30}

{$Title|wordwrap:20}

{$Title|wordwrap:30:"<br />\n"}

{$Title|wordwrap:26:"\n":true}
```

het volgende komen te staan:

```txt
Blind woman gets new kidney from dad she has not seen in years.

Blind woman gets new kidney
from dad she hasn't seen in
years.

Blind woman gets new
kidney from dad she
hasn't seen in
years.

Blind woman gets new kidney<br />
from dad she hasn't seen in<br />
years.

Blind woman gets new kidn
ey from dad she hasn't se
en in years.
```

### Filter: |count\_characters

Met dit filter wordt het aantal karakters in een variabele geteld, met
of zonder spaties. Als de variabele `{$Title}` de waarde `Klant in kaart`
heeft, dan zorgt de code

```
{$Title}
{$Title|count_characters}
{$Title|count_characters:true}
```

voor de volgende weergave:

```txt
Klant in kaart
12 (zonder spaties)
14 (met spaties)
```

### Filter: |count\_paragraphs

Met dit filter wordt het aantal paragrafen in een variabele geteld. Als
de variabele `{$Article}` twee paragrafen heeft, bijvoorbeeld:

```txt
Smarty is een open-source template engine voor PHP.

Het zorgt er voor dat je HTML pagina's en PHP code gescheiden kan
houden.
```

Dan zorgt de code `{$Article|count_paragraphs}` ervoor dat in het
document het volgende te zien is:

```
2
```

### Filter: count sentences

Dit filter wordt gebruikt om het aantal zinnen in een variabele te
tellen. Als de variabele `{$Article}` twee zinnen bevat, bijvoorbeeld;

```txt
Bij grote projecten heb je ook het voordeel dat een programmeur aan
de PHP scripts kan werken. Terwijl een graficus de HTML pagina's kan
maken.
```

Dan zorgt de code `{$Article|count_sentences}` ervoor dat in het
document het volgende geplaatst wordt:

```
2
```

### Filter: count words

Met dit filter wordt het aantal woorden in een variabele geteld. Als de
variabele `{$Article}` 14 woorden bevat, bijvoorbeeld;

```
Bovendien heeft Smarty heel wat interessante mogelijkheden om snel
HTML tabellen op te bouwen.
```

Dan zorgt de code `{$Article|count_words}` ervoor dat in het
document het volgende geplaatst wordt:


```
14
```

### Filter: escape

Dit filter wordt gebruikt om HTML-code uit een (sub)profielveld te
filteren. Wanneer bijvoorbeeld per ongeluk in het veld `{$Voornaam}`
`<h1>Pieter</h1>` staat, wordt via `{$Voornaam|escape}` het html gedeelte escaped
weergegeven zodat deze html geen effect heeft op je ontwerp.

Let op: Dubbel escapen kan tot ongewenste situaties leiden. Smarty
personalisatie wordt door de applicatie automatisch gefilterd, tenzij je
dit zelf hebt uitgeschakeld. Gebruik het escape filter alleen als je het automatisch filteren hebt
uitgeschakeld.

### Filter: nl2br

Alle "\\n" lijnonderbrekingen zullen worden omgezet naar html \
 markeringen in de gegeven variabele. Dit filter is gelijk aan PHP's
*nl2br()* functie.

Als de variabele `{$Title}` de volgende zin bevat: `Zon en regen
worden\nvandaag verwacht.`’.\
 En de code `{$Title|nl2br}` wordt gebruikt, dan wordt de weergave:

```
Zon en regen worden
vandaag verwacht.
```

### Filter: regex\_replace

Dit filter laat u code vervanging binnen een variabele. De code
`{$Title|regex_replace:"/[\r\t\n]/":" "}` zorgt ervoor dat er een ruimte
ontstaat tussen woorden. Zo wordt in de volgende zin de \\n vervangen door een ruimte:

`Websites bouwen is erg ingewikkeld, \n zeggen experts.`

Dit wordt dan:

```txt
Websites bouwen is erg ingewikkeld,
zeggen experts.
```

### Filter: |strip

Dit filter vervangt alle herhaalde spaties, nieuwe regels en tabs met
één spatie. Als de `{$Article}` luidt: `Websites hebben       veel onderhoud nodig.`

Dan kan je met de code `{$Article|strip}` de spaties verwijderen.

In het gepersonaliseerde document krijg je dan het volgende te zien:

`Websites hebben veel onderhoud nodig.`

### Filter: |strip\_tags

De code `{$Article|strip_tags}` verwijdert alle gemarkeerde tags, namelijk
alles dat tussen \< en \> staat.

```
{$Article}
{$Article|strip_tags}
{$Article|strip_tags:false}
```

```
Blind Woman Gets <font face="helvetica">New Kidney</font> from Dad she Hasn't Seen in <b>years</b>.
Blind Woman Gets  New Kidney  from Dad she Hasn't Seen in  years .
Blind Woman Gets New Kidney from Dad she Hasn't Seen in years.
```
