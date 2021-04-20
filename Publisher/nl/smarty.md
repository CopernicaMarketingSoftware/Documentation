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

* Aanhef
* Naam
* Email

Daarnaast bevat de database een profiel. Deze bevat voor de bovenstaande velden de volgende waardes:

* heer
* Bakker
* frank.bakker@voorbeeld.nl

Hiermee kun je mailings voorzien van de variabelen {$profile.Aanhef}, {$profile.Naam} en {$profile.Email}. 

Bijvoorbeeld:
```
Beste {$profile.Aanhef} {$profile.Naam},

Je ontvangt deze e-mail omdat je bent aangemeld met het volgende e-mailadres: {$profile.Email}.
```

Resultaat:
```
Beste heer Bakker,

Je ontvangt deze e-mail omdat je bent aangemeld met het volgende e-mailadres: frank.bakker@voorbeeld.nl.
```

## Geavanceerde personalisatie

Je kunt Smarty-code ook gebruiken om conditionele gegevens te tonen. Dat doe je door middel van [if-statements](https://www.smarty.net/docs/en/language.function.if.tpl):

Met de onderstaande code toon je content op voorwaarde dat het veld 'Voornaam' de waarde 'Peter' bevat:

```
{if $profile.Voornaam == "Peter"}
```

Vervolgens geef je aan welke content er getoond moet worden wanneer dit niet het geval is:

```
{else}
```

Tot slot geef je het slot van de conditie aan:

```
{/if}
```

Stel dat een database de velden _Geslacht_ en _Achternaam_ bevat. Een aanhefveld ontbreekt daarbij. Om toch een aanhef te kunnen gebruiken bepalen we deze op basis van het geslachtveld:

```
Geachte {if $profile.Geslacht=="Man"}heer{elseif $profile.Geslacht=="Vrouw"}mevrouw{else}relatie{/if},
```

In het bovenstaande voorbeeld bepalen we eerst of de waarde van het veld _Geslacht_ gelijk is aan _Man_. Zo ja, dan wordt de aanhef als '_Geachte heer_' weergegeven. 

Wanneer dit niet het geval is wordt er gekeken of de waarde gelijk is aan _Vrouw_. Bij het aantreffen van die waarde wordt de aanhef als '_Geachte mevrouw_' weergegeven.  

Bevat het veld geen van beide waardes? Dan wordt de aanhef '_Geachte relatie_' weergegeven.

## Personalisatie-opmaak

Het kan voorkomen dat databasegegevens onderling verschillen qua hoofdlettergebruik. Smarty biedt daarom specifieke functies om afwijkingen op te vangen. De meest voorkomende functies bespreken we hieronder.

### lower
Deze functie verwijdert alle hoofdletters. Door gebruik te maken van de code {$profile.Naam|lower} wordt de waarde 'Frank BAKKER' bijvoorbeeld als 'frank bakker' weergegeven.

### ucfirst
Dit filter verandert het eerste karakter uit een string (tekenreeks) naar een hoofdletter. Stel bijvoorbeeld dat de variabele {$profile.Naam} de waarde 'frank bakker' bevat. Met de code {$profile.Naam|ucfirst} geef je de waarde weer als: 'Frank bakker'.

Je kunt de bovenstaande functies ook combineren. Als de variabele {$profile.Naam} de waarde 'FRANK' bevat, dan kun je de code {$profile.Naam|lower|ucfirst} gebruiken om hoofdletters te verwijderen en het eerste teken vervolgens alsnog van een hoofdletter te voorzien. De waarde wordt dan als 'Frank' weergegeven.

* Bekijk [hier](./publisher-personalization-functions) de verdere personalisatiefuncties.

## Personalisatie testen
Je kunt de weergave van personalisatie testen in Copernica. Dat doe je door middel van de _voorvertoningsmodus_ in je template of document. De voorvertoning is gebaseerd op de standaardbestemming. De standaardbestemming dient zich in dezelfde database te bevinden als de ontvanger waaraan je de mailing wilt versturen.
