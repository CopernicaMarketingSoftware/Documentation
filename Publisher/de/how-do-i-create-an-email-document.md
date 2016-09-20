Ein E-Mail-Dokument wird immer mit Hilfe einer HTML-Vorlage erzeugt. In
dieser Vorlage bestimmen Sie das Layout und die Struktur der E-Mail. Der
tatsächliche Inhalt des Dokuments wird zu einem späteren Stadium
hinzugefügt. Mit speziellen Tags in der Vorlage des Quellcodes können
Sie festlegen, wo der Inhalt des Dokuments angezeigt wird. 

Vorlagen können auf diese Weise immer und immer wieder verwendet
werden. 

### Bestimmen Sie die Struktur des Dokuments mit speziellen Content-Tags

**Text-Baustein**: So können Sie definieren, wo Text- oder HTML-Inhalte
in einer Dokument-Ebene hinzugefügt werden sollen.

`[text name=article content]`

**Image-Baustein**: Dieser legt fest, wo Bilder auf einer Dokument-Ebene
eingefügt werden.

`[image name=article_image]`

**Loop-Baustein**: Die verschiedenen Punkte in einem HTML-Dokument, in
denen Textblöcke und Bildblöcke wiederholt werden können, werden als
Loop-Blöcke bezeichnet.

`[loop name=article] All HTML, text and image blocks within this loop will be iterated in the document [/loop]`

Dann können Sie festlegen, wie oft ein Loop-Baustein sich in dem
Dokument wiederholen muss. Jede Wiederholung kann mit einzigartigen
Inhalten gefüllt werden. 

Erstellen Sie ein Dokument mit einer Copernica-Vorlage
------------------------------------------------------

In Copernica finden Sie eine Beispiel-E-Mail-Vorlage. Diese ist recht
einfach gestaltet (gemeinsam mit unserem Partner-Netzwerk  arbeiten wir
an einer ganz neuen Reihe von Beispiel-E-Mail-Vorlagen), verschafft
Ihnen aber einen guten Überblick, mit Vorlagen und Dokumenten zu
arbeiten.

Laden Sie eine Beispiel-Vorlage oder ein Dokument hoch
------------------------------------------------------

Um das Dokument hochzuladen, klicken Sie auf „E-Mailings“ gehen. Falls
dort noch keine Beispiel-E-Mail-Vorlage zur Verfügung steht, wählen Sie
das „Vorlagen“-Menü aus und wählen Sie dort „Neue Vorlage“.

Bestimmen Sie einen Namen für Ihre Vorlage und wählen Sie unter Optionen
„Vorlage mit Beispiel-Codes füllen“. Klicken Sie um zu speichern.

Die neu erstellte Vorlage wird sofort angezeigt. Klicken Sie auf das
kleine Plus-Zeichen in der linken Seitenleiste und dann auf das Dokument
(Beispiel).

Jetzt haben Sie Ihre eigene Vorlage und Ihr Dokument!

Bearbeiten Sie den Inhalt des Dokuments
---------------------------------------

Sie können ein Dokument in Vorschau-Modus und Bearbeiten-Modus anzeigen
lassen. Um den Inhalt des Dokuments zu bearbeiten, klicken Sie auf
**Edit-Modus** (an der Unterseite des Dokuments). Die Teile/ Blöcke, die
Sie in dem Dokument bearbeiten können, werden nun hervorgehoben und
können jetzt angeklickt werden. Klicken Sie auf einen der Blöcke, um mit
der Bearbeitung ihres Inhalts zu beginnen.

Wie Sie im Beispiel-Dokument sehen können, gibt es **Text-**,
**Bild**und**Loop-Bausteine**. Sie können jederzeit ein zweites Dokument
auf Basis dieser Vorlage erstellen. Wählen Sie dazu "Neues Dokument" im
Dokument-Menü. Ein neues Dokument wird dann basierend auf der gleichen
Vorlage erstellt. Es gibt keine Begrenzung für die Anzahl der Vorlagen
und Dokumente, die Sie in der Software verwalten und erstellen können.
Es fallen keine zusätzlichen Kosten an.

Ändern Sie Absenderdaten und Thema des Dokuments
------------------------------------------------

Jedes Dokument, das Sie mit der Software senden, hat einen **Absender**
und einen **Betreff**. Diese können **direkt über das geöffnete
Dokument** gesetzt werden. Bewegen Sie die Maus über den grauen Bereich,
um die **Absender-Adresse**, den Namen des Absenders und das Thema zu
bearbeiten. Sobald Sie dies getan haben, und Sie haben bereits einen
Test-Ziel in Ihrer Datenbank eingestellt, können Sie Ihre erste
Test-Mail senden.

Senden Sie Test-Mails an eine einzelne Adresse
----------------------------------------------

Um eine Test-Mail zu senden, benötigen Sie eine Datenbank mit einem
Profil, das als Test-Ziel ernannt worden ist. Die Informationen aus dem
Test-Ziel werden verwendet, um Ihre Personalisierung zu testen und als
Ziel für Ihre Test-Mailings genutzt. Erstellen Sie ein Profil mit Ihren
eigenen Daten und nutzen diese als Test-Ziel.

*Um das Test-Ziel auszuwählen, müssen Sie auf „Profile“ klicken und dann
auf „Test-Ziel“ (unten links auf dem Bildschirm).*

Öffnen Sie das Dokument, das gesendet werden soll und wählen Sie dann
„Test-Mailing…“ im „Mailing“-Menü aus. Der Dialog enthält viele
Optionen, die für Sie momentan noch nicht von Bedeutung sind. Überprüfen
Sie, ob die ausgewählte E-Mail-Adresse Ihre eigene ist und drücken Sie
dann auf „Senden“, um die Test-Mail zu senden.

Senden Sie die Test-Mail an verschiedene Empfänger
--------------------------------------------------

Um eine Test-Mail an mehrere Empfänger zur gleichen Zeit zu senden,
müssen Sie eine Auswahl in Ihrer Datenbank anlegen in welcher alle
Test-Adressen enthalten sind. Erstellen Sie zuerst ein
Extra-Datenbankfeld und nennen Sie dieses **Test-Adressen**. Dies macht
es einfacher, die Empfänger für die Test-Mail auszuwählen. Fügen Sie den
Wert **ja** zu jedem Testprofil hinzu. Erstellen Sie die Auswahl (mit
der Bedingung, dass der Wert im Feld *Test*-*Adresse* **ja** sein muss).
Senden Sie Ihr Test-Mailing an Ihre Auswahl (mehrere Empfänger). 
