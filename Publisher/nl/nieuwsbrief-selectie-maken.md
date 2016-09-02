Volgens de wet mag je geen ongevraagde commerciele e-mails versturen, en
moeten ontvangers zich te allen tijde kunnen uitschrijven van je
mailinglijst. Je kan mensen die zich hebben uitgeschreven direct
verwijderen uit je database, maar je kan ook bij het profiel een
'vlaggetje' zetten waaruit hun gewijzigde interesse blijkt, en op basis
hiervan een selectie maken. Je hebt hiervoor een apart databaseveld
nodig (voor de nieuwsbrief voorkeur) en een selectie, waarmee je
profielen filtert op basis van de waarde in dat nieuwsbriefveld. Dit
artikel legt stap voor stap uit hoe je dit zelf maakt.

### Hoe maak ik een nieuwsbriefselectie?

### Nieuw databaseveld

Maak een nieuw databaseveld aan, bijvoorbeeld van het type
meerkeuzeveld, die zowel de waardes Ja, Nee en een lege waarde
accepteert.

Om het veld te maken ga je naar **Databasebeheer**\>*Databasevelden
wijzigen*

![../images/newsletter-preference-field.png](Documentation/newsletter-preference-field.png "https://pic.vicinity.nl/127/0/112849/newsletter-preference-field.png")

-   Kies **Veld toevoegen**
-   Kies een naam voor het nieuwe veld (bijvoorbeeld *Nieuwsbrief*)
-   Kies voor het type **Meerkeuzeveld**
-   Voer de waardes *Ja, Nee,* en een *lege waarde* in (zie afbeelding)

Omdat je je selectie straks gaat maken op basis van dit veld, kan je het
veld indexeren. De selectie wordt dan een stuk sneller.

-   Sla het veld op.

Het veld is nu aangemaakt. Als je adressenbestand louter bestaat uit
personen die zich hebben ingeschreven (en nog niet uitgeschreven), dan
kan je bij alle profielen alvast de waarde 'Ja' invullen in het nieuw
aangemaakte veld.

-   Ga naar **Huidige weergave** en kies**Meerdere (sub)profielelen
    wijzigen**
-   Selecteer het nieuwe veld, en kies bij Waarde **'Ja**'
-   Klik op **wijzigen** om alle profielen in de database te wijzigen.

![../images/edit-multiple-profiles.png](Documentation/edit-multiple-profiles.png "https://pic.vicinity.nl/127/0/112847/edit-multiple-profiles.png")

### De selectie maken

Je selectie mag alleen profielen bevatten die de waarde 'Ja' in het veld
nieuwsbrief hebben. Profielen die zich uitschrijven worden automatisch
uit de selectie gefilterd.

Kies in het menu **Databasebeheer**voor **Selecties beheren...**

-   Kies **'Selectie aanmaken'**
-   Kies een naam voor de selectie (bijvoorbeeld *Nieuwsbriefselectie*)
    en klik opslaan.
-   Voeg een conditie toe aan de selectie van het type *'Check op
    veldwaarde*'
-   Selecteer in het formulier het veld voor de nieuwsbrief en bij
    vergelijking 'de waarde van het veld *Nieuwsbrief* [is gelijk
    aan]-\>[ja]'

Sla de selectie op. Je selectie is nu aangemaakt en zal automatisch
worden opgebouwd. Copernica zorgt er verder voor dat de selectie altijd
up to date is en blijft (en dus altijd de juiste profielen bevat).

### Tot slot

Geweldig! Je hebt nu een database, je hebt contacten geimporteerd en je
hebt een selectie gemaakt die automatisch de uitschrijvers wegfiltert.

Je kan nu je emailing gaan versturen. Ow wacht! Je hebt nog een template
en een document nodig dat je moet versturen. En - niet geheel
onbelangrijk- je moet het uitschrijfgedrag nog instellen op de database.
Gaan we nu doen.
