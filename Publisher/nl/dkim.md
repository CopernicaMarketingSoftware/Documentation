# DKIM

DomainKeys Identified Mail is, simpel uitgelegd, een technologie om een 
e-mail te voorzien van een digitale handtekening (signature). Een ontvanger van
een bericht kan deze handtekening controleren en zien of het bericht daadwerkelijk 
afkomstig is van de afzender, of dat het bericht tussentijds is aangepast. 
DKIM is, samen met [SPF](spf) en [DMARC](dmarc) uitgevonden om misbruik van 
e-mail tegen te gaan.

DKIM maakt gebruik van geheime sleutels (private keys) om handtekeningen mee 
te maken. Deze private key is alleen bij de verzender (bij ons dus) bekend zodat 
alleen de verzender een geldige digitale handtekening aan een bericht kan 
toegevoegen. Bij elke private key hoort ook een voor iedereen inzichtelijke 
*public key* waarmee de handtekening kan worden gecontroleerd. Omdat de public key 
voor iedereen toegankelijk is (vandaar het woord public), kan iedereen zien 
of een mail geldig is of niet. De private key kent alleen de verzender, zodat 
misbruikers niet in staat zijn om geldige handtekeningen te maken.

Als je [Sender Domains](sender-domains) gebruikt, dan maak je automatisch gebruik
van DKIM. Copernica genereert elke maand nieuwe private keys, en plaatst de 
bijbehorende public keys in DNS. Als je correct de instructies van het 
Marketing Suite dashboard hebt opgevolgd, en dus een alias (CNAME) in jouw DNS
hebt geplaatst die verwijst naar onze DNS records, hoef je verder niks 
meer te doen. Wij zorgen dat alle berichten worden voorzien van een digitale 
handtekening, dat de public key goed in DNS staat, en dat er elke maand nieuwe 
keys worden gebruikt. Handig nietwaar?


## Meerdere signatures

Als je naar de broncode van een e-mail kijkt die is verzonden met Copernica, dan
zul je zien dat het bericht vaak twee signatures heeft: er staan twee 
*dkim-signature* velden in de header van het bericht. Eén signature is gemaakt 
op basis van de private key van jouw eigen domein, en kan dus door ontvangers 
worden gebruikt om te valideren dat de mail daadwerkelijk van jou afkomstig is. 
De andere handtekening is afkomstig van copernica.com. Wat is hier de reden van?

Sommige ontvangers, waaronder Gmail, hebben feedback loops om ontvangers te 
informeren over de wijze waarop ze berichten hebben verwerkt. Ze brengen 
professionele verzenders, zoals Copernica, periodiek op de hoogte van de hoeveelheid 
berichten en geven wat (beknopte) informatie of de berichten werden geclassificeerd 
als spam of niet. Om zeker te zijn dat een bericht inderdaad van ons afkomstig is, 
vereist Gmail dat we een tweede DKIM signature aan de mail toevoegen. Deze tweede 
signature moet niet worden gemaakt op basis van het afzenderdomain, zoals gebruikelijk 
is bij DKIM signatures, maar op basis van onze domeinnaam: copernica.com.

Om gebruik te maken van de feedback loops van Gmail voegen we dus een tweede
signature aan elk bericht toe. Want hoewel we schreven dat DKIM wordt
gebruikt om het afzenderadres te valideren, is het toegestaan om meerdere 
signatures aan bericht te koppelen, ook van domeinnamen die niks met de afzender
te maken hebben. Dat is ook wat gebeurt met het tweede signature dat aan de mail
is toegevoegd. Gmail kan met deze twee signatures twee dingen valideren: door 
de eerste handtekening te checken kan worden gecontroleerd of de mail daadwerkelijk
afkomstig is van de afzender (de gewone DKIM check), en met de tweede signature 
kunnen ze zien of wij inderdaad de echte professionele verzender waren.


## DKIM keys beheren met Publisher

Voor de introductie van Sender Domains moest je als Copernicagebruiker zelf je 
DKIM keys beheren. Je moest zelf DNS records aanmaken waarin je de public
key plaatste, en je moest bovendien, om te voorkomen dat de sleutels zouden
worden gekraakt, periodiek deze keys verversen (hoewel bijna niemand dit 
daadwerkelijk deed). Met de komst van Sender Domains is dit niet meer nodig.
Copernica doet dit nu automatisch.

Toch vind je her en der in de oude Publisher omgeving nog formulieren en 
dialoogvensters om DKIM keys te beheren. Dit is een overblijfsel van vroeger
en zit alleen nog maar in de software om gebruikers die nog niet zijn overgestapt
op Sender Domains te ondersteunen. We raden het gebruik van deze formulieren 
dan ook af. Als je een Sender Domain hebt ingesteld, hoef je geen DKIM keys
meer in te stellen.
