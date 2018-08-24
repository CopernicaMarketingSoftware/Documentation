## Webformulieren in Publisher

In Publisher kun je eenvoudig krachtige webformulieren creëren. Je kunt
hiermee bijvoorbeeld inschrijf- en uitschrijfformulieren mee maken, maar ook
meer informatie over je klanten verzamelen. Ook kun je webformulieren
[personaliseren](./emailings-publisher-personalization).

## Webformulier aanmaken

Je kunt direct een webformulier genereren bij het aanmaken van een webpagina
of deze maken in de **Content** module.

Als je een formulier hebt aangemaakt kun je instellingen aanpassen. Hiermee
kun je bijvoorbeeld de gebruiker in- of uitloggen, of niets veranderen. Hierna
kun je reacties ontvangen die netjes terechtkomen in de gelinkte velden in
je database. Eventuele selecties worden aangepast op basis van de nieuwe
data op het moment dat deze door Copernica wordt geupdate. Je kunt ook een
bevestigingsmail of een bedankmail sturen met opvolgacties.

### Aanmaken in website

Als je een webformulier aanmaakt tijdens het creëren van een website ben
je bij het aanmaken beperkt tot inschrijf-, uitschrijf- en tell-a-friendformulieren.
Het voordeel hiervan is dat je snel een stukje HTML code krijgt om in je
broncode te plakken. Deze is ook makkelijk te publiceren op een externe
website. De keuze bij deze snelle manier is echter beperkt, dus als je
specifieke wensen hebt kun je beter een formulier aanmaken onder **Content**.

### Aanmaken onder content

Binnen **Content** vind je de webformulierwizard. Je kunt de standaard
stylesheet of standaard XSLT gebruiken om de stijl van je formulier
naar je eigen smaak aan te passen.

### Veldtypes

Er zijn vijf verschillende typen velden:

* **Normaal**: Een normaal veld is gekoppeld aan een veld in de database of
collectie.
* **Interesseveld**: Een interesse veld kan gebruikt worden om interesses
aan of uit te vinken. Deze interesses zijn gelinkt aan de interesses in de
database.
* **Tekstblok**: Het tekstblok kan gebruikt worden om extra tekst of afbeeldingen
toe te voegen tussen de invulvelden.
* **Uploadveld**: Het uploadveld kan gebruikt worden om bestanden toe te voegen
aan een profiel. Deze kun je vervolgens vinden onder het profiel van de uploader.
* **Captcha**: Het captcha veld wordt gebruikt om te verifiëren dat het formulier
is ingevuld door een mens.

De normale velden hebben nog een aantal subtypes die invloed hebben
op hoe het veld getoond en behandeld wordt.

* **Tekst**: Een standaard veld waarin vrij getypt mag worden.
* **Wachtwoord**: Een invulveld waar sterren worden weergegeven in plaats
van getypte tekst.
* **Herhaal wachtwoord**: Kan gebruikt worden bij het instellen van een wachtwoord.
Dit type maakt twee wachtwoordvelden aan die identiek moeten zijn voor het
formulier verzonden kan worden.
* **E-mailadres**: Kan gebruikt worden om een ingevuld antwoord te checken
op geldigheid als e-mailadres.
* **Uitschuifkeuzelijst**: Veld met meerdere antwoordmogelijkheden dat
uitschuift. Als je hier de waarde typt die je wil opslaan in de database
kun je hier een tekstuele weergave van het antwoord achter plaatsen door deze
te scheiden met twee dubbele punten (::).
* **Keuzerondjes**: Veld met meerdere antwoordmogelijkheden, waarvan er
een geselecteerd mag worden.
* **Selectievakjes**: Veld met meerdere antwoordmogelijkheden, waarvan er
meerdere geselecteerd mogen worden. (Zie interesseveld als je interesses
wil opslaan).
* **Getal**: Veld waar alleen getallen mogen worden ingevuld.
* **Datum**: Veld waar alleen datum in JJJJ-MM-DD formaat mag worden ingevuld.
(Vermeld dit ook voor je gebruikers!)
* **Datum als uitscheufkeuzelijsten**: Veld waar een datum geselecteerd mag
worden uit een kalender.
* **Onzichtbaar**: Veld dat aangepast kan worden zonder dat de gebruiker dit
ziet. Dit is bijvoorbeeld handig voor een uitschrijfformulier.
* **Meerregelig tekstveld**: Veld waarbij vrij getypt kan worden op een gegeven
aantal regels.

