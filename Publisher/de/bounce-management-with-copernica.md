Wie bearbeiten Sie Ihre

Wie bearbeiten Sie am besten Ihre Bounces mit Hilfe von Copernica?

Auswahl basiert auf Bounces
---------------------------

Innerhalb von Copernica ist es möglich Auswahlen zu erstellen, die nach
dem Empfangen von ersten E-Mailings auf Fehlern basieren. Dies kann
durch eine Auswahl in der Registerkarte 'Profile' getan werden, die die
Ergebnisse einer gesendeten E-Mail berücksichtigen. Fügen Sie in die
Bedingung ein, dass ein Fehler registriert werden muss. Bei der
Erstellung dieser Bedingung können Sie auswählen, ob die Auswahl auf
einen bestimmten Fehlerbericht oder auf einem Fehler, der ein zweites
Mal wiederholt beim Versenden der Mail erscheint, basieren soll.

Zum Beispiel:

![Auswahl basiert auf Bounces](Copernicacom/hardbounce.png)

-   Als Ergebnis der E-Mailings muss die folgende Fehlermeldung
    registriert sein:*Fehler, die beim Versenden einer weiteren
    Nachricht am wahrscheinlichsten auftreten.*

Durch die Anleitung der Auswahl sollen keine Dateien aus der zuletzt
erstellten 'bounce selection' für Ihren Newsletter eingefügt werden.
E-Mail-Adressen lassen sich aus einer Bounce in der ersten Mailing
erstellen, die nicht in der nächsten Mailing eingefügt sind. Damit
werden neue Fehler und Schäden aus Ihrem E-Mail Aufruf vermieden.

Diese Auswahl kann auf der Basis der "Hard Bounces" definiert werden.
Sie können eine zusätzliche Auswahl für "soft" Bounces erstellen, die
die gleichen Auswahlbedingungen beinhalten, wie im vorherigen Beispiel.
Nur Sie können einen bestimmten Fehler in dieser Bedingung auswählen.
Zum Beispiel:

-   Als Ergebnis des E-Mailings müssen folgende Fehler registriert sein:
    *5.7.1: Lieferung nicht berechtigt, Nachricht abgelehnt*

Als zusätzliche Bedingung legen Sie fest, dass das Mailing 2 bis 3 Mal
versendet werden muss, bevor das bestimmte Profil in die Auswahl
eingefügt wird.

Anschließend fügen Sie diese Bedingung zu Ihrer Newsletter-Auswahl, wo
Adressen aus dieser Auswahl nicht enthalten sind (genau wie bei der
ersten "bounce selection").

Überprüfen Sie Ihre Einstellungen
---------------------------------

