Webformulieren kunnen voor uiteenlopende doeleinden worden ingezet. De
werking van een webformulier stel je in bij het tabblad*Profielen
bewerken*in het webformulier instellingen dialoogvenster. Hier bepaal je
hoe het formulier moet omgaan met de ingevoerde gegevens. Moet er altijd
een nieuwe profiel worden aangemaakt, of moet er eerst worden gekeken of
er al een profiel met deze gegevens bestaat? Wat moet er gebeuren als er
op basis van de gebruikte *sleutelvelden* meerdere matchende profielen
zijn gevonden?

De webformulierinstellingen vind je in het *Webformulier* menu.

-   Ga naar Webformulier \> *Intellingen...*
-   Ga naar het tabblad *Profielen bewerken*. Kies *Werking wijzigen*om
    de wizard te starten.

![Web form behaviour wizard](webformbehaviour.png)

In de eerste stap van de wizard stel je op wie het formulier betrekking
heeft. Je hebt hier keuze uit vier opties.

### 1. Negeer het profiel

Er mogen in het profiel geen wijzigingen worden gedaan wanneer het
formulier word ingevuld en verzonden. Deze optie is handig wanneer de
invuller van het webformulier een subprofiel is, en je niet wilt dat dit
subprofiel ook waardes van het profiel kan wijzigen.

Bijvoorbeeld: de invuller van het formulier is een werknemer
(subprofiel) van een bedrijf (profiel). Kies deze optie als de werknemer
de gegevens van het het bedrijf niet mag wijzigen.

### 2. Het profiel van de ingelogde gebruiker

Het formulier functioneert alleen wanneer een relatie op de pagina komt
vanuit een ingelogde situatie. Er is precies bekend wie op de pagina
komt. Dat kan zijn omdat op een eerdere pagina is ingelogd en de
gegevens zijn meegenomen, of omdat hij vanuit een gepersonaliseerde
e-mail naar de pagina doorklikt.

Het formulier kan vooringevuld worden met de bekende gegevens van de
relatie.

Kies voor 'verder' en geef bij de tweede stap aan of het profiel naar
aanleiding van het invullen moet worden bijgewerkt met de ingevulde
gegevens of verwijderd uit jouw database.

**Let op**, verwijdering betekent dat het gehele profiel verdwijnt en
niet is terug te halen.

### 3. Een nieuw aan te maken profiel

Het formulier functioneert uitsluitend vanuit een 'nieuwe' situatie. Er
wordt vanuit gegaan dat de bezoeker nog onbekend is in de database.
Wanneer het formulier wordt verzonden wordt altijd een nieuw profiel
aangemaakt.

### 4. Elk profiel dat overeenkomt met de sleutelvelden

Het formulier functioneert zowel voor bekende als onbekende relaties.
Bij verzending van het formulier wordt gecontroleerd op basis van door
jou aangegeven sleutelvelden of de invuller al in de database voorkomt.
Zo ja, dan worden zijn gegevens bijgewerkt. Zo nee, wordt desgewenst een
profiel nieuw aangemaakt.

![Webform behaviour](behaviour2.png)

Er zijn meerdere matches gevonden
---------------------------------

Het kan voorkomen dat de sleutelvelden niet tot een unieke match in de
database leiden. Bijvoorbeeld omdat twee medewerkers van een organisatie
hetzelfde info@... adres hebben binnen jouw database. Geef aan of je in
zo'n geval wilt dat beide profielen of slechts een profiel wordt
bijgewerkt met de ingevulde informatie uit het formulier.

Gebruik 0 (nul) als je wilt dat alle gevonden profielen moeten worden
bijgewerkt.

### **Maak je ook gebruik van één of meerdere collecties?**

Als je in het formulier velden hebt opgenomen uit diverse collecties,
vergeet dan niet tevens de formulierinstellingen te doen voor deze
collecties.

### Bijwerken of verwijderen

Kies of de gegevens van het profiel of subprofiel moet worden bijgewerkt
met de ingevoerde gegevens, of dat dat het gevonden profiel of
subprofiel moet worden vewijderd uit de database. Let op, verwijderd is
echt verwijderd. Het profiel kan niet meer worden terugegehaald.

### Controleer op sleutelvelden

Bij het instellen van de webformuliervelden kan je aangeven of het veld
moet worden gebruikt als een sleutelveld. Wanneer iemand het formulier
invult, wordt op basis van de sleutelvelden gekeken of de ingevulde
gegevens kunnen worden gematched aan een bestaand profiel. Wanneer er
een profiel is gevonden, kan het profiel worden bijgewerkt. Wanneer geen
overeekomend profiel is gevonden, dan kan een nieuw profiel worden
aangemaakt, of kan een foutmelding worden weergegeven.

Gebruik sleutelvelden bijvoorbeeld wanneer

-   Je profielen wilt laten inloggen (bijvoorbeeld door de
    databasevelden *Emailadres* en *Wachtwoord*als sleutelvelden in te
    stellen)
-   Je een formulier zowel als inschrijf- als wijzigformulier wilt
    gebruiken.

