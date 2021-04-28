# Filter data met Smarty-modifiers

Profieldata kan in sommige gevallen typ- of stijlfouten bevatten, bijvoorbeeld wanneer data binnenkomt via een formulier. Je kunt die data filteren door documenten en templates te voorzien van Smarty-modifiers. Die filters worden voorafgegaan door een pipe (|).  

Smarty-modifiers bieden verschillende mogelijkheden, van het toevoegen en verwijderen van hoofdletters tot het weergeven van datums en het afbreken van teksten. De meest gebruikte functies vind je in het overzicht hieronder. Voor een volledig overzicht kijk je op de [Smarty-website](https://www.smarty.net/docs/en/language.modifiers.tpl).

## Data en tijden dynamisch weergeven

Je kunt Smarty-modifiers gebruiken om data en tijden dynamisch weer te geven. [Klik hier](publisher-personalization-variables#data-en-tijden-dynamisch-weergeven) voor meer informatie.

### Filter: |date\_format

Met dit filter bepaal je de opmaak van datumvelden binnen het document. In de onderstaande voorbeelden combineren we het filter met de [$smarty.now](https://www.smarty.net/docs/en/language.variables.smarty.tpl#language.variables.smarty.now)-variabele.

```txt
{$smarty.now|date_format}                   Apr 1, 2021
{$smarty.now|date_format:"%d-%m-%Y"}        01-04-2021
{$smarty.now|date_format:"%Y-%m-%d"}        2021-04-01
{$smarty.now|date_format:"%A, %e %B %Y"}    donderdag, 1 april 2021
{$smarty.now|date_format:“%A"}              donderdag
```

Je kunt het filter ook combineren met een datumveld binnen het profiel, bijvoorbeeld als volgt:

`{$profile.Geboortedatum|date_format:"%d-%m-%Y"}`

**Let op**: Om bijvoorbeeld de naam van de maand (deziembre vs. december) correct weer te geven is het belangrijk dat je de taal van het template of document juist instelt. De benodigde optie vind je binnen je template of document onder **'Personalisatie-instellingen'**.

Op de [website van Smarty](http://www.smarty.net/docs/en/language.modifier.date.format.tpl) vind je meer datumcoderingen.

### Filter: |capitalize

Het 'capitalize'-filter vervangt de eerste letter van elk woord door een hoofdletter. 

Stel bijvoorbeeld dat de variabele `{$Naam}` de waarde `richard van de zande` bevat. Door gebruik te maken van `{$Naam|capitalize}` wordt de waarde in het document weergegeven als `Richard Van De Zande`.

Woorden die getallen bevatten worden **niet** voorzien van een hoofdletter tenzij je de optionele parameter 'true' gebruikt. `{$Naam|capitalize}` wordt weergeven als `k3`, terwijl `{$Naam|capitalize:true}` als `K3` getoond wordt.

### Filter: |lower

Met dit filter verwijder je alle hoofdletters.

Bevat je variabele `{$Naam}` de waarde `Karel APPEL`? Dan toont de code `{$Naam|lower}` de waarde als `karel appel`. De volgorde van de gebruikte filters beïnvloed de manier waarop waardes worden weergegeven. De code `{$Naam|lower|capitalize}` toont de waarde bijvoorbeeld als `Karel Appel`. 

### Filter: |upper

Je gebruikt dit filter om alle letters om te zetten naar hoofdletters.

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

Het zorgt ervoor dat je HTML pagina's en PHP code gescheiden kan houden.
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
