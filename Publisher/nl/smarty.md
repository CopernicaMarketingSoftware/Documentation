# Smarty
Personalisatie in Copernica werkt middels de scripttaal [Smarty](http://www.smarty.net/docs/en/). Met Smarty is het mogelijk om je mailings, webpagina's, sms-berichten en PDF-bestanden te personaliseren op basis van de gegevens uit het profiel of subprofiel van de geadresseerden. Smarty code wordt gekenmerkt door het gebruik van accolades, { en }, en het dollarteken, $. 

Voor het personaliseren van (sub)profiel gegevens dien je binnen deze Smarty code het woord _profile_ of _subprofile_ te gebruiken in combinatie met de naam van het veld uit de database of collectie.

Voorbeeld:
* {$profile.voornaam}
* {$profile.email}
* {$subprofile.email}

Smarty is **hoofdlettergevoelig**. De naam van het veld, in bovenstaand voorbeeld _voornaam_ en _email_, zal alleen werken als deze overeenkomt met de veldnaam vanuit de database of collectie. Als je veldnaam _Voornaam_ is, geeft de variabele {$profile.voornaam} geen waarde terug. Je zal {$profile.Voornaam} moeten gebruiken.

Het gebruik van **subprofile** personalisatievariabelen werkt enkel als de geadresseerden daadwerkelijk het subprofiel is (de e-mail wordt verzonden naar een e-mailadres binnen het subprofiel). Als je gegevens wilt tonen vanuit het subprofiel, maar de geadresseerden is het profiel zelf, zal je gebruik moeten maken van de [loadsubprofile](./loadprofile-and-loadsubprofile)-tag.

## Eenvoudige personalisatie
We beginnen met een eenvoudig voorbeeld. 
Je hebt een database met de velden:
* aanhef
* naam
* email

In je database staat een profiel met de volgende gegevens in bovenstaande velden:
* heer
* Bakker
* frank.bakker@voorbeeld.nl

In je mailing kun je nu gebruik maken van de volgende variabelen: {$profile.aanhef}, {$profile.naam} en {$profile.email}. 

Bijvoorbeeld:
```
Beste {$profile.aanhef} {$profile.naam},

Je ontvangt deze e-mail omdat bent aangemeld
met het volgende e-mailadres: {$profile.email}.
```

Resultaat:
```
Beste heer Bakker,

Je ontvangt deze e-mail omdat bent aangemeld
met het volgende e-mailadres: frank.bakker@voorbeeld.nl.
```

## Geavanceerde personalisatie
Met Smarty kun je met [if-statements](https://www.smarty.net/docs/en/language.function.if.tpl) conditioneel gegevens tonen. Als voorbeeld gebruiken we een database met de velden _geslacht_ en _achternaam_. In dit geval bevat de database geen veld voor de aanhef. Om toch een aanhef te kunnen gebruiken, gaan we op basis van het veld geslacht bepalen wat de aanhef moet worden:

```
Geachte {if $profile.geslacht=="Man"}heer{elseif $profile.geslacht=="Vrouw"}mevrouw{else}relatie{/if},
```

In dit voorbeeld wordt eerst gekeken of de waarde van het veld _geslacht_ gelijk is aan _Man_. Als dit het geval is, wordt '_Geachte heer_' weergegeven.  

Als dit niet het geval is, wordt er gekeken of de waarde gelijk is aan _Vrouw_. Indien dit het geval is, wordt '_Geachte mevrouw_' weergegeven.  

Mocht het veld niet de waarde _Man_ of _Vrouw_ bevatten, wordt '_Geachte relatie_' weergegeven.

## Opmaak van personalisatie
Het kan voorkomen dat gegevens in je database onderling qua hoofdlettergebruik van elkaar afwijken. In Smarty zijn speciale functies beschikbaar om deze afwijkingen af te vangen. Hieronder zullen we van de meest voorkomende een voorbeeld geven. De overige functies vind je [hier](./publisher-personalization-functions).

### lower
Deze functie wordt gebruikt om alle hoofdletters te verwijderen. Als de variabele {$profile.Naam} de waarde 'Frank BAKKER' bevat, dan zorgt de code {$profile.Naam|lower} ervoor dat dit wordt weergegeven als: 'frank bakker'.

### ucfirst
Dit filter zorgt ervoor dat het eerste karakter uit een string (tekenreeks) een hoofdletter wordt. Als de variabele {$profile.Naam} de waarde 'frank bakker' bevat, dan zorgt de code {$profile.Naam|ucfirst} ervoor dat dit wordt weergegeven als: 'Frank bakker'.

Je kunt deze functies ook combineren met elkaar. Als de variabele {$profile.Naam} de waarde 'FRANK' bevat, kun je met {$profile.Naam|lower|ucfirst} zorgen dat de waarde eerst zonder hoofdletters wordt gemaakt en vervolgens het eerste teken alsnog van hoofdletter voorzien: 'Frank.

## Personalisatie testen
Je kan in Copernica de uitvoer van je personalisatie testen. Dit kan in de _voorvertoningsmodus_ binnen je template of document. Hiervoor worden de gegevens uit de standaardbestemming gebruikt. Zorg er altijd voor dat de standaardbestemming zich bevindt in dezelfde database waaraan je je mailing wilt richten.
