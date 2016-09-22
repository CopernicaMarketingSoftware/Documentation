Een e-mail die door de applicatie wordt verstuurd, heeft twee
verschillende afzenderadressen. Het zichtbare afzenderadres van de
mailing kan per mailing afzonderlijk worden ingesteld. Dit is het adres
dat mensen in hun e-mailprogramma te zien krijgen als ze de mail
ontvangen. Dit is ook het adres dat wordt gebruikt als de ontvanger op
de 'reply' button klikt. Naast het afzenderadres, is er ook een
'envelope' adres. Dit adres is voor gewone ontvangers niet zichtbaar en
heeft vooral een technische betekenis. Desgewenst kan je gebruik maken
van een eigen envelope domein.

E-mailings vanuit de applicatie worden verstuurd vanaf het domein dat
vermeld staat in het tabblad **Envelope domein** bij de
**Verzendinstellingen**. Je vindt dit dialoogvenster onder *Admin* \>
*Account* \> **Verzendinstellingen**.

Als een e-mail niet goed kan worden afgeleverd, dan wordt het bericht
teruggestuurd naar dit 'envelope' adres. Kortom, er zijn twee
afzenderadressen:

1.  Het voor de ontvanger zichtbare 'from' adres. Als een mail wordt
    beantwoord, wordt er naar dit adres iets teruggestuurd.
2.  Het voor de ontvanger niet zichtbare 'envelope' adres. Alle
    foutmeldingen worden teruggestuurd naar dit adres.

In het dialoogvenster onder Beheer \> Account \> Verzendinstellingen
\> *Tabblad Envelope domein* kan de domeinnaam voor het envelope adres
worden ingesteld. Veronderstel dat hier de domeinnaam
'voorbeeld.bedrijfsnaam.nl' wordt ingevoerd, dan worden alle mailings
verstuurd met een envelope-adres dat eindigt op
'@voorbeeld.bedrijfsnaam.nl'. Eventuele foutmeldingen worden dan
teruggestuurd naar dit e-mailadres.

DNS-instellingen
----------------

Het is verstandig om de domeinnaam die je gebruikt als afzenderdomein zo
te configureren, dat deze verwijst naar een mailserver van de
applicatie, zodat eventuele foutmeldingen niet door jou, maar door de
applicatie worden ontvangen en automatisch worden verwerkt in de
statistieken. Om dit te realiseren moet een MX record voor de gekozen
domeinnaam worden aangemaakt. In de DNS instellingen van dit domein moet
een record worden opgenomen dat verwijst naar de applicatie. Het
volgende record is voldoende:

*voorbeeld.bedrijfsnaam.nl 86400 IN MX 0 receive.vicinity.nl*

Hiermee zorg je er voor dat alle e-mail bestemd voor adressen die
eindigen met '@voorbeeld.bedrijfsnaam.nl' automatisch terecht komt bij
de applicatie en in de statistieken wordt verwerkt.

Let op bij het configureren van DNS voor het afzenderdomein: het
e-mailprotocol staat niet toe dat er CNAME records worden gebruikt. Dit
geldt zowel voor het domein zelf, als voor het domein waar het MX record
naar verwijst. 

Aanmaken SPF record voor het envelope domein
--------------------------------------------

Om de aflevering van e-mail te optimaliseren is het verstandig om voor
het ingestelde afzenderdomein ook een SPF record aan te maken. Een SPF
record is een instelling in DNS waarmee per domeinnaam kan worden
ingesteld welke IP adressen toestemming hebben om uit naam van dat
domein e-mail te versturen. In het SPF record van
voorbeeld.bedrijfsnaam.nl moeten daarom de IP adressen van de applicatie
worden vermeld. Het volgende SPF record volstaat over het algemeen:\
\
*voorbeeld.bedrijfsnaam.nl 86400 IN TXT "v=spf1
include:\_spf.vicinity.nl -all"*\
\
 Dit SPF record geeft aan dat voor voorbeeld.bedrijfsnaam.nl hetzelfde
SPF record moet worden gebruikt als voor \_senderspf.copernica.com. In
dit tweede SPF record - dat door ons, de beheerders van de applicatie,
wordt beheerd, is een lijst opgenomen van alle IP adressen van de
applicatie.

Let op: het SPF record is niet hetzelfde als Sender ID (SPF2). Sender ID
stel je in op het domein van het zichtbare afzenderdomein. Als je geen
gebruik maakt van een eigen envelope domein, hoef je geen SPF record toe
te voegen. Dit staat automatisch goed.
