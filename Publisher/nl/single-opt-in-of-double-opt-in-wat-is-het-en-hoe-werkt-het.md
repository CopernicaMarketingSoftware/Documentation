Voor het versturen van commerciële of charitatieve email marketing
campagnes heb je voorafgaand expliciete toestemming nodig van de
ontvanger. Dat is een van [de
voorwaarden](https://www.acm.nl/nl/onderwerpen/telecommunicatie/internet/regels-voor-verzenders-van-e-mailberichten/ "Regels voor verzenders van e-mailberichten"),
opgesteld door de ACM, waar je jezelf aan moet houden wil je aan de slag
met email marketing. Die toestemming kan je onder andere verkrijgen met
behulp van een opt-in.\
\
 Verstuur je email campagnes naar personen die daar geen toestemming
voor hebben gegeven, dan riskeer je een boete van maximaal €450.000 per
overtreding. In dat geval is het van belang dat je kan bewijzen op welke
manier jij toestemming hebt verkregen. Reden genoeg om naar de manier
waarop jij je opt-ins hebt ingesteld te kijken.

Uitzonderingen en adressenbestanden
-----------------------------------

Natuurlijk is er altijd een uitzondering waarbij je geen opt-in benodigd
hebt. Is er een klantrelatie aanwezig, oftewel iemand heeft
daadwerkelijk gebruik gemaakt van een dienst of product, dan is een
opt-in niet nodig. Daarnaast is er geen opt-in benodigd wanneer je een
persoonlijk bericht (dus geen wekelijkse nieuwsbrieven) stuurt naar een
persoon of bedrijf waar je al eerder contact mee hebt gehad. Toch is een
opt-in wel in alle gevallen aan te raden. \
\
Maar hoe zit het met adressenbestanden waarbij de contactpersonen al dan
niet toestemming hebben gegeven voor het ontvangen van emails van
‘geselecteerde partners’? Het gebruik van deze bestanden valt in vrijwel
alle gevallen af te raden. De ontvanger moet namelijk vrij, specifiek en
geïnformeerd toestemming hebben gegeven voor de ontvangst van jouw
emails. ‘Geselecteerde partners’ is daarmee dus niet specifiek.\
\
 Voor adresbestanden geldt dat de ontvanger bij aanmelden toestemming
moet hebben gegeven voor het ontvangen van emails van jouw bedrijf. Dat
betekent dat er bij het verzamelen van de adressen een tekst als “Ik
geef toestemming voor het toesturen van de nieuwsbrieven van Bedrijf A,
Bedrijf B en Bedrijf C,” moet staan. Het benoemen van de bedrijfsnamen
in de algemene voorwaarden of deze plaatsen achter een link is daarbij
niet toegestaan. Bij het verkrijgen van een adressenbestand is het dan
ook belangrijk dat je op de hoogte bent op welke wijze de opt-ins zijn
verzameld. Jij als verzender bent namelijk verantwoordelijk voor de
juiste opt-ins. Het opkopen van adressen is dan ook in de meeste
gevallen af te raden.

Single opt-in of een double opt-in?
-----------------------------------

Het verkrijgen van expliciete toestemming van de ontvanger is dus
belangrijk. Daarvoor zijn er twee manieren: single opt-in en double
opt-in. Bij een single opt-in vult een geïnteresseerde zelf het email
adres in waarop hij de commerciële boodschappen wilt ontvangen. Na het
invullen is de toestemming direct gegeven en kan je de nieuwsbrieven
versturen. Het nadeel van het gebruik van deze methode is dat iedereen
een willekeurig email adres kan invullen.\
\
 De oplossing daarin ligt in het verkrijgen van een double opt-in. Dit
houdt in dat je men eerst een email ter bevestiging toestuurt. Pas
wanneer de ontvanger op een link in de email klikt ga je over tot het
verzenden van de nieuwsbrief. Je bent er daarbij zeker van dat de
eigenaar van het email adres toestemming heeft gegeven. Daarnaast zorgt
het ook voor een hogere deliverability omdat je er zeker van bent dat je
mailt naar adressen die daadwerkelijk bestaan.

Double-opt instellen in Copernica
---------------------------------

Het advies is dan ook om gebruik te maken van een double opt-in. Om dit
in te stellen in Copernica heb je het volgende nodig:

-   Drie verschillende webpagina’s:
    -   Een om het inschrijfformulier op te plaatsen. (1)
    -   Een vervolgpagina van het formulier, waarop je vermeldt dat een
        bevestigingsmail onderweg is. (2)
    -   Een pagina waarop je vermeldt dat de inschrijving voltooid is.
        (3)
-   Een e-maildocument met hierin de bevestigingslink.

### Stap 1. Het prepareren van de database

In de database dienen twee velden aanwezig te zijn: een veld om het
e-mailadres in op te slaan en een veld om de nieuwsbriefvoorkeur van de
abonnee op te slaan.

Het veld voor e-mailadres dient uiteraard een veld van het type
[e-mailveld](./database-en-collectie-veldtypes.md)
te zijn (zodat het systeem weet dat dit veld de adressen bevat).

Van het veld voor nieuwbriefvoorkeur maak je een meerkeuzeveld met de
volgende opties voorgedefinieerd:

-   [lege optie]
-   Nee
-   Ja, niet bevestigd
-   Ja, bevestigd

![](../images/afbeelding.png)

### Stap 2. Reserveer een drietal webpagina’s

Zorg dat de drie webpagina’s klaar zijn voor gebruik (zodat je hier
direct het formulier op kan plaatsen en naartoe kunt linken.

### Stap 3. De fabricatie van het formulier

Dit wordt een aanmeldformulier met hierin **twee velden** opgenomen.

1.  Een **tekstveld** die is gekoppeld aan het e-mailadres in de
    database
2.  Een **onzichtbaar veld** die gekoppeld is aan het veld met de
    nieuwbriefvoorkeur. De standaardwaarde van dit onzichtbare veld zet
    je op ‘Ja, niet bevestigd’

Let op, omdat er straks een automatische e-mail moet worden verstuurd
naar de invuller, gebruikt je bij de formulierinstellingen ‘inloggen als
profiel uit de database [database]

Plaats het webformulier op webpagina 1, en zorg dat de vervolgpagina van
het webform een webpagina is waarop je vermeldt dat een bevestigingsmail
is verstuurd naar {\$emailadres}.

![](../images/afbeelding2.png)

### Stap 4. Koppel een opvolgactie aan het webformulier

Wanneer het formulier is ingevuld en verzonden, moet er een
bevestingsmail worden verstuurd naar het zojuist ingevulde e-mailadres.
Dit kan met een formulieropvolgactie.

Ga naar *webformulier \>***opvolgacties** en creëer een opvolgactie
waarbij een opgemaakte e-mail wordt verstuurd aan het profiel. Selecteer
het e-maildocument met hierin (straks) de bevestigingslink.

### Stap 5. Het e-maildocument met bevestigingslink

![](../images/afbeelding3.png)

Creëer een nieuw e-maildocument (of bewerk een bestaande). De
belangrijkste voorwaarde is dat dit document een hyperlink heeft die
verwijst naar de webpagina waarop je vermeldt dat de inschrijving
voltooid is.

**Aan deze hyperlink gaan we een documentopvolgactie koppelen:**

Ga naar het *document menu \>***opvolgacties**

Maak een opvolgactie waarbij een klik op een specifieke link (de
bevestigingslink) tot gevolg heeft dat een waarde in de database
verandert. Deze nieuwe waarde wordt ‘Ja, bevestigd’ voor het
nieuwsbriefvoorkeurveld.

Sla de opvolgactie op. Wanneer de kersverse abonnee op bevestigen klikt,
wordt de waarde in het veld ‘Nieuwsbriefvoorkeur’ veranderd naar*Ja,
bevestigd*.

### Stap 6. Maak een nieuwsbriefselectie

Maak tot slot in de database een
[nieuwsbriefselectie](./nieuwsbrief-selectie-maken.md)
(Selectietype: *Check op veldwaarde*) aan waarin alleen mensen worden
opgenomen waarbij de waarde in het nieuwbriefveld gelijk is aan ‘Ja,
bevestigd’. Aan deze selectie verstuur je voortaan de nieuwsbrief.

Hoe zit het met het afmelden?
-----------------------------

Volgens de wetgeving ben je verplicht om mensen ook te laten afmelden.
Hoe dat werkt kan je in [dit
blogartikel](./afmeldingen-automatisch-verwerken.md)
lezen. Bij het afmelden is het van belang dat je **nooit** voor de optie
kiest om het profiel te verwijderen. Bij het verwijderen van het profiel
verwijder je namelijk het bewijs dat je ooit een opt-in hebt verzameld
voor het verzenden van je boodschap aan het email adres. Kies er dus
altijd voor om het veld waarin je de opt-in hebt vastgelegd te laten
wijzigen naar bijvoorbeeld "Nieuwsbrief = nee".
