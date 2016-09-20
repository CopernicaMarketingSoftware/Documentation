Um sicherzustellen, dass jeder Benutzer in der Lage ist, die beste
Leistung der Copernica Marketing Software zu bekommen, haben wir eine
Fair Use Policy. Dies bedeutet, dass es Benutzern nicht erlaubt ist,
übermäßigen oder unnötigen Datenverkehr zu verursachen. Nach
wiederholten Verstößen gegen diese Policy behält Copernica sich das
Recht vor, den Zugriff auf das Konto des betreffenden Benutzers zu
sperren.

Durch übermäßigen Datenverkehr verursachen Benutzer eine unnötige
Datenlast auf unseren Servern. Das kann nicht nur zu einem Verlust von
Leistung für den Nutzer selber führen. Die Anwendungs-Performance sinkt
auch für andere Copernica Nutzer. Wir bitten Sie deshalb, unsere
Software verantwortungsvoll zu nutzen.

Um Ihnen bei der Einhaltung der Fair Use Policy zu helfen haben wir hier
einige Richtlinien zusammengefasst:

Backups und Kopien sind unnötig
-------------------------------

Copernica sichert alle ihre Datenbanken. Erstellen Sie keine
Datenbank-Backups und / oder Kopien in Ihrem Copernica Konto. Dies führt
zu unnötigen doppelten Datenspeicherungen.

Entfernen Sie unnötige Daten
----------------------------

Um die Leistung des eigenen Kontos zu verbessern und die Last von
unseren Servern zu nehmen bitten wir Sie keine unnötigen Informationen
in Ihrem Konto zu speichern. Eine regelmäßige Pflege Ihrer Datenbank
trägt zur Performanz des Systems bei. Ein paar Tipps:

-   Entfernen sie Auswahlen, die Sie nicht verwenden (Sie haben immer
    die Möglichkeit Auswahlen zu erstellen. Durch das Entfernen einer
    Auswahl wird kein Datenbank-Detail gelöscht.)
-   Entfernen Sie doppelte Datenbanken
-   Entfernen Sie Datenbanken, die nicht mehr verwendet werden
-   Entfernen veraltete Informationen aus Ihren Datenbanken

Führen Sie keine unnötigen Exporte durch
----------------------------------------

Exportieren Sie nur Daten, wenn es wirklich notwendig ist. Zum Beispiel
ist ein täglicher Export nicht sinnvoll, wenn die Datenbank nur einmal
in der Woche ein Update bekommt.

Große Datenimporte und Exporte sollten möglichst außerhalb der normalen
Bürozeiten stattfinden.

Verbessern Sie Ihre Importe
---------------------------

Wenn Sie Daten importieren, ist es nicht notwendig, die gesamte
Datenbank zu überschreiben. Sie können auch einfach die Felder
aktualisieren, die verändert und / oder hinzugefügt wurden:

-   In Copernica auf „Profile“ gehen
-   Unter "Aktuelle Ansicht" die Option „Daten importieren/exportieren
    …“
-   Wählen Sie „Importieren“
-   Wählen Sie ihre Import-Datei aus und klicken auf „Importieren“
-   Klicken Sie auf die Registerkarte „Einstellungen"
-   Im Feld „Typ“ wählen Sie die Option „nach Übereinstimmungen
    basierend auf den Schlüsselfeldern suchen“
-   Im Feld „Übereinstimmungen“ „übereinstimmende (Unter)Profile
    aktualisieren“ auswählen
-   Im Feld „Keine Übereinstimmungen“ „fehlende (Unter)Profile
    erstellen“ auswählen
-   Den Import starten

