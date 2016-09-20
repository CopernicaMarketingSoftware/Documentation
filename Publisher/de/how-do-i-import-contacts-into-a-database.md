Mit Copernica können Sie ganz einfach ein Dokument mit Konaktdaten (oder
anderen Inhalten) zu einer Datenbank  hinzufügen. Ebenso ist es möglich
einzustellen, bereits vorhandene Daten zu importieren (Synchronisation).

1. Bereiten Sie eine Import-Datei vor
-------------------------------------

Die Import-Datei befindet sich auf Ihrem Computer oder ist online
verfügbar (FTP). 

### **Welche Konditionen treffen auf eine gute Import-Datei zu?**

Die Import-Datei enthält alle Dateien, die Sie importieren möchten. Eine
korrekt formatierte Import-Datei kann mithilfe von beispielsweise Excel
erstellt werden und benötigt die folgenden Anforderungen:

-   Die Datei hat eine oder mehrere Reihen. Eine Reihe beinhaltete
    verschiedene Daten über einen Kontakt (Profil), unterteilt in
    verschiedene Felder.
-   Die Datei hat eine oder mehrere Spalten. Jede Spalte enthält die
    gleiche Art von Informationen über die Gesamtheit der Kontakte. Ein
    Beispiel: E-Mail-Adressen.
-   Die erste Reihe beinhaltet den Namen jeder Spalte. Diese müssen
    nicht unbedingt mit den Namen der Datenbankfelder in Ihrer Datenbank
    übereinstimmen. Sie können miteinander verbunden werden, wenn Sie
    Ihren Import einrichten. Die Spalte, die die E-Mail-Adressen
    beinhaltet, heißt zum Beispiel „E-Mail”.
-   Die Datei, die Sie benutzen ist eine durch Komma, Semikolon oder
    Tabtaste getrennte .txt oder.csv-Datei.

2. Eine Import-Datei hochladen
------------------------------

![Eine Import-Datei
hochladen](Copernicacom/de-import-database.png "Eine Import-Datei hochladen")

Wählen Sie die Datenbank zu der Sie ihre Datei hinzufügen möchten.
Wählen Sie dann „Import/Export Datei…” in dem „Aktuelle Ansicht“-Menü.

Suchen Sie die Datei auf Ihrem Computer aus oder wählen Sie den
Online-Speicherort der Datei aus. Wählen Sie das Trennzeichen, welches
in Ihrer Importdatei verwendet wird. 

\
 \

3. Verknüpfen Sie Spalten mit Datenbankfeldern
----------------------------------------------

Wenn die Datei erfolgreich hochgeladen wurde, erscheint automatisch ein
Dialog. Dieser Dialog hat 4 Tabs. Für einen Import, welcher nur neue
Profile erstellt, ist nur der erste Tab *Spalten* wichtig. Hier
verbinden Sie die Spalten aus Ihrer Import-Datei mit den
Datenbankfeldern. 

-   Die Namen der Spalten, die mit Feldnamen in der Datenbank
    übereinstimmen, werden automatisch verknüpft
-   Daten aus Spalten, die nicht miteinander verbunden sind, werden
    nicht importiert
-   Um eine Spalte, die nicht richtig verbunden ist aufzuheben, drücken
    Sie einfach **unlink**

![ Linking columns to database
fields](Copernicacom/link-fields.png " Linking columns to database fields")
\
\

Fehlende Datenbankfelder können direkt durch einen Klick auf „Feld
suchen oder erstellen“ angefertigt werden. Ein Datenbankfeld ist eine
Art standardmäßiges Textfeld. Wählen Sie **Eigenschaften**, um die
richtigen Einstellungen in das Datenbankfeld, das erstellt werden muss,
hinzuzufügen. Stellen Sie zum Beispiel ein, dass das das Feld nur
numerische Werte feststellen kann. Die Einstellungen der Datenbankfelder
können auch zu einem späteren Zeitpunkt über das Menü „Database
Management“ geändert werden.

In einem **Textfeld** können Sie alle Arten von Werten wie zum Beispiel
alphanumerische Daten, chinesische Symbole und mathematische Formeln
speichern.

**Achtung:** **M****it diesem Tutorial werden Sie immer neue Profile
erstellen. Wenn Sie vorhandene Daten aus Ihrer Datenbank mit Daten aus
Ihrer Importdatei anpassen möchten, müssen Sie Schlüsselfelder und
einige andere zusätzliche Einstellungen dazu verwenden.**
