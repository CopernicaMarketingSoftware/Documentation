# Smarty-personalisatie
In Copernica werkt personalisatie door middel van de scripttaal [Smarty](http://www.smarty.net/docs/en/). Hiermee is het mogelijk om mailings, webpagina's, SMS-berichten en PDF-bestanden te personaliseren op basis van (sub)profielgegevens. Je herkent Smarty-code aan het gebruik van accolades en het dollarteken.

Voor het personaliseren van (sub)profielgegevens gebruik je de Smarty-code _profile_ of _subprofile_. Die code combineer je met de naam van het veld in de desbetreffende database of collectie. Bijvoorbeeld:

* _{$profile.Voornaam}_
* _{$profile.Email}_
* _{$subprofile.Email}_

Smarty is **hoofdlettergevoelig**. Personalisatie werkt alleen wanneer de gebruikte veldnaam volledig overeenkomt met de veldnaam waaraan je refereert. De variabele _{$profile.voornaam}_ geeft bijvoorbeeld geen resultaat wanneer de veldnaam in de database '_Voornaam_' is. In plaats daarvan gebruik je _{$profile.Voornaam}_.

Voor het gebruik van {$subprofile.VELDNAAM} geldt dat personalisatievariabelen enkel werken wanneer het subprofiel de geadresseerde is. De e-mail wordt dan verzonden naar een e-mailadres binnen het subprofiel. Wil je gegevens vanuit het subprofiel tonen in mailings die geadresseerd zijn aan het profiel zelf? Dan kun je gebruik maken van de [loadsubprofile](./loadprofile-and-loadsubprofile)-tag. 

## Eenvoudige personalisatie

Stel dat je database de volgende velden bevat:

* Aanhef
* Naam
* Email

Daarnaast bevat de database een profiel met de onderstaande waardes:

* heer
* Bakker
* frank.bakker@voorbeeld.nl

Hiermee kun je mailings voorzien van de variabelen _{$profile.Aanhef}_, _{$profile.Naam}_ en _{$profile.Email}_. 

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

Je kunt Smarty-code ook gebruiken om conditionele gegevens te tonen. Dat doe je door middel van [if-statements](https://www.smarty.net/docs/en/language.function.if.tpl).

Met de onderstaande code toon je content op voorwaarde dat het veld '_Voornaam_' de waarde '_Peter_' bevat:

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

Stel dat een database de velden '_Geslacht_' en '_Achternaam_' bevat. Een aanhefveld ontbreekt daarbij. Om toch een aanhef te kunnen gebruiken bepalen we deze op basis van het geslachtveld:

```
Geachte {if $profile.Geslacht=="Man"}heer{elseif $profile.Geslacht=="Vrouw"}mevrouw{else}relatie{/if},
```

In het bovenstaande voorbeeld controleren we eerst of de waarde van het veld '_Geslacht_' gelijk is aan '_Man_'. Zo ja, dan wordt de aanhef als '_Geachte heer_' weergegeven. 

Wanneer dit niet het geval is wordt er gekeken of de waarde gelijk is aan '_Vrouw_'. Bij het aantreffen van die waarde wordt de aanhef als '_Geachte mevrouw_' weergegeven.  

Bevat het veld geen van beide waardes? Dan wordt de aanhef '_Geachte relatie_' weergegeven.

## Smarty-beveiliging
Als accountbeheerder heb je geen volledige controle over de gegevens die in je database of collectie worden opgeslagen. In sommige gevallen geven gebruikers zelf wijzigingen door aan profielgegevens, bijvoorbeeld bij het invullen van aanmeld- of wijzigingsformulieren. Dergelijke methodes maken het voor kwaadwillenden mogelijk om ongewenste input (zoals JavaScript of CSS) in databasevelden op te slaan.

De personalisatie-instellingen van je template of document staan standaard ingesteld om HTML hierop te filtreren. Input wordt als platte tekst weergegeven zodat dergelijke scripts niet worden uitgevoerd.

Als je deze optie handmatig hebt uitgeschakeld raden we je dringend aan om gebruik te maken van de Smarty-modifier [_|escape_](https://www.smarty.net/docs/en/language.modifier.escape.tpl). Daarmee maak je ongewenste input onschadelijk.

### Voorbeeld
Je profiel bevat een veld _'Tekst'_ met de waarde `<script type="text/javascript">alert('Laat een melding zien');</script>`.
Bij de personalisatie-instellingen van je webpagina heb je **'HTML filteren'** uitgezet. Vervolgens maak je gebruik van de volgende Smarty-code:

```
{$profile.Tekst}
```

Doordat het veld _'Tekst'_ een ongefiltreerd script bevat wordt er bij het bezoeken van de webpagina een JavaScript-melding getoond.
Om dat te vermijden maak je gebruik van de _|escape_-modifier:


```
{$profile.Tekst|escape}
```
De {$profile.Tekst|escape}-code zorgt ervoor dat  de waarde uit het databaseveld als platte tekst wordt weergegeven.
Het script wordt dan ook niet uitgevoerd. In plaats daarvan toont de webpagina `<script type="text/javascript">alert('Laat een melding zien');</script>` in tekstvorm.

## Personalisatie-opmaak

Het kan voorkomen dat databasegegevens onderling verschillen qua hoofdlettergebruik. Smarty biedt daarom specifieke functies om die verschillen op te vangen. De meest voorkomende functies bespreken we hieronder.

### lower
Deze functie verwijdert alle hoofdletters. Door gebruik te maken van de code _{$profile.Naam|lower}_ wordt de waarde 'Frank BAKKER' bijvoorbeeld als 'frank bakker' weergegeven.

### ucfirst
Dit filter verandert het eerste karakter uit een string (tekenreeks) naar een hoofdletter. Stel bijvoorbeeld dat de variabele _{$profile.Naam}_ de waarde 'frank bakker' bevat. Met de code _{$profile.Naam|ucfirst}_ geef je de waarde als 'Frank bakker' weer.

Je kunt de bovenstaande functies ook combineren. Als de variabele _{$profile.Naam}_ de waarde 'FRANK' bevat, dan kun je de code _{$profile.Naam|lower|ucfirst}_ gebruiken om hoofdletters te verwijderen en het eerste teken alsnog van een hoofdletter te voorzien. De waarde wordt dan als 'Frank' weergegeven.

* Bekijk [hier](./publisher-personalization-functions) nog meer personalisatiefuncties.

## Personalisatie testen
Je kunt de weergave van personalisatie testen in Copernica. Dat doe je door middel van de **'Voorvertoningsmodus'** in je template of document. De voorvertoning is gebaseerd op de standaardbestemming. De standaardbestemming dient zich in dezelfde database te bevinden als de ontvanger waaraan je de mailing wilt versturen.
