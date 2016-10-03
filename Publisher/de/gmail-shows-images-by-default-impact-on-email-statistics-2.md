Vor kurzem habe ich in diesem Blog einen Artikel darüber geschrieben,
dass Google neuerdings seine Server als [Proxy zum Anzeigen von
Bildern](https://www.copernica.com/en/blog/gmail-shows-images-by-default-impact-on-email-statistics "Gmail shows images by default, impact on email statistics")
nutzt, und wie dies E-Mail-Statistiken beeinflusst. Zusammengefasst
bedeutet diese Neuerung, dass E-Mail-Marketer jetzt für Gmail-Benutzer
nur noch Unique Impressions sehen können, die Gesamtanzahl der
E-Mail-Öffnungen aber nicht mehr nachvollziehbar ist.

In den Kommentaren zum Artikel fragte jemand, ob dieses neue Vorgehen
auch die Geolocation-Statistiken beeinflusst. Kurz gesagt: Ja, das tut
es. Und wo wir schon beim Thema sind, sei auch noch angemerkt, dass
Gmail nicht für all seine Benutzer als Bilder-Proxy arbeitet.

Geolocation
-----------

Wenn Sie sich die Statistiken Ihrer E-Mails anschauen, finden Sie einen
Überblick über die Standorte, an denen Ihre E-Mails geöffnet werden. Um
diese Information anzeigen zu können, prüft Copernica, wo die Bilder
heruntergeladen wurden. Wenn zum Beispiel jemand in Miami eine E-Mail
öffnet, wird der Bundesstaat Florida grün markiert.

![Screenshot from Copernica
statistics](../images/copernica-gmail-en.png "Screenshot from Copernica statistics")

Wenn nun aber die Bilder von Googles Servern heruntergeladen werden,
wird in der Karte der Standort von Googles Proxy-Servern angezeigt.

Unten sehen Sie die Statistik für eine E-Mail, die zweimal vom selben
Rechner aus geöffnet wurde. Zunächst habe ich das Dokument an eine
@copernica.com-Adresse gesendet und es mit Outlook 2003 geöffnet. Dann
habe ich dieselbe E-Mail an eine @gmail.com-Adresse gesendet und sie mit
dem Gmail-Webmailer geöffnet.

![Click for larger version (opens in a new
window)](articlesblog/copernica-gmail-en2.png)

Wie Sie sehen können, zeigt die Statistik nun zwei verschiedene
Standorte an. Obwohl die E-Mail beide Male in Miami geöffnet wurde,
scheint es nun aufgrund von Googles Proxy-Server, als wäre sie auch
einmal im Silicon Valley aufgerufen worden.

Desktop Clients und mobile Apps (außer Gmail)
---------------------------------------------

Als Antwort auf meinen [vorherigen
Blog-Artikel](https://www.copernica.com/de/blog/gmail-zeigt-bilder-automatisch-an-auswirkungen-auf-die-e-mail-statistiken "Gmail zeigt Bilder automatisch an: Auswirkungen auf die E-Mail-Statistiken")
zu diesem Thema hat Tiuri de Jong von
[TriMM](https://www.copernica.com/en/partners/profile/7035472 "TriMM's partner profile")
außerdem angemerkt, dass der neue Umgang Googles mit Bildern in
eingehenden E-Mails nicht auf alle Gmail-Nutzer zutrifft.

"Soweit wir wissen, agiert Gmail nicht als Proxy, wenn der Empfänger die
E-Mail in einer Desktop-Anwendung öffnet oder dazu eine App nutzt, die
die Mail via POP oder IMAP abruft", ergänzt De Jong richtigerweise.

Oder, anders gesagt: Google wendet seine [neue
Vorgehensweise](https://www.copernica.com/de/blog/gmail-zeigt-bilder-automatisch-an-auswirkungen-auf-die-e-mail-statistiken "Gmail zeigt Bilder automatisch an: Auswirkungen auf die E-Mail-Statistiken")
nur auf die Benutzer an, die den Gmail-Webmailer oder die offizielle
Mobile App nutzen. Und in letzterem Fall trifft dies auch nur dann zu,
wenn der Empfänger seine App kürzlich aktualisiert hat und keine alte
Version nutzt.
