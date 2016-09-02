Voordat we uw bulkmailing definitief gaan versturen, doen we eerst een
aantal controles op het document, de bestemming en de
verzendinstellingen.

Het kan zijn dat u gevonden fouten eerst moet herstellen voordat u de
mailing mag versturen. Andere fouten kunt u negeren. Maar wij raden aan
alle gevonden fouten te herstellen. Op deze manier bent u verzekerd van
de beste afleverresultaten.

### Controle op afzenderadres en afzender

-   [Geen afzenderadres ingesteld](#afzender1)
-   [Het afzenderadres bestaat niet](#afzender2)
-   [Het SPF is niet correct](#afzender3)
-   [Sender ID is niet correct](#afzender4)

### Blacklists

-   [Het IP-adres is geblacklist](#blacklists1)

### DKIM Check

-   [Controle op correcte configuratie van DKIM](#DKIM1)

### Server settings check

-   [MX-record verwijst naar het verkeerde IP adres](#server1)
-   [Het MX record verwijst niet naar een host die refereert aan het
    IP-adres van de applicatie](#server2)
-   [Het verzend-IP is niet geregistreerd in het SPF-record van uw
    domein](#server3)
-   [Syntax error in SPF-record](#server4)
-   [Tijdelijke DNS fout bij SPF check](#server5)
-   [Er is geen SPF-record voor het domein](#server6)
-   [Picserver domein](#server7)

### Spamscore check

-   [Controle op de spamscore van het document](#spamscore1)

### Controle op bestemming

-   [Geen uitschrijfgedrag ingesteld](#bestemming1)
-   [Geen uitschrijfheader geactiveerd](#bestemming2)

### Controle op de inhoud van het document

-   [Gebruik van technieken die niet of nauwelijks worden ondersteund in
    e-maildocumenten](#inhoud1)
-   [Geen tekstversie](#inhoud2)

Afzenderadres check
-------------------

### Geen afzenderadres ingesteld

Elk e-mailbericht dat u verstuurt met de marketing software, dient te
zijn voorzien van een geldig afzenderadres (het ‘from’ adres). Dit is
het adres dat voor de ontvanger van de e-mail zichtbaar is als afzender
van het bericht.

**Afzenderadres instellen**\
 Het afzenderadres stelt u in direct boven het document. Bekijk het
volledige artikel over het instellen van de e-mail headers.

-   [Het onderwerp en afzenderadres
    instellen](http://www.copernica.com/nl/ondersteuning/het-onderwerp-en-afzenderadres-instellen)

### Het afzenderadres bestaat niet

Er is wel een afzenderadres ingesteld. Een controle heeft echter
uitgewezen dat dit e-mailadres niet daadwerkelijk bestaat. E-mail
clients en spamfilters controleren onder andere op de validiteit van het
afzenderadres. Gebruik dus te allen tijde een bestaand e-mailadres. Ook
als u gebruik maakt van een no-reply@uwbedrijf.nl zorgt u ervoor dat op
dit adres e-mails kunnen worden afgeleverd.

**Ik krijg deze melding, terwijl ik zeker weet dat het adres wel
bestaat**

1.  Het e-mailadres kan tijdelijk niet bereikbaar zijn. Controleer of
    andere e-mails normaal worden afgeleverd op dit adres.
2.  Indien het adres wel bestaat, maar deze melding toch wordt gegeven,
    dan wordt er op het afzenderadres hoogstwaarschijnlijk gebruik
    gemaakt van greylisting. Greylisting is een anti-spam methode
    waarbij een e-mail pas bij de tweede of derde aanleverpoging wordt
    geaccepteerd. Wij versturen één enkele dummy e-mail naar het
    afzenderadres om te controleren of deze daadwerkelijk bestaat. Ook
    spamfilters hanteren deze methode, en zullen een adres waarop
    greylisting van toepassing is als niet-bestaand beschouwen. Neem
    contact op met uw systeem- of netwerkbeheerder of hostingpartij om
    greylisting op het afzenderadres uit te schakelen. \
     Meer info hierover vind je op
    [http://www.greylisting.org/](http://www.greylisting.org/)

### Het SPF is niet correct

SPF staat voor Sender Policy Framework. Dit is een standaard om spam en
phishing tegen te gaan. Met behulp van SPF kan de ontvangende mailserver
u herkennen als daadwerkelijke verzender  van het bericht. E-mails
verstuurd met de marketing software hebben automatisch een correcte SPF.
Indien u deze melding toch krijgt, maakt u hoogstwaarschijnlijk gebruik
van een eigen envelope domain. U kunt dit controleren onder Beheer \>
Account \> **Envelope domain**.

-   [Eigen envelope domein gebruiken en instellen SPF voor dit
    domein](http://www.copernica.com/nl/ondersteuning/eigen-envelope-domein-gebruiken-en-instellen-spf-voor-dit-domein)

### Sender ID is niet correct

Sender ID is een afgeleide van bovenstaande SPF, echter Sender ID stelt
u in op het domein van het zichtbare afzenderadres. Controleer of de
Sender ID instelling op dit domein correct is. U kunt hiervoor het
artikel over Sender ID raadplegen.

-   [Sender ID instellen op je
    afzenderdomein](http://www.copernica.com/nl/ondersteuning/sender-id-instellen-op-je-afzenderdomein)

Blacklists
----------

### Het IP-adres is geblacklist

Het IP-adres waarmee uw mailings worden verstuurd kan worden
geblacklist. Een IP-adres wordt geblacklist als de ontvangende
mailserver vermoedt dat het IP-adres is gebruikt voor het versturen van
spamberichten. Dit is soms terecht, maar soms ook onterecht. Het hoeft
ook niet uw schuld te zijn, aangezien het zelfde IP-adres vaak door
meerdere verzenders wordt gebruikt. Wij ontvangen een notificatie
wanneer een van onze IP-adressen is geblacklist, en nemen vervolgens
direct contact op met de desbetreffende partij om het IP-adres van de
lijst af te krijgen.

DKIM Check
----------

### We controleren of de DKIM sleutel correct geconfigureerd is

DKIM staat voor DomainKeys Identified Mail. Een methode waarmee
mailservers kunnen zien dat u verantwoordelijk bent voor het bericht, en
niet Copernica BV.

Mocht u de melding krijgen dat DKIM niet goed is ingesteld, raadpleeg
dan het [volledige artikel over
DKIM](http://www.copernica.com/nl/ondersteuning/e-mails-versleutelen-met-dkim).
In de software kunt u onder E-mailings \> Extra \> DKIM keys een
uitgebreide validatie vinden van de DKIM dat is ingesteld via deze
applicatie.

Als u dit niet direct kunt oplossen, en de mailing perse nu wilt
versturen, dan doet u er verstandig aan de DKIM te verwijderen. Dit kan
via Emailings \> Extra \> DKIM sleutels

De regel is dat u beter zonder DKIM ondertekening kunt verzenden, dan
met een foutief ingestelde DKIM.

Server settings check
---------------------

### MX-record verwijst naar het verkeerde IP adres

Het IP-adres waarnaar deze zou moeten verwijzen wordt in de software
vermeld. De instellingen voor het MX-record vindt u onder Beheer \>
Account \> **Afleverinstellingen** in het tabblad Envelope domain

### Het MX record verwijst niet naar een host die refereert aan het IP-adres van de applicatie

Het IP-adres waarnaar deze zou moeten verwijzen wordt in de software
vermeld. De instellingen voor het MX-record vindt u onder Beheer \>
Account \> **Afleverinstellingen** in het tabblad Envelope domain

### Het verzend-IP is niet geregistreerd in het SPF-record van uw domein

Controleer of er in het SPF record een verwijzing staat naar het SPF
record van de applicatie. Hierin is een lijst opgenomen van alle
IP-adressen die door de applicatie gebruikt worden om e-mails mee te
versturen.

[Eigen envelope domein gebruiken en instellen SPF voor dit
domein](http://www.copernica.com/nl/ondersteuning/eigen-envelope-domein-gebruiken-en-instellen-spf-voor-dit-domein)

### Syntax error in SPF-record

Controleer het SPF record op tikfouten. Mogelijk worden bepaalde
karakters in het SPF TXT record geëscaped. Probeer het SPF record eens
toe te voegen zonder dubbele quotes aan het begin en eind, of juist met
deze quotes.

### Tijdelijke DNS fout bij SPF check

Het DNS is tijdelijk niet bereikbaar. Hierdoor kan de SPF check niet
worden uitgevoerd.

### Er is geen SPF-record voor het domein

Om de aflevering van e-mail te optimaliseren is het verstandig om voor
het ingestelde afzenderdomein ook een SPF record aan te maken. U kunt
versturen vanaf [domeinnaam], maar er is geen expliciete
verzendtoestemming gegeven door het SPF-record.

[Meer informatie over het instellen van een SPF
record](http://www.copernica.com/nl/ondersteuning/eigen-envelope-domein-gebruiken-en-instellen-spf-voor-dit-domein)

### Picserver domein

Het picserver domein is niet correct ingesteld. Hierdoor kunnen geen
impressies worden gemeten en afbeeldingen uit uw e-mailing niet getoond.
Het picserver domein configureert u in onder Beheer \> Account \>
**Afleverinstellingen** in het tabblad *Picserver* domein. Standaard
maakt de applicatie gebruik van het picserver domein pic.vicinity.nl

Spamscore check
---------------

### **We controleren of het document een te hoge spamscore heeft**

Wij adviseren de spamscore van een bericht zo ver mogelijk omlaag te
brengen. Een spamscore lager dan 1 is voor de meeste e-maildocumenten
prima haalbaar. Als u een spamscore heeft hoger dan 3, adviseren wij de
mailing nog niet te versturen, maar eerst verbeteringen aan te brengen.
E-maildocumenten met een spamscore hoger dan 5 kunnen in zijn geheel
niet meer verstuurd worden. De spamscore vindt u rechts onderaan het
geopende document, door op de knop met waarschuwingen te klikken.

We hebben ook een
[artikel](http://www.copernica.com/nl/ondersteuning/verlaag-je-spamrating-enkele-aandachtspunten)
met tips hoe u uw spamscore kunt verlagen.

Controle op bestemming
----------------------

### **De bestemming van de mailing**

Het is maar al te vaak voorgekomen dat gebruikers een mailing naar een
complete database hebben verstuurd in plaats van naar de
nieuwsbriefselectie. Gevolg, veel klachten van ontvangers die een e-mail
hadden ontvangen terwijl ze zich hiervoor nooit hadden ingeschreven of
inmiddels hadden uitgeschreven. Het is niet verboden om een mailing te
richten aan een database of collectie zolang de uitschrijvers maar
direct worden verwijderd uit de database (en dus geen toekomstige mails
meer kunnen ontvangen).

### Geen uitschrijfgedrag ingesteld

Wanneer u in uw e-maildocument gebruik maakt van de tag {unsubscribe} om
uitschrijvers te verwerken, dan dient op de database of collectie
waaraan u de e-mail richt ook het uitschrijfgedrag te worden ingesteld.
Dit gedrag wordt uitgevoerd zodra een ontvanger op de uitschrijflink
heeft geklikt. Bijvoorbeeld: de waarde in het veld *Nieuwsbrief* wordt
veranderd naar ‘Nee’. Ook wanneer u van een andere uitschrijfmethode
gebruik maakt (bijvoorbeeld middels een uitschrijfformulier) adviseren
wij het uitschrijfgedrag in te stellen. Het gedrag wordt namelijk ook
getriggerd wanneer een ontvanger uw mail als spam noteert. Het vervangt
in veel gevallen zelfs de spamknop met een uitschrijfknop!

Ga naar Database beheer \> **Uitschrijfopties instellen…** om het
uitschrijfgedrag in te stellen. Let op, dit moet u doen voor iedere
individuele database of collectie waaraan u uw mailings richt.

### Uitschrijfheader

Wij adviseren altijd een volledige uitschrijfheader mee te sturen met uw
mailings. Als u een nieuw document of template aanmaakt, staat de
volledige uitschrijfheader standaard ingeschakeld.

De uitschrijfheader (List-unsubscribe header) bevat informatie over het
afhandelen van uitgschrijfverzoeken. Ontvangers zien deze informatie
zelf niet: zij zien een uitschrijfknop waarmee ze zich eenvoudig kunnen
uitschrijven van uw mailing. Dit kan de spamknop zijn, maar in enkele
e-mailprogramma's (waaronder Hotmail) kan de spamknop automatisch worden
vervangen door een ‘schrijf-mij-uit-knop’. De uitschrijfheader zorgt
ervoor dat het uitschrijfgedrag op de database kan worden aangesproken.
Zie boven.

De uitschrijfheader verkleint tevens de kans dat uw e-mailbericht tegen
wordt gehouden door spamfilters.

De uitschrijfheader kunt u in- of uitschakelen rechtsboven het
e-maildocument en template.

Controle op de inhoud van het document
--------------------------------------

### **U maakt gebruik van technieken die niet of nauwelijks worden ondersteund in e-maildocumenten**

Bij het maken van een HTML e-maildocument kunt u zich het beste beperken
tot het gebruik van eenvoudige HTML en CSS. Technieken zoals flash,
audio, video, formulieren, javascript, frames en iframes en dergelijke
worden niet of nauwelijks ondersteund door e-mailprogramma’s zoals
Hotmail en Outlook Express. Bovendien verhoogt het gerbruik hiervan uw
spamgevoeligheid behoorlijk. 

### **Geen tekstversie**

E-mail clients en spamfilters controleren of de HTML email die u
verstuurt ook een tekstversie heeft. Wij adviseren daarom om altijd een
tekstversie mee te sturen. Dit kan een standaard bericht zijn (U kunt
geen HTML e-mails ontvangen, volg de volgende link om de email in uw
browser te bekijken) of een platte weergave van de content uit uw HTML
e-maildocument. De tekstversie stelt u in voor de template of het
document in het tabblad Tekstversie, dat u direct boven het geopende
document of template treft.
