# Campagne Tutorial: Re-activatie

Je klanten blij en geïnteresseerd houden is erg belangrijk. Nieuwe klanten 
verzamelen kost veel geld en tijd, dus re-activatie campagnes kunnen je 
helpen je huidige klanten te behouden.

Om je klanten te re-activeren is het belangrijk dat je ze eerst weet te 
identificeren en dan de juiste actie onderneemt. Je kunt ze bijvoorbeeld 
een simpele e-mail sturen, of een beloning als ze bij jou kopen.

## Inactieve klanten identificeren

Om inactieve klanten te identificeren kijken we naar hun aankoop geschiedenis. 
Je kunt er eventueel ook voor kiezen dit met kliks te doen, voor meer informatie 
over kliks opslaan kun je [deze tutorial](./campaign-tutorial-profile-enrichment) 
raadplegen. Met [collecties](./database-fields-and-collections) kun je makkelijk 
de aankopen van je klanten opslaan in je database. Wij raden je aan een 
[integratie](https://www.copernica.com/nl/integrations) met je webshop te maken 
om dit proces volledig te automatiseren. Voor deze tutorial heb je ook de 
datums waarop de orders geplaatst zijn nodig.

Eerst willen we het profiel van een klant updaten na elke aankoop zodat 
we altijd weten wanneer ze voor het laatst gekocht hebben:

* Maak eerst een veld genaamd "order_datum_laatst" aan in je database.
* Selecteer de collectie met de order en open de follow-up manager.
* Maak een follow-up met de trigger "Subprofile created". 
* Voeg een Javascript execution box toe uit de advanced editor en plak 
er de volgende code in:
`profile.fields.order_datum_laatst = subprofile.fields.order_datum;`
* Sla de follow-up op.

Elke keer dat er een subprofiel wordt aangemaakt voor een nieuwe order 
wordt nu de waarde van het "order_datum" veld gekopieerd naar het veld 
"order_datum_laatst" in het profiel. Zo hebben we altijd toegang tot de 
laatste aankoopdatum, waarmee we een [selectie](./database-selections-introduction) 
aan kunnen maken met inactieve klanten:

* Open nu de database en maak een nieuwe selectie aan. Geef deze 
een duidelijk naam zoals "Inactief".
* Voeg een nieuwe "AND" conditie toe aan de regel en selecteer "Check on date or 
period".
* Selecteer het veld met de laatste aankoopdatum.
* Zet de "before" en "after" data op "1 year ago".
* Bouw nu de selectie opnieuw om te zien of alles is gelukt. Als je geen 
profielen hebt die precies een jaar geleden hun laatste aankoop hebben 
gedaan kun je een test profiel maken, vergeet deze niet na afloop te verwijderen.

## Re-activatie

Nu je weet welke klanten inactief zijn is het tijd om ze te benaderen en 
terug te winnen. Je kunt ze simpelweg een mail sturen om ze te laten weten 
dat je ze mist, maar je kunt ze ook beloningen bieden zoals kortingen of 
gratis verzenden. Zorg ervoor dat je klanten weten dat ze zich ook uit 
kunnen schrijven. Dit lijkt tegenstrijdig, maar een schone mailinglist betekent 
een schone reputatie. Zo komen je mails beter aan bij de mensen die ze willen 
ontvangen. Natuurlijk staat het je vrij nog te benadrukken dat klant bij 
jou blijven voordelen heeft!

Als je de template hebt aangemaakt kun je simpelweg een dagelijkse 
mailing instellen; omdat beide data op 1 jaar geleden staan mailen we 
alleen wanneer de laatste order precies 1 jaar geleden was.

## Meer informatie

Wil je meer informatie over follow-ups of selecties? Wil je meer informatie 
over personalizatie om je re-activatie campagnes nog interessanter te maken?
De onderstaande links helpen je op weg.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Selecties](./database-selections-introduction.md)
* [Personalizatie](./personalization)
* [Campagne Tutorial: Profiel verrijking](./campaign-tutorial-profile-enrichment)
