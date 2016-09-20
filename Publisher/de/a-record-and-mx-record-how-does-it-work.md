Ein MX-Record (Mail Exchange Record) ist eine Art Eintrag im Domain Name
System (./dns.md). Dieses System zeigt an, welche spezifische IP-Adresse an
welche E-Mail gesendet werden sollte.

Ein MX-Record beinhaltet den Hostnamen des Computers der die E-mails
abhandelt und einen Priorisierungscode. E-Mails können an die IP-Adresse
weitergeleitet werden, die im A-Record für den spezifischen Host
eingestellt ist.

Das A-Record (oder Record-Adresse) bestimmt, welche IP-Adresse zu
welcherm Domainnamen gehört.

Beispiel A-Record:

-   Domain: copernica.com
-   Hostname: mail
-   IP-Adresse: 11.22.33.222

Nun trägt der Mailserver den Namen mail.copernica.com, der im MX-Record
benutzt werden kann.

Beispiel MX-Record:

-   Domain: copernica.com
-   Mail Exchanger: mail.copernica.com
-   Priorität: 10

Alle E-Mails, die an voor@copernica.com gesendet werden, können an den
Server mail.copernica.com mit der IP-Adresse 11.22.33.444 gesendet.

Der Unterschied zwischen CNAME und A-Record
-------------------------------------------

Ein CNAME- (Canonical Name) Record ist ein Alias für ein anderes
./dns.md-Record. Es bezieht sich auf einen anderen vollwertigen Hostnamen und
nicht an eine IP-Adresse wie im Falle des A-Records. CNAME wird
gebraucht, um sich auf Domains und Subdomains zu beziehen. Bei Rückgriff
auf copernica.com bspw. kann die Seite www.copernica.com auf zwei Wegen
erreicht werden. CNAME-Records sind leichter zu erstellen als A-Records.

Wenn man als nächstes Subdomains veröffentlicht; www.copernica.com,
ftp.copernica.com, mail.copernica.com und möchte diese alle an
copernica.com verweisen, kann man für alle Subdomains ein A-Record
erstellen. Alle A-Records verweist auf eine IP-Adresse des Servers und
wenn Sie wechseln, erhalten Sie eine neue IP-Adresse und alle A-Records
werden aktualisiert. So ist es einfacher, ein CNAME-Record zu erstellen
und dann nur einmal das A-Record anzupassen, wenn Sie den Server
wechseln.
