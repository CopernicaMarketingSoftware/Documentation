![responsive design: email for
mobile](../images/email-marketing-mobile.jpg "responsive design: email for mobile")In
den letzten drei Jahren hat die Nutzung von Smartphones stark
zugenommen. Aus diesem Grund sollten E-Mail-Marketer besondere
Aufmerksamkeit auf die Optimierung ihrer [E-Mails für den mobilen
Einsatz](http://www.copernica.com/de/uber-uns/news/html-newsletter-format-fur-den-mobilen-einsatz)
und auch auf die Überwachung der Smartphone-Nutzung innerhalb der
Zielgruppe(n) legen. Aber die Statistiken sprechen für sich: Immer mehr
Menschen haben ein oder mehrere mobile Geräte, die sie verwenden, um
online zu gehen und ihre E-Mails zu öffnen.

Ein Auszug aus diesen Statistiken:

-   Bereits 44% der Deutschen besitzen ein Smartphone. – *[Internet
    World](http://www.internetworld.de/Nachrichten/Mobile/Zahlen-Studien/BVDW-Untersuchung-Internetnutzung-via-Smartphone-Mobile-steht-bei-den-Deutschen-hoch-im-Kurs-71522.html)*
    (November 2012)
-   Menschen lesen aktuell  E-Mails eher auf einem mobilen Gerät
    anstelle über ein Desktop-basiertes E-Mail-Programm oder über
    Webmail. Untersuchungen zufolge sind 38% aller E-Mails auf einem
    mobilen Gerät geöffnet, 33% auf einem Desktop-und 29% in Webmail. –
     *[Litmus](http://litmus.com/blog/mobile-email-opens-increase-123-in-18-months)
    (Oktober 2012)*
-   In der Altersgruppe von 18 bis 24 Jahren ist die webbasierte
    E-Mail-Nutzung in den USA um 34% zurückgegangen, während sich die
    Nutzung der mobilbasierten Version um 32% erhöht hat. –
    *[Comscore](http://www.comscore.com/Insights/Presentations_and_Whitepapers/2012/2012_US_Digital_Future_in_Focus)
    (Februar 2012)*

Es gibt noch eine zu geringe Zahl von Organisationen, die die zunehmende
Nutzung von mobilen Geräten ernst nehmen. E-Mails und Websites sind vor
allem für den Desktop-Einsatz optimiert. Und wenn sie dies tun,
vergessen sie das Design für die mobile Version zu optimieren. Durch die
Anwendung von Responsive Design, können Sie dieses Problem lösen und
bereiten Ihre Webseiten und E-Mails für den mobilen Einsatz vor.

Was ist Responsive Design?
--------------------------

Responsive Design ist eine Design-Technik in welcher ein spezieller
CSS3-Code namens „Media Queries” genutzt wird. Mit diesen
Medienabfragen, können Sie leicht feststellen, welcher Stil angewendet
wird, wenn Sie Ihre E-Mail-oder Website auf einem digitalen Gerät wie
ein Smartphone geöffnet wird.

` <style type="text/css">   @media only screen and (max-device-width: 480px) { /* mobile-specific CSS styles go here */ }   /* regular CSS styles go here */ </style> `

In diesem Media Query werden die Variablen, die Sie in Ihrem Code
formulieren, überprüft. In diesem Fall wird geprüft, ob Ihre E-Mail auf
einem Bildschirm geöffnet ist und die Breite des Bildschirms größer oder
kleiner als 480px ist. Wenn die Breite kleiner als 480px ist, wird der
CSS-Code für den mobilen Bildschirm verwendet werden. Wenn die Breite
größer ist als 480px wird der normale CSS-Code verwendet.

Im Grunde bedeutet Responsive Design, dass  Inhalt und Layout Ihrer
E-Mail auf Variablen wie die Größe Ihres Bildschirms, Auflösung und
Orientierung des Bildschirms (Hoch-oder Querformat) eingestellt sind.
Dadurch werden beide Benutzergruppen, diejenigen die Ihre E-Mails via
Computer und diejenigen die Ihre E-Mail auf ihrem mobilen Gerät lesen,
bessere Erfahrungen machen. 

Unterschied zwischen Responsive & Fluid Design
----------------------------------------------

Wenn Sie im Bereich E-Mail-Marketing schon länger tätig sind und auch
schon E-Mails designed haben (Templates) wissen Sie, dass es eine große
Tendenz zur Verwendung von Fluid Design bei der Optimierung von E-Mails
für unterschiedliche Geräte gibt. Dann verstehen Sie wahrscheinlich, was
der Unterschied zwischen Fluid und Responsive  Design.

Der wichtigste Unterschied besteht darin, dass im Fluid Design
Prozentangaben verwendet werden. Diese werden verwendet, um den Inhalt
proportional für unterschiedliche Bildschirmgrößen anzupassen. Ein
Beispiel: Breite = „90%“.

Responsive Design verwendet die CSS Media Queries, um den Inhalt und das
Layout auf Bildschirmgröße basiert anzupassen (oder die Art von
Bildschirm, Orientierung, ...). Das heißt, Sie haben viel mehr Kontrolle
über Ihr Layout, im Vergleich zum Fluid Design.

Wie wende ich Responsive Design an?
-----------------------------------

Um eine noch bessere Idee davon zu bekommen, wie Responsive Design
funktioniert, ist es am besten, ein Beispiel zu formulieren.

*Lassen Sie den Content den gesamten Bildschirm füllen*

Sie werden oft hören, dass Sie den Entwurf einer E-Mail so einfach wie
möglich zu halten. Es wird empfohlen, dass Sie eine Spalte in der
Gestaltung Ihrer E-Mails benutzen. Dabei ist es wichtig,
sicherzustellen, dass der Inhalt den gesamten Bildschirm füllt. Das
ermöglicht die E-Mail in einem sauberen und anständigen Look. In diesem
Fall könnte Ihr HTML-Code so aussehen:

` <table cellpadding="0" cellspacing="0" border="0" id="mainContent">    <tr>     <td><img src="header.jpg" alt="" class="bodyImage" /></td>    </tr>    <tr>      <td class="bodyContent">Message</td>    </tr> </table> `

Die Klassen, die Sie zu jeder Tabellenzelle zu ernennen sind auch in
Ihrem Media Query zu finden. Die Klassen mainContent, bodyImage und
bodyContent stellen sicher, dass Ihre Inhalte die gesamte Breite des
Bildschirms ausfüllen. Ihr Media Query wird wie folgt aussehen:

` @media only screen and (max-width: 540px) { table[id=mainContent] { max-width: 600px !important; width: 100% !important; } } `
` @media only screen and (max-width: 540px) { img[class=bodyImage] { height:auto !important; max-width: 600px !important; width: 100% !important; } } `\
\
`@media only screen and (max-width: 540px) { td[class=bodyContent] { font-size: 14px !important; line-height: 125% !important; padding-right: 10px; padding-left: 10px; padding-top: 0 !important; } } `\
\

Wann nutze ich Responsive Design?
---------------------------------

![wie leest e-mail op
mobile?](../images/Hands_using_mobiles.png "wie leest e-mail op mobile?")Bevor
Sie zu viel Zeit und Mühe in die Optimierung Ihrer E-Mails (und
Websites) stecken, ist es am besten zu wissen, für wen Sie das tun.
Liest Ihre Zielgruppe E-Mails auf dem Smartphone oder Tablet? Deshalb
ist es von entscheidender Bedeutung ist, dass Sie zuerst Ihre Datenbank
analysieren und Sie die Meldungen Ihrer E-Mail-Kampagnen überprüfen, um
zu sehen, ob der Einsatz von Responsive Design erforderlich ist.

Sie könnten Ihre Empfänger fragen, ob Sie eine mobile Version Ihrer
E-Mail wünschen, in dem Sie ein Webformular benutzen, sie in Ihrem
Newsletter danach fragen oder direkt wenn sie sich für Ihren Newsletter
anmelden.
