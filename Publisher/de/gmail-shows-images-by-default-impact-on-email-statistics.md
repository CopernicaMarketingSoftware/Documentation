Beim Überprüfen ihrer Statistiken wird einigen Copernica-Benutzern ein
Rückgang der Impressions für Gmail-Empfänger aufgefallen sein.
Gleichzeitig haben sie vermutlich festgestellt, dass die Anzahl der
Unique Impressions (in der Statistik zu finden unter "Einmalig") bei
diesen Empfängern gestiegen ist. Der Grund hierfür ist die neue
Vorgehensweise seitens Google, bei eingehenden E-Mails nun ihre eigenen
Server als Proxy-Server zum Anzeigen der Bilder zu nutzen.

Seit kurzem schreibt Google die URLs der Bilder in eingehenden Mails um.
Direkt beim Eingang bei Gmail werden alle Bilder in den E-Mails
heruntergeladen, gecacht und dann von Googles Servern geladen.

Zusammengefasst bedeutet das:

-   Sie können für E-Mails an Gmail-Empfänger ab sofort nur noch Unique
    Impressions messen.
-   Gmail lädt die Bilder standardmäßig direkt beim Aufruf einer E-Mail.
-   Copernica kann Ihnen jetzt ein zuverlässigeres Bild davon liefern,
    wie häufig eine an Gmail gelieferte E-Mail geöffnet wird.

Wie misst Copernica Impressions?
--------------------------------

Wenn ein Empfänger eine E-Mail öffnet, werden die in der E-Mail
enthaltenen Bilder von Copernicas Bilderservern heruntergeladen. Wenn
ein solcher Download geschieht, nennen wir das eine Impression.

Die Angabe der Impressions kann Ihnen eine grobe Vorstellung davon
liefern, wie häufig eine E-Mail geöffnet wird. Da nicht alle Benutzer
sich in ihren E-Mails die Bilder anzeigen lassen, ist dies allerdings
keine exakte Angabe.

![Ein Empfänger öffnet seine E-Mail und gibt die Erlaubnis, Bilder
herunterzuladen](Copernica_cases/afbeeldingen-email-copernica.png "Ein Empfänger öffnet seine E-Mail und gibt die Erlaubnis, Bilder herunterzuladen")

Auch wenn Sie keine Bilder in Ihre E-Mails integrieren, fügt Copernica
eine unsichtbare [1x1
pixel.gif](https://www.copernica.com/en/support/what-is-pixel-gif "Was ist ein Pixel.gif?")
ein, um die Impressions messen zu können. (Selbstverständlich gilt dies
nicht für HTML-freie [Textversionen von
E-Mails](https://www.copernica.com/en/support/add-email-text-version "Sending email text versions").)

Was hat sich in Bezug auf Gmail-Adressen geändert?
--------------------------------------------------

Damit wir feststellen können, ob ein Bild heruntergeladen wurde, muss es
von unseren Bilderservern abgerufen werden. Natürlich ist es nicht
möglich, nachzuvollziehen, wie häufig ein Bild von einem fremden Server
abgerufen wurde.

Was Gmail nun aber tut, ist folgendes:

-   Das Bild herunterladen.
-   Es im eigenen Cache speichern.
-   Die gecachte Version an seine Benutzer ausliefern.

![Ein Empfänger öffnet eine E-Mail und lädt die Bilder über den Gmail
Server](Copernica_cases/afbeeldingen-email-copernica-google.png "Ein Empfänger öffnet eine E-Mail und lädt die Bilder über den Gmail Server")

Seinem
[blog](http://gmailblog.blogspot.nl/2013/12/images-now-showing.html)
zufolge tut Gmail dies, um seine Benutzer vor unbekannten Absendern zu
schützen, die versuchen könnten, über Bilder schädliche Dateien auf den
Rechner oder das Mobilgerät des Benutzers zu bringen.

Bedeutet das, ich kann für Gmail keine Impressions mehr messen?
---------------------------------------------------------------

Nein, keine Sorge. Wenn ein Gmail-Nutzer eine E-Mail öffnet, werden
immer noch Bilder von unseren Webservern heruntergeladen. Die Tatsache,
dass dies nun zuerst über Google geschieht, spielt beim Messen der
Unique Impressions keine Rolle.

Für E-Mail-Marketer hat dies dennoch einige Konsequenzen. Statt bei
jedem Öffnen der E-Mail die enthaltenen Bilder abzurufen, liefert Google
beim wiederholten Öffnen einer E-Mail die auf den eigenen Servern
gecachte Version aus. Deshalb können nun nur noch Unique Impressions
gemessen werden.

Hat die neue Gmail-Vorgehensweise auch Vorteile?
------------------------------------------------

Ja, hat sie. Vor dieser Anpassung der Vorgehensweise mussten
Gmail-Benutzer bewusst das Anzeigen der Bilder zulassen. Und jedes Mal,
wenn jemand eine E-Mail geöffnet hat, ohne dabei die Bilder zu laden,
ließ sich dies nicht als Impression messen.

Da Gmail sich nun wie ein Proxy-Server verhält, werden Bilder beim
Öffnen einer E-Mail automatisch angezeigt. Und während das an sich schon
eine gute Nachricht ist, bedeutet es auch, dass Copernica dadurch die
Anzahl der Unique Impressions einer E-Mail genauer als bisher bestimmen
kann.

Die Gesamtanzahl meiner Impressions für Gmail ist immer noch höher als die Anzahl der Unique Impressions. Wie kann das sein?
----------------------------------------------------------------------------------------------------------------------------

Offenbar sind nur die E-Mails von der Änderung betroffen, die nach der
Einführung der neuen Gmail-Vorgehensweise empfangen wurden. Für ältere
E-Mails können Sie immer noch einen Unterschied zwischen der
Gesamtanzahl der Impressions und den Unique Impressions feststellen.

Außerdem ist noch nicht bekannt, wie lange Gmail die Bilder aus E-Mails
auf seinen Servern speichert. Es kann aber wohl davon ausgegangen
werden, dass sie sie nicht unbegrenzt speichern werden, da dies selbst
für Google-Standards sehr hohe Datenmengen mit sich bringen würde. Wenn
also zwischen zwei Öffnungen einer E-Mail ein entsprechend langer
Zeitraum liegt, wird vermutlich wieder eine neue Impression zu messen
sein.
