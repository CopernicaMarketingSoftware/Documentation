# DKIM handtekeningen

Bijna elk e-mailbericht heeft een 'from' adres. Dit is het e-mailadres
waar de e-mail vandaan _schijnt_ te komen en welke ook bovenaan wordt
weergegeven in elke e-mail.
Dit is ook het adres waar je een antwoord naar terug kunt sturen als 
je op beantwoorden klikt. 

Hier is express het woord _schijnt_ gebruikt, omdat je, bij het versturen
van e-mail, elk mogelijk e-mailadres kunt gebruiken als het 'from' adres.
Zelfs e-mailadressen die helemaal niet van jezelf zijn. Deze wetenschap
kan worden gebruikt voor een 'leuk' geintje, maar kan natuurlijk net zo
goed worden misbruikt. Als een domein eigenaar wil je niet dat andere
personen e-mail kunnen versturen vanuit jouw domein.

DKIM kan worden gebruikt om dit te voorkomen. Het stelt ontvangende partijen 
in staat om te verifieren of een email daadwerkelijk door jou is verstuurd.
DKIM kan daarnaast ook aantonen of de vertuurde e-mail (inclusief de bijlages)
niet bewerkt is tijdens het transporteren van de ene naar de andere e-mailclient.

De technologie aangaande het ondertekenen van e-mails is gebasseerd op een 
mechanisme van gerelateerde privé -en publieke sleutels. Als eigenaar van 
een domein ben je de enige met toegang tot de privésleutel en kun je 
dus e-mails ondertekenen.


De publieke sleutel wordt gepubliseerd in het 'DNS record' van je domein
zodat iederen kan _checken_ of de ondertekening van de e-mail wel echt 
van jou kwam. Deze technologie zorgt ervoor dat e-mails alleen door jou
ondertekend kunnen worden. Tegelijkertijd kan iedereen jouw e-mails 
verifieren omdat iedereen toegang heeft tot de publieke sleutel. 
Dit maakt het voor spammers, phishers en soortgelijke onmogelijk om jouw
domein te gebruiken als het 'from' adres. Ze kunnen in het algemeen geen 
e-mails versturen vanuit jouw naam, omdat ze simeplweg geen toegang hebben
tot jouw privésleutel.

<Resterende gedeelte komt asap>

<!-- 
## Ondertekenen van e-mails

SMTPeter kan je e-mails ondertekenen met DKIM. SMTPeter moet dan wel weten
welk 'from' adres je gebruikt. Dit kun je opgecen 



SMTPeter can sign your mails with DKIM. In order to do this SMTPeter needs to know
which from addresses you use with SMTPeter. You can configure something called
sender domains via SMTPeter's dashboard. If you create
a sender domain, SMTPeter creates DKIM keys and informs you how to update
the DNS records. This is a one time procedure. Once a sender domain is
configured, SMTPeter automatically signs mails with from addresses identical
to the sender domain.

Do you already have private and public key pairs, and do you want
SMTPeter to use these? No problem, you can use the dashboard to install
your own private keys too. It is also possible to let SMTPeter know that
it should always add a signature of a certain key, even if the from address
of the sent mail is different from the sender domain.

Mind you, even if you have your own keys, it is in general still a good
idea to leave the signing of email to SMTPeter. SMTPeter normally also
modifies your email (for example to [track clicks and opens](statistics),
or to [inlinize CSS code](inline-css)) and this invalidates signatures
that were added before.

You should of course not be sending out mails with different from addresses
than your sender domains. However, if you happen to send out mails with a
different from address SMTPeter will see if it can use one of your sender
domain keys and still fulfill all necessary requirements.


## Automatic DKIM key rotation

The private keys are stored on the SMTPeter servers and are never exposed.
The technology behind the public and private keys is very secure, yet, if
someone spends a lot of time on it, keys can be broken. Therefore, you
want to generate new keys every now and then. If you use SMTPeter's standard
suggestions, it will rotate your keys automatically. If you want to use
SMTPeter with your own generated keys, updating the keys is your own responsibility.
 -->