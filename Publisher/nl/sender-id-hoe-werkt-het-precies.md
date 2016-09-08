Bij een Sender ID controle wordt, net als bij SPF authenticatie, het
verzendadres gecontroleerd. Sender ID maakt gebruik van DNS om te
verifiëren of de afzender geautoriseerd is om e-mailings te versturen
namens dat domein. Voor elk domein geldt immers dat er een MX-record
bestaat. Hierin staat vermeld waar de e-mailing voor dat domein kan
worden afgeleverd. Met Sender ID wordt gebruik gemaakt van een
SPF-record waarin wordt vermeld welke IP-adressen e-mailings mogen
versturen namens dat domein. Maar Sender ID kijkt naar andere waarden om
de authenticiteit te bepalen.

Het verschil tussen Sender ID en SPF is het veld dat gecontroleerd
wordt. Bij SPF is dit het MAIL FROM-veld, bij Sender ID is dit een
combinatie van de velden: From, Sender, Resent-From en Resent-Sender.

Voor een Sender ID controle wordt een e-mailing eerst binnengehaald, om
daarna te kijken naar deze headers.

Zowel SPF als Sender ID controle zijn 'populair' bij spamfilters. Het is
daarom het beste om beiden in te (laten) regelen in je DNS gegevens.

Hoe stelt u Sender ID in?
-------------------------

Om de Sender ID in te stellen, heb je toegang nodig tot de
DNS-instellingen van je domein. Als je deze toegang hebt, is het vrij
eenvoudig in te stellen. Voeg de volgende regel aan het TXT-record van
het domein toe als u met Copernica gaat verzenden:\
`  "v=spf1 include:_senderspf.copernica.com a mx ~all"`

Let op: Het is niet mogelijk om verschillende SPF records te gebruiken
wanneer je e-mail verstuurt. Het is echter wel mogelijk om meerdere SPF
records op te nemen in het TXT-record. Het is dan ook aangeraden om in
een dergelijk geval verschillende SPF-records op te nemen in 1
TXT-record. In dat geval krijg je bijvoorbeeld de volgende regel:\

`"v=spf1 include:_senderspf.otherdomain.com include:_senderspf.copernica.com a mx ~all"`

We adviseren altijd gebruik te maken van de softfail optie (\~all) voor
de beste afleverresultaten.

Hoe werkt Sender ID?
--------------------

​1. De verzendende mailserver stuurt een e-mailing namens
verzender@copernica.nl naar ontvanger@domein.nl.\
\
 2. De ontvangende mailserver raadpleegt de DNS voor het SPF-record dat
bij het domein hoort.\
\
 3. De server controleert de scripttaal van het SPF-record.\
\

​4. Nu treden er 2 mogelijkheden op:

-   Volgens de controle van het SPF-record is het IP-adres niet
    toegestaan e-mailings te verzenden.
-   Volgens de controle van het SPF-record is het IP-adres wel
    geautoriseerd e-mailings te verzenden.

​5. In het geval het IP-adres niet de toestemming heeft e-mailings te
verzenden zijn drie vervolgstappen mogelijk:

-   De e-mailing wordt niet aanvaard en de communicatie tussen beide
    servers wordt verbroken.
-   De e-mailing wordt aanvaard, maar na ontvangst meteen verwijderd.
-   De e-mailing wordt aanvaard en als SPAM gelabeled in de header van
    de e-mailing.

​6. In het geval het IP-adres wel toestemming heeft e-mailings te
verzenden, wordt na controle van het SPF-record de e-mailing aanvaard.
7. Hierna wordt de e-mailing mogelijk nog gecontroleerd door
spamfilters.