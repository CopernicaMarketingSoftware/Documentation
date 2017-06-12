# Personaliseren binnen de Marketing Suite

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
{$profile/subprofile.<veld>}

Voorbeeld:

Beste {$profile.Voornaam}
```

Je kunt met deze syntax de gegevens van elk database- of collectieveld
opnemen in een e-mailbericht. Deze code wordt in het verstuurde bericht
vervangen door de veldwaarde in het profiel van de ontvanger.

Er moet altijd gespecificeerd worden of een veld uit het profiel of het
subprofiel aangeroepen wordt. Door in plaats van `{\$Voornaam}`,
`{\$profile.Voornaam}` of `{\$subprofile.veldnaam}` te gebruiken is het
mogelijk om vanuit de gegevens van zowel het profiel als het subprofiel
van de klant te personaliseren.

## Personaliseren van hyperlinks

Hyperlinks in e-mailings kunnen worden aangevuld met gegevens uit een profiel
of subprofiel. Een voorbeeld hiervan zijn de unieke inloggegevens
($profile.id en $profile.code) die je in de hyperlink meestuurt,
zodat relaties automatisch worden ingelogd als zij vanuit een e-mail
naar een webpagina klikken.

```
https://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}
```

## Waar kan ik personaliseren in de drag-and-drop editor?

In de Marketing Suite kun je naast de tekstvelden ook op vele andere
plaatsen personalisatie toevoegen. Deze velden zijn te herkennen aan
het Dollar `$` teken in het input-veld. Zo kun je bijvoorbeeld de
'from name', het onderwerp, maar ook het 'from adres' aanpassen door
in deze velden de code toe te passen.


[Ga naar de Marketing Suite](https://ms.copernica.com)
