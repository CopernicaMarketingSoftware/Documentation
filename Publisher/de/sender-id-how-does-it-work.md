Bei einem Sender ID-Check wird, wie auch bei der [SPF
-Authentifizierung](./what-is-sender-policy-framework-spf.md "SPF"),
die Lieferadresse kontrolliert. Die Sender ID nutzt
[DNS](./dns-data-what-does-it-do.md "DNS"),
um zu verifizieren, dass der Versender auch autorisiert ist, E-Mailings
im Namen dieser Domain zu versenden. Für jede Domain existiert ein
[MX-Record](./a-record-and-mx-record-how-does-it-work.md "MX-Record").
Dieser stellt fest, dass das E-Mailing für diese Domain zugestellt
werden kann. Mit der Sender ID wird von einem SPF-Eintrag Gebrauch
gemacht, der vermittelt, welche IP-Adressen berechtigt sind, E-Mailings
im Namen der Domain zu versenden.

Der Unterschied zwischen SPF und der Sender ID ist Feld das kontrolliert
wird. Beim SPF ist das "Mail von"-Feld der Sender ID. Dieses ist eine
Kombination aus den Feldern "Von", "Absender" "zurückgesandt" und
"zurückgesandt von Sender".

Für einen Sender ID-Check wird ein E-Mailing erst abgefangen um den
Header zu kontrollieren. Beide, SPF und Sender ID-Check sind bei
Spamfiltern sehr "beliebt". Aus diesem Grund ist es am besten, beide
einzubeziehen.

Wie wird die Sender-ID eingestellt?
-----------------------------------

Um Sender ID einzustellen, brauchen Sie Zugang zu den DNS-Einstellungen
Ihrer Domain. Wenn Sie diesen Zugang haben, ist es recht einfach
einzustellen. Fügen Sie folgende Zeile in den TXT-Eintrag der Domain:

"v=spf1 include:\_senderspf.copernica.com a mx \~all"

Wie funktioniert Sender-ID?
---------------------------

​1. Der versendende Mailserver sendet eine E-Mail im Namen von
Versender@copernica.de an Empfänger@domain.de.\
 2. Der empfangende E-Mailserver sendet eine Anfrage an den DNS für den
SPF-Eintrag, der zur Domain gehört.\
 3. Der Server überprüft die Scriptsprache des SPF-Eintrags.\
 4. Nun treten zwei Möglichkeiten auf:

-   Nach der Kontrolle des SPF-Eintrags wird der IP-Adresse ist nicht
    gestattet, E-Mails zu senden.
-   Nach der Kontrolle der SPF-Eintrag ist die IP-Adresse berechtigt
    ist, E-Mails zu senden.

​5. Falls die IP-Adresse nicht die Erlaubnis erhält, E-Mails zu
versenden, sind drei Schritte möglich:

-   Das Mailing wird zurückgewiesen und die Kommunikation zwischen
    beiden Server wird unterbrochen.
-   Das Mailing wird akzeptiert, aber sofort nach erhalt gelöscht.
-   Das Mailing wird angenommen und als SPAM im Header des Mailings
    markiert.

​6. Wird die IP-Adresse autorisiert, E-Mails zu versenden, wird das
Mailing nach Kontrolle des SPF-Eintrags versendet.\
 7. Danach wird das E-Mailing noch von Spam-Filtern kontrolliert.
