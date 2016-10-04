Manchmal erzeugen Outlook 2007 und 2010 – wie von Zauberhand –
unerwünschte Abstände in HTML-E-Mails. Vor allem dann, wenn das Layout
zwei Spalten hat und zudem
noch [responsive](https://www.copernica.com/de/blog/responsive-design-template-erstellen "How to create a responsive HTML email from scratch") angelegt
ist.

Das Problem
-----------

Wenn Ihre E-Mail wie die mit dem roten X aussieht im folgenden
Screenshot, sind Sie wahrscheinlich Opfer des Renderings von Outlook
2007 und 2010 geworden.

![Unwanted gaps in
Outlook](../images/unwanted-gap-in-outlook-copernica.jpg)

Die Ursache
-----------

Auf den ersten Blick könnte man vermuten, dass Sie einfach vergessen
haben den Tabellenzellen (\<td\>) mitzuteilen, dass sie sich nach oben
ausrichten sollen (valign=“top“). Aber dieses Problem kommt in mehreren
Zusammenhängen vor, z.B. wenn Sie innerhalb einer Tabelle, eine weitere
Tabelle einfügen oder wenn Sie zwei oder mehr Spalten haben, die sehr
hoch sind (um die 1600 Pixel nach meinen Tests), zeigt Ihnen Outlook die
lange Nase.

### Beispiel Code

Der HTML-Code im obigen Beispiel sieht so aus (übrigens ohne Styling, da
es ja eigentlich nur um die Struktur geht):

*By the way, I left out any styling because I just want to show you the
structure of the email you saw in the screenshot earlier.*
``{style="font-size: 11px;"}

    <!-- Main (large) table: holds everything inside together -->
    <table border="0" cellpadding="0" cellspacing="0" width="500" summary="Main table">
        <tr>
            <td>
                <!-- Header and columns table: holds the title and columns of this email -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" summary="Header table">
                    <tr>
                        <td align="center">Hello Outlook!</td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Column table: first column of this email -->
                            <table border="0" cellpadding="0" cellspacing="0" align="left" width="45%" summary="Column 1">
                                <tr>
                                    <td>A lot of content</td>
                                </tr>
                            </table>
                            <!-- Column table: second column of this email -->
                            <table border="0" cellpadding="0" cellspacing="0" align="right" width="45%" summary="Column 2">
                                <tr>
                                    <td>A lot of content</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

Sieht eigentlich ganz normal aus, oder? 

Lösungen
--------

Eine ganz einfache Lösung: Verwenden Sie weniger Content. Aber wir
wissen beide, dass das wahrscheinlich nicht passieren wird.
Glücklicherweise gibt es noch weitere Lösungsansätze:

### Lösung \#1: Collapse

Dies ist der einfachste und schnellste Lösungsweg ist es, mit
“border-collapse“ zu arbeiten. Dadurch werden alle Abstände und Ränder
zwischen den Tabellenzellen gekürzt und es bleibt nur ein gemeinsamer
Rand übrig.

``{style="font-size: 11px;"}

        table {border-collapse: collapse;}

### Lösung \#2: TD nutzen anstelle von neuen Tabellen

Um ehrlich zu sein, hilft diese Lösung aber nur dann, wenn das Template
nicht responsive sein soll/muss. Es können nicht so einfach zwei TDs
„übereinander“ gestapelt werden, wie es für einen responsive Ansatz von
Nöten wäre. Trotz alledem löst der Ansatz das Problem in Outlook.

Also anstelle zweier Tabellen in der Tabelle:

``{style="font-size: 11px;"}

    <table border="0" cellpadding="0" cellspacing="0" align="left" width="500" summary="Columns table">
        <tr>
            <!-- Column table: first column of this email -->
            <table border="0" cellpadding="0" cellspacing="0" align="left" width="45%" summary="Column 1">
                <tr>
                    <td>A lot of content</td>
                </tr>
            </table>
            <!-- Column table: second column of this email -->
            <table border="0" cellpadding="0" cellspacing="0" align="right" width="45%" summary="Column 2">
                <tr>
                    <td>A lot of content</td>
                </tr>
            </table>
        </tr>
    </table>

sollten Sie zwei TDs benutzen (aber vergessen Sie nicht die vertikale
Ausrichtung nach oben einzustellen):

``{style="font-size: 11px;"}

    <table border="0" cellpadding="0" cellspacing="0" align="left" width="500" summary="Columns table">
        <tr>
            <td valign="top">A lot of content</td>
            <td valign="top">A lot of content</td>
        </tr>
    </table>

### Lösung \#3: Bedingungsbasierter Code

Dies ist die beste Lösung, wenn Ihre E-Mail responsive sein muss und Sie
dementsprechend Tabellen nutzen die sich nach links bzw. rechts
ausrichten, für den Zwei-Spalten-Look.

Haben Sie bereits mit Bedingungen gearbeitet haben, um z.B. den Internet
Explorer 6 zu berücksichtigen beim Programmieren einer Website.
Wunderbar. Sie können im Quellcode ebenso Microsoft Office (Outlook)
direkt ansteuern.

Zum Beispiel:

``{style="font-size: 11px;"}

    <!--[if gte mso 9]>
        <style type="text/css">
            Microsoft Office (Outlook) specific CSS goes here
        </style>
    <![endif]-->

mso steht für Microsoft Office. Mit gt (greater than) und lte (less than
or equal to) können Sie konkrete Versionen von Microsoft Offive
bestimmen, für die die Bedingung zutrifft. Dabei können Sie mit den
Versionsnummern von Microsoft Office arbeiten:

-   Outlook 2000 - Version 9
-   Outlook 2002 - Version 10
-   Outlook 2003 - Version 11
-   Outlook 2007 - Version 12
-   Outlook 2010 - Version 14
-   Outlook 2013 - Version 15

Durch die Bedingung können wir nun in Microsoft Office den Ansatz aus
Lösung 2\# ausführen lassen, während andere Clients den Standardansatz
mit den Tabellen ausführen – dabei benutze ich !mso was wörtlich
übersetzt ungefähr heißen würde, „für alle nicht Microsoft Office“:

``{style="font-size: 11px;"}

    <table border="0" cellpadding="0" cellspacing="0" align="center" width="500" bgcolor="#FFFFFF" summary="">
        <tr>
            <!--[if !mso]><!---->
                <td>
                    <table border="1" cellpadding="0" cellspacing="0" align="left" width="45%" summary="">
                        <tr>
                            <!--<![endif]-->
                                <td valign="top">
                                    A lot of content
                                </td>
                            <!--[if !mso]><!---->
                        </tr>
                    </table>
            <!--<![endif]-->
            <!--[if !mso]><!---->
                <table border="1" cellpadding="0" cellspacing="0" align="right" width="45%" summary="">
                    <tr>
                        <!--<![endif]-->
                            <td valign="top">
                                A lot of content
                            </td>
                            <!--[if !mso]><!---->
                    </tr>
                </table>
            </td>
        <!--<![endif]-->
        </tr>
    </table>

Viel Spaß beim Testen!
----------------------

Wenn Sie Fragen, Anmerkungen oder Probleme haben - nutzen Sie doch
einfach die Kommentarfunktion.
