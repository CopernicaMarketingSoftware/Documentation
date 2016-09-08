We krijgen er nog iedere dag mee te maken, grote hoeveelheden ongewenste
e-mails in onze inbox. Internet Service Providers en e-mailprogramma’s
zijn daarom kritisch over welke e-mails al dan niet worden toegelaten
tot de inbox van ontvangers.\
 Authenticatiegegevens zoals SPF en DKIM helpen al aanzienlijk bij het
verbeteren van je
[deliverability](http://www.karelgeenen.nl/09/deliverability-kom-je-wel-in-de-inbox-terecht/)
en tegengaan van ongewenste e-mail. DMARC is nu het nieuwe hulpmiddel
voor e-mailmarketeers om te voorkomen dat je e-mails als ongewenst
worden bestempeld.

Wat is DMARC?
-------------

DMARC staat voor Domain-based Message Authentication, Reporting and
Conformance. Het is een policy die gepubliceerd wordt in een [DNS
record](https://www.copernica.com/nl/blog/dns-gegevens-wat-zijn-dat).
Met deze policy geef je bij de ontvangende mailboxprovider aan dat je
[SPF en/of
DKIM](http://www.marketingfacts.nl/berichten/20091103_authenticatie_bij_emailmarketing_spf_senderid_dkim/)
gebruikt.

Maar wat DMARC krachtig maakt, is het feit dat het aangeeft wat de
ontvanger moet doen met e-mail die niet door de SPF of DKIM-test komt.

DMARC wordt inmiddels gesteund door giganten als AOL, Gmail, Hotmail,
Facebook, Microsoft, Yahoo! en PayPal. In de praktijk komt het er op
neer dat 60 procent van alle e-mailontvangers een ISP heeft die DMARC
ondersteunt.

Waarom is DMARC zo belangrijk?
------------------------------

Zoals de ontwikkelaars van [DMARC](http://dmarc.org/index.html) aangeven
en grotere partijen als
[Linkedin](http://engineering.linkedin.com/email/dmarc-new-tool-detect-genuine-emails)
ook ondervinden, zijn de authenticatiemethoden SPF en DKIM krachtig,
maar niet 100% effectief. Bij het forwarden van een e-mail werkt SPF
bijvoorbeeld niet goed meer (DKIM nog wel).

Authenticatietechnieken als [SPF en
DKIM](http://www.marketingfacts.nl/berichten/20091103_authenticatie_bij_emailmarketing_spf_senderid_dkim)
stellen je in staat duidelijk te maken welke mail echt is en welke niet,
maar als gebruiker krijg je niet echt feedback over de aflevering van je
e-mails, tenzij je hier de juiste tools voor gebruikt zoals bijvoorbeeld
krachtige marketing software of een geavanceerde mailsender als
[MailerQ](http://www.mailerq.com/).

Hoe werkt het precies?
----------------------

DMARC bouwt verder op de bestaande controles van SPF en DKIM en wordt
net als deze twee toegevoegd in je DNS records van je domein. Het kijkt
bij de controle naar de Van- (From)-header in de e-mail.

-   **Komen de gegevens in je header overeen met je DNS-gegevens?** De
    e-mailprovider zet je e-mail door naar de inbox.
-   **Komen de gegevens niet overeen?** Met andere woorden: komt je
    e-mail niet door de SPF- of DKIM-check? Dan geeft DMARC aan wat er
    met de mail moet gebeuren. Moet de mail worden verwijderd? Of worden
    doorgestuurd naar de spamfolder?

Hieronder zie je een schets van de werking van DMARC:

![](../images/how-dmarc-works.png)

Bron:
[http://www.dmarc.org/overview.html](http://www.dmarc.org/overview.html)

*Het instellen van je DMARC record*

Met een instelling in je DNS-records is het mogelijk om te starten in de
‘monitormode’ bij het verzenden van je e-mails. Je krijgt dan wel
informatie terug van DMARC over e-mails die je vanuit je domein stuurt,
maar ontvangende mailservers zullen niet anders omgaan met die e-mails.

Laat ik het uitleggen aan de hand van een voorbeeld:

Stel we willen een e-mail met de volgende header beschermen:

`From: michael@mail.voorbeeld.com`

Hiervoor plaats je de volgende record in de DNS:

`_dmarc.voorbeeld.com IN TXT “v=DMARC1; p=none”`

Je domeinnaam is in dit geval voorbeeld.com. Dit is ook meteen het meest
simpele DMARC record dat je kan gebruiken en dat gebruik je voor de
‘monitormode’. Het vertelt de ontvangende server de DMARC test uit te
voeren en het op te slaan.

Een meer toepasselijke versie is:

`_dmarc.voorbeeld.com IN TXT “v=DMARC1; p=none; rua=mailto:postmaster@voorbeeld.com”`

In dit record vertel je de ontvangende partij (die DMARC ondersteunt)
dat ze een dagelijks rapport van de DMARC-testen van jouw domein te
sturen naar een opgegeven e-mailadres.

Hou ook rekening met het volgende:

-   Je ontvangt een dagrapport van elke deelnemende e-mailprovider,
    zodat je kan zien hoe vaak je e-mails geauthentiseerd zijn en hoe
    vaak ongeldige e-mails worden geïdentificeerd en welke acties worden
    verzocht en uitgevoerd door IP-adressen.
-   Je kan je acties aanpassen aan de hand van deze rapporten. Zo kan je
    bijvoorbeeld de acties aanpassen van 'monitor' (bewaken) via
    'quarantine' (in quarantaine plaatsen) tot 'reject' (afwijzen)
    naarmate je er meer vertrouwen in krijgt dat je eigen berichten
    worden geauthentiseerd.
-   Je bent hierin zo flexibel als je zelf wilt. eBay en PayPal hebben
    er bijvoorbeeld voor gekozen dat al hun e-mail wordt geauthentiseerd
    om in iemands inbox terecht te kunnen komen. Zodoende wijzen de
    ontvangende mailboxproviders zoals Google alle berichten van eBay of
    PayPal af die niet zijn geauthentiseerd.

Wil je weten hoe je verder een DMARC-record vorm kan geven?
[Google](https://support.google.com/a/answer/2466563?hl=en) stelde hier
een handige gids voor op.

Dus kort samengevat, wat moet ik doen?
--------------------------------------

Eigenlijk kan je in slechts drie stappen al meteen aan de slag met DMARC
mits je wel beschikt over enige technische kennis. Als je dat niet hebt,
kan je altijd bespreken met je systeembeheerder.

*1. Instellen waar je de rapporten ontvangt*

Om de DMARC rapporten te ontvangen moet er een DNS record toegevoegd
worden in je DNS instellingen. Zodra je het DNS record hebt gepubliceerd
en daarbij hebt aangegeven op welk e-mailadres je de rapporten wilt
ontvangen, komen de eerste rapporten na ongeveer een dag binnen.

*2. Maak je rapporten inzichtelijk*

Het zijn veel rapporten die je ontvangt dus hou hier rekening mee! Er
bestaan tools die je kunt gebruiken om de rapporten te verwerken en te
analyseren.

*3. Data analyse*

Analyseer je data zodra je deze hebt verzameld. Let daarbij vooral op de
e-mails die niet door de SPF en DKIM checks zijn gekomen. Als het domein
opgegeven in je SPF-record en je DKIM niet overeenkomen met het domein
opgegeven in je DMARC-record kan het betekenen dat je domein mogelijk
door ongeldige partijen wordt misbruikt.

Dit artikel is al eerder verschenen op Karelgeenen.nl: "[Zorg dat je
e-mails niet in de spambox terecht komen met
DMARC](http://www.karelgeenen.nl/27/zorg-ervoor-e-mails-worden-ontvangen-dmarc/)"
