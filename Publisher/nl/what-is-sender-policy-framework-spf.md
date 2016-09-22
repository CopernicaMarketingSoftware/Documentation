Een SPF (Sender Policy Framework) record (gedefinieerd in [RFC
4408](http://www.openspf.org/Specifications "Open SPF specificaties"))
is een record (meerbepaald een TXT-record) binnen de
[DNS](./dns-data-what-does-it-do.md "Kennisartikel over DNS")
gegevens van een domein. SPF heeft tot doel te helpen spam te
verminderen. Het valideert het HELO-commando en het MAIL FROM adres van
de verzendende mailserver (client).

In de SPF staat welke IP adressen e-mail mogen verzenden vanuit de
domeinnaam. Dus als iemand e-mail wil versturen vanuit
...@copernica.com, moet in de DNS gegevens van copernica.com staan dat
dit is toegestaan voor het gekoppelde IP-adres. De ontvangende
mailserver controleert de SPF zodra de e-mail wordt aangeboden. Als het
IP adres niet in het SPF record voorkomt, wordt de inhoud van de e-mail
niet binnengehaald.

Met Copernica controleren we je instellingen bij elke e-mailing en
waarschuwen als de SPF record niet op orde is. Maar dat doet niet elke
verzendpartij en bovendien moet je zelf de DNS gegevens (laten)
aanpassen. Als eigenaar van een domeinnaam kun je een SPF record toe
(laten) voegen aan je DNS gegevens. Daarmee geef je dan aan dat het IP
adres van externe partij X toestemming heeft om e-mailings uit jouw naam
te verzenden.