### Veldopties

Elk veld heeft een aantal opties:

* **Verplicht**: Geeft aan of een veld verplicht is of niet.
* **Sleutelveld**: Wordt gebruikt om de invuller te koppelen aan de database.
Informatie wordt alleen gelinkt wanneer alle sleutelvelden overeenkomen met
een profiel. Dit is bijvoorbeeld nuttig voor een inlogformulier.
* **Hoofdlettergevoelig**: Geeft aan of het veld hoofdlettergevoelig is.
* **Waarde uit de database**: Geeft aan of reeds bekende waarden vast ingevuld
moeten worden voor de invuller.
* **Standaardwaarde**: De waarde die wordt gebruikt als het veld niet ingevuld
is.


## Enquêtes in Publisher

In Publisher is het mogelijk om zelf makkelijk enquêtes in elkaar te 
zetten om erachter te komen wat een klant vindt van jouw product of dienst. 
Het is daarnaast een makkelijke manier om data te verzamelen. 

Let op: Enquêtes maken in de Marketing Suite is helaas nog niet mogelijk.

## Een enquête maken

Je kan gemakkelijk zelf een enquête aanmaken onder **Content** in de 
Publisher. Het is zelfs mogelijk data automatisch aan profielen te linken 
als je op een slimme manier hyperlinks creëert.

Als je je enquête een naam en beschrijving hebt gegeven kun je vragen 
toe gaan voegen. Er zijn verschillende soorten vragen, zoals de open 
vraag en de multiple choice vraag. De soorten vragen worden behandeld 
in [dit artikel](./surveys-question-types). Vragen kun je altijd 
aanmaken, aanpassen en verwijderen in het **Enquête** menu. 

Voor elke vraag krijg je ook een aantal instellingen. Hier kun je aangeven 
of een vraag optioneel is of op een nieuwe pagina moet beginnen bijvoorbeeld. 
Bij een multiple choice vraag kun je ervoor kiezen om wel of niet meerdere 
antwoorden toe te staan.

Om je enquête af te maken stuur je deelnemers door naar een bedanktpagina. 
Je kunt deze zelf van inhoud voorzien. Het is hierbij niet mogelijk om 
[personalisatie](./emailings-publisher-personalization) te gebruiken, maar je kan eventueel 
wel doorverwijzen naar je eigen pagina. Dit doe je met de volgende code:

`<script type="text/javascript"> document.location = "http://www.mijnwebsite.nl/bedankt"; </script>`

## Enquête publiceren

### Linken

De beste manier om naar je enquête te linken is met de profiel identifier 
en code. Door deze informatie mee te geven kunnen de resultaten namelijk 
meteen aan het profiel gelinkt worden.

Stel dat dit de link naar je enquête is:

`http://www.jouwdomein.com/enquete`

Dan kun je de volgende link gebruiken voor profielen:

`http://www.jouwdomein.com/enquete?profile={$profile.id}&code={$profile.code}`

En de volgende voor subprofielen:

`http://www.jouwdomein.com/enquete?subprofile={$subprofile.id}&code={$subprofile.code}`

Wanneer een profiel deze link gebruikt om de enquête in te vullen kun je 
daarna de antwoorden terugvinden onder het tabjes *Enquêtes* onder het profiel.

### Invoegen op webpagina

Als je zelf je enquête niet host kun je deze ook plaatsen op een Copernica 
[website](./websites). Met de volgende tag hoef je alleen de naam van 
je enquête in te vullen:

`{survey name='enquetenaam'}`

Je eigen XSLT stylesheet kun je gebruiken als volgt:

`{survey name='enquetenaam' xslt='xsltnaam'}`

Een [XSLT](css-and-xslt) stylesheet kun je aanmaken onder het kopje **Stijl**.

## Resultaten

De resultaten van een enquête kun je per profiel inzien wanneer je het 
profiel zelf hebt geselecteerd. Je kunt er ook voor kiezen om je resultaten 
te exporteren of deze te verwerken met opvolgacties.

## Meer informatie

Met enquêtes kun je nog veel meer. Hieronder vind je een aantal links 
met meer informatie.

* [Soorten enquête vragen](./surveys-question-types)

### Stijl aanpassen

* [Tekst op knoppen aanpassen](./surveys-edit-buttons)
* [Het hekje voor nummering verwijderen](./surveys-remove-hashtag)