Innerhalb von Copernica sind Ihre E-Mail-Einstellungen variabel
einzustellen. Sie können ganz einfach Ihre Authentifizierungsdaten, wie
[SPF](http://www.copernica.com/en/about-us/news/what-is-sender-policy-framework-spf "SPF"),
[SenderID](http://www.copernica.com/de/uber-uns/news/sender-id-wie-funktioniert-es "SenderID")-
und
[DKIM](http://www.copernica.com/de/uber-uns/news/dkim-domainkey-identified-mail "DKIM")
überprüfen. Stellen Sie sicher, dass diese Einstellungen jederzeit in
richtiger Weise eingerichtet sind. Authentifizierungsdaten, die nicht
richtig eingerichtet sind, können sich in mehreren Fehlern und Bounces
ergeben. Ebenfalls ergibt sich eine schlechte Zustellbarkeit.

Die Zusendungseinstellungen Ihres E-Mailing sind unterschiedlich. Das
bedeutet, dass Sie festlegen können, wie viele Nachrichten pro
Verbindung versendet oder für welchen Zeitpunkt die Zustellungsfrist für
jeden bestimmten Domain (Hotmail, Gmail) angesetzt werden soll. Auf
diesem Weg werden Ihre E-Mailings nicht verzögert versendet. Durch
Einstellungsanpassungen können Sie auch eine Überlastung des
empfangenden Servers vermeiden. Das verringert das Risiko, indem Sie
diese als Spam markieren und folglich das Risiko an Fehlern und Bounces
verringert werden.

Copernica garantiert Ihnen, dass Sie jederzeit von einer guten
Zustellbarkeit gesichert sind. Deshalb verwenden wir immer die
empfohlenen Einstellungen für eine optimale Zustellung Ihrer E-Mailings.
Beim Versenden von E-Mailings ist es möglich, dass die empfangenen
Mail-Server (zum Beispiel Hotmail) einsehen können, ob Sie zu viele
Nachrichten versenden. Der Server sendet diese Beobachtung zum
Mailsender von Copernica. In diesem Fall würde unser Mailsender
automatisch die Zustellungsfrist niedriger einstellen. Damit kann man
sicherstellen, dass Ihre Nachrichten in die Posteingänge eingehen. Nach
einer Stunde wird die Zustellungsfrist vom Mailsender wieder in die
ursprüngliche Einstellung zurückgesetzt.

Anwendung von feedbackloop-Programmen
-------------------------------------

Es ist möglich automatisch erhaltene Beschwerden über Ihre E-Mail
innerhalb von Copernica zu verarbeiten. Dies kann durch die
Registrierung für "feedback loop programs“ durchgeführt werden. Viele
ISPs wie Yahoo, Hotmail oder AOL bieten diese Programme als Service an
Parteien an, die Massensendungen von E-Mails verschicken. Diese
Programme ermöglichen Ihnen herauszufinden, wer die E-Mailings als
"Spam" markiert hat. Damit können Sie auf diese Berichte sofort
reagieren und diese bearbeiten. Oder Sie können die Einstellungen in
Copernica so einrichten, so dass die Software diese Berichte für Sie
automatisch verarbeitet. Zum Beispiel kann das durch Abmelden des
Empfängers oder durch das Entfernen des Profils aus der Datenbank
erfolgen. Wenn Sie Copernica verwenden, werden Sie automatisch für
feedback loop programs von Hotmail registriert.

Im Folgenden sind einige andere ISPs aufgelistet, die diese feedback
loop-Programme anbietet. Sie können anmelden, in dem Sie die Formulare
auf den Websiten ausfüllen:

-   [Yahoo Feedback
    Loop](http://feedbackloop.yahoo.net/ "Yahoo Feedback Loop")
-   [AOL Feedback
    Loop](http://www.postmaster.aol.com/Postmaster.FeedbackLoop.php "AOL Feedback Loop")
-   [OpenSRS/ Tucows](http://fbl.hostedemail.com/ "OpenSRS/ Tucows")
-   [Comcast](http://feedback.comcast.net "Comcast")
-   [United
    Online](http://www.unitedonline.net/postmaster/whitelisted.html "United Online")

Google Mail: bietet keine feedback loop programs an Parteien, die
Massensendungen von E-Mails verschicken. Sie benutzen komplizierte
Filtertechniken, um festzustellen, was Spam ist und was nicht. Sie
bieten Google Mail-Benutzern die Möglichkeit nicht erwünschte E-Mailings
abzumelden, wenn der Absender eine list-unsubscribe header verwendet.
Copernica aktiviert automatisch die list-unsubscribe header für E-Mails,
die innerhalb der Anwendung erstellt wurde. Es sei denn, Sie
deaktivieren selbst die Funktion.

Behalten Sie Ihre Statistiken immer im Auge
-------------------------------------------

Copernica registriert alle Ihre E-Mailings auf Fehlermeldungen. Halten
Sie ein wachsames Auge auf diese Ergebnisse. Reagieren Sie sofort, wenn
Sie drastische Zunahmen von Fehlermeldungen bemerken. Im Folgenden sind
einige der Fehler im Copernica registriert:

*Mailing generieren*\
 Ein Fehler tritt ein, solange die Datei in Copernica Marketing Software
übersetzt wird. Dies kann durch einen Fehler in Ihrer Personalisierung
oder durch eine Eingabe, die nicht richtig hochgeladen wurde, ausgelöst
werden.

*Domain-Namen Karte zu IP-Adresse*\
 Der Domain des Empfängers (@ xxxx.xx) ist nicht richtig an eine
IP-Adresse verknüpft, so dass das Mailing nicht versendet werden kann.

*Verbindung zu empfangende Mail-Server*\
 Die Anwendungsserver können keine Verbindung mit dem Server des
Empfängers einrichten. Es kann sein, dass der Empfänger schlecht
konfiguriert wurde.

*Kommunikation mit empfangende Mail-Server*\
 Der Datenaustausch zwischen den Anwendungsservern und dem empfangenden
Server ist falsch abgelaufen. Ihre E-Mail wurde wahrscheinlich
zugestellt, aber der Verlauf verläuft nicht so, wie es sein sollte.

*Abgelehnt von empfangende Mail-Server*\
 Der empfangende Mail-Server hat Ihre Mailing abgelehnt. Dies kann die
Ursache für Spam-Filter von Greylisting sein. Greylisting lehnt alle
unbekannten Absender ab, wenn Sie ihre Mail 2 oder 3 Mal anbieten.

*Später erhaltenet Bounce per E-Mail*\
 Das Mailing schien gut verlaufen zu sein, aber der empfangende Server
hat einen Fehlerbericht zu einem späteren Zeitpunkt eingereicht. Es ist
ungewiss, ob die E-Mail zugestellt wurde oder nicht.

*Andere empfangene E-Mails*\
 Eine Antwort wurde von den Adressaten oder von den empfangenden
Mail-Servern gesendet, die aber keinen bekannten Fehlercode enthalten.
Dies könnte sich bei Abwesenheit im Büro hergeleitet sein.

*Andere Fehler*\
 Copernica Marketing Software konnte den Fehler nicht erkennen.
