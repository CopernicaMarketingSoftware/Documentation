Diverse grote e-mailclients waaronder Gmail en Hotmail bieden een
afmeldfunctie voor commerciële mailinglijsten aan hun gebruikers. Deze
functie voegt een extra knop toe aan de interface van het
e-mailprogramma. Om als commerciële verzender deze functie in werking te
zetten, voegt u een speciale header toe aan uw e-mailings, de zogenaamde
list-unsubscribe header. Het voordeel als verzender is dat u minder
spamklachten ontvangt en uw
[deliverability](./deliverability-better-email-delivery-with-copernica.md "Deliverability")
en [e-mailreputatie](./how-to-build-up-your-email-reputation.md "E-mail reputatie")
verbetert.

E-mail headers
--------------

We pakken de uitleg even vanaf het begin. Een 'header' is de technische
informatie die wordt toegevoegd aan e-mailberichten zoals afzender,
onderwerp en verzendtijdstip. Deze informatie wordt opgepikt door de
ontvangende mailserver en verwerkt in de aflevering en weergave van de
e-mail. Verzenders kunnen ook zelf headers toevoegen aan e-mails, om
instructies te geven aan het ontvangstsysteem. Deze ziet de lezer niet
(tenzij hij in de HTML-broncode gaat wroeten). Zo wordt een
[DKIM](./dkim-domainkey-identified-mail.md "DKIM")
header bijvoorbeeld toegevoegd om de authenticiteit van de afzender te
bewijzen.

Afmelden via een list-unsubscribe header
----------------------------------------

Dat brengt ons terug bij de list-unscubscribe header. Dit is dus extra
informatie die wordt toegevoegd aan een e-mail, met daarin instructies
om een uitschrijfknop te tonen bij de e-mail. Als iemand van de knop
gebruik maakt, gaat er een bericht terug naar uw systeem zodat u de
afmelding kunt verwerken. In de header omschrijft u hoe en waar u deze
meldingen wilt ontvangen. Als u een (goed) CRM pakket of marketing
software gebruikt, kan die de berichten opvangen en automatisch de
afmeldingen verwerken.

Wanneer een ontvanger zich uitschrijft, ontvangt de marketing software
een uitschrijfverzoek van bijvoorbeeld Hotmail. Als iemand van deze
uitschrijf-optie (vorm van
[opt-out](./opt-out-hou-je-klant-niet-tegen.md "Opt-out"))
gebruik maakt, gaat er een bericht terug naar het systeem zodat u de
afmelding kunt verwerken. De list-unsubcribe header ondersteunt zowel
uitschrijving per e-mail of via een hyperlink.

### Een list-unsubscribe header kan er bijvoorbeeld als volgt uitzien:

`From: verzender@domain.com   Subject: More info on List-Unsubscribe   Date: May 10, 2011 11:30:02 AM CDT   To: ontvanger@domain.com List-Unsubscribe: <mailto:unsubscribe-copernica@domain.com>, <http://domain.com/member/unsubscribe/?listname=copernica@domain.com?id=12345N>`

Voordelen van een list-unsubscribe header
-----------------------------------------

De belangrijkste reden om gebruik te maken van deze headers is om uw
e-mailreputatie te beheersen. Met een goede e-mailreputatie komen uw
e-mails netjes in de inbox van uw relaties. Als teveel e-mailontvangers
op de spamknop klikken, verslechtert dat uw algehele reputatie en komen
uw berichten uiteindelijk bij alle ontvangers rechtstreeks in de
spamfolder. Sommige ontvangers klikken op de spamknop gewoon omdat ze
geen zin hebben om de afmeldlink te zoeken of de afmeldprocedure te
doorlopen. Zo wordt uw reputatie ten onrechte benadeelt. De
list-unsubscribe header zorgt dat de afmeldknop net zo gemakkelijk te
vinden is als de spamknop. In Windows Live is het zelfs niet meer
mogelijk om de spamknop te gebruiken wanneer een list-unsubscribe header
is toegevoegd.

Ook wordt een afmeldlink toegevoegd door de afzender nog wel eens
gewantrouwd door ontvangers. Zij denken 'die willen verkopen dus ze doen
er toch niets mee'. Een afmeldlink in de interface van de e-mailclient
komt dan veel betrouwbaarder over.

Tot slot worden spamfilters positief beïnvloed als ze een
list-unsubscribe header bij uw e-mail zien, waardoor zij eenvoudiger uw
e-mail doorlaten naar de inbox. Het is een soort garantie dat u een
legitieme verzender bent. En het maakt het eenvoudiger om uw reputatie
te monitoren voor de waakhonden van het e-mailverkeer ([Return
Path](./return-path-improved-deliverability-and-trust.md "Return Path"),
Lashback, Listbox, e.a.).

Vervanger van de afmeldlink
---------------------------

De list-unsubscribe header kan nog niet de 'gewone' afmeldlink in
commerciële e-mail vervangen, omdat nog niet alle e-mailclients van de
functie gebruik maken. Microsoft Outlook biedt bijvoorbeeld nog (!) geen
optie hiertoe. En de Nederlandse wet verplicht u om aan iedereen een
afmeldfunctie te bieden. Uiteindelijk kan list-unsubscribe misschien wel
de nieuwe standaard worden voor afmelden. Het is eenvoudig in te stellen
en goed automatisch te verwerken. Bovendien groeit het aantal
e-mailclients en verzenders dat deelneemt gestaag en omvat daarbij grote
namen als Windows Live Beta, Gmail, Yahoo en Yahoo! Groups, en AOL.

List-unsubscribe is slechts een van de middelen beschikbaar voor het
beheersen van uw e-mailreputatie en het is niet de grootste of
belangrijkste. Maar het is wel een middel dat eenvoudig is in te zetten
en waar goed op gereageerd wordt door ontvangers. Plaats het vandaag nog
in al uw e-mailtemplates!

### Bekijk ook

-   [Deliverability: hogere e-mailaflevering met
    Copernica](./deliverability-better-email-delivery-with-copernica.md "Deliverability: hogere e-mailaflevering met Copernica")
-   [E-mailreputatie: hoe bouw je dit
    op?](./how-to-build-up-your-email-reputation.md "E-mailreputatie: hoe bouw je dit op?")
-   [DKIM: DomainKey Identified
    Mail](./dkim-domainkey-identified-mail.md "DKIM: DomainKey Identified Mail")
-   [Opt-out: Hou je klant niet
    tegen!](./opt-out-hou-je-klant-niet-tegen.md "Opt-out: Hou je klant niet tegen!")

