# Personaliseren binnen de Marketing Suite
De Marketing Suite en Publisher stellen je in staat om e-mails te
personaliseren. Je doet dit door middel van een speciaal stukje script. Dit
script wordt, voordat de e-mail is verstuurd, vervangen door de correcte data.
Hieronder kun je nalezen hoe het personaliseren precies werkt binnen de
omgeving van de Marketing Suite.

Personaliseren kan op verschillende manieren: een persoonlijke aanhef
met de voor- en achternaam van de relatie, bepaalde content tonen op
basis van een interesse, bepaalde producten niet tonen in een aanbieding
als deze recent zijn aangeschaft, enzovoorts. In de Marketing Suite
kun je personaliseren met behulp van de volgende syntax:

```text
{$profile.<veld>}

Voorbeeld:

Beste {$profile.Voornaam}
```

Je kunt met deze syntax de gegevens van elk database- of collectieveld
opnemen in een e-mailbericht. Deze code wordt in het verstuurde bericht
vervangen door de veldwaarde in het profiel van de ontvanger.

Er moet altijd gespecificeerd worden of een veld uit het profiel of het
subprofiel aangeroepen wordt. Door in plaats van **{$Voornaam}** ,
**{$profile.Voornaam}** of **{$subprofile.veldnaam}** te gebruiken is het
mogelijk om vanuit de gegevens van zowel het profiel als het subprofiel
van de klant te personaliseren.

## Waar kun je personaliseren?
In de Marketing Suite kun je op vele plaatsen personalisatie toevoegen. Deze
velden zijn te herkennen aan het Dollar **$** teken in het input-veld. Zo kun
je bijvoorbeeld de 'from name', het onderwerp, maar ook het 'from adres'
aanpassen door in deze velden de code toe te passen.

## Beschikbare personalisatievariabelen
In dit object staan de gegevens van het profiel
waarnaar het bericht is gestuurd of, in het geval van een mailing naar
subprofielen, van het bij het subprofiel behorende profiel. Dit profiel object
heeft een aantal eigenschappen:

* **{$profile.id}**: numerieke identifier van het profiel
* **{$profile.extra}**: de extra data van het profiel die alleen met de api kan worden ingesteld
* **{$profile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$profile.code}**: alias voor {$profile.secret}, dus de geheime code
* **{$profile.created}**: tijdstip waarop het profiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$profile.referrers}**: een optionele array van profielen die verwijzen naar dit profiel d.m.v. een *referentieveld*
* **{$profile.*veldnaam*}**: elk veld van het profiel is toegankelijk via {$profile.*veldnaam*}
* **{$profile.*interesse*}**: elke interesse van het profiel is toegankelijk via {$profile.*interesse*}, en heeft de waarde "yes" of "no"
* **{$profile.*collectie*}**: indien er subprofielen zijn, is elke collectie van subprofielen benaderbaar via {$profie.*collectienaam*}

### Subprofielen
Als je een mailing naar subprofielen stuurt, dan is er naast het hierboven
genoemde {$profile} object ook een {$subprofile} beschikbaar. Dit object heeft
de volgende members:

* **{$subprofile.id}**: numerieke identifier van het subprofiel
* **{$subprofile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$subprofile.code}**: alias voor {$subprofile.secret}, dus de geheime code
* **{$subprofile.created}**: tijdstip waarop het subprofiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$subprofile.profile}**: het profiel object (zie hierboven) waar dit subprofiel toe behoort
* **{$subprofile.*veldnaam*}**: elk veld van het subprofiel is toegankelijk via {$subprofile.*veldnaam*}

### Template gegevens
Het {$template} object bevat alle informatie over je template:

* **{$template.id}** ID van het template
* **{$template.name}** Naam van het template
* **{$template.created}** Tijdstip van het aanmaken van het template
* **{$template.lastmodified}** Tijdstip van de laatste wijziging aan het template

### Mailing gegevens
Het {$mailing} object is wat uitgebreider, en bevat allerlei instellingen
van de mailing waartoe het bericht behoort:

* **{$mailing.sendtime}**: tijdstip waarop de mailing wordt verstuurd, in YYYY-MM-DD hh:mm:ss format
* **{$mailing.sendtimestamp}**: zelfde als de *sendtime* property, maar dan als unix timestamp (aantal seconden sinds 1 jan 1970)
* **{$mailing.snapshot.name}**: de naam van het document dat voor de mailing wordt gebruikt
* **{$mailing.snapshot.created}**: tijdstip waarop een snapshot van het document is gemaakt (YYYY-MM-DD hh:mm::ss notatie)
* **{$mailing.snapshot.subject}**: onderwerp van de mailing
* **{$mailing.type}**: geeft het type mailing aan ('mailing', 'followup', 'abtest' of 'splitrun')
* **{$mailing.mass}**: geeft aan of de mailing als bulkmailing is verzonden (true of false)
* **{$mailing.test}**: geeft aan of de mailing als testmailing is verzonden (true of false)

## Personalisatie modifiers
Je kunt de variabelen, waarmee je e-mails personaliseert, veranderen met behulp
van *modifiers*. Je doet dit door een `|` toe te voegen na de variabele.
Je gebruikt bijvoorbeeld **tolower** om de variabele **{$profile.name}** te
bewerken. Dit ziet er dan zo uit: **{$profile.name|tolower}**.
Tot slot, je kunt ook een aantal 'modifiers' achter elkaar gebruiken.
Je kunt bijvoorbeeld **{$profile.name|tolower|ucfirst}** gebruiken om te zorgen
dat alle namen met een hoofdletter beginnen en de resterende letters altijd
kleine letters zijn.

