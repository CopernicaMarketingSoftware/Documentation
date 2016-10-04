"Wird unsere E-Mail auch auf dem iPhone gut aussehen?". Eine - vor allem
in letzter Zeit - wahrscheinlich sehr häufig gestellte Frage. Wir wollen
jetzt ein Template programmieren, dass auf iPhone, Android und Windows8
phone gut aussieht.

Bevor es losgeht...
-------------------

Ich gehe davon aus, dass Sie die nötigen Grundlagen für das Entwickeln
von HTML-Mails haben. Deswegen werde ich nicht bis ins kleinste Detail
gehen, sondern bestimmte Sachen einfach voraussetzen.

Endprodukt
----------

Wir werden eine E-Mail erstellen, die sowohl am Rechner als auch mobile
hervorragend aussehen wird (s.u.).

![Responsive email design by
Copernica](../images/responsive-email-copernica-screenshot.jpg)\
 [Download the source
files](../downloads/responsive-email-copernica-source.zip "Download the source files")

Die Basics
----------

Jedes HTML-Dokument startet mit DOCTYPE, gefolgt vom Headbereich, vom
Bodybereich und so weiter. Erstellen Sie ein neues HTML-Dokument mit dem
folgenden Code:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Responsive email</title>
            <style type="text/css">
                body{margin: 0; font-family: arial, sans-serif;}
            </style>
        </head>
        <body>
            <table border="1" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td>
                        Hello Mars!
                    </td>
                </tr>
            </table>
        </body>
    </html>
~~~~

Nichts ungewöhnliches, wie Sie sehen können – abgesehen von dem Viewport
Meta Tag. Dieser Tag erklärt dem Client, dass die E-Mail genau so breit
ist, wie die Breite des Bildschirms des Geräts. Ich benutze hier einen
Table als Container, der die komplette Breite abdeckt. Dieser
„Container“ kann ebenfalls dazu genutzt werden, um z.B. eine
Hintergrundfarbe einzurichten (Stylings im Bodytag werden von manchen
Clients ignoriert).\
\
**Hinweis:**\
Bitte denken Sie daran cellspacing und cellpadding gleich null zu
setzen, um komisches Spacing in Outlook zu verhindern. Zu
Anschauungszwecken habe ich den Border gleich eins gesetzt, damit Sie
den Verlauf verfolgen können.\
\
Ihre HTML-Seite sollte jetzt so aussehen:

![Responsive email document:
header](../images/responsive-email-copernica-1.jpg)

Struktur des Layouts
--------------------

Als nächstes kümmern wir uns um das Layout. Dazu schauen wir uns noch
einmal das finale Design am Anfang des Artikels an:\
• Header mit einem Bild\
• danach die Einleitung\
• dann zwei Spalten mit Inhalt und zuletzt noch den Footer\
Die Breite der E-Mail ist auf 640 Pixel festgesetzt. Damit kann es jetzt
losgehen mit dem restlichen Code.\
\
**Layout - Header**

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<table border="1" cellpadding="0" cellspacing="0" align="center" width="640">
    <tr>
        <td>
            Header
        </td>
    </tr>
</table>
~~~~

\
\
Achten Sie darauf, dass Sie den Code innerhalb des Hauptcontainers
platziert haben.![Responsive email document:
basic](../images/responsive-email-copernica-2.jpg)

****Layout -**Einleitung:**

Der Code für die Einleitung ist erst einmal der Gleiche, wie für den
Header. Fügen Sie diesen einfach unterhalb des Codes für den Header ein.

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td>
        Introduction
    </td>
</tr>
~~~~

Status quo:

![Responsive email document:
introduction](../images/responsive-email-copernica-3.jpg)

****Layout - **Spalten:**

Eines der charakteristischen Merkmale eines Responsive Design Templates
ist, dass Spalten, auf kleineren Geräten aufeinandergestapelt werden.
Normalerweise würde man für die zwei Spalten eine Tabellenzeile mit zwei
Tabellenzellen machen. Das würde es aber auf kleineren Geräten schwierig
machen, die Inhalte übereinander anzeigen zu lassen. Deswegen erstellen
wir zwei Tabellen direkt nebeneinander. Die linke Tabelle muss dabei
nach links ausgerichtet sein (align=“left“) und die rechte Tabelle –
Überraschung – nach rechts ausgerechnet sein. Schauen Sie sich einfach
einmal den folgenden Code an:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td>
        <table border="1" cellpadding="0" cellspacing="0" align="left" width="49%">
            <tr>
                <td>
                    Left column
                </td>
            </tr>
        </table>
        <table border="1" cellpadding="0" cellspacing="0" align="right" width="49%">
            <tr>
                <td>
                    Right column
                </td>
            </tr>
        </table>
    </td>
</tr>
~~~~

Platzieren Sie den Code direkt unter jenen für die Einführung:

![Responsive email document:
columns](../images/responsive-email-copernica-4.jpg)

