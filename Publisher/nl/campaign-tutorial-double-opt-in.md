# Campagne tutorial: Dubbele opt-in

Commerciële e-mailverzenders mogen alleen verzenden naar adressen die 
daartoe expliciet toestemming hebben gegeven: dit noemen we een opt-in. 
Dit houdt in dat je niet zomaar een lijst met e-mailadressen mag kopen 
of *scrapen* van het web. Wanneer een persoon zijn e-mailadres aan jou 
doorgeeft, bijvoorbeeld door zich aan te melden voor nieuwsbrieven en 
aanbiedingen op jouw website, geldt dat als een enkele opt-in.

Het is echter nog beter voor je sender reputation als je altijd een dubbele 
opt-in gebruikt. Een dubbele opt-in bevestigt dat een gebruiker jouw email 
wil ontvangen door te vragen om een confirmatie van hun inschrijving, meestal 
door op een link te klikken die ze per email ontvangen.

## Een dubbele opt-in maken met followups

Eerst moet je database voorbereid zijn: We raden je aan eerst een 
[nieuwsbriefselectie](./create-a-mailing-list) aan te maken. Daarnaast heb 
je een nieuwsbrief veld nodig in je database, waar we straks de mogelijke 
waarden "nee", "enkele opt-in" en "dubbele opt-in" zullen gebruiken. We 
raden je ook aan een landingspagina te maken op je website om te laten zien 
dat de registratie voor je nieuwsbrief succesvol was.

Nu kunnen we de follow-up aanmaken:
- Ga naar de database waar je de dubbele opt-in voor aan wilt maken en 
open de follow-up manager.
- Maak een nieuwe follow-up met de trigger "Profile created".
- Gebruik eerst een "Check destination" box: Check of de waarde van je 
nieuwsbrief veld op "enkele opt-in" staat.
- Voeg een match link toe naar een nieuwe "Send email" box. Selecteer hier 
de template die je gaat gebruiken voor de bevestiging.
- Klik op de box om een event handler aan te maken en gebruik de "link click". 
Deze wordt straks gebruikt om kliks in de verzonden mail af te handelen.
- Voeg een "Link check" box toe om te checken of er daadwerkelijk op de 
bevestigingslink is geklikt. Deze stap kun je overslaan als dit de enige link 
in je template is.
- Voeg een link toe naar een nieuwe "Update destination" box waar je de 
waarde van je nieuwsbrief veld verandert naar "dubbele opt-in".

## Meer informatie

Nu kun je beginnen met je nieuwe abbonnees te mailen! De artikelen 
hieronder kunnen je wat ideeën geven over hoe je doelgroepen kunt 
aanmaken en emails kunt personalizeren.

* [Follow-ups in Marketing Suite](follow-up-manager-ms)
* [Selecties](./database-selections-introduction)
* [Personalizatie](./personalization)
* [Tutorial: Nieuwsbriefselectie](./create-a-mailing-list)
