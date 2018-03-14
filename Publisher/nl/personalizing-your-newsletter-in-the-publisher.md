# Personaliseren binnen de Publisher

In de Publisher stel je gemakkelijk nieuwsbrieven samen. Je doet dit met behulp
van de zogeheten Smarty code. In het onderstaande artikel staan een aantal
voorbeeldscenario's uitgelegd waarin je personalisatie kunt toevoegen aan je
nieuwsbrieven.

## Gebruik van variabelen

Met Smarty kun je gemakkelijk variabelen aanmaken en gebruiken. Er zijn echter
wel wat belangrijke dingen om op te letten als je werkt met Smarty:

* SMARTY is *hooflettergevoelig*. **{$profile.name}** is dus wat anders dan `{$profile.NAME}`;
* Accolades gebruiken als symbool kan met [literal](./personalization-functions-literal).

### Database variabelen

Een personalisatievariabele bestaat uit een dollarteken **$**, het woord profile
of subprofile en de naam van een variabele, geplaatst tussen accolades. De
volgende variabelen kun je bijvoorbeeld in een template of document gebruiken:

* `{$profile.naam}`;
* `{$profile.email}`;
* `{$profile.aanhef}`;

Deze personalisatievariabelen werken natuurlijk alleen als je in de database ook
velden met de "naam", "email" en "aanhef" hebt opgenomen, en als je voor de
geadresseerden van de mailing deze gegevens hebt ingevuld. Als dat
het geval is, dan kun je deze variabelen gewoon in je mailing
gebruiken:

```text
Beste {$profile.aanhef} {$profile.naam},

Je ontvangt deze e-mail omdat bent aangemeld
met het volgende e-mailadres: {$profile.email}.
```

### Template variables

Je kunt ook extra personalisatie variabelen toevoegen door deze aan te maken
in het Template menu. Hier definieer je de naam, tijdens het aanmaken van
het document geef je er een waarde aan. Gebruik de waarde vervolgens met
**{$property.name}**, waar je "name" vervangt door de naam van je variabele.

Stel bijvoorbeeld dat je gebruikers een score wil geven gebaseerd op hun
aankopen en deze wil gebruiken in je email. Later heb je deze score niet meer
nodig (anders kun je deze beter opslaan in je database!). Je kunt dan een
template variabele **score** instellen en deze gebruiken met **{$property.score}**.

### Custom content

Je kunt daarnaast zelfs aparte content sturen naar verschillende [selecties](selections-introduction)
in je database met deze [functie](personalization-functions-in_miniselection).

## Accolades

Als je accolades in een template of een document wilt opnemen die niet als Smarty
code hoeven te worden herkend, dan kun je dit op twee manieren doen: door {ldelim} en
{rdelim} te gebruiken, of door van {literal} en {/literal} gebruik te maken.

Om voor een groot stuk HTML code de Smarty engine uit te schakelen kun je {literal}
en {/literal} gebruiken. Alle tekst die tussen {literal} en {/literal} staat wordt
niet Smarty gecontroleerd op accolades. Alle accolades worden letterlijk overgenomen,
zelfs als het wel geldige Smarty variabelen lijken te zijn:

```text
{literal}
	Ik ben gek op {accolades}!
{/literal}
```

Als je bovenstaand code in een mailing opneemt, dan wordt de code {accolades}
niet gezien als Smarty code en blijft het gewoon in de mailing staan.

## Personalisatie testen

Je kan in Copernica direct de uitvoer van je [personalisatie testen](./personalization-testing.md).
Hiervoor worden de gegevens uit de standaardbestemming gebruikt. Deze kan je zelf
instellen. Zorg er altijd voor dat de standaardbestemming zich bevindt in dezelfde
database waaraan je je mailing of andere uiting wilt richten.

## Waar kun je Smarty-personalisatie gebruiken?

Je kunt vrijwel overal Smarty personalisatie toepassen:

* In de onderwerpregel van een e-mail;
* In e-mails en webdocumenten;
* Andere e-mail headers (zoals afzenderadres, CC, BCC, x-headers);
* Gepersonaliseerde website content;
* Webformulieren (standaardwaardes, labels, etc.);
* Hyperlinks en mailto links;
* UTM parameters (bij het uitbreiden van hyperlinks);
* Opvolgacties;
* Etc.

Op een paar plekken kun je geen gebruik maken van personaliseren:

* In enquêtes
* In content feeds

## Verder lezen

* [Overzicht van personalisatievariabelen](./personalization-variables.md)
* [Overzicht van personalisatiemodifiers](./personalization-modifiers.md)
* [Overzicht van personalisatiefuncties](./personalization-functions.md)
