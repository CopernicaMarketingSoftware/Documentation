Een MX-record (Mail exchange-record) is een type verwijzing in een
Domain Name System (./dns-data-what-does-it-do.md "DNS")).
Dit is het systeem dat onder andere aangeeft naar welk specifiek
IP-adres e-mails moeten verzonden worden.

Een MX-record bevat namelijk de hostnaam van de computer(s) die e-mails
voor een domein afhandelen en een priorisatie code. E-mails worden
doorgestuurd naar het IP-adres dat is ingesteld in het A-record voor de
genoemde host.

De A-record (oftewel address-record) bepaalt welk IP-adres bij een
domeinnaam hoort. Dit record vertaalt als het ware de domeinnaam naar
een IP-adres.

### Voorbeeld A-record:

-   Domein: copernica.com
-   Hostname: mail
-   IP-adres: 11.22.33.222

Nu draagt je mailserver de naam mail.copernica.com, die kan gebruikt
worden in het MX-record.

### Voorbeeld MX-record:

-   Domein: copernica.com
-   Mail exchanger: mail.copernica.com
-   Prioriteit: 10

Alle e-mails die worden verstuurd naar voor@copernica.com, worden
verstuurd naar de mailserver mail.copernica.com met het IP adres
11.22.33.222

Het verschil tussen CNAME en A-record
-------------------------------------

Een CNAME (Canonical Name) record wordt gebruikt om de verbinding tussen
een (sub)domein en een ander (sub)domein te maken. Een A-record, zoals
hierboven reeds uitgelegd, bepaalt welk IP-adres bij een domeinnaam
hoort.

Bijvoorbeeld het doorverwijzen van www.copernica.com, ftp.copernica.com
en mail.copernica.com naar copernica.com gebeurt met behulp van een
CNAME record. Het aanmaken van een apart A-record per subdomein is ook
een mogelijkheid maar levert problemen op mocht je van server willen
wisselen. In dit geval krijg je een nieuw IP adres en moeten alle
A-records worden aangepast. Het is dus makkelijker in zo'n geval een
CNAME-record aan te maken.
