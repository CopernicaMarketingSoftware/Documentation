# Filter data met smarty modifiers

Het kan zijn dat er in de profieldata binnen je typefouten of stijlfouten voorkomen.
Zeker als een deel van de informatie binnenkomt via formulieren die door de relatie zelf is ingevuld. Om de profieldata in je templates en documenten toch netjes weer te geven, kan je de personalisatie opmaakregels meegeven. Dit kan eenvoudig het verwijderen van hoofdletters zijn, maar ook bepalen hoe een datum wordt weergegeven of het inkorten of afbreken van teksten.

We zetten de meest gebruikte mogelijkheden op een rij. Een volledig overzicht vind je op de website van Smarty](https://www.smarty.net/docs/en/language.modifiers.tpl).

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

Dit filter kapt een variabele af na een bepaald aantal tekens, standaard is dit na 80 tekens.

De code die hierbij gebruikt wordt is: `{$Tekst|truncate}`.

**Voorbeeld:**
Je variabele `{$Tekst}` bevat de volgende tekst: `Lees hier meer over het product en zijn mogelijkheden`.
Als voorbeeld gebruiken we de volgende opties:
```
{$Tekst}
{$Tekst|truncate}
{$Tekst|truncate:30}
{$Tekst|truncate:30:""}
{$Tekst|truncate:30:"---"}
```

In je template of document zie je nu:

```
Lees hier meer over het product en zijn mogelijkheden
Lees hier meer over het product en zijn mogelijkheden
Lees hier meer over het...
Lees hier meer over het
Lees hier meer over het---
```

### Filter: |count\_characters

Met dit filter wordt het aantal karakters in een variabele geteld, met of zonder spaties. 
Stel je variabele `{$Tekst}` bevat de waarde `Dit is een testmail`, dan kun je met onderstaande codes het aantal karakters ophalen:

```
{$Tekst}
{$Tekst|count_characters}
{$Tekst|count_characters:true}
```

Uitkomst:

```txt
Dit is een testmail
16 (zonder spaties)
19 (met spaties)
```

### Filter: |count\_paragraphs

Met dit filter wordt het aantal paragrafen in een variabele geteld. Als je variabele `{$Artikel}` twee paragrafen heeft, bijvoorbeeld:

```txt
Smarty is een open-source template engine voor PHP.

Het zorgt er voor dat je HTML pagina's en PHP code gescheiden kan
houden.
```

Dan zorgt de code `{$Artikel|count_paragraphs}` ervoor dat in het template of document het volgende te zien is:

```
2
```

### Filter: count sentences

Dit filter wordt gebruikt om het aantal zinnen in een variabele te tellen. Als je variabele `{$Artikel}` twee zinnen bevat, bijvoorbeeld;

```txt
Bij grote projecten heb je ook het voordeel dat een programmeur aan
de PHP scripts kan werken. Terwijl een graficus de HTML pagina's kan
maken.
```

Dan zorgt de code `{$Artikel|count_sentences}` ervoor dat in het template of document het volgende wordt geplaatst:

```
2
```

### Filter: count words

Met dit filter wordt het aantal woorden in een variabele geteld. Als je variabele `{$Artikel}` 14 woorden bevat, bijvoorbeeld;

```
Bovendien heeft Smarty heel wat interessante mogelijkheden om snel HTML tabellen op te bouwen.
```

Dan zorgt de code `{$Artikel|count_words}` ervoor dat in het document het volgende wordt geplaatst:

```
14
```
