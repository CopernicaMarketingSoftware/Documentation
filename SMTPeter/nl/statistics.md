# Click en open tracking

Je kunt de *click tracking* van SMTPeter gebruiken om te zien wat de 
gebruikers aantrekt. Als click tracking ingeschakeld is worden alle 
links verstuurd met SMTPeter herschreven. In plaats van de originele 
hyperlink te openen leidt de link naar een van de web servers van SMTPeter. 
Deze slaat de klik op in de logs en stuurt de gebruiker vervolgens door 
naar de daadwerkelijke website. Dit gaat allemaal zo snel dat de gebruiker 
hier niets van merkt.

Hetzelfde gebeurd met klikken op afbeeldingen. Alle afbeelding links worden
herschreven, zodat afbeelding worden gedownload via de SMTPeter server in 
plaats van de originele server. Door dit te doen kunnen we ook registreren 
wanneer de email geopend wordt, omdat we zien dat de afbeelding wordt gedownload.


## Click tracking inschakelen

Emails kunnen naar SMTPeter worden gestuurd met de [SMTP API](smtp-api) 
en de [REST API](rest-send). Beide API's hebben de mogelijkheid klik 
tracking in te schakelen.

In de REST API kun je een "trackclicks" property meegeven in de JSON of de 
POST data.

In de SMTP API kun je een *x-smtpeter-trackclicks* MIME header meegeven aan 
je email of naar het dashboard gaan en gegevens aanmaken waarvoor click 
tracking is ingeschakeld.


## Scam preventie

Sommige email programma's geven een waarschuwing als een klikbare URL 
naar een andere URL gelinkt wordt dan weergeven wordt.


```html
<a href="http://clicks.smtpeter.com/path/to/file">www.example.com</a>
```

De bovenstaande link resulteert in een *dit bericht kan spam zijn*
waarschuwing in email programma's, omdat het lijkt alsof de link naar 
"example.com" gaat voor de gebruiker maar in werkelijkheid 
"clicks.smtpeter.com" opent.

Als je zulke waarschuwingen wilt voorkomen kun je aangeven dat 
SMTPeter dit soort hyperlinks niet moet herschrijven. Je kunt ook in 
plaats van de URL text weergeven:

```html
<a href="http://clicks.smtpeter.com/path/to/file">mijn website</a>
```

## API en dashboard

Alle *clicks en opens* worden opgeslagen in een log. Je kunt hier toegang 
toe krijgen met de REST API. Je hebt dan toegang tot alle onbewerkte 
data (in XML, JSON of csv).

Daarnaast zal SMTPeter periodiek deze files doorlopen om relevante 
informatie weer te geven op het dashboard. Je krijgt zo meteen inzicht 
in de meest effectieve links als je het dashboard opent.

Een overzicht van alle types van logfiles die we opslaan wordt weergeven 
in de onderstaande tabel. Je kunt de individuele log bestanden pagina 
bekijken om inzicht te krijgen in de inhoud van deze files.


| Log bestand                                           | Omschrijving                                           |
| ----------------------------------------------------- | ------------------------------------------------------ |
| [attempts log file](get-logfiles "attempts log file") | informatie over alle berichten verstuurd met SMTPeter  |
| [bounces log file](get-logfiles "bounces log file")   | informatie over bounces                                |
| [clicks log file](get-logfiles "clicks log file")     | informatie over de kliks                               |
| [deliveries log file](get-logfiles "log-deliveries")  | informatie over het afleveren van berichten            |
| [dmarc log file](get-logfiles "log-dmarc")            | informatie over DMARC statistieken                     |
| [failures log file](get-logfiles "log-failures")      | informatie over mislukte verzendpogingen               |
| [opens log file](get-logfiles "opens log file")       | informatie over de opens                               |
| [responses log file](get-logfiles "log-responses")    | informatie over response mails ontvangen door SMTPeter |


## Click tracking domein

Bij het herschrijven van links proberen we deze zo veel mogelijk op het 
origineel te laten lijken. We laten het pad in tact en voegen alleen een 
kleine *identifier* toe. We veranderen ook de originele hostname in de URL 
naar een hostname die naar de SMTPeter web servers verwijst. Dit is standaard 
"clicks.smtpeter.com".

Echter raden wij aan om op het dashboard een ander klik domein te 
configureren. Sommige gebruikers herkennen jouw hyperlink (die zichtbaar 
is wanneer er een muis over hangt) als klik registratie en zullen daarom 
niet klikken, of de registratie op andere wijze te omzeilen. Als je 
echter je klik domein verandert naar iets als 
"aanbiedingen.jouwbedrijfnaam.com" geef je gebruikers meer vertrouwen 
om de link aan te klikken.

## DNS configuratie

Als je je eigen klik domein instels moet je ervoor zorgen dat dit 
domein terugleid naar de SMTPeter server om opgeslagen te worden en 
de gebruiker weer door te sturen. De makkelijkste manier om dit te doen 
is om een DNS CNAME connectie aan te maken met "clicks.smtpeter.com". 

De precieze manier om dit te doen hangt af van je DNS provider. 
Als je hierover vragen hebt, moedigen we je aan deze aan hen te stellen.
