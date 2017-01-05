# DMARC configureren

Om goed te begrijpen waar DMARC eigenlijk voor bedoeld is, kun je het best
even de wereld bekijken alsof je een professionele ontvanger bent. Stel je 
voor dat je Gmail, Hotmail, Yahoo of een andere grote e-mailontvanger bent: 
hoe zou je dan met e-mail omgaan?

Voordat DMARC werd uitgevonden waren er twee belangrijke technologieën om e-mail
te beveiligen: [SPF](spf) en [DKIM](dkim). Met SPF kun je, als ontvanger, 
controleren of een e-mail wel afkomstig is van een geldig IP adres. Met
DKIM kun je zien of het bericht inderdaad van de afzender afkomstig is. Het 
mooiste voor een ontvanger is natuurlijk wanneer je berichten ontvangt waarvan 
beide checks in orde zijn: een bericht van info@bedrijfsnaam.nl, afkomstig van 
een IP adres dat inderdaad gerechtigd is om te mailen uit naam van bedrijfsnaam.nl 
(SPF dus goed) plus een DKIM ondertekening. Dergelijke berichten zijn perfect.

Maar ook als maar aan één van beide eisen is voldaan is het nog goed. Bijvoorbeeld
als een bericht wel een geldig DKIM signature heeft, maar afkomstig is van een
ander IP adres. Zoiets gebeurt als een mail wordt doorgestuurd. Het signature
blijft dan geldig, maar het afzender IP wordt anders. Omdat de ondertekening
echter geldig blijft, weet je als ontvanger nog steeds zeker dat het mailtje echt
afkomstig is van info@bedrijfsnaam.nl. Er is dus niks aan de hand.

Het wordt pas problematisch als het allebei verkeerd is. Het IP adres matcht
niet met SPF, en er is geen of geen valide DKIM signature. Wat is er aan de hand?
Probeert iemand stiekem uit naam van een ander te mailen, of is het
toch een geldig bericht maar heeft de verzender gewoon zijn instellingen verkeerd
staan? Moet je een dergelijk bericht weggooien (want misbruik) of moet je het
bericht toch netjes in de inbox plaatsen (want belangrijk bericht van oma die
gewoon niet zo goed snapt hoe SPF en DKIM werkt)? Voor een ontvanger is het
lastig om te beslissen of een ongeldig bericht echt misbruik is, of dat het gewoon
een vergissing is van de verzender. En berichten weigeren of weggooien, dat doe je 
als ontvanger liever niet, het zou wel eens belangrijk kunnen zijn.

Het liefst zou je als ontvanger daarom even contact willen opnemen met bedrijfsnaam.nl.
"Hé, ik ontvang hier een berichtje van een zogenaamde medewerker van je, maar ik 
zie dat SPF en DKIM niet goed zijn. Heb jij je zaakjes wel op orde? En wat wil 
je eigenlijk dat ik met dit bericht doe? Toch maar in de inbox plaatsen? Of 
juist weggooien?" Dat is precies wat DMARC doet. Met DMARC kan een ontvanger een 
DNS query uitvoeren om precies dit soort vragen te stellen. En met DMARC kan een
ontvanger verzenders op de hoogte brengen dat hij berichten ontvangt die niet
matchen met SPF en/of DKIM.


## DMARC en DNS

DMARC is een technologie die gebruik maakt van DNS en van e-mail. Als domeinnaameigenaar
kun je in DNS bij je domeinnaam een DMARC record plaatsen, en in dat record kun 
je vertellen wat er moet gebeuren met berichten die niet matchen met DKIM en SPF.
Wil je dat ontvangers zulke berichten toch in de inbox plaatsen? Of moeten ze worden
weggegooid? Of moeten dergelijke foutieve berichten in een aparte mailbox worden
geplaatst, zoals de spam folder? Je kunt zelfs een percentage opgeven: ik wil dat
van alle foutieve berichten 10% wordt weggegooid, maar de andere 90% moet toch
in de inbox worden geplaatst.

Ook kun je in je DMARC record een e-mailadres opnemen, zodat de ontvangende partijen
weten dat je op de hoogte wilt worden gebracht als er mails binnenkomen die niet
of niet geheel matchen met SPF en DKIM. Dat kan immers een indicatie zijn dat
iemand misbruikt maakt van jouw domeinnaam, of dat één van je medewerkers zijn
instellingen niet goed heeft staan. Als je een e-mailadres in je DNS record opneemt, 
dan zul je opeens e-mails gaan onvangen met daarin DMARC rapportages.




## Wat is de juiste instelling?


**Dit artikel wordt verder bijgewerkt**
