Vanaf 13 juli kunnen alle Copernica-gebruikers gebruik maken van
Copernica Sender Domains. Het gebruik van Sender Domains heeft, naast
het verbeteren van de deliverability, twee grote voordelen voor
Copernica-gebruikers:

-   **Beveiliging van het afzenderadres:** Het gebruik van Sender
    Domains voorkomt dat onbevoegden namens het eigen verzenddomein
    mailen, zoals bij phishing, en voorkomt ‘man in the middle’-attacks.
    Dit wordt voorkomen met het gebruik van DKIM, SPF en DMARC.
-   **Bewaken domeinreputatie:** Met Sender Domains wordt er gebruik
    gemaakt van een eigen envelope-adres en trackingdomein waardoor de
    gebruiker de domeinreputatie in eigen hand neemt.

Copernica raadt aan om zo snel mogelijk gebruik te maken van Sender
Domains. Op een later moment wordt het gebruiken van de Copernica Sender
Domains (CSD) verplicht voor alle gebruikers. De huidige methode wordt
dan niet meer ondersteund.

Dit artikel legt uit hoe CSD wordt ingesteld. In een [ander
artikel](https://www.copernica.com/nl/blog/beveiligen-van-e-mail-en-met-dkim-spf-en-dmarc "Beveiligen van e-mail en met DKIM, SPF en DMARC")
wordt er ingegaan op de achtergrond van CSD en waarom het belangrijk is
om dit in te stellen.

Instellen Copenica Sender Domains
---------------------------------

Het instellen van CSD kan via zowel de nieuwe Marketing Suite-omgeving
als de ‘oude’ Publisher-omgeving. In beide gevallen is er toegang
benodigd tot het DNS-beheer van het domein. Vaak kan de systeembeheerder
hierin voorzien.

### Instellen via de Marketing Suite

Om CSD in te stellen via de Marketing Suite doorloop je de volgende
stappen:

1.  Log in op
    [ms.copernica.com](https://ms.copernica.com/ "Copernica Marketing Suite");
2.  Ga naar ‘Configuration’ in het linkermenu;
3.  Klik op ‘Setup Sender domains’;
4.  Klik op ‘Start wizard’;
5.  Vul het domein in vanaf waar je wilt gaan verzenden;
6.  In het scherm verschijnen er enkele subdomeinen die worden gebruikt
    voor ontvangst van feedback (zoals bounces en spamklachten) en
    tracking (opens en kliks). Op een later moment ben je in staat om
    deze subdomeinen aan te passen. Hiervoor is eerst verificatie
    benodigd wat verloopt via een TXT-record. Klik vervolgens op ‘Create
    Sender Domain’;
7.  In het volgende scherm staan alle instellingen die benodigd zijn.
    Neem deze waarden over in het DNS-beheer van het domein. Alle
    waarden zijn belangrijk om een goede aflevering te waarborgen.
    Daarnaast staat in deze instellingen ook een TXT-record dat
    zorgdraagt voor verificatie. Wanneer het domein is geverifieerd kan
    het tracking en feedback-subdomein worden aangepast;
8.  Indien alles is ingesteld kan het scherm gesloten worden;
9.  Bij het tabblad ‘Recommended DNS’ wordt vervolgens gecontroleerd of
    alle instellingen juist zijn. Het kan tot 24 uur duren voordat de
    instellingen door alle DNS-servers zijn verwerkt.

Vragen? Wees vrij om contact op te nemen met onze supportafdeling via
[support@copernica.com](mailto:support@copernica.com).

### Instellen via Publisher-omgeving

Om CSD in te stellen in de Publisher-omgeving doorloop je de volgende
stappen.

1.  Log in op
    [publisher.copernica.com](https://publisher.copernica.com/ "Copernica Publisher");
2.  Ga naar het tabblad ‘E-mailings’ en klik op ‘Extra’ en vervolgens
    ‘Sender Domains’;
3.  Klik op ‘Add a sender domain’ geheel onderaan het scherm;
4.  Vul het domein in vanaf waar je wilt gaan verzenden. Stel dat je een
    e-mail wilt verzenden vanuit info@bedrijfsnaam.nl dan vul je hier
    bedrijfsnaam.nl in;
5.  Standaard worden kliks en opens geregistreerd via
    tracking.bedrijfsnaam.nl en bounces en spamklachten via
    feedback.bedrijfsnaam.nl. Op een later moment ben je in staat om
    deze subdomeinen aan te passen via het tabblad ‘Settings’. Hiervoor
    is eerst verificatie benodigd wat verloopt via een TXT-record in de
    volgende stap;
6.  Ga naar het tabblad ‘DNS recommendations’. Neem de waarden uit het
    scherm over in de DNS-server;
7.  Nadat alle waarden zijn overgenomen is het mogelijk om deze te
    controleren via het tabblad ‘Status’. Het kan tot 24 uur duren
    voordat de instellingen door alle DNS-servers zijn verwerkt.

Vragen? Wees vrij om contact op te nemen met onze supportafdeling via
[support@copernica.com](mailto:support@copernica.com).
