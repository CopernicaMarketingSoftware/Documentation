# Webformulieren in Publisher

In Publisher kun je eenvoudig krachtige webformulieren creëren. Je kunt
hiermee bijvoorbeeld inschrijf- en uitschrijfformulieren mee maken, maar ook
meer informatie over je klanten verzamelen. Ook kun je webformulieren
[personalizeren](./personalization).

## Webformulier aanmaken

Je kunt direct een webformulier genereren bij het aanmaken van een webpagina
of deze maken in de **Content** module.

Als je een formulier hebt aangemaakt kun je instellingen aanpassen. Hiermee
kun je bijvoorbeeld de gebruiker in- of uitloggen, of niets veranderen. Hierna
kun je reacties ontvangen die netjes terechtkomen in de gelinkte velden in
je database. Eventuele selecties worden aangepast op basis van de nieuwe
data op het moment dat deze door Copernica wordt geupdate. Je kunt ook een
bevestigingsmail of een bedankmail sturen met [opvolgacties](./followups).

### Aanmaken in website

Als je een webformulier aanmaakt tijdens het creëren van een website ben
je bij het aanmaken beperkt tot inschrijf-, uitschrijf- en tell-a-friendformulieren.
Het voordeel hiervan is dat je snel een stukje HTML code krijgt om in je
broncode te plakken. Deze is ook makkelijk te publiceren op een externe
website. De keuze bij deze snelle manier is echter beperkt, dus als je
specifieke wensen hebt kun je beter een formulier aanmaken onder **Content**.

### Aanmaken onder content

Binnen **Content** vindt je de webformulierwizard. Je kunt de standaard
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
* **Emailadres**: Kan gebruikt worden om een ingevuld antwoord te checken
op geldigheid als emailadres.
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

## Meer informatie

* [Beperk aantal inzendingen](./limit-the-number-of-times-a-web-form-can-be-submitted)
