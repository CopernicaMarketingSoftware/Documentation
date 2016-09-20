Wenn Emails versendet werden, kann es passieren, dass sie nicht
ankommen. Viele Händler machen einen Unterschied zwischen Hard und Soft
Bounces. Doch mit dieser Unterscheidung macht man es sich zu einfach.
Wenn eine E-Mail verschickt wird, kann so viel schief gehen, dass es
nicht sinnvoll ist, die Ursachen hierfür in lediglich in zwei Kategorien
zu suchen. Die leistungsstarke Software Copernica macht dem Benutzer
diese Unterschiede glücklicherweise klar ohne den übermäßigen Gebrauch
vager Konzepte wie "Soft" und "Hard" Bounce.

Wie verläuft eigentlich das Versenden von E-Mails? Tatsächlich besteht
dieser Vorgang aus drei Schritten: zuerst wird die E-Mail erstellt, dann
schickt ein Client eine Anfrage an den Mailserver. Wenn die Mail
akzeptiert wird, bedeutet dies nicht zwangsläufig, dass diese auch dem
Empfänger zugestellt werden konnte. Es besteht immer noch die
Möglichkeit, dass eine "Bounce-Performance" existiert und eine
Fehlermeldung über E-Mail gesendet wird. In diesem Arbeitspapier
fokussieren wir uns auf diese drei Schritte.

Schritt 1: Eine Mail erstellen
------------------------------

Das Erstellen einer E-Mail besteht aus mehreren Schritten.

Zum Beispiel

-   Generieren des HTML-Codes
-   Personalisierungscode durch die Nutzung von Smarty
-   Laden von XML-Feeds
-   Bilder einbinden
-   Möglicherweise auch generierte PDF-Dateien und Personalisierung

Kurz gesagt, auch beim Erstellen einer E-Mail kann eine Menge falsch
laufen, sogar bevor die Nachricht verschickt wurde. Wie sollte dieser
Fehler in den Statistiken genannt werden? Hard Bounce? Soft Bounce?
Copernica macht solche Unterschiede nicht. Kommt es zu einem erhöhten
Fehleraufkommen beim Erstellen einer E-Mail, wird man vom Programm
benachrichtigt. So herrscht völlige Eindeutigkeit.

Schritt 2: Eine E-Mail erstellen - Kommunikation mit dem empfangendem Mailserver
--------------------------------------------------------------------------------

Beim Versenden einer E-Mail wird mit Hilfe eines
[A-Records](./a-record-and-mx-record-how-does-it-work.md "A-Records")
der korrespondierende Domainname gesucht. Dieser wird angegeben, wenn
eine E-Mail gesendet wird. Ein Fehler tritt auf, wenn bspw. die
DNS-Daten des Servers nicht korrekt sind.

-   In diesem Fall bekommt der Nutzer von dem Programm möglicherweise
    die Nachricht "Domain-Änderung der IP-Adresse", was bedeutet, dass
    die Domain des Empfängers (@ xxxx.xx) nicht mit der IP-Adresse
    verbunden ist. Die E-Mail wird nicht versendet.

Der nächste Schritt ist die Benutzung eines
[MX-Records](./a-record-and-mx-record-how-does-it-work.md "MX-Records"),
um zu bestimmen, an welchen Server die Mail gesendet wird. Hier könnte
ein (vorübergehender) Fehler auftreten, weil der Server vorübergehend
nicht erreichbar ist.

Wenn bekannt ist, an welchen Server die E-Mail geht, wird mit Hilfe
eines A-Records eine Verbindung mit der Host-IP-Adresse hergestellt.

Unten befindet sich eine SMTP-Verbindung zum Server. Beispielsweise zur
IP-Adresse 11.22.33.444, Port 25 (der Standard-Serverport). Diese
Verbindung scheitert möglicherweise, so dass es zu einem Fehler kommt.

-   Beispielsweise, wenn ein Provider den Serverport blockiert.

Die Verbindung ist erfolgreich, wenn der Client mit dem Server
kommuniziert. Der Server antwortet mit einer "Gruß"-Antwort mit dem Code
220. Ein Fehler tritt auf, wenn ein Server den Code 554 sendet. Das
bedeutet, dass der Server die Verbindung nicht akzeptiert.

Während dieser Kommunikation gibt der Client erst ein HELO-Kommando
heraus. Dies startet die SMTP-Mailtransaktion. Der Server antwortet mit:
"250 Hello". Bei einer ausbleibenden Antwort kommt es zu einem Timeout.
Tritt ein Fehler häufiger in Folge auf, ist es leicht vorstellbar, dass
dieser durch Selektionen registriert wird.

-   Es registriert den Fehler "Kommunikation mit empfangendem
    Mailserver" falls die sendende Partei kein SPF-Record eingestellt
    hat. In diesem Fall weist der Server die E-Mail zurück, was in einer
    Fehlermeldung resultiert.

Antwortet der Server, so sendet der Client einen MAIL-Befehl. Dies tut
er, um zu erfahren, woher die Mail kommt. In diesem Fall können drei
mögliche Fälle eintreten:

-   Der Server akzeptiert die Mail dieser Adresse.
-   Es kommt zu einem Timeout. Der Server versucht es später noch
    einmal.
-   Der Server akzeptiert die E-Mails von dieser Adresse nicht , so dass
    sie auf die Blacklist gesetzt wird. In diesem Fall kommt es zu einem
    Fehler.

Wenn der Server weiterhin kommuniziert, wird anhand des RCPT-Kommandos
auch überprüft, an wen die E-Mail gesendet wird.

-   Der Server akzeptiert die Adresse.
-   Der Server verursacht ein Timeout.
-   Der Server gibt an, die E-Mailadresse nicht zu kennen. Es entsteht
    ein Fehler.

Wenn die Befehle RCPT und MAIL bestätigt wurden, werden die Daten der
E-Mail verschickt. Dies geschieht durch den Befehl DATA. Wieder gibt es
drei mögliche Folgen:

-   Der Server akzeptiert die Adresse.
-   Der Server verursacht ein Timeout.
-   Der Server akzeptiert die Daten nicht. Beispielsweise, weil die
    gesendeten Daten Charakteristika von Spam enthalten.

Alle übertragenen Daten sollten mit "." in jeder neuen Zeile enden.

Der Maliclient bricht den Transfer durch Senden eines QUIT-Befehls ab.
Dann gibt der Server an, dass die Email empfangen wurde. Oder er fragt
nach einem Timeout oder zeigt an, dass das Senden der Daten fehlschlug.
Dies führt zu einem Fehler.

Schritt 3: Verarbeiten von Bounces
----------------------------------

Sollte die Mail letztendlich vom empfangenden Mailserver akzeptiert
werden, kann es immer noch zu einem Fehler kommen. Der Server sendet dem
Client einen DNS-Bericht (Delivery Status Notification) mit einer
möglichen Erklärung, was schief gelaufen ist. Oder aber der Server
bietet keine Erklärung an.

Auch hier macht Copernica keinen Unterschied zwischen "Hard" und "Soft"
-Bounce. Falls nach dem Akzeptieren immer noch ein Fehler auftritt,
sendet es diesen zum Client. Die Software wird deutlich machen, dass der
empfangende Mailserver einen Bounce gesendet hat. Es ist dann möglich,
in den Statistiken zu sehen, wo ein spezifischer Fehler auftrat.
