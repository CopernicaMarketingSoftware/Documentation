Het is in Copernica mogelijk om de wachttijd van een opvolgactie met
javascript te bepalen. In dit script zijn ook variabelen uit de database
beschikbaar. Zo haal je informatie uit het (sub)profiel dat de
opvolgactie heeft getriggerd waarmee je vervolgens de wachttijd
personaliseert.

De voorbeeldsituatie
--------------------

Stel, een webwinkel verkoopt verbruiksproducten zoals sportshakes of
andere soorten voeding. Elke verpakking heeft een bepaalde inhoud en een
bepaalde gemiddelde dagelijks verbruikte hoeveelheid. Met deze
informatie (en de aanname dat de aanschaf telkens door één persoon wordt
geconsumeerd) kun je dus per product een schatting maken na hoeveel
dagen het volledig verbruikt is. Als je dan een paar dagen van tevoren
geautomatiseerd een mail kunt laten sturen met een link om het product
te herbestellen, bied je enerzijds je klanten een goede service en
anderzijds kun je je omzet vergroten. Uiteraard wordt deze mail niet
verstuurd als in de tussentijd hetzelfde product opnieuw is aangeschaft.

Wat heb je nodig om een herbesteltraject op te zetten? {#wat-heb-je-nodig-om-een-herbesteltraject-op-te-zetten?}
------------------------------------------------------

Het begint met data. We gaan er hier even van uit dat je Copernica
database gekoppeld is met je webshop en gevuld is met klantengegevens
(op profielniveau). In die database is er een collectie met een
subprofiel voor elk aangeschaft product (hier 'Orderedproducts'). Als je
bij de producteigenschappen in je webshop toevoegt wat het verwachte
aantal dagen is dat een product mee gaat en ook dat veld synchroniseert
met Copernica, heb je bij elk subprofiel dus ook een herbesteltermijn in
een los veld (hier 'Herbesteltermijn').

De opvolgactie
--------------

Om het traject te laten lopen gebruiken we een opvolgactie op het
aanmaken van een nieuw subprofiel in de collectie 'Orderedproducts'.
Direct stellen we hierbij een conditie in dat het veld
'Herbesteltermijn' niet gelijk mag zijn aan nul, want dat betekent dat
er geen herbesteltermijn bekend is. Vervolgens gebruiken we de optie om
JavaScript te gebruiken bij de wachttijd en daarin plaatsen we het
volgende script:

    ($Quantity*$Herbesteltermijn-1)*86400

In bovenstaande code nemen we de herbesteltermijn van het bestelde
product en vermenigvuldigen die met het aantal gekochte items (koop je
twee stuks, dan doe je er tweemaal zo lang mee):
`$Quantity*$Herbesteltermijn` . Dat verminderen we in dit geval met 1 ,
gezien we een dag voordat we verwachten dat de voorraad van de klant op
is willen mailen: `$Quantity*$Herbesteltermijn - 1`. Omdat de wachttijd
in JavaScript met seconden werkt, vermenigvuldigen we de uitkomst (de
wachttijd in dagen) met het aantal seconden dat in een dag past (86400):
`($Quantity*$Herbesteltermijn - 1) * 86400`. De uitkomst hiervan is onze
gepersonaliseerde wachttijd.

En wat gebeurt er dan? {#en-wat-gebeurt-er-dan?}
----------------------

Hierna moet nog een document gemaakt worden dat gestuurd kan worden met
de opvolgactie. Hier tonen we met behulp van Smarty de details van het
product dat herbesteld kan gaan worden. Een voorbeeld:

    <table>
        <tr>
            <td>Naam</td>       <td>{$mailing.trigger.subprofile.Productnaam}</td>
            <td>Afbeelding</td> <td><img src='{$mailing.trigger.subprofile.
            Imagesource}'></td>
        </tr>
    </table>

Bovenstaande Smarty-code toont de naam van het product dat de
opvolgactie heeft getriggerd samen met de afbeelding die wordt ingeladen
van de locatie die bij het product hoort.

In de inleiding stelden we echter dat we klanten die in de tussentijd
hetzelfde product hebben aangeschaft niet de herbestelmailing willen
sturen. Hiervoor moeten we dus nog een extra conditie op de opvolgactie
instellen, die bij de actie (het sturen van het document) wordt
gecontroleerd. Wederom hebben we een stukje JavaScript nodig:

    function dontPreventSending() {

        for(var i=0; i < profile.Orderproducts.length; i++) {

            if (profile.Orderproducts[i].id == subprofile.id) continue;

            if (profile.Orderproducts[i].Product_ID != subprofile.Product_ID)
            continue;

            var date1 = Date.parse(profile.Orderproducts[i].Aanschafdatum);
            if (isNaN(date1)) continue;

            var date2 = Date.parse(subprofile.Aanschafdatum);

            if (date1 > date2) return false;

        }

        return true;

    }

    dontPreventSending();

Bovenstaande code controleert of er een reden is om de verzending te
blokkeren: het itereert over alle subprofielen in de collectie
'Orderedproducts'. Het eerste if-statement controleert of het subprofiel
dezelfde aanschaf betreft als datgene waarvoor de herbestelmailing is
getriggerd (in dat geval kunnen we die negeren). De tweede checkt of het
een ander soort product betreft (als dat zo is heeft het niets met dit
herbesteltraject te maken en gaan we door). Is het wel hetzelfde
product, dan kijken we of het een meer recente aangeschaft betreft. Is
het dat niet, dan laten we de opvolgactie pas doorgaan en wordt de
mailing dus verstuurd.

Het zou ook zo kunnen zijn dat je wil dat elke nieuwe aanschaf de
lopende herbesteltrajecten blokkeert. Hierboven hebben we
geïmplementeerd dat alleen dezelfde producten (zelfde Product\_ID) het
traject blokkeren middels de regel:
`if (profile.Orderproducts[i].Product_ID != subprofile.Product_ID) continue;`.
Als je die verwijdert, blokkeert elke nieuwe aanschaf de lopende
herbesteltrajecten.

Het aantal verstuurde herbestelmails limiteren
----------------------------------------------

Wanneer een klant 8 producten koopt die allemaal een herbesteltermijn
hebben, betekent dit dat er 8 herbestelmailings verstuurd zullen worden.
Dit kan overdreven zijn en als ongewenst worden ervaren. Om dit te
voorkomen kun je een veld 'Herbestelcounter' maken bij het profiel
(standaardwaarde = 0, is de database al gevuld gebruik dan 'meerdere
(sub)profielen wijzigen' om voor elk profiel de waarde op 0 te zetten).

In dit voorbeeld stellen we in dat er nooit meer dan twee
herbestelmailings naar een profiel gestuurd mogen worden binnen 7 dagen.
Dit realiseren we door bij het verzenden van het document met een
opvolgactie het veld 'Herbestelcounter' met 1 te verhogen:
`{math equation="x+y" x=$Herbestelcounter y=1}`. Een tweede opvolgactie
op het verzenden van datzelfde document verlaagt de score
(`{math equation="x-y" x=$Herbestelcounter y=1}`), maar doet dat pas na
7 dagen (gebruik hiervoor de wachttijd).

De laatste stap is het controleren of het aantal herbestelmailings al is
overschreden voordat een nieuwe wordt verzonden. Dit is een extra
conditie op het versturen van de mailing en die plaatsen we dus ook in
het eerder gemaakte JavaScript (zie regel 2):

    function dontPreventSending() {
        if (profile.Herbestelcounter >= 3) return false;

        for(var i=0; i < profile.Orderproducts.length; i++) {

            if (profile.Orderproducts[i].id == subprofile.id) continue;

            if (profile.Orderproducts[i].Product_ID != subprofile.Product_ID) 
            continue;

            var date1 = Date.parse(profile.Orderproducts[i].Aanschafdatum);
            if (isNaN(date1)) continue;

            var date2 = Date.parse(subprofile.Aanschafdatum);

            if (date1 > date2) return false;

        }

        return true;

    }

    dontPreventSending();
