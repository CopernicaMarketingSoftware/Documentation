# MX records

Als je een [Sender Domain](./sender-domains.md) configureert, dan toont het 
dashboard een lijst van [DNS](./dns.md) records die je moet aanmaken. Dit zijn 
meestal aliassen (CNAME records) die verwijzen naar records op de DNS servers 
van Copernica. Eén van de deze records is echter geen CNAME record, maar een MX 
record. Dit MX record moet je aanmaken zodat Copernica de bounces en out-of-office 
replies van je mailings kan verwerken. Door het geadviseerde DNS record aan te 
maken zorg je dat zulke bounces daadwerkelijk bij Copernica terecht komen.


## Envelope adressen

Om te begrijpen waarom je een MX record moet aanmaken, moeten we eigenlijk twee
dingen uitleggen. Namelijk ten eerste wat een *envelope adres* is en wat dat te 
maken heeft met bounces en out-of-office replies, en ten tweede hoe een MX
record eigenlijk wordt gebruikt. We beginnen bij het begin: bij het envelope adress.

Een e-mail heeft over het algemeen twee verschillende afzenderadressen: het 
gewone *from* adres dat je ziet in je e-mailprogramma, en een apart *envelope 
adres*. Dit envelope address is een soort "onzichtbaar" adres, dat kan afwijken 
van het gewone afzenderadres. Dit "onzichtbare" envelope adres wordt normaal 
gesproken niet getoond aan ontvangers, maar wordt wel gebruikt door servers 
onderling. Als servers onderling berichten naar elkaar versturen, zoals bij
bounces en out-of-office replies gebeurt, dan gebruiken de servers daarvoor niet 
het gewone afzenderadres, maar het envelope address. 

Als je een mailing met Copernica verstuurt dan stellen we daarom een envelope 
adres in. De mailing heeft weliswaar een gewoon *from* adres (bijvoorbeeld
info@bedrijfsnaam.nl), maar voor elke geadresseerde ook een uniek *envelope*
adres (zoals ui2ad8f9@feedback.bedrijfsnaam.nl). Voor het apenstaartje staat 
een code die voor elk bericht dat we versturen uniek is. Als iemand een bericht
naar dit e-mailadres stuurt, dan kunnen wij deze bounce makkelijk linken aan
het oorspronkelijke bericht.

Kortom, elk bericht dat Copernica namens jou verstuurt krijgt een uniek envelope
adres. Als er een bounce wordt gestuurd, komt die bounce bij dit unieke e-mailadres
terecht en kunnen wij de bounce makkelijk linken aan het oorspronkelijk verstuurde
bericht. Wij weten dan precies welk bericht niet goed kon worden afgeleverd. 


## Werking van MX records

Nu je bekend met de werking van het envelope adres kunnen we uitleggen waar een
MX record voor bedoeld is. E-mailberichten (en dus ook bounces) worden verstuurd
naar e-mailadressen. Maar computers werken onderling niet met e-mailadressen,
maar met IP adressen. Om een e-mail te kunnen versturen moet het e-mailadres
daarom op de een of andere wijze worden geconverteerd naar een IP adres. Pas als
er een IP adres is, kan een e-mail worden afgeleverd. Om een e-mailadres
te converteren naar een IP adres wordt gebruik gemaakt van MX records.

Een MX record is een DNS instelling waarmee je opgeeft naar welke mailserver
inkomende e-mailberichten moeten worden verstuurd. Een computerprogramma dat
een mail probeert af te leveren vraagt dit MX record op om het e-mailadres
om te zetten naar een IP adres en de mail kan worden verstuurd. 

Het envelope adres dat we gebruiken voor mailings gebruikt een speciaal subdomain
van je hoofddomain (zoals feedback.bedrijfsnaan.nl). Om de bounces te kunnen 
afleveren moet voor dit subdomain een MX record bestaan. Als in dit MX record 
bovendien staat dat de berichten naar Copernica moet worden verstuurd, dan komen 
alle bounces bij ons terecht. En dat is precies de bedoeling, en daarom moet
je een MX record aanmaken waarin het adres van onze mailserver staat.


## Kun je geen MX records aanmaken?

Sommige DNS providers, waaronder bepaalde Microsoftdiensten, staan het niet toe 
om MX records aan te maken. Als je bij een dergelijke dienst je domeinnaam
hebt ondergebracht, dan kun je dus niet zomaar de instructies van het Copernica
dashboard opvolgen en de MX records aanmaken. Er is hier gelukkig een 
workaround voor.

Als het Copernica dashboard je adviseert om een MX record aan te maken, dan
kun je daarvoor in de plaats ook een CNAME record aanmaken, en wel volgens het
volgende schema:

<table>
    <tr>
        <td><strong>Geadviseerd MX record</strong></td>
        <td><strong>CNAME record dat ook werkt</strong></td>
    </tr>
    <tr>
        <td>MX 0 ms.copernica.com</td>
        <td>CNAME feedback.copernica.com</td>
    </tr>
    <tr>
        <td>MX 0 mail.smtpeter.com</td>
        <td>CNAME smtpeter.com</td>
    </tr>
</table>

In bovenstaande tabel kun je in de linkerkolom opzoeken welk advies het dashboard
je geeft, en in de rechterkolom welk CNAME record je daarvoor in de plaats ook
zou kunnen gebruiken. Kortom, als het dashboard je adviseert om een MX record 
voor "feedback.jouwdomein.nl" aan te maken met de waarde "0 ms.copernica.com",
dan kun je dus ook een CNAME record aanmaken voor "feedback.jouwdomein.nl" met
de waarde "feedback.copernica.com".