Eine noch einfachere Methode für die automatische Synchronisierung wird
durch die Verwendung unserer [SOAP
API](http://www.copernica.com/de/support/soap-api-dokumentation)
geboten.

Wir bitten Sie, große Im-und Exporte außerhalb der Bürozeiten
einzuplanen.

Auswahl auf der Basis von ungültigen E-Mail-Adressen
----------------------------------------------------

Für die
[Zustellbarkeit](http://www.copernica.com/de/uber-uns/news/e-mailings-bessere-zustellbarkeit-mit-copernica)
ihrer Mails ist es wichtig, ungültige E-Mail-Adressen aus Ihrer
E-Mail-Liste auszuschließen.

Sie können dies tun, indem Sie ein Auswahlkriterium erstellen, das
überprüft ob eine E-Mail-Adresse in der Vergangenheit zu einem Bounce
geführt hat. Dies ist jedoch nicht der optimale Weg um ungültige
E-Mail-Adressen zu erfassen.

Sie erreichen das gleiche Ziel durch die Einrichtung einer
Follow-Up-Maßnahme, die weniger Leistung vom System fordert.

Mit einer Follow-Up-Maßnahme in einem Dokument sind Sie in der Lage
automatisch ein Wert zu einem Datenbank-Feld in einem Profil
hinzuzufügen, wenn ein Bounce auftritt.

Somit können Sie eine Auswahl treffen, in der Sie Profile, die einen
bestimmten Wert in einer Datenbank Feld haben, auszuschließen. Eine
Auswahl mit einem Follow-Up Wert bewirkt weniger Last als eine Auswahl,
die auf Ergebnissen von E-Mailings in die Vergangenheit basiert.

[Erfahren Sie mehr über
Follow-Up-Maßnahmen.](http://www.copernica.com/de/about-us/news/follow-up-actions-the-key-to-success)

Eine Auswahl weiter beschränken
-------------------------------

Angenommen, Sie haben eine Datenbank mit Menschen, die ein
Zeitungs-Abonnement haben. In dieser Datenbank erstellt Sie eine
Auswahl, die alle Kunden enthält, die seit einem halben Jahr ein
Abonnement haben. Ein nun wollen Sie Kunden, deren Halbjahres-Abonnement
ausläuft, eine Erinnerung senden.

### Der falsche Weg

Sie könnten dies tun, indem Sie eine Unterauswahl unter der Auswahl
„Halbjahres-Abonnements“ mit dem zusätzlichen Kriterium „Jeder, dessen
Abonnement-Starttermin vor fünf Monaten war“ erstellen.

Dies ist jedoch eine Methode, die nicht empfohlen wird. Um eine E-Mail
an diese Profile zu senden, muss die Software zwei Auswahlen
aktualisieren:

-   Auswahl mit Profilen mit einem Halbjahres-Abonnement
-   Auswahl mit Profilen, deren Abonnement vor fünf Monaten begann

### Der richtige Weg

Ein effizienter Weg, um eine solche Auswahl zu erstellen, ist durch das
Hinzufügen von zwei Kriterien zu einer Auswahl:

-   Profile auf dem die Datenbank Feld „Halbjahres-Abonnement" auf „Ja"
    gesetzt ist
-   Profile, deren Abonnement vor fünf Monaten begann

Da in diesem Beispiel keine Unterauswahl verwendet wird muss nur eine
Auswahl aktualisiert werden.

Felder indexieren
-----------------

Bitte stellen Sie sicher, dass alle Felder, die Sie in einer Auswahl
nutzen, indiziert werden. Durch die Indizierung Ihrer Felder wird der
Suchprozess in Ihrer Datenbank beschleunigt. Die Auswahl ist schneller
auf dem neusten Stand. Zudem schafft dies weniger Last auf unseren
Servern.

Sie können Datenbank-Felder wie folgt indizieren lassen:

-   Melden Sie sich bei Copernica an und gehen Sie auf „Profile“
-   Wählen Sie die gewünschte Datenbank, in der Felder indiziert werden
    sollen
-   Klicken Sie auf „Datenbankmanagement " und dann auf „Datenbankfelder
    bearbeiten …“
-   Wählen Sie das Feld, was indiziert werden soll
-   Aktivieren Sie die „Dieses Feld ist indiziert" Box
-   Klicken Sie auf „Speichern“

Bitte beachten Sie: Sie können nicht mehr als 64 Felder indizieren. Eine
Indizierung von Feldern, die große Mengen von Zeichen enthalten
(Textfelder), ist nicht möglich.

[Erfahren Sie mehr über
Datenbank-Felder](http://www.copernica.com/de/funktionen/profile/erstellen-sie-ihre-eigene-datenbank)

Langsame Statistik?
-------------------

Schicken Sie regelmäßig große E-Mailings und haben bemerkt, dass es
länger dauert, bis Ihre Statistiken verfügbar sind? [Bitte kontaktieren
Sie unsere
Support-Abteilung](http://www.copernica.com/de/support/telefon-helpdesk).
Sie werden von uns gerne bei der Datenbank-Optimierung unterstützt.