****Layout -**Footer**

Beim Footer kommt wieder der bewährte Code von Header und Einführung zur
Anwendung – einfach unter den zuletzt eingefügten Code einfügen.

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
    <tr>
        <td>
            Footer
        </td>
    </tr>
~~~~

Im Browser sollte jetzt das zu sehen sein:

![Responsive email document:
footer](../images/responsive-email-copernica-5.jpg)

Content und Style
-----------------

Jetzt haben wir das Layout fertig. Nun können wir anfangen Inhalte und
verschiedene Stile hinzuzufügen, damit unser Template hervorragend
aussieht – insbesondere auf einem mobilen Gerät.

**Content und Style: Header**

Der besteht nur aus einem einzelnen Bild – also keine große
Herausforderung. Ersetzen Sie den Text „Header“ mit einem Bild Ihrer
Wahl und schauen Sie sich den folgenden Code an:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td bgcolor="#00A8C6" style="font-size: 0; line-height: 0; padding: 0 10px 0 10px;" height="140" align="center" class="responsive-image">
        <img src="logo.png" alt="" />
    </td>
</tr>
~~~~

Bevor Sie etwas sagen: Ja, ich weiß, Padding in E-Mails ist ein heikles
Thema. Aber vertrauen Sie mir, in TD-Tags ist es sicher, Padding zu
verwenden – im Gegensatz zu \<div\> oder \<p\> Tags. Aber denken Sie
bitte daran, dass Sie immer jeden Wert definieren (oben, unten, links,
rechts). Darüber hinaus habe ich eine spezielle Klasse,
responisve-image, hinzugefügt. Aber dazu später mehr.

**Content und Style: Einleitung**

Die Einführung besteht aus einem Titel, einem kurzen Text und einer
grauen horizontalen Linie, die als Trennlinie benutzt wird. Um die Sache
einfach zu halten nutze ich sog. break tags (\<br /\>) um Absätze zu
erzeugen und der Inhalt ist in seperaten Divs enthalten, um Ihn
unabhängig voneinander zu stylen. Beispielsweise um die Anrede „Greeting
Friends!“ mit einer Schriftgröße von 20 Pixel auszustatten.\
\
White-Space ist ein wichtiger Designfaktor. Diesen in E-Mail-Templates
zu erzeugen ist manchmal eine echte Qual. In diesem Fall habe ich
Padding genutzt, um White-Space um die Einführung herum zu kreieren.
Dabei bekommt der Abstand nach unten zehn extra Pixel. Wenn Padding
nicht die richtige Lösung ist, können Sie immer sog. spacers benutzen,
um White-Space zu erzeugen. Ich nutze eine etwas andere Technik, die
kein Bild benötigt. Hier ist ein Beispiel:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
~~~~

Stellen Sie einfach die Schriftgröße und den Zeilenabstand im
entsprechenden Element auf null und stellen Sie die Höhe auf den
gewünschten Abstand ein. Vergessen Sie nicht einen Inhalt zwischen die
TD-Tags zu setzen ( &nbsp; ), da einige E-Mail-Clients leere
Tabellenzellen ignorieren.\
\
Ich nutze also die „bilderlose“ Spacing-Technik, um die horizontale
Linie zu erzeugen und nicht das \<hr\>-Tag, da Outlook das Styling
dieses Tags ignoriert und wir so eine zu dicke Linie bekämen.\
\
Das ist der Code:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr><td style="font-size: 0; line-height: 0;" height="1" bgcolor="#F9F9F9">&nbsp;</td></tr>
<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
~~~~

Beachten Sie bitte den Extraabstand unterhalb der grauen Linie. Diesen
musste ich hinzufügen, da Padding nicht funktioniert hätte. Weil Padding
ein paar Extrapixel hinzugefügt hätte, die die Linie hätten dicker
werden lassen.\
\
Ihr Code sollte jetzt so aussehen:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td style="padding: 10px 10px 20px 10px;">
        <div style="font-size: 20px;">Greetings friend!</div>
        <br />
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum porta sagittis ipsum, vitae suscipit ligula adipiscing ut.
            Nunc ac velit auctor, facilisis nibh et, hendrerit neque.
        </div>
    </td>
</tr>
<tr><td style="font-size: 0; line-height: 0;" height="1" bgcolor="#F9F9F9">&nbsp;</td></tr>
<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
~~~~

Und im Browser sollte das Ganze so aussehen:

![Responsive email document:
introduction](../images/responsive-email-copernica-7.jpg)

**Content und Style: Spalten**

Lassen Sie uns nun die Spalten mit Inhalt füllen. Ich benutze Divs damit
der Inhalt in einer neuen Zeile beginnt. Für ein wenig mehr White-Space
können Sie noch ein break-tag einfügen, wenn Sie mögen.

Bild hinzufügen

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td style="padding: 0 10px;" align="center" class="responsive-image">
        <img src="ph1.png" width="240" alt="" />
    </td>
