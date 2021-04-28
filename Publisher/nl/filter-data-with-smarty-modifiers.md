# Filter data met Smarty-modifiers

Profieldata kan in sommige gevallen typ- of stijlfouten bevatten, bijvoorbeeld wanneer data binnenkomt via een formulier. Je kunt die data filteren door documenten en templates te voorzien van Smarty-modifiers. Die filters worden voorafgegaan door een pipe (|).  

Smarty-modifiers bieden verschillende mogelijkheden, van het toevoegen en verwijderen van hoofdletters tot het weergeven van datums en het afkappen van teksten. De meestvoorkomende toepassingen vind je in het overzicht hieronder. Voor een volledig overzicht kijk je op de [Smarty-website](https://www.smarty.net/docs/en/language.modifiers.tpl).

## Data en tijden dynamisch weergeven

Je kunt Smarty-modifiers gebruiken om data en tijden dynamisch weer te geven. [Klik hier](publisher-personalization-variables#data-en-tijden-dynamisch-weergeven) voor meer informatie.

### Filter: |date\_format

Met dit filter bepaal je de opmaak van datumvelden binnen het template of document. 

In de onderstaande voorbeelden combineren we het filter met de [$smarty.now](https://www.smarty.net/docs/en/language.variables.smarty.tpl#language.variables.smarty.now)-variabele.

```txt
{$smarty.now|date_format}                   Apr 1, 2021
{$smarty.now|date_format:"%d-%m-%Y"}        01-04-2021
{$smarty.now|date_format:"%Y-%m-%d"}        2021-04-01
{$smarty.now|date_format:"%A, %e %B %Y"}    donderdag, 1 april 2021
{$smarty.now|date_format:“%A"}              donderdag
```

Je kunt het filter ook combineren met een datumveld binnen het profiel:

`{$profile.Geboortedatum|date_format:"%d-%m-%Y"}`

**Let op**: Om bijvoorbeeld maandnamen (deziembre vs. december) correct weer te geven is het belangrijk dat je de taal van het template of document juist instelt. De benodigde optie vind je binnen je template of document onder **'Personalisatie-instellingen'**.

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

Stel bijvoorbeeld dat de variabele `{$Naam}` de waarde `Karel Appel` bevat. Door gebruik te maken van de code `{$Naam|upper}` wordt de waarde omgezet naar `KAREL APPEL`.

### Filter: |cat

Dit filter geeft je de mogelijkheid om tekst toe te voegen aan een variabele. 

Door gebruik te maken van de code `{$Naam|cat:"junior"}` geef je de naam `Karel Appel` in je document of template weer als `Karel Appel junior`.

### Filter: |replace

Het replace-filter maakt het mogelijk om tekst in een variabele te vervangen.

Stel dat je een variabele `{$artikel}` hebt. De bijbehorende tekst is `Klik hier om de nieuwsbrief in te zien`. Het woord `nieuwsbrief` wil je vervangen door `e-mail`. Hiervoor gebruik je de volgende code:

```
{$artikel|replace:'nieuwsbrief':'e-mail'}
```

Vervolgens wordt de tekst weergegeven als `Klik hier om de e-mail in te zien`.

### Filter: |truncate

Met dit filter kap je een variabele af na een bepaald aantal tekens. Daarvoor gebruik je de code `{$Tekst|truncate}`. De tekenlimiet staat standaard ingesteld op 80 tekens.

Stel dat je variabele `{$Tekst}` de volgende tekst bevat: `Lees hier meer over het product en zijn mogelijkheden`. Je kunt de tekst bijvoorbeeld afkappen door middel van de onderstaande codes:

```
{$Tekst}
{$Tekst|truncate}
{$Tekst|truncate:30}
{$Tekst|truncate:30:""}
{$Tekst|truncate:30:"---"}
```

Deze worden in het template of document weergegeven als:

```
Lees hier meer over het product en zijn mogelijkheden
Lees hier meer over het product en zijn mogelijkheden
Lees hier meer over het...
Lees hier meer over het
Lees hier meer over het---
```

### Filter: |count\_characters

Met dit filter tel je het aantal karakters in een variabele (met of zonder spaties). 

Stel dat de variabele `{$Tekst}` de waarde `Dit is een testmail` bevat. Je kunt het bijbehorende karakteraantal ophalen door middel van de onderstaande codes:

```
{$Tekst}
{$Tekst|count_characters}
{$Tekst|count_characters:true}
```

Het resultaat:

```txt
Dit is een testmail
16 (zonder spaties)
19 (met spaties)
```

### Filter: |count\_paragraphs

Met dit filter tel je het aantal paragrafen in een variabele. 

We gaan bijvoorbeeld uit van een variabele `{$Artikel}` met twee paragrafen:

```txt
Smarty is een open-source template-engine voor PHP.

Smarty zorgt ervoor dat je HTML-pagina's en PHP-code gescheiden kan houden.
```

De code `{$Artikel|count_paragraphs}` zorgt ervoor dat het volgende in het template of document te zien is:

```
2
```

### Filter: count sentences

Je gebruikt dit filter om het aantal zinnen in een variabele te tellen. 

Stel bijvoorbeeld dat de variabele`{$Artikel}` de volgende twee zinnen bevat:

```txt
Bij grote projecten kan een programmeur aan PHP-scripts werken. Een graficus
werkt tegelijkertijd aan het aanmaken van HTML-pagina's.
```

De code `{$Artikel|count_sentences}` zorgt ervoor dat het volgende in het template of document te zien is:

```
2
```

### Filter: count words

Je gebruikt het count words-filter om het aantal woorden in een variabele te tellen. 

Stel bijvoorbeeld dat de variabele `{$Artikel}` de volgende 13 woorden bevat: 

```
Bovendien biedt Smarty heel wat interessante mogelijkheden om snel HTML-tabellen op te bouwen.
```

Door gebruik te maken van de code `{$Artikel|count_words}` geef je de onderstaande waarde in het template of document weer:

```
13
```
