# Smarty personalisatie
In Copernica werkt personalisatie door middel van de scripttaal [Smarty](http://www.smarty.net/docs/en/). Smarty maakt het mogelijk om mailings, webpagina's, SMS-berichten en PDF-bestanden te personaliseren op basis van (sub)profielgegevens. Smarty-code wordt gekenmerkt door het gebruik van accolades en het dollarteken.

Voor het personaliseren van (sub)profielgegevens gebruik je de Smarty-code _profile_ of _subprofile_. Die code combineer je met de naam van het veld in de desbetreffende database of collectie. Bijvoorbeeld:

* {$profile.voornaam}
* {$profile.email}
* {$subprofile.email}

Smarty is **hoofdlettergevoelig**. Personalisatie werkt alleen wanneer de gebruikte veldnaam volledig overeenkomt met de veldnaam waaraan je refereert. De variabele {$profile.voornaam} geeft bijvoorbeeld geen resultaat wanneer de veldnaam in de database _Voornaam_ is. In plaats daarvan gebruik je {$profile.Voornaam}.

Voor het gebruik van **subprofile** geldt dat personalisatievariabelen enkel werken wanneer het subprofiel de geadresseerde is. De e-mail wordt dan verzonden naar een e-mailadres binnen het subprofiel. Als je gegevens wilt tonen vanuit het subprofiel, maar de geadresseerde is het profiel zelf, zal je gebruik moeten maken van de [loadsubprofile](./loadprofile-and-loadsubprofile)-tag.

## Eenvoudige personalisatie

Stel dat je database de volgende velden bevat:

* aanhef
* naam
* email

Daarnaast bevat de database een profiel. Deze bevat voor de bovenstaande velden de volgende waardes:

* heer
* Bakker
* frank.bakker@voorbeeld.nl

Hiermee kun je mailings voorzien van de variabelen {$profile.aanhef}, {$profile.naam} en {$profile.email}. 

Bijvoorbeeld:
```
Beste {$profile.aanhef} {$profile.naam},

Je ontvangt deze e-mail omdat je bent aangemeld met het volgende e-mailadres: {$profile.email}.
```

Resultaat:
```
Beste heer Bakker,

Je ontvangt deze e-mail omdat je bent aangemeld met het volgende e-mailadres: frank.bakker@voorbeeld.nl.
```

## Geavanceerde personalisatie

Je kunt Smarty-code ook gebruiken om conditionele gegevens te tonen. Dat doe je door middel van [if-statements](https://www.smarty.net/docs/en/language.function.if.tpl)

```
{if $profile.Voornaam == "Peter"}
    Als het veld 'Voornaam' de waarde 'Peter' bevat, toon deze tekst.
{else}
    Zo niet, toon deze tekst.
{/if}
```

Stel dat een database de velden _geslacht_ en _achternaam_ bevat. Een aanhefveld ontbreekt daarbij. Om toch een aanhef te kunnen gebruiken bepalen we deze op basis van het geslachtveld:

```
Geachte {if $profile.geslacht=="Man"}heer{elseif $profile.geslacht=="Vrouw"}mevrouw{else}relatie{/if},
```

In het bovenstaande voorbeeld bepalen we eerst of de waarde van het veld _geslacht_ gelijk is aan _Man_. Zo ja, dan wordt de aanhef als '_Geachte heer_' weergegeven. 

Wanneer dit niet het geval is wordt er gekeken of de waarde gelijk is aan _Vrouw_. Bij het aantreffen van die waarde wordt de aanhef als '_Geachte mevrouw_' weergegeven.  

Bevat het veld geen van beide waardes? Dan wordt de aanhef '_Geachte relatie_' weergegeven.

## Personalisatie-opmaak

Het kan voorkomen dat databasegegevens onderling verschillen qua hoofdlettergebruik. Smarty biedt daarom specifieke functies om dergelijke afwijkingen op te kunnen vangen. De meest voorkomende functies bespreken we hieronder.

### lower
Deze functie verwijdert alle hoofdletters. Door gebruik te maken van de code {$profile.Naam|lower} wordt de waarde 'Frank BAKKER' bijvoorbeeld als 'frank bakker' weergegeven.

### ucfirst
Dit filter zorgt ervoor dat het eerste karakter uit een string (tekenreeks) een hoofdletter wordt. Als de variabele {$profile.Naam} de waarde 'frank bakker' bevat, dan zorgt de code {$profile.Naam|ucfirst} ervoor dat dit wordt weergegeven als: 'Frank bakker'.

Je kunt deze functies ook combineren. Als de variabele {$profile.Naam} de waarde 'FRANK' bevat, kun je met {$profile.Naam|lower|ucfirst} zorgen dat de waarde eerst zonder hoofdletters wordt gemaakt en vervolgens het eerste teken alsnog van hoofdletter voorzien: 'Frank.

* Bekijk [hier](./publisher-personalization-functions) de overige personalisatiefuncties.

## Personalisatie testen
Je kan in Copernica de uitvoer van je personalisatie testen. Dit kan in de _voorvertoningsmodus_ binnen je template of document. Hiervoor worden de gegevens uit de standaardbestemming gebruikt. Zorg er altijd voor dat de standaardbestemming zich bevindt in dezelfde database waaraan je je mailing wilt richten.
