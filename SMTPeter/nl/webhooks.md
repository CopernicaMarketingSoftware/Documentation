# Webhooks

Onder het `WEBHOOKS` tabblad in het dashboard kun je Webhooks beheren en 
instellen. Voorheen werden Webhooks Feedback Loops genoemd. Webhooks 
zijn processen die in real-time een notificatie naar gebruikers versturen 
door middel van een HTTP POST verzoek. 
Hierdoor kun je altijd de meest recente resultaten van je mailing gereed hebben. 

Hoewel Webhooks erg nuttig kunnen zijn moeten deze wel met zorg gebruikt worden 
aangezien Webhooks grote hoeveelheden verzoeken kunnen versturen. Als je 
niet zeker bent van de capaciteit van je servers of geen real-time statistieken 
nodig hebt kun je ook de 
[logfiles](./logfiles-smtpeter "Opvragen van SMTPeter logfiles") inzien 
of de [REST API](./rest-api) of [SMTP API](./smtp-api) gebruiken.

Er zijn verschillende types voor Webhooks. De onderstaande artikelen 
gaan dieper in op deze types:

* [Webhooks for bounces](webhook-bounces)
* [Webhooks for failures](webhook-failures)
* [Webhooks for clicks](webhook-clicks)
* [Webhooks for opens](webhook-opens)

## Webhooks met SMTPeter

Webhooks kunnen bijvoorbeeld gebruikt worden om data van SMTPeter 
te synchronizeren met je eigen applicatie. Webhooks vereisen echter wel een 
script op je eigen server om de juiste handelingen uit te voeren wanneer er 
informatie wordt aangeleverd door de Webhook. Je kunt hiervoor verschillende 
trigger instellen, waaronder kliks, opens, profielen die worden aangepast, etc.

De data die terug wordt gestuurd is uitgebreid en is ontworpen om makkelijk 
te kunnen linken met data in je eigen systeem.

## Webhooks configureren

De eerste stap voor het opzetten van een Webhook is om naar het `WEBHOOKS` 
tabblad te navigeren. Bij het aanmaken van een Webhook kies je hier eerst een type voor 
en een URL, de callback URL genoemd. Naar deze callback URL wordt straks de 
data verzonden.

De volgende stap is om het webadres te verifiëren. Door deze extra 
stap wordt voorkomen dat de mogelijke vertrouwelijke data in de verkeerde 
handen valt. In SMTPeter vind je hierna een link waarmee je het 
verificatie bestand kunt downloaden. Deze zal verschillend zijn voor elke 
nieuwe Webhook. Dit bestand kun je vervolgens in de root van je webserver plaatsen 
of op de plek waar het script staat dat de HTTP POST verzoeken zal afhandelen. 
Als dit dus de locatie van je script is:

```text
"https://example.com/dir/script.php"
```

Zou het tekst bestand, dat een naam zal hebben als "smtpeter-xxxxx.txt", 
in dezelfde folder geplaatst moeten worden:

```text
"https://example.com/dir/smtpeter-xxxxx.txt"
```

Je kunt nu de callback URL verifiëren door op de link in de SMTPeter 
te klikken. Hierna mag het tekstbestand verwijderd worden. Je kunt je 
Webhook testen door het menu voor de Webhook te openen en de tool onder 
de callback URL te gebruiken om te testen. Het is ook mogelijk al je Webhooks 
te testen in het Webhook menu.

## Veiligheid

Om jouw script te behoeden voor misbruik en incorrecte informatie voegt SMTPeter 
[signatures](./webhook-security) toe aan het verzoek. Door de juiste checks 
te implementeren kun je zo verzekeren dat alleen data van SMTPeter 
jouw systeem binnenkomt.

## Meer informatie

* [Logfiles](./logfiles-smtpeter)
* [REST API](./rest-api)
* [SMTP API](./smtp-api)
* [Webhooks voor bounces](webhook-bounces)
* [Webhooks voor failures](webhook-failures)
* [Webhooks voor kliks](webhook-clicks)
* [Webhooks voor opens](webhook-opens)
