# Productupdate 01-06-2022

# Bètamodule: A/B-tests voor drag-and-drop templates
Het is nu mogelijk om A/B-tests uit te voeren met drag-and-drop-templates. Voorheen kon dit alleen met HTML-templates. Bij een A/B-test stuur je twee verschillende templates naar dezelfde selectie om te bekijken welke content de beste resultaten behaalt. In het verzendscherm is de verdeling van de twee groepen standaard 50%-50%. Met een slider kan je deze verdeling eenvoudig aanpassen.

Je activeert de functionaliteit via het menu-item [Configuratie](https://ms.copernica.com/#/admin) onder het kopje [Bètamodules](https://ms.copernica.com/#/admin/user/betamodules). Om een A/B-test te sturen ga je naar '[E-mail-editor](https://ms.copernica.com/#/design) → Verzendopties → Bulkmailing (bèta)'.

In de aankomende periode breiden we de functionaliteit verder uit. Zo wordt het mogelijk om meerdere groepen aan te maken en om een 'winnend' template te bepalen op basis van de resultaten van de reeds verzonden groepen.

# Vergelijken van statistieken
In de [resultaten-module](https://ms.copernica.com/#/results/sentmailings) is de optie toegevoegd om meerdere verzonden mailings met elkaar te vergelijken. Hierdoor kun je in één oogopslag zien welke verzonden mailing het beste heeft gepresteerd.

# Template en document statistieken
Je kan nu statistieken inzien op template- en documentniveau. Dit geeft je de mogelijkheid om gegroepeerde statistieken over een periode in te zien.

Deze functie vind je in de toolbar van de [E-mail-editor](https://ms.copernica.com/#/design) binnen een template of document onder 'Statistieken'.

## Marketing Suite
- De verzendsnelheid van drag-and-drop-templates is aanzienlijk verbeterd.
- In drag-and-drop-templates kan je nu een voorwaarde op conditionele blokken te plaatsen als je bestemming een subprofiel is.
- Als je interessevelden gebruikt in een opvolgactie krijg je nu een dropdown met 'aan' of 'uit'. Hierdoor is het nu duidelijk welke waarde je hier moet opgeven.
- Er worden geen `<p></p>`-tags meer om je tekst geplaatst in tekstblokken van HTML-documenten.
- Je kan nu HTML-documenten versturen in Marketing Suite-opvolgacties.
- In de [resultaten-module](https://ms.copernica.com/#/results) kan je profielen waarbij een fout of klacht is geregistreerd in bulk uitschrijven.
- Bij het aanmaken van een nieuw drag-and-drop-template kun je enkele voorbeeldtemplates gebruiken.
- Bugfix: na het verwijderen van een profiel wordt nu de slide van het profiel gesloten en word je teruggestuurd naar de database.
- Bugfix: als je in een opvolgactie of tekstblok geavanceerde JavaScript-condities gebruikt worden deze direct bij het openen van de opvolgactie of het tekstblok getoond.
- Bugfix: bij gebruik van databaserestricties krijg je geen foutmelding meer bij het handmatig bewerken van een profiel.
- Bugfix: het is weer mogelijk om de naam van een opvolgactie te bewerken.
- Bugfix: in de notificatie na het starten van een mailing wordt nu het juiste aantal bestemmingen weergegeven.
- Bugfix: bij foutieve code in de [XSLT-module](https://ms.copernica.com/#/xslt) wordt nu een foutmelding gegeven.
- Bugfix: voor een bedrijfsgebruiker zonder beheerdersrechten is het niet meer mogelijk om de gegevens of het logo van het bedrijf aan te passen.

## Publisher
- Bugfix: het is weer mogelijk om de naam van je SMS-document te bewerken.

## Rest API
- Bij het opvragen van je (mini)selecties geeft de response nu ook mee of deze gearchiveerd zijn.
- Bugfix: bij het toevoegen van een conditie in een miniselectie kun je nu naast het ID ook de naam van het veld opgeven die je wilt gebruiken.
