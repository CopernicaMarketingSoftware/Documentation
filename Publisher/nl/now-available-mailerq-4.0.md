We hebben een nieuwe versie uitgebracht van MailerQ, de door Copernica
ontwikkelde MTA. MailerQ 4.0 is nu nog krachtiger, flexibeler en
stabieler en heeft bovendien meer features. We raden MailerQ gebruikers
aan om snel (maar voorzichtig) over te stappen op deze nieuwe versie.

Er is veel veranderd. MailerQ 4.0 rapporteert nu bijvoorbeeld veel
uitgebreider hoe een mail is afgeleverd, of in geval van een mislukte
verzending: wat er precies is misgegaan. Ook kan MailerQ, om beter
gebruik te maken van alle in een server beschikbare CPU's, nu meerdere
threads opstarten om berichten van RabbitMQ in te lezen of naar RabbitMQ
terug te sturen. De data van de SSL certificaten van ontvangende servers
wordt gerapporteerd, en - waar veel vraag naar was - MailerQ kan nu ook
berichten uit spooldirectories inlezen. Hierdoor is het verzenden van
e-mail zo makkelijk geworden als het droppen van een bestand in een
directory.

Zoals gezegd: er is veel veranderd. Bovenstaande opsomming is slechts
een kleine greep uit de wijzigingen. Voor meer informatie over MailerQ
en over de wijzigingen kun je daarom het best een spreekwoordelijke blik
werpen op de [MailerQ
website](https://www.mailerq.com/documentation/4.0/new-for-4.0).

Wat is ook alweer een MTA? {#wat-is-ook-alweer-een-mta?}
--------------------------

Veel gebruikers kennen Copernica alleen van de volledig geïntegreerde
marketing oplossingen om mailings en andere campagnes mee aan te sturen.
We hebben echter meer producten. Zo hebben wij een eigen MTA: een *Mail
Transfer Agent*. Dit is een applicatie die, grof gezegd, maar één ding
doet: het versturen van (zeer grote hoeveelheden) mail.

Deze MTA, MailerQ dus, gebruiken we voor het verzenden van alle
berichten. Elk bericht dat met de Copernica software wordt samengesteld,
wordt uiteindelijk door de MTA naar de daadwerkelijke ontvanger
verstuurd. Maar MailerQ wordt niet alleen door Copernica ingezet. Ook
andere bedrijven (ik had even de neiging het jeukwoord "concullega's" te
gebruiken) die vanaf eigen servers veel mails versturen gebruiken
MailerQ.

Een MTA is dus een applicatie die mail verstuurt. Dat is het inderdaad
in essentie. Maar MailerQ kan meer: de MTA houdt bijvoorbeeld precies in
de gaten wat de verzendsnelheid per ontvangende servers is en reageert
als er verzendingen worden geblokkeerd. Ook voegt MailerQ DKIM
signatures toe aan berichten, en kunnen berichten on-the-fly worden
aangepast om CSS code in orde te maken. Inkomende berichten en bounces
worden afgehandeld en mislukte verzendingen worden automatisch na enige
tijd herhaald. En zo kunnen we nog wel even doorgaan met het opsommen
van features.

Meer weten? Check [www.mailerq.com](https://www.mailerq.com).
