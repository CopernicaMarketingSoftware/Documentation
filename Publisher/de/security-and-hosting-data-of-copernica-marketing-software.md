Möchten Sie gerne wissen, was mit Ihren Daten passiert, wenn Sie mit
Copernica Marketing Software arbeiten? Werden Ihre Daten sicher
gespeichert? Sind sie vor Cyber-Attacken geschützt? Wir möchten Ihnen in
diesem Artikel gerne einige interessante Informationen zur von uns
eingesetzten Hardware und zu den Themen Sicherheit und Hosting Ihrer
Daten bei Copernica mitgeben.

**Hardware**\
 Der Großteil unserer Hardware steht im [Evoswitch
Datacenter](http://www.evoswitch.com/en/infrastructure/security) in
Haarlem (Niederlande). Für Evoswitch haben wir uns vor allem deshalb
entschieden, weil wir damit Zugriff auf die neuesten und modernsten
Technologien haben. Unsere Internetverbindung im Evoswitch Datencenter
basiert auf einer redundanten Verbindung von 100MB/s.

Copernica verfügt über mehrere Server, von denen jeder einer speziellen
Aufgabe zugeordnet sind. Wir haben:

-   Datenbank-Server: Dort werden alle Daten unserer Kunden gespeichert.
-   Replication Server: Dies sind Kopien unserer Datenbank-Server
    (Mirror-Datenbanken).
-   Webserver / Publisher Server: Auf diesen Servern laufen die
    Anwendungen unserer Kunden sowie die aller Webseiten innerhalb der
    Anwendung.
-   Taskserver: Diese Server führen alle Aufgaben in und um die
    Anwendung herum aus, wie z.B. E-Mailings und Auswahlen
    zusammenstellen oder Follow-up-Vorgänge sowie Importe & Exporte
    abwickeln.
-   Zwei Load Balancer: Diese Lastverteiler teilen die Aufgaben zwischen
    den Webservern und den Bilderservern auf. Einer dieser Load Balancer
    ist immer aktiv, während der andere bereitsteht, um im Fall einer
    Störung übernehmen zu können.
-   Controller: Verwaltet alle Aufgaben des Taskservers. Hier holt der
    Taskserver sich seine Aufgaben ab.
-   Mailsender / Mailserver: Ist für den Versand der Mailings unserer
    Kunden zuständig.
-   Bilderserver: Dieser Server speichert alle Bilder und Links der
    Feeds und E-Mailings unserer Kunden.

Back-ups
--------

Alle Daten aus den Copernica-Datenbanken werden über ein SAN (Storage
Area Network) gesichert und gespeichert. Dank dieses Systems verfügen
wir über großzügige Speicherkapazitäten und hohe
Transaktionsgeschwindigkeiten. Darüber hinaus reduziert es eventuelle
Ausfallzeiten. Sollte ein Datenbankserver ausfallen, kann er schnell und
einfach ersetzt werden.

Passwörter bei Copernica
------------------------

Copernicas Passwörter sind sehr leistungsstark. Ein Copernica-Passwort
muss mindestens 6 oder mehr der folgenden Zeichen beinhalten:

-   Kleinbuchstaben
-   Großbuchstaben
-   Sonderzeichen
-   Alphanumerische Zeichen

Passwörter werden digital und verschlüsselt gespeichert.

Weitere häufige Fragen
----------------------

Damit Sie absolut sicher sein können, dass Ihre Daten bei Copernica gut
aufgehoben sind, beantworten wir im Folgenden einige weitergehende
Fragen zu Sicherheit und Datenübertragung:

**Wer speichert meine Daten bei Copernica und wie werden die Daten
gespeichert?**

-   Copernica-Kunden können ihre Daten selber importieren. Dies kann auf
    drei verschiedenen Wegen erfolgen: manuell, über FTP oder über eine
    API-Schnittstelle.

**Sind meine Daten während der Übertragung an Copernica sicher?**

-   Ja, der Import wird über HTTPS durchgeführt. Wenn Sie die
    Datenübertragung per FTP bevorzugen, können Sie hierfür eine
    SSL-Verschlüsselung nutzen (FTPS).

**Erfolgt die Datenübertragung via FTP bzw. per Download über eine
sichere Internetverbindung (SSL, HTTPS, FTPS)?**

-   Ja, als Kunde können Sie Daten selber via FTPS oder HTTPS
    importieren.

Wie anfällig ist Copernica für Cyber-Attacken?
----------------------------------------------

Jedes Online-Unternehmen, das über eine große Menge Daten verfügt, kann
Ziel von Cyber-Attacken sein. Darunter fallen DDOS-Angriffe,
Brute-Force-Angriffe, Cross-Site-Scripting oder SQL-Injections. Im
Folgenden finden Sie eine kurze Beschreibung dieser verschiedenen
Gefahren und Informationen dazu, wie Copernica sich dagegen schützt.

**DDOS**

Denial of Service-Angriffe (DOS-Angriffe) und Distributed Denial of
Service-Angriffe (DDOS-Angriffe) sind Versuche, einen Computer, ein
Computer-Netzwerk oder einen Service durch das Öffnen einer enormen
Anzahl von Server-Verbindungen und die dadurch entstehende Überlastung
lahmzulegen. Sicherlich haben Sie in den Nachrichten zum Beispiel von
den Angriffen auf die Server des Kreditkartenunternehmens VISA gehört,
hier wurden die Server durch DDOS-Attacken lahmgelegt.

Der Unterschied zwischen einem "normalen" DOS-Angriff und einem
verteilten DDOS-Angriff liegt darin, dass letztere von mehreren
Computern gleichzeitig ausgehen. In den meisten Fällen wird hierzu ein
[botnet](http://en.wikipedia.org/wiki/Botnet) genutzt, aber es kann auch
vorkommen, dass verschiedene Einzelpersonen ihre Angriffe koordinieren
(wie es die [Anonymous](http://en.wikipedia.org/wiki/Anonymous_(group))
Bewegung tut).\
 \
 Über unseren Hosting Partner Evoswitch ist Copernica gegen
DDOS-Angriffe geschützt. Auf seiner Website erklärt Evoswitch hierzu:

**"Wir überwachen den gesamten eingehenden und ausgehenden Traffic über
das Cisco Netflow-Protokoll."**IP-Traffic mit ähnlichen Quell- und
Ziel-IP-Adressen sowie ähnlichen Quell- und Ziel-IP-Ports bezeichnet man
als sog. "Flow". Sobald eine IP-Adresse mehr als 35.00 Flows pro Sekunde
erhält, wird sie automatisch auf eine Blacklist gesetzt.

Wenn eine IP-Adresse zum ersten Mal von einem DDOS-Angriff betroffen
ist, kommt sie für die Dauer einer Stunde auf die Blacklist. Jeder
weitere Angriff verdoppelt diese Zeit. Die im Kundenportal genannte
Kontaktperson wird umgehend per E-Mail über den DDOS-Angriff und das
vorübergehende Blacklisting informiert.

**Brute-Force-Angriff**

Von einem Brute-Force-Angriff spricht man, wenn eine Attacke aus
vielfachen Login-Versuchen besteht.

Copernica überwacht den Traffic auf den Servern kontinuierlich und
protokolliert die Anzahl der Login-Versuche. Sobald unser System mehrere
fehlerhafte Login-Versuche feststellt, sperrt Copernica den
entsprechenden Benutzer (wenn nötig, können wir dies manuell tun).

**Cross-Site-Scripting**

Überall dort, wo in unserer Software Eingaben seitens des Benutzers
erfolgen und wir diese Eingaben nutzen und abbilden, werden diese
maskiert. Dadurch wird es umöglich gemacht, die Copernica Marketing
Software mittels Cross-Site-Scripting anzugreifen.

**SQL injection**

Sonderzeichen oder unerwartete Eingaben können eine Gefährdung für Ihre
Datenbank darstellen, wenn Sie sie nicht vernünftig maskieren. Denken
Sie nur an die Geschichte von ‘little bobby drop tables’\
\
![Little Bobby Drop
Tables](Copernicacom/droptables.jpg "Little Johnny Drop Tables")

Das Copernica zugrundeliegende Framework verhindert solche Fälle, da
Copernica alle Datenbank-Anfragen mit sogenannten Platzhaltern
formuliert, die automatisch maskiert werden.