Bekijk het [overzicht van alle modifiers](./personalization-modifiers)

## Data uit een collectie weergeven
Je kunt ook eenvoudig data uit een collectie weergeven. Dit kun je op
verschillende manieren doen. Om data uit de eerste rij van de collectie weer te
geven kun je deze syntax gebruiken.

```text
{$profile.collectie[0].veldnaam}
```

Om data uit de volgende rij weer te geven kun je [0] vervangen door [1].

```text
{$profile.collectie[1].veldnaam}
```

Om data uit de laatste (en nieuwste) rij weer te geven kun je de count
modifier gebruiken om het aantal subprofielen te tellen waarna je
van het totaal 1 moet aftrekken omdat wij beginnen met nul.

```text
{$profile.collectie[$profile.collectie|count -1].veldnaam}
```

### De foreach functie
Om alle subprofielen weer te geven kun je een foreach functie gebruiken.

```text
{foreach $item in $profile.collectie}
{$item.veldnaam}
{/foreach}
```

Als je niet alle velden wilt weergeven kun je gebruik maken van de if functie
in combinatie met de foreach functie.

```text
{foreach $item in $profile.collectie}{if $item.status == "InWinkelmandje"}
{$item.veldnaam}{/if}
{/foreach}
```

Als er geen subprofiel bestaat kun je automatisch iets anders laten zien.

```text
{foreach $item in $profile.collectie}
Als er subprofielen zijn
{foreachelse}
Als er geen subprofielen zijn
{/foreach}
```

#### Het Gebruik van de <unchanged> Tag in de Drag-and-Drop Editor
De drag-and-drop editor ondersteunt een speciale <unchanged> tag die je kunt gebruiken om te voorkomen dat de editor HTML-code herschrijft. Normaal gesproken verbetert de editor fouten en inconsistenties in de HTML-code die je handmatig invoert. Echter, als je de oorspronkelijke code wilt behouden, kun je dat doen door gebruik te maken van de <unchanged> tag.

De <unchanged> tag is vooral handig bij het combineren van Smarty personalisatiecode met meer complexe HTML-structuren zoals tabellen. Als je Smarty en HTML combineert, dan voer je eigenlijk "ongeldige" HTML code in, die na de personalisatie pas geldig wordt. De editor heeft dit niet altijd in de gaten en kan soms de door jou ingevoerde HTML-code verbeteren, wat mogelijk niet overeenkomt met je bedoelingen. Dit gebeurt bijvoorbeeld wanneer een Smarty-instructie (zoals {foreach} of {if}) wordt opgenomen binnen een HTML-tabel.

Bekijk het volgende voorbeeld:
```text
<table>
    <tr>
        <th>Kop 1</th>
        <th>Kop 2</th>
    </tr>
    {foreach $items as $item}
    <tr>
        <td>{$item.property1}</td>
        <td>{$item.property2}</td>
    </tr>
    {/foreach}
</table>
```

Wanneer je de bovenstaande code opslaat, leest de drag-and-drop editor de HTML-code in en hergroepeert deze. De editor transformeert de code naar zoiets als dit:
```text
{foreach $items as $item} {/foreach}<table class=" cke_show_border">
    <tbody>
        <tr>
            <th>Kop 1</th>
            <th>Kop 2</th>
        </tr>
        <tr>
            <td>{$item.property1}</td>
            <td>{$item.property2}</td>
        </tr>
    </tbody>
</table>
```

Deze wijziging is echter mogelijk niet wenselijk. Met de <unchanged> tag kun je aangeven dat bepaalde code ongewijzigd moet blijven:

```text
<table>
    <tr>
        <th>Kop 1</th>
        <th>Kop 2</th>
    </tr>
    <!--<unchanged>{foreach $items as $item}</unchanged>-->
    <tr>
        <td>{$item.property1}</td>
        <td>{$item.property2}</td>
    </tr>
    <!--<unchanged>{/foreach}</unchanged>-->
</table>
```

Zoals je ziet, moet de tag worden ingesloten binnen HTML-commentaar <!-- en -->.

## Variabelen
Je kunt ook variabelen gebruiken. Dit kan bijvoorbeeld handig zijn als je een
template hebt gemaakt die opeens gebruik moet maken van andere databasevelden.

```
{$naam = $profile.voornaam}

Beste {$naam}
```

Verder kun je ook tekst opslaan in een variabele.
```
{$foo = 'hello'}
{$foo}
```

En je kunt ook rekenen:

```
{$totaal = $profile.product_price * $profile.product_qty}
{$totaal}
```

## Personaliseren van hyperlinks
Hyperlinks in e-mailings kunnen worden aangevuld met gegevens uit een profiel
of subprofiel. Een voorbeeld hiervan zijn de unieke inloggegevens
($profile.id en $profile.code) die je in de hyperlink meestuurt,
zodat relaties automatisch worden ingelogd als zij vanuit een e-mail
naar een webpagina klikken.
[Meer info kun je hier vinden](personalizing-hyperlinks).

```text
https://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}
```
