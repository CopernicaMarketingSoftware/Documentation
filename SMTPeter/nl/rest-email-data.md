# Email data

De volgende methode kan gebruikt worden om alle data op te vragen die beschikbaar 
is voor een gegeven e-mailadres. In de URL vervang je daarom "EMAIL" door 
het e-mailadres waarvoor je data op wilt vragen.

`https://www.smtpeter.com/v1/email/EMAIL/data`

## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de URL:

* *report*: Het doel om het resultaat aan af te leveren; Dit kan een 
e-mailadres of webadres zijn. Als je kiest om deze te e-mailen wordt de bijlage 
toegevoegd als bijlage of als link als de bijlage te groot is. Als je ervoor 
kiest een webadres te gebruiken wordt er een HTTP POST verzoek verstuurd met 
de data naar het opgegeven adres.

## Resultaat

Het resultaat van deze GET call is een JSON bestand dat alle informatie 
bevat die bekend is over dit e-mail adres. Dit bestand bevat twee JSON 
objecten. De eerste hiervan is een info component dat je informatie toont 
over het verzoek, wat bijvoorbeeld nuttig is als je meerdere verzoeken achter 
elkaar uitvoert of de bestanden langer bewaart. 

Het tweede object bevat de data zelf. Er zit hier veel informatie in: 
Profiel data, geschiedenis, de MIME van elke e-mail die verstuurd is naar hen, 
enquête data, gepersonalizeerde PDF's verstuurd naar hen, kliks, opens, etc...

## Meer informatie

* [REST API](rest-api)
* [Overige REST calls](rest-other-calls)
* [All REST calls](all-rest-calls)
