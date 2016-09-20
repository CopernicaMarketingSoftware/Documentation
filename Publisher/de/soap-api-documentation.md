Außer unseren bestehenden
[Integrationen](./integrations.md) für
verschiedene Systeme durch unsere flexible SOAP API haben Sie die
Möglichkeit, Integrationen für Ihre eigene Software zu erstellen.
Synchronisieren Sie alle Daten aus Copernica mit den Daten aus Ihrer
Software, um all Ihre Informationen und Marketingkampagnen up to date zu
halten.

SOAP API von Copernica
----------------------

Die Copernica-API verwendet den SOAP-Standard. Hierdurch integrieren Sie
die API einfach in Entwicklungsumgebungen wie Java, Netbeans und
Microsoft Visual Studio. Durch die Verwendung des SOAP-Standards, können
Programmierer schnell mit der API beginnen, welche aus jeder üblichen
Programmiersprache und Entwicklungsumgebung abrufbar ist.

Die Dokumentation zur SOAP API ist z. Zt. nur für Benutzer der Copernica
Marketing Software verfügbar. Um die Dokumentation aufzurufen, melden
Sie sich bitte in der Software an, anschließend klicken Sie rechts oben
auf das Menü 'Willkommen Name' und dann auf 'Online-Dokumentation'. Im
Index finden Sie das Kapitel 'POM SOAP API'.

[Download SOAP API Beispieltext für
PHP](soap-1-5.zip "SOAP API Beispieltext für PHP")

[Download SOAP API Beispieltext für
Java](Copernicacom/soaptest_java.zip "SOAP API Beispieltext für Java")

[Download SOAP API Beispieltext für
C\#](Copernicacom/soaptest_cs.zip "SOAP API Beispieltext für C#")

Totale Kontrolle dank Copernica-Objektmodell
--------------------------------------------

Die Copernica-API benutzt ein logisches und strukturiertes Objektmodell.
Alle Daten in der Software werden durch Objekte dargestellt. Lesen Sie
die Eigenschaften dieser Objekte aus mithilfe der SOAP-API und ergänzen
Sie diese. Die Methoden sind auch abrufbar. Jedes Objekt besteht aus
kleineren Unterobjekten. So ist ein Objekt, das eine
[Datenbank](./creating-your-own-databases.md "Datenbank")
darstellt, zum Beispiel konstruiert aus Objekten, die die Profile
darstellen. Ein Objekt, welches eine
[Vorlage](./create-custom-templates.md "Vorlage")
umfasst, hat eine Methode womit Sie alle Dokumente abrufen, die auf der
Grundlage dieser Vorlage erstellt werden.

Benutzen Sie Funktionalitäten von Copernica in den Applikation
--------------------------------------------------------------

Die Stärke der API ist, dass alle Aktionen, die mit der Copernica
Benutzer-Interface ausgeführt werden, auch über die SOAP API anzuwenden
sind innerhalb einer eigenen Applikation. Richten Sie mit der API
beispielsweise Datenbanken ein, erstellen Sie Beziehungsprofile oder
stellen Sie Vorlagen und E-Mail Dokumente zusammen.

Erneutes Callback-System
------------------------

Durch das Synchronisieren von Daten zwischen Copernica und der externe
Applikation, brauchen Sie nicht ständig manuell neue Daten in Copernica
zu [importieren](./import-and-export-data.md "Importieren von Daten")
und umgekehrt. Beide Systeme werden automatisch synchron ausgeführt.
Stellen Sie mit Copernica ganz einfach Callback URLs ein. Hierdurch hält
Copernica die externe Applikation ständig auf dem Laufenden über
Datenbankänderungen oder Beziehungsprofile.
