# MX records

Eén van de DNS records die je moet aanmaken als je gebruikt maakt van een
[Sender Domain](sender-domains), is een MX record. Een MX record koppelt een
domeinnaam aan een mailserver. Omdat Copernica de bounces en out-of-office 
replies van je mailings verwerkt moet je zo'n MX record aanmaken. Dit zorgt er
voor dat de bounces bij Copernica terecht komen en kunnen worden gebruikt 
voor opvolgacties en het bijwerken van statistieken.

Hoe werkt dit, globaal gezien? Laten we beginnen bij begin: om een e-mail
te versturen heb je een e-mailadres nodig, bijvoorbeeld info@bedrijfsnaam.nl. 
Als er een bericht naar dit adres moet worden gestuurd, dan moet de server
van de verzender opvragen welke mailserver er verantwoordelijk is voor het 
verwerken van het mailverkeer naar @bedrijfsnaam.nl. Deze informatie is 
opgeslagen in DNS, en wel in de genoemde MX records. Een verzender hoeft dus 
alleen maar de MX records op te vragen die horen bij bedrijfsnaam.nl en hij 
weet naar welke server de mail moet worden gestuurd.

Een e-mail heeft over het algemeen twee verschillende afzenderadressen: het 
gewone *from* adres dat je ziet in je e-mailprogramma, en een apart *envelope 
adres*. Dit envelope address is een soort "onzichtbaar" adres, dat kan afwijken 
van het gewone afzenderadres. Dit envelope adres wordt normaal gesproken niet 
getoond aan de ontvanger, maar wordt gebruikt door servers onderling. Als 
servers onderling berichten retourneren, bounces dus, dan gebruiken ze hiervoor 
niet het gewone afzenderadres, maar het envelope address. 

Als je een mailing met Copernica verstuurt, dan gebruiken we zo'n afwijkend 
envelope adres. De mailing heeft een gewoon gewoon *from* adres (bijvoorbeeld
info@bedrijfsnaam.nl), maar voor elke geadresseerde een speciaal *envelope*
adres (zoals ui2ad8f9@feedback.bedrijfsnaam.nl). Voor het apenstaartje staat 
een code die ons in staat stelt om te identificeren naar wie het bericht is 
verstuurd, en de domeinnaam achter het apenstaartje verwijst naar een server
van Copernica, zodat wij alle bounces ontvangen. Zodra wij een bericht ontvangen
voor ui2ad8f9@feedback.bedrijfsnaam.nl weten we precies welk bericht niet
goed kon worden afgeleverd.

Als we al deze informatie samenvoegen begrijp je waarom je een MX moet aanmaken.
De domeinnaam feedback.bedrijfsnaam.nl die we gebruiken voor het envelope adres
moet worden gekoppeld aan de mailservers van Copernica. Hierdoor komen de bounces 
bij ons terecht en kunnen we ze verwerken. Als je een Sender Domain aanmaakt,
en de lijst van geadviseerde DNS records opvraagt, dan zie je in deze lijst
dus een MX record staan. En dat is dus hiervoor.


## Kun je geen MX records aanmaken?

Sommige DNS providers, waaronder bepaalde Microsoftdiensten staan het niet toe 
om MX records aan te maken. Als je bij een dergelijke dienst je domeinnaam
hebt ondergebracht, dan kun je dus niet zomaar de instructies van het Copernica
dashboard opvolgen en de MX records aanmaken. Er is hier gelukkig een 
workaround voor.

Als het Copernica dashboard je adviseert om een MX record aan te maken, dan
kun je daarvoor in de plaats ook een CNAME record aanmaken, en wel volgens het
volgende schema:

<table>
    <tr>
        <td><strong>Geadviseerde MX record</strong></td>
        <td><strong>CNAME record dat ook werkt</strong></td>
    </tr>
    <tr>
        <td>MX 0 publisher.copernica.nl</td>
        <td>CNAME feedback.copernica.com</td>
    </tr>
    <tr>
        <td>MX 0 mail.smtpeter.com</td>
        <td>CNAME smtpeter.com</td>
    </tr>
</table>

In bovenstaande kolom kun je in de linkerkolom opzoeken welk advies het dashboard
je geeft, en in de rechterkolom welk CNAME record je daarvoor in de plaats ook
zou kunnen gebruiken.

