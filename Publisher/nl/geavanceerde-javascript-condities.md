Bij e-mailings en webformulieren biedt de applicatie de mogelijkheid om
blokken tekst 'conditioneel' te maken. Ze worden alleen getoond indien
aan een bepaalde conditie wordt voldaan. Dezelfde mogelijkheid biedt de
applicatie bij het instellen van opvolgacties voor e-mailings,
opvolgacties, webformulieren, databases, database callbacks en enquêtes.

Let op: Probeer geen condities in te voeren zonder goed begrip van
onderstaande uitleg of gedegen kennis van JavaScript. Daarmee kunt u uw
mailings verstoren. Gebruik voor eenvoudige condities de Eenvoudige
script editor

Hieronder geven we een uitleg bij JavaScript condities beschikbaar in de
software.

Ga direct naar de beschikbare variabelen voor

-   [Profielgegevens](#profielgegevens)
-   [Subprofielgegevens](#subprofielgegevens)
-   [Collecties](#collecties)
-   [Enquetes](#enquetes)
-   [Formulieren](#formulieren)
-   [Split run mailings](#splitrun)

JavaScript condities
--------------------

Onder andere bij opvolgacties, webformulieren en blokken in een HTML
document kun je JavaScript conditie plaatsen. Deze condities worden door
de applicatie geevalueerd om te achterhalen of een opvolgacties moet
worden uitgevoerd, of een bepaald blok in een document moet worden
opgenomen, of om te controleren of een bepaald profielovereenkomt met de
ingevulde gegevens van een formulier. Indien een conditie naar true
evalueert, dan wordt de opvolgactie uitgevoerd, en als de conditie naar
false evalueert dan gebeurt dat niet.

Deze condities zijn dus JavaScript condities en kunnen daarom heel
krachtig zijn. Een voorbeeld van een (eenvoudige) conditie is:

`profile.Woonplaats == 'Amsterdam'`

Deze conditie evalueert naar *true* in het geval de woonplaats van
een profiel 'Amsterdam' is en in alle andere gevallen evalueert hij naar
*false*. Als je bovenstaande conditie bijvoorbeeld bij een opvolgactie
plaatst, dan wordt de opvolgactie enkel uitgevoerd als de actie
betrekking heeft op iemand uit Amsterdam. Overigens kun je bij
opvolgacties twee verschillende condities plaatsen: een conditie die
wordt geevalueerd op het moment van de aanleiding van de opvolgactie
(bijvoorbeeld een klik op een hyperlink in een mailing) en een conditie
die wordt geevalueerd op het moment dat de opvolgactie daadwerkelijk
wordt uitgevoerd. Dit kan van pas komen als je een opvolgactie maakt
waarbij een tweede mailing wordt ingeroosterd op het moment dat iemand
op een hyperlink klikt. Deze tweede mailing wordt een week later
verstuurd. Maar als iemand zich in de tussentijd uitschrijft voor de
nieuwsbrief, dan is het natuurlijk niet de bedoeling dat de opvolgactie
alsnog wordt uitgevoerd. Je kunt dit voor elkaar te krijgen door bij de
opvolgactie een conditie in te voeren waarin je controleert of het veld
'nieuwsbrief' nog wel op 'yes' staat.

De condities maken zoals gezegd gebruik van een JavaScript engine en je
kunt daarom heel gecompliceerde scripts invoeren, met functies,
objecten, loops, enzovoort. Het allerlaatste statement van het script
bepaalt het totale resultaat van de conditie. Het volgende voorbeeld
evalueert dus altijd naar true:

    function doSomething(profile)
      {
        return profile.Woonplaats == 'Amsterdam';
      }
      doSomething(profile);
      1 > 0;

Omdat het allerlaatste statement in bovenstaand script "1 \> 0" altijd
naar true evalueert, zal ook de hele conditie naar true evalueren. Alle
voorgaande statements zijn daarin dus niet relevant.

**In verreweg de meeste condities is het helemaal niet nodig om
ingewikkelde functies te gebruiken, maar volstaat een enkele test zoals
je zag in het allereerste voorbeeld.**

**Maar welke variabelen kun je nu eigenlijk in de conditie uitlezen?
Hieronder volgt een kort overzicht.**

### Profielgegevens

Indien een profiel beschikbaar is - en dit is bijna altijd het geval -
zitten in de globale variabel 'profile' al deze gegevens. In
'profile.veldnaam' of 'profile.interessenaam' zitten de waardes van de
velden en interesses van het profiel. In 'profile.collectienaam' zit een
array van alle subprofielen in diecollectie. Elk subprofiel in
die collectie heeft weer waardes voor de velden van het subprofiel. 

Speciale velden zijn 'profile.id' en 'profile.code'. Deze velden
bevatten het ID en de geheime toegangscode van het profiel.

### Subprofielgegevens

Indien een subprofiel beschikbaar is, zitten in de variabele subprofile
al deze gegevens. Ze zijn beschikbaar via de variabele
'subprofile.veldnaam'. Ook hier zijn, net als bij een profiel, de
variabelen 'subprofile.id' en 'subprofile.code' beschikbaar.

### Collecties

Collecties kunnen worden benaderd middels de profiel variabele. In de
onderstaande praktijkvoorbeelden is te zien hoe dit in zijn werk gaat.

#### Benadering vanuit een profiel

Wanneer bijvoorbeeld een opvolgactie in gang wordt gezet op basis van
een profiel, is de variabele profile beschikbaar om een collectie te
kunnen benaderen. Middels profile.collectienaam is dan een collectie
bereikbaar. Hier volgen enkele voorbeelden:

    // hier wordt gekeken of er twee subprofielen in de collectie 'orders' zitten   

    profile.orders.length == 2;

    // hier wordt gekeken of de laatste bestelling is verstuurd

    profile.orders[profile.orders.length - 1].sent == true;

#### Benadering vanuit een subprofiel

Als een opvolgactie in gang is gezet vanuit een subprofiel, is naast de
profile variable ook de subprofile variabele beschikbaar. De beschikbare
profile variabele is het profiel waar de subprofielen bij horen. Op
dezelfde manier als in de voorbeelden van benadering vanuit een profiel
zoals beschreven in de vorige paragraaf, kunnen condities worden
opgesteld. Echter kan bij de benadering van het subprofiel ook de
subprofiel gegevens worden gebruikt in de conditie.

    /**
     *  Check if an order has been paid for
     *
     *  @return boolean
     */
    function paid(order)
    {
        // get all payments of the profile

        var payments = order.profile.payments;

        // check all payments

        for(var i = 0; i < payments.length; i++)
        {
            // we found a payment

            if (payments[i].order_id == order.id) return true;
        }

        // no payment found

        return false;
    }

    // hier wordt gekeken of er voor een bestelling

    // is betaald (het subprofiel is hier de order)

    paid(subprofile);

### Enquetes

In opvolgacties naar aanleiding van een enquête, en ook in de e-mails
die naar aanleiding van deze opvolgacties worden opgestart, zijn
variabelen beschikbaar met gegevens over de ingevulde enquête.

De variabele 'survey.xml' bevat een XML representatie van de ingevulde
enquête. 'survey.html' bevat een HTML representatie van de ingevulde
enquete, en 'survey.questions' bevat een array van alle vragen die zijn
ingevuld. Elke vraag uit dit array bestaat op zijn beurt uit een
variabele 'question' waarin de oorspronkelijke vraag staat, een
variabele 'type' met het type van de vraag ('open' voor open vragen,
'multi' voor meerkeuzevragen en 'grid' voor gridvragen). Elke vraag
heeft ook een member 'answer' met het gegeven antwoord. Indien de vraag
een open vraag is, bevat deze variabele de door de gebruiker ingevoerde
tekst. Voor meerkeuzevragen is dit een array met aangevinkte antwoorden
en voor gridvragen is dit een associatief array met als index het label
van de geselecteerde rij en als waarde het label van de geselecteerde
kolom.

Een voorbeeld zegt waarschijnlijk meer dan bovenstaande tekst. Als je
een opvolgactie alleen wilt uitvoeren indien op vraag drie van een
enquete een antwoord is gegeven waarin de tekst 'ja' voorkwam, kun je
dit met de volgende conditie doen:

`survey.questions[2].answer.match(/ja/);`

! Let op: als computers en programmeurs gaan tellen beginnen ze bij nul.
Vraag drie voor een mens is dus vraag twee voor een computer. Echter,
door een fout in de software is er één uitzondering: de enquêtevraag
(questions) begint bij 1 met tellen. 

Als je een opvolgactie alleen wilt uitvoeren indien er bij
meerkeuzevraag 7 minstens 3 antwoorden zijn ingevoerd, kan dit op de
volgende manier:

`survey.questions[7].answer.length >= 3`

Zoals hierboven al geschreven zijn alle variabelen in de conditie ook
beschikbaar als smarty variabelen! Je kunt dus in een document dat naar
aanleiding van een ingevulde enquete wordt verstuurd deze variabelen ook
uitlezen! Zo kun je een notificatie naar iemand sturen waarin je meldt
welke vragen zijn ingevoerd:

Op vraag 2 heb je geantwoord: `{$survey.questions.2.answer.1|escape}`

### Formulieren

Indien een opvolgactie plaatsvindt naar aanleiding van een ingevuld
webformulier, dan zijn naast de profiel- en subprofielgegevens ook de
ingevulde gegevens in het formulier beschikbaar. Al deze gegevens zijn
op te vragen via de variabele 'webform'. 

In de variabele 'webform.fields.veldnaam' staat de waarde van een
ingevuld veld in het formulier. De naam van het veld komt overeen met de
naam van het veld in de database waaraan het formulierveld is gekoppeld.
Dus als in de database de velden 'voornaam' en 'achternaam' voorkomen,
en deze velden in het aanmeldformulier zijn voorzien van de labels 'Uw
voornaam:' en 'Uw achternaam:' dan moet je de ingevulde waardes toch
opvragen als 'webform.fields.voornaam' en 'webform.fields.achternaam'.
Als er ook collectievelden in het formulier zaten, dan kunnen deze
worden uitgelezen via de variabele
'webform.fields.collectienaam.veldnaam'. Interesses kunnen worden
uitgelezen als 'webform.interests.interessenaam'.

Net als bij enquetes zijn deze variabelen ook beschikbaar binnen de
Smarty engine. Je kunt ze dus ook gebruiken in mailings die als
opvolgactie naar aanleiding van een ingevuld formulier worden verstuurd.
De gegevens kun je uitlezen via {\$webform.fields.veldnaam}.

### Splitrun mailings

Naast de standaardopties die worden aangeboden in de applicatie is het
mogelijk zelf condities op te stellen om te (laten) bepalen welk
document uiteindelijk verstuurd moet gaan worden. Op basis van de
beschikbare variabelen (zie de onderstaande lijst) is het mogelijk zelf
aan te geven welk document het meest effectief is.

Kies voor 'Aangepaste condities' en klik op 'Bewerk aangepaste
condities' om de editor te openen.

Beschikbare variabelen:

-   **timestamp** *integer* Het tijdstip waarop een mailing is verzonden
    (UNIX Timestamp)
-   **clicks** *integer* Het aantal geregistreerde kliks
-   **clicks\_distinct** \*integer\* Het aantal bestemmingen waar een
    klik is geregistreerd
-   **clicks\_standardized** \*integer\* Het gemiddeld aantal kliks per
    ontvanger binnen een opgegeven tijd
-   **impressions** *integer* Het aantal impressies
-   **impressions\_distinct** \*integer\* Het aantal bestemmingen waar
    een impressie is geregistreerd
-   **impressions\_standardized** \*integer\* Het gemiddeld aantal
    impressies per ontvanger binnen een opgegeven tijdschaal
-   **errors** *integer* Het aantal foutmeldingen
-   **errors\_distinct** \*integer\* Het aantal bestemmingen waar een
    foutmelding is geregistreerd
-   **errors\_standardized** \*integer\* Het gemiddeld aantal
    foutmeldingen per ontvanger binnen een opgegeven tijdschaal
-   **links** *Array* Bevat informatie voor alle links in een document
-   **url** *string* De locatie waar de url naar verwijst

### Aangepaste split-run conditie: Voorbeeld 1

Je wilt zowel de kliks als impressies meten maar vindt de kliks wel
belangrijker:

`2 * clicks_standardized + impressions_standardized`

### Aangepaste split-run conditie: Voorbeeld 2

Verstuur het document met de hoogste doorklikratio op een bepaalde link.

    // pseudo code to demonstrate custom split run condition

    var linkcount = 0;
      for (var i in links)
      { 
        var link = links[i];

        // Count the number of clicks for the hyperlink. Note that the hyperlink must match exactly

        if (link.url == 'exact link address') linkcount += link.clicks_standardized;
      }

      // send the version with the most clicks

      linkcount;