</tr>
~~~~

Extra White-Space ``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
~~~~

Und ein wenig Blindtext

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td>
        <div style="font-weight: bold; font-size: 16px;">Lorem ipsum</div>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum porta sagittis ipsum, vitae suscipit ligula adipiscing ut.
            Nunc ac velit auctor, facilisis nibh et, hendrerit neque.
        </div>
    </td>
</tr>
~~~~

Extra White-Space

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
~~~~

Das Ganze dann noch einmal für die rechte Spalte wiederholen. Damit
dürfte der Code dann so aussehen:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td>
        <table border="1" cellpadding="0" cellspacing="0" align="left" width="49%">
            <tr>
                <td style="padding: 0 10px;" align="center" class="responsive-image">
                    <img src="ph1.png" width="240" alt="" />
                </td>
            </tr>
            <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
            <tr>
                <td>
                    <div style="font-weight: bold; font-size: 16px;">Lorem ipsum</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum porta sagittis ipsum, vitae suscipit ligula adipiscing ut.
                        Nunc ac velit auctor, facilisis nibh et, hendrerit neque.
                    </div>
                </td>
            </tr>
            <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
        </table>
        <table border="1" cellpadding="0" cellspacing="0" width="49%">
            <tr>
                <td style="padding: 0 10px;" align="center" class="responsive-image">
                    <img src="ph2.png" width="240" alt="" />
                </td>
            </tr>
            <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
            <tr>
                <td>
                    
                    <div style="font-weight: bold; font-size: 16px;">Lorem ipsum</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum porta sagittis ipsum, vitae suscipit ligula adipiscing ut.
                        Nunc ac velit auctor, facilisis nibh et, hendrerit neque.
                    </div>
                </td>
            </tr>
            <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
        </table>
    </td>
</tr>
~~~~

**Hinweis:** Auch hier wurde den Zellen mit den Bildern die Klasse
„responsive-image“ beigefügt.

Im Browser sollte das Ganze dann so aussehen. Übrigens habe ich die
Ränder entfernt und ein wenig Basis CSS-Styling hinzugefügt. Kopieren
Sie einfach den folgenden Code in den Headbereich:

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<style type="text/css">
    body {margin: 10px 0; padding: 0 10px; background: #F9F2E7; font-size: 13px;}
    table {border-collapse: collapse;}
    td {font-family: arial, sans-serif; color: #333333;}
</style>
~~~~

\
\
 ![Responsive email document:
columns](../images/responsive-email-copernica-8.jpg)

**Content und Style: Footer**

Der Footer bekommt einfach nur einen Name und eine Hintergrundfarbe.
Keine „Rocket Science“ hier.

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<tr>
    <td bgcolor="#485465" style="padding: 10px 10px 10px 10px; color: #FFFFFF;">
        Copernica BV
    </td>
</tr>
~~~~

Im Browser sollte das Ganze nun so aussehen:

![Responsive email document:
footer](../images/responsive-email-copernica-9.jpg)

Add some responsiveness
-----------------------

Ich benutze nun Media Queries um das Template responsive zu machen. Eine
andere Möglichkeit wäre, das Design auf Basis von prozentualen Angaben
zu gestalten und dadurch „sich anpassend“ zu machen. Media Queries
bieten aber etwas mehr Kontrolle über das Design.\
\
Platzieren Sie einfach den folgenden Code im Head-Bereich Ihrer Datei
unter den vorherigen CSS-Eintragungen.

``{style="font-size: 11px;"}

~~~~ {style="word-wrap: break-word;"}
<style type="text/css">
    @media only screen and (max-width: 480px) {
        body,table,td,p,a,li,blockquote {
        -webkit-text-size-adjust:none !important;
        }

        table {width: 100% !important;}

        .responsive-image img {
        height: auto !important;
        max-width: 100% !important;
        width: 100% !important;
        }
    }
</style>
~~~~

Die Media Queries erklären dem Client das unterhalb einer Anzeigebreite
von 480 Pixeln, ein mobilfreundliches Layout ausgegeben werden soll.

Die Breite jeder Tabelle ist auf 100% gesetzt. Dazu benutze ich
!important, um die fixen Angaben in den Tabellen zu überschreiben.

Die Klasse „responsive-image“ erledigt ungefähr den gleichen Job, nur
für die Bilder im Template.

**Hinweis:**

Media Queries funktioniert nur eingebettet im HTML, was zur Folge hat,
dass Sie sie nicht als Inline Style benutzen können.

Fertig!
-------

Wenn Sie den einzelnen Schritte gefolgt sind, sollten Sie nun ein
E-Mail-Template haben, dass sowohl am Rechner als auch auf dem
Smartphone großartig aussieht. Jetzt können Sie Ihre Kunden oder
Kollegen beeindrucken. Wenn Sie möchten, teilen Sie Ihr Design. Und
sollten Sie noch Anmerkungen haben, sagen Sie uns doch einfach Bescheid.
