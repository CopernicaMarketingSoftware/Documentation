# Personaliseren binnen de Publisher

In de Publisher stel je gemakkelijk nieuwsbrieven samen. Je doet dit met behulp 
van de zogeheten Smarty code. In het onderstaande artikel staan een aantal
voorbeeldscenario's uitgelegd waarin je personalisatie kunt toevoegen aan je
nieuwsbrieven.


## Gebruik van variabelen

Een personalisatievariabele bestaat uit een dollarteken `$` en de naam van een variabele,
geplaatst tussen accolades. De volgende variabelen kun je bijvoorbeeld in een template
of document gebruiken:

* `{$naam}`
* `{$email}`
* `{$aanhef}`

Deze personalisatievariabelen werken natuurlijk alleen als je in de database ook
velden met de "naam", "email" en "aanhef" hebt opgenomen, en als je voor de 
geadresseerden van de mailing deze gegevens hebt ingevuld. Als dat
het geval is, dan kun je deze variabelen gewoon in je mailing
gebruiken:

```text
Geachte {$aanhef} {$naam},
    
U ontvangt deze e-mail omdat u zich heeft aangemeld met uw adres {$email}.
```

Je kunt daarnaast zelfs aparte content sturen naar verschillende [selecties](selections-introduction) 
in je database met de [in_selection](./personalization-function-in_selection) 
en [in_miniselection](./personalization-function-in_miniselection) functies.

Er zijn echter wel wat belangrijke dingen om op te letten als je werkt met 
Smarty:

* Houd het veilig en door de `escape` toe te passen op variabelen;
* SMARTY is *hooflettergevoelig*. `{$name}` is dus wat anders dan `{$NAME}`;
* Accolades gebruiken als symbool kan met [literal](./personalization-functions-literal).


## Escapen van variabelen

Hoewel het best een ingewikkeld onderwerp is behandelen we het escapen direct. Het
is erg belangrijk. De variabele data die je in mailings of websites gebruikt 
is vaak door mensen zelf ingevoerd toen ze zich aanmeldden voor de nieuwsbrief. 
Mensen voeren hun eigen naam, woonplaats en e-mailadres in, en kunnen daarbij 
(opzettelijk!) foutieve gegevens invoeren. Je kunt de gegevens in de database
dus niet zonder meer vertrouwen en ongecontroleerd in je nieuwsbrief 
plaatsen. Wat gebeurt er met de opmaak van je mailing als iemand heeft ingevoerd 
dat zijn naam "&lt;/table&gt;" is? En opmaak is niet eens het grootste probleem. Als 
je de ongecontroleerde ruwe input van gebruikers ongefilterd in mailings en op 
websites gebruikt ben je kwetsbaar voor allerlei vormen van misbruik en hacks.

Er is gelukkig een eenvoudige Smarty *modifier* om dit te voorkomen: de *|escape* 
modifier. Elke variabele die je in een mailing opneemt moet je eerst door deze 
modifier halen om te zorgen dat eventueel schadelijke HTML code ongedaan wordt 
gemaakt:

```text
Geachte {$aanhef|escape} {$naam|escape},
    
U ontvangt deze e-mail omdat u zich heeft aangemeld met uw adres {$email|escape}.
```

Houd hier altijd rekening mee als je Smarty code in HTML code gebruikt. Als je
niet zeker bent van de data in de database omdat de gegevens door mensen 
door middel van vrije tekstvelden zijn ingevoerd, dan moet je de |escape modifier 
gebruiken om de data te neutraliseren. Dit geldt voor alle Smarty code binnen
HTML tekst. Variabelen binnen de tekstversie van een mail of in de 
onderwerpsregel hoef je echter niet de escapen. De tekstversie en de onderwerpsregel 
bestaat niet uit HTML code en daar is de |escape modifier dus niet nodig.

Als je variabelen automatisch wilt escapen, zodat je er niet steeds aan hoeft
te denken om overal |escape achter te zetten, kun je dat onder de template of
onder het document via het [formulier met personalisatieinstellingen](./personalization-settings.md)
aangeven.


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


## Waar kan je Smarty personalisatie gebruiken?

Vrijwel overal kan je Smarty personalisatie toepassen:

* De onderwerpregel van een email
* In email en webdocumenten
* Andere e-mail headers (zoals afzenderadres, CC, BCC, X-Mailer)
* Gepersonaliseerde website content
* Webformulieren (standaardwaardes, labels, et cetera)
* Hyperlinks and mailto: links
* Opvolgacties
* Et cetera...

Op een paar plekken kun je echter momenteel nog geen gebruik maken van personaliseren:

* In enquêtes
* In content feeds


## Verder lezen

* [Overzicht van variabelen](./personalization-variables.md)
* [Overzicht van modifiers](./personalization-modifiers.md)
* [Overzicht van functies](./personalization-functions.md)
* [Tips en trucs](./personalization-tricks.md)
