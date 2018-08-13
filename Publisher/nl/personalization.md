# Personaliseren

De Marketing Suite en Publisher stellen je in staat om e-mails te 
personaliseren. Je doet dit door middel van een speciaal stukje script. Dit 
script wordt, voordat de e-mail is verstuurd, vervangen door de correcte data. 
Hieronder kun je nalezen hoe het personaliseren precies werkt binnen de omgeving
van de Marketing Suite en de Publisher:

* [Personaliseren binnen de Publisher](./personalizing-your-newsletter-in-the-publisher.md)

## Personaliseren binnen de Marketing Suite

In de drag-and-drop editor van de [Copernica Marketing Suite](https://ms.copernica.com)
stel je gemakkelijk e-mails samen. De e-mails verzonden vanuit
deze editor zijn automatisch responsive en makkelijk in elkaar
te slepen.

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
{$item.veldnaam}
{/if}
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

## Variabelen

Je kunt ook variabelen gebruiken. Dit kan bijvoorbeeld handig zijn als je een template hebt gemaakt die opeens gebruik moet maken van andere databasevelden.

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
naar een webpagina klikken. [Meer info kun je hier vinden](personalizing-hyperlinks).

```text
https://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}
```

## Waar kan ik personaliseren in de drag-and-drop editor?

In de Marketing Suite kun je naast de tekstvelden ook op vele andere
plaatsen personalisatie toevoegen. Deze velden zijn te herkennen aan
het Dollar **$** teken in het input-veld. Zo kun je bijvoorbeeld de
'from name', het onderwerp, maar ook het 'from adres' aanpassen door
in deze velden de code toe te passen.
