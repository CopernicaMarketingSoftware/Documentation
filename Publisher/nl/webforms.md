# Webformulieren in Publisher

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
moeten worden voor de invuller. Als je naar een specifieke waarde zoekt 
(bijvoorbeeld voor het selecteren van een selectievakje of keuzerondjes) 
kun je een andere tekst tonen door `waarde :: Weergegeven tekst` in te vullen 
in het "Standaard waarde" veld.
* **Standaard waarde**: De waarde die wordt gebruikt als het veld niet ingevuld
is.


## De werking van een webformulier instellen

Webformulieren kunnen voor uiteenlopende doeleinden worden ingezet. De werking van een webformulier stel je in bij het tabblad* Profielen bewerken *in het webformulier instellingen dialoogvenster. Hier bepaal je hoe het formulier moet omgaan met de ingevoerde gegevens. Moet er altijd een nieuwe profiel worden aangemaakt, of moet er eerst worden gekeken of er al een profiel met deze gegevens bestaat? Wat moet er gebeuren als er op basis van de gebruikte *sleutelvelden* meerdere matchende profielen zijn gevonden?

De webformulierinstellingen vind je in het *Webformulier* menu.

- Ga naar Webformulier > *Intellingen...*
- Ga naar het tabblad *Profielen bewerken*. Kies *Werking wijzigen *om de wizard te starten.

![Web form behaviour wizard](../images/webformbehaviour.png)In de eerste stap van de wizard stel je op wie het formulier betrekking heeft. Je hebt hier keuze uit vier opties.

### 1. Negeer het profiel

Er mogen in het profiel geen wijzigingen worden gedaan wanneer het formulier word ingevuld en verzonden. Deze optie is handig wanneer de invuller van het webformulier een subprofiel is, en je niet wilt dat dit subprofiel ook waardes van het profiel kan wijzigen.

Bijvoorbeeld: de invuller van het formulier is een werknemer (subprofiel) van een bedrijf (profiel). Kies deze optie als de werknemer de gegevens van het het bedrijf niet mag wijzigen.

### 2. Het profiel van de ingelogde gebruiker

Het formulier functioneert alleen wanneer een relatie op de pagina komt vanuit een ingelogde situatie. Er is precies bekend wie op de pagina komt. Dat kan zijn omdat op een eerdere pagina is ingelogd en de gegevens zijn meegenomen, of omdat hij vanuit een gepersonaliseerde e-mail naar de pagina doorklikt.

Het formulier kan vooringevuld worden met de bekende gegevens van de relatie.

Kies voor 'verder' en geef bij de tweede stap aan of het profiel naar aanleiding van het invullen moet worden bijgewerkt met de ingevulde gegevens of verwijderd uit jouw database.

**Let op**, verwijdering betekent dat het gehele profiel verdwijnt en niet is terug te halen.

### 3. Een nieuw aan te maken profiel

Het formulier functioneert uitsluitend vanuit een 'nieuwe' situatie. Er wordt vanuit gegaan dat de bezoeker nog onbekend is in de database. Wanneer het formulier wordt verzonden wordt altijd een nieuw profiel aangemaakt.

### 4. Elk profiel dat overeenkomt met de sleutelvelden

Het formulier functioneert zowel voor bekende als onbekende relaties. Bij verzending van het formulier wordt gecontroleerd op basis van door jou aangegeven sleutelvelden of de invuller al in de database voorkomt. Zo ja, dan worden zijn gegevens bijgewerkt. Zo nee, wordt desgewenst een profiel nieuw aangemaakt.

![Webform behaviour](../images/behaviour2.png)Er zijn meerdere matches gevonden
---------------------------------

Het kan voorkomen dat de sleutelvelden niet tot een unieke match in de database leiden. Bijvoorbeeld omdat twee medewerkers van een organisatie hetzelfde info@... adres hebben binnen jouw database. Geef aan of je in zo'n geval wilt dat beide profielen of slechts een profiel wordt bijgewerkt met de ingevulde informatie uit het formulier.

Gebruik 0 (nul) als je wilt dat alle gevonden profielen moeten worden bijgewerkt.

### **Maak je ook gebruik van één of meerdere collecties?**

Als je in het formulier velden hebt opgenomen uit diverse collecties, vergeet dan niet tevens de formulierinstellingen te doen voor deze collecties.

### Bijwerken of verwijderen

Kies of de gegevens van het profiel of subprofiel moet worden bijgewerkt met de ingevoerde gegevens, of dat dat het gevonden profiel of subprofiel moet worden vewijderd uit de database. Let op, verwijderd is echt verwijderd. Het profiel kan niet meer worden terugegehaald.

### Controleer op sleutelvelden

Bij het instellen van de webformuliervelden kan je aangeven of het veld moet worden gebruikt als een sleutelveld. Wanneer iemand het formulier invult, wordt op basis van de sleutelvelden gekeken of de ingevulde gegevens kunnen worden gematched aan een bestaand profiel. Wanneer er een profiel is gevonden, kan het profiel worden bijgewerkt. Wanneer geen overeekomend profiel is gevonden, dan kan een nieuw profiel worden aangemaakt, of kan een foutmelding worden weergegeven.

Gebruik sleutelvelden bijvoorbeeld wanneer

- Je profielen wilt laten inloggen (bijvoorbeeld door de databasevelden *Emailadres* en *Wachtwoord *als sleutelvelden in te stellen)
- Je een formulier zowel als inschrijf- als wijzigformulier wilt gebruiken.
