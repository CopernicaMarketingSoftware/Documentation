# Retentie campagnes
Naast nieuwe klanten werven is het ook belangrijk om je huidige klantenbestand te onderhouden. Dit doen we door middel van retentie campagnes, hieronder staat beschreven hoe je een aantal retentie campagnes kan aanmaken in Copernica. Voor meer achtergrondinformatie over de retentie campagnes lees dan onze [Campagne Uitgelicht blog](https://www.copernica.com/nl/blog/post/campagne-uitgelicht-editie-4-retentiecampagnes) over retentie campagnes. 

## Loyaliteit
Eén effectieve manier waarmee je klanten kan stimuleren om herhaalaankopen te doen, is door een loyaliteitsprogramma uit te rollen, bijvoorbeeld door klanten punten toe te kennen bij elke aankoop. Hiervoor hebben we wel een  [collectie](./database-collections)  nodig waarin alle gekochte orders van een klant staan, daar gaan we in dit geval ook vanuit.  We gaan een veld maken in Copernica die geupdate wordt nadat een order voltooid is. 
 
- Maak in je [database](./database-profiles) een nieuw veld aan **Loyalty** en geef dit als type **numeriek veld**.  
- Maak een opvolgactie op de collectie waar alle gekochte orders in staan. 
- Geef als aanleiding dat er een **Er is een subprofiel aangemaakt of gewijzigd** en geef als extra conditie dat het veld status veranderd moet zijn naar **complete**. Hiermee checken we of de order compleet binnenkomt of erna veranderd wordt. 
- Geef als actie dat er een wijziging gedaan moet worden in het (sub)profiel en er is geen wachttijd. 
- Vul in de actie in dat het profiel gewijzigd wordt, selecteer het Loyalty veld en zet de volgende waarde erin **{math equation="x+y" x=$profile.Loyalty y=5}**.  De [math equation](./publisher-personalization-functions#math) functie zorgt ervoor dat er 5 punten voor elke nieuwe aankoop bij het veld Loyalty gezet worden.

Dit veld kan vervolgens in mailings getoond worden met **{$profile.Loyalty}** of kan gebruikt worden om selecties op te maken.  

## Persoonlijk content tonen
Als je via een externe tool persoonlijke aanbiedingen Copernica kan inschieten, dan kun je deze tonen in Mailings of er campagnes mee starten. Stel je schiet een een persoonlijke aanbieding in een Copernica collectie en wil gelijk een mailing hierover sturen naar het profiel. 

- Dit doe je door een opvolgactie actie te maken op deze collectie.
- Geef als aanleiding dat er een nieuw subprofiel is aangemaakt en geef als actie **verstuur een opgemaakt email document**.
- Stel vervolgens de mailing in die je wilt versturen naar het profiel. 

Om in de mailing het juiste subprofiel te tonen, gebruiken we de [personalisatie variable](./publisher-personalization-variables) **{$mailing.trigger}**. Mailing.trigger bevat het subprofiel die de opvolgactie gestart heeft. Het werkt hetzelfde als **{$profile}**  of **{$subprofile}**.
We kunnen de mail personaliseren door onderstaande te doen:
```
Dit is toont de naam van een product :  {$mailing.trigger.Naam}
Dit is toont de prijs van een product :  {$mailing.trigger.Prijs}
```


## Winback
Een Winback-campagne is een gerichte (reeks) e-mail(s) die je verstuurt naar klanten die ooit een aankoop hebben gedaan, maar al een tijd niet meer zijn teruggekeerd voor een herhaalaankoop.  

Voor de Winback-campagne gaan we ervan uit dat er een [collectie](./database-collections) is waarin alle bestelde orders staan. De orders hoeven in dit geval niet realtime met Copernica gesynchroniseerd te zijn, zolang ze maar 1 keer per dag geupdate worden is dat voldoende voor de Winback-campagne. Daarnaast dient er een manier te zijn om complete orders te vinden. 

Voor het aanmaken van de Winback-campagne willen we zoeken naar orders met de status ‘complete’. We willen namelijk dat klanten die ooit, maar niet binnen het afgelopen jaar een bestelling hebben gedaan selecteren voor de Winback-campagne.

Op collectie niveau doen we het volgende:

- Maak een [miniselectie](./database-collections#selecties-en-miniselecties) aan met de naam **AlleOrders**. Die alle subprofielen selecteert waarbij bijvoorbeeld het veld status **complete** is. Hierin staan alle orders die afgerond zijn. Deze orders gaan we gebruiken om alle klanten te vinden.
- Maak een miniselectie aan met de naam ‘BestellingenAfgelopenJaar’. Die alle subprofielen selecteer waarbij het veld status ‘complete’ is en maak een tweede ‘EN’ conditie met de aanschafdatum na ‘365 dagen geleden’ en voor ‘1 dag in de toekomst’ ligt, afgerond op hele dagen. Deze miniselectie bevat alle orders die in het afgelopen jaar gedaan zijn, hiermee kunnen we alle recente klanten vinden.

Op database niveau doen we het volgende:
- Maak een [selectie](./database-selections-introduction) aan met de naam **Klanten**. Geef als conditie [check op inhoud miniselectie](./database-selections-introduction#check-op-inhoud-van-(mini)selectie) waarbij er ‘Minimaal’ 1 en ‘Maximaal’ 99999 subprofielen moeten voorkomen in de miniselectie **AlleOrders**. Deze selectie bevat alle profielen die ooit een complete order gedaan hebben, oftewel onze klanten. 
- Maak een selectie **Winback** en hang deze onder de **Klanten** selectie, we willen namelijk alleen op onze klanten doorfilteren. Geef als conditie check op inhoud miniselectie waarbij er ‘Minimaal’ 0 en ‘Maximaal’ 0 subprofielen moeten voorkomen in de miniselectie **BestellingenAfgelopenJaar**. Hiermee zeggen we dat een klant geen orders in het afgelopen jaar gedaan mag hebben.

Stel vervolgens een mailing in die bijvoorbeeld 1 keer in de 3 maanden een mail stuurt naar de Winback selectie.  Je hoeft niet bang te zijn dat een klant gespamd wordt, want als een klant een order gedaan heeft wordt deze automatisch uit de selectie gehaald. Dit komt doordat deze niet meer voldoet aan de eisen van de Winback selectie. Of als een klant alle mailings niet opent, dan zal deze gefilterd worden door de inactieve selectie van het [databasemanagement](./database-management). 

