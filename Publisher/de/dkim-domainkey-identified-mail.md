DomainKey Identified Mail (./dkim.md) ist ein kleiner Code im DNS. Hiermit
wird ein eindeutige digitale Signatur im Header Ihrer E-Mail platziert,
die Sie als sicheren Absender erkennt. Der empfangende E-Mail Server
kann sehen ob die E-Mail wirklich von Ihnen und nicht gefälscht oder von
einer anderen Person gesendet wurde. Ein noch nicht richtig
eingestelltes ./dkim.md ist meist noch nicht problematisch da es noch nicht
überall unterstützt wird. Unter anderem Yahoo und Gmail führen eine
strenge Kontrolle des ./dkim.md um Spam-Mailings auszufiltern.

Eine ./dkim.md-geschützte Domain ist für Spammer uninteressant. Die Chance,
dass Ihre Mitteilung die Inbox des Empfängers erreicht ist sehr gering.
Der Vorteil ist, dass ./dkim.md-geschützte Domains ebenfalls Spamgeschützt
sind. Copernica empfiehlt daher ./dkim.md als Form zu E-Mail
Authentifizierung und für eine optimale Zustellbarkeit zu nutzen.

Wie funktioniert ./dkim.md?
----------------------

Eine E-Mail Mitteilung besteht aus Nullen und Einsen. Das bedeutet, dass
diese Zahlen summiert werden können. Eine E-Mail enthält diese
verschlüsselte Summe. Der empfangende E-Mail Server entschlüsselt diese
Summe mit einem bestimmten Schlüssel der von Ihren DNS-Daten extrahiert
wird. Der E-Mail Server summiert noch einmal die Daten der E-Mail und
vergleicht diese mit der gesendeten Summe. Bei Übereinstimmung der
Summen wird die E-Mail als authentisch angesehen und zur Inbox geleitet.

Bemerke: Das ./dkim.md blockiert keine E-Mails die nicht authentisch sind. Es
markiert die Mitteilung als ungültig. Basierend auf dieser Markierung
kann der Spamfilter als möglichen Spam ansehen oder ganz blockieren.
